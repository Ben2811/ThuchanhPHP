<?php
class AccountModel
{
    private $conn;
    private $table_name = "account";
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getAccountByUsername($username)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username
LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }    public function save($username, $fullName, $password, $role = 'user')
    {
        if ($this->getAccountByUsername($username)) {
            return false;
        }
        $query = "INSERT INTO " . $this->table_name . " SET username=:username,
fullname=:fullname, password=:password, role=:role";
        $stmt = $this->conn->prepare($query);
        $username = htmlspecialchars(strip_tags($username));
        $fullName = htmlspecialchars(strip_tags($fullName));
        $password = password_hash($password, PASSWORD_BCRYPT);
        $role = htmlspecialchars(strip_tags($role));
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":fullname", $fullName);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":role", $role);
        return $stmt->execute();
    }

    // Lấy tất cả người dùng với phân trang
    public function getUsers($limit = 10, $offset = 0)
    {
        $query = "SELECT id, username, fullname, role, created_at 
                  FROM " . $this->table_name . " 
                  ORDER BY created_at DESC
                  LIMIT :limit OFFSET :offset";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Đếm tổng số người dùng
    public function getTotalUsersCount()
    {
        $query = "SELECT COUNT(*) as count FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result->count;
    }

    // Tìm kiếm người dùng
    public function searchUsers($searchTerm, $limit = 10, $offset = 0)
    {
        $query = "SELECT id, username, fullname, role, created_at 
                  FROM " . $this->table_name . " 
                  WHERE username LIKE :search 
                     OR fullname LIKE :search
                  ORDER BY created_at DESC
                  LIMIT :limit OFFSET :offset";
        
        $stmt = $this->conn->prepare($query);
        $searchTerm = '%' . $searchTerm . '%';
        $stmt->bindParam(':search', $searchTerm);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Lấy người dùng theo ID
    public function getUserById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Cập nhật thông tin người dùng
    public function updateUser($id, $username, $fullName, $role, $password = null)
    {
        $errors = [];
        
        if (empty($username)) {
            $errors[] = "Tên đăng nhập không được để trống";
        }
        
        if (empty($fullName)) {
            $errors[] = "Họ tên không được để trống";
        }
        
        if (!in_array($role, ['admin', 'user'])) {
            $errors[] = "Role không hợp lệ";
        }
        
        // Kiểm tra username đã tồn tại (trừ user hiện tại)
        $existingUser = $this->getAccountByUsername($username);
        if ($existingUser && $existingUser->id != $id) {
            $errors[] = "Tên đăng nhập đã tồn tại";
        }
        
        if (!empty($errors)) {
            return $errors;
        }
        
        if ($password) {
            $query = "UPDATE " . $this->table_name . " 
                      SET username = :username, fullname = :fullname, role = :role, password = :password 
                      WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $hashedPassword);
        } else {
            $query = "UPDATE " . $this->table_name . " 
                      SET username = :username, fullname = :fullname, role = :role 
                      WHERE id = :id";
            $stmt = $this->conn->prepare($query);
        }
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':fullname', $fullName);
        $stmt->bindParam(':role', $role);
        
        return $stmt->execute();
    }

    // Xóa người dùng
    public function deleteUser($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Thống kê người dùng
    public function getUserStatistics()
    {
        $stats = [];
        
        // Tổng số người dùng
        $query = "SELECT COUNT(*) as total_users FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stats['total_users'] = $stmt->fetch(PDO::FETCH_OBJ)->total_users;
        
        // Số admin
        $query = "SELECT COUNT(*) as admin_count FROM " . $this->table_name . " WHERE role = 'admin'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stats['admin_count'] = $stmt->fetch(PDO::FETCH_OBJ)->admin_count;
        
        // Số user thường
        $query = "SELECT COUNT(*) as user_count FROM " . $this->table_name . " WHERE role = 'user'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stats['user_count'] = $stmt->fetch(PDO::FETCH_OBJ)->user_count;
        
        // Người dùng đăng ký gần đây (30 ngày)
        $query = "SELECT COUNT(*) as recent_users FROM " . $this->table_name . " 
                  WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stats['recent_users'] = $stmt->fetch(PDO::FETCH_OBJ)->recent_users;
        
        return $stats;
    }
}
?>
