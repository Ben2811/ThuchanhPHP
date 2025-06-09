<?php
class OrderModel
{
    private $conn;
    private $orders_table = "orders";
    private $order_details_table = "order_details";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy tất cả đơn hàng với phân trang
    public function getOrders($limit = 10, $offset = 0)
    {
        $query = "SELECT o.*, 
                  COUNT(od.id) as total_items,
                  SUM(od.quantity * od.price) as total_amount
                  FROM " . $this->orders_table . " o
                  LEFT JOIN " . $this->order_details_table . " od ON o.id = od.order_id
                  GROUP BY o.id
                  ORDER BY o.created_at DESC
                  LIMIT :limit OFFSET :offset";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Đếm tổng số đơn hàng
    public function getTotalOrdersCount()
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->orders_table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result->total;
    }

    // Lấy chi tiết đơn hàng theo ID
    public function getOrderById($id)
    {
        $query = "SELECT o.*, 
                  SUM(od.quantity * od.price) as total_amount
                  FROM " . $this->orders_table . " o
                  LEFT JOIN " . $this->order_details_table . " od ON o.id = od.order_id
                  WHERE o.id = :id
                  GROUP BY o.id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Lấy chi tiết sản phẩm trong đơn hàng
    public function getOrderDetails($orderId)
    {
        $query = "SELECT od.*, p.name as product_name, p.image as product_image
                  FROM " . $this->order_details_table . " od
                  LEFT JOIN product p ON od.product_id = p.id
                  WHERE od.order_id = :order_id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':order_id', $orderId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Xóa đơn hàng
    public function deleteOrder($id)
    {
        try {
            $this->conn->beginTransaction();
            
            // Xóa chi tiết đơn hàng trước
            $query1 = "DELETE FROM " . $this->order_details_table . " WHERE order_id = :id";
            $stmt1 = $this->conn->prepare($query1);
            $stmt1->bindParam(':id', $id);
            $stmt1->execute();
            
            // Xóa đơn hàng
            $query2 = "DELETE FROM " . $this->orders_table . " WHERE id = :id";
            $stmt2 = $this->conn->prepare($query2);
            $stmt2->bindParam(':id', $id);
            $stmt2->execute();
            
            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    // Thống kê đơn hàng theo tháng
    public function getOrderStatistics()
    {
        $query = "SELECT 
                    DATE_FORMAT(created_at, '%Y-%m') as month,
                    COUNT(*) as order_count,
                    SUM(
                        (SELECT SUM(quantity * price) 
                         FROM " . $this->order_details_table . " od 
                         WHERE od.order_id = o.id)
                    ) as total_revenue
                  FROM " . $this->orders_table . " o
                  WHERE created_at >= DATE_SUB(NOW(), INTERVAL 12 MONTH)
                  GROUP BY DATE_FORMAT(created_at, '%Y-%m')
                  ORDER BY month DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Tìm kiếm đơn hàng
    public function searchOrders($searchTerm, $limit = 10, $offset = 0)
    {
        $query = "SELECT o.*, 
                  COUNT(od.id) as total_items,
                  SUM(od.quantity * od.price) as total_amount
                  FROM " . $this->orders_table . " o
                  LEFT JOIN " . $this->order_details_table . " od ON o.id = od.order_id
                  WHERE o.name LIKE :search 
                  OR o.phone LIKE :search 
                  OR o.address LIKE :search
                  OR o.id LIKE :search
                  GROUP BY o.id
                  ORDER BY o.created_at DESC
                  LIMIT :limit OFFSET :offset";
        
        $searchParam = "%$searchTerm%";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':search', $searchParam);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
