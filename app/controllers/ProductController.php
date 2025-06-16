<?php
// Require SessionHelper and other necessary files
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');
require_once('app/models/AccountModel.php');
require_once('app/models/OrderModel.php');
require_once('app/helpers/SessionHelper.php');

class ProductController
{
    private $productModel;
    private $accountModel;
    private $orderModel;
    private $db;
    public function __construct()
    {
        SessionHelper::init();
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
        $this->accountModel = new AccountModel($this->db);
        $this->orderModel = new OrderModel($this->db);
    }

    public function list()
    {
        $products = $this->productModel->getProducts();
        include 'app/views/product/list.php';
    }
    public function index()
    {
        $this->list();
    }    
    public function show($id)
    {
        $product = $this->productModel->getProductById($id);
        if ($product) {
            // Get related products from the same category
            $relatedProducts = $this->productModel->getRelatedProducts($id, $product->category_id, 4);
            include 'app/views/product/show.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }   
     public function add()
    {
        // Chỉ admin mới được phép thêm sản phẩm
        SessionHelper::requireAdminWithMessage();
        
        $categories = (new CategoryModel($this->db))->getCategories();
        include_once 'app/views/product/add.php';
    }

    public function save()
    {
        SessionHelper::requireAdminWithMessage();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? 0;
            
            $category_id = $_POST['category_id'] ?? null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $this->uploadImage($_FILES['image']);
            } else {
                $image = "";
            }
            $result = $this->productModel->addProduct(
                $name,
                $description,
                $price,

                $category_id,
                $image
            );

            if (is_array($result)) {
                $errors = $result;
                $categories = (new CategoryModel($this->db))->getCategories();
                include 'app/views/product/add.php';
            } else {
                header('Location: /WebBanHang/Product');
            }
        }
    }    public function edit($id)
    {
        // Chỉ admin mới được phép chỉnh sửa sản phẩm
        SessionHelper::requireAdminWithMessage();
        
        $product = $this->productModel->getProductById($id);
        $categories = (new CategoryModel($this->db))->getCategories();
        if ($product) {
            include 'app/views/product/edit.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }    public function update()
    {
        // Chỉ admin mới được phép cập nhật sản phẩm
        SessionHelper::requireAdminWithMessage();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'] ?? 0;
            
            $category_id = $_POST['category_id'];
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $this->uploadImage($_FILES['image']);
            } else {
                $image = $_POST['existing_image'];
            }
            $edit = $this->productModel->updateProduct(
                $id,
                $name,
                $description,

                $price,
                $category_id,
                $image
            );
            if ($edit) {
                header('Location: /WebBanHang/Product');
            } else {
                echo "Đã xảy ra lỗi khi lưu sản phẩm.";
            }
        }
    }    public function delete($id)
    {
        // Chỉ admin mới được phép xóa sản phẩm
        SessionHelper::requireAdminWithMessage();
        
        if ($this->productModel->deleteProduct($id)) {
            header('Location: /WebBanHang/Product');
        } else {
            echo "Đã xảy ra lỗi khi xóa sản phẩm.";
        }
    }
    private function uploadImage($file)
    {
        $target_dir = "uploads/";
        // Kiểm tra và tạo thư mục nếu chưa tồn tại
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Kiểm tra xem file có phải là hình ảnh không
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            throw new Exception("File không phải là hình ảnh.");
        }
        // Kiểm tra kích thước file (10 MB = 10 * 1024 * 1024 bytes)
        if ($file["size"] > 10 * 1024 * 1024) {
            throw new Exception("Hình ảnh có kích thước quá lớn.");
        }
        // Chỉ cho phép một số định dạng hình ảnh nhất định
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !=
            "jpeg" && $imageFileType != "gif"
        ) {

            throw new Exception("Chỉ cho phép các định dạng JPG, JPEG, PNG và GIF.");
        }
        // Lưu file
        if (!move_uploaded_file($file["tmp_name"], $target_file)) {
            throw new Exception("Có lỗi xảy ra khi tải lên hình ảnh.");
        }        return $target_file;
    }
    
    // Quản lý người dùng - chỉ dành cho admin
    public function users($page = 1)
    {
        SessionHelper::requireAdminWithMessage();
        
        $limit = 10;
        $offset = ($page - 1) * $limit;
        
        $searchTerm = $_GET['search'] ?? '';
        
        if (!empty($searchTerm)) {
            $users = $this->accountModel->searchUsers($searchTerm, $limit, $offset);
            $totalUsers = count($this->accountModel->searchUsers($searchTerm, 1000, 0)); // Đếm tất cả
        } else {
            $users = $this->accountModel->getUsers($limit, $offset);
            $totalUsers = $this->accountModel->getTotalUsersCount();
        }
        
        $totalPages = ceil($totalUsers / $limit);
        $currentPage = $page;
        
        include 'app/views/product/users.php';
    }

    public function userDetail($id)
    {
        SessionHelper::requireAdminWithMessage();
        
        $user = $this->accountModel->getUserById($id);
        if (!$user) {
            echo "Không tìm thấy người dùng.";
            return;
        }
        
        include 'app/views/product/userDetail.php';
    }

    public function deleteUser($id)
    {
        SessionHelper::requireAdminWithMessage();
        
        if ($this->accountModel->deleteUser($id)) {
            header('Location: /WebBanHang/Product/users?message=deleted');
        } else {
            header('Location: /WebBanHang/Product/users?error=delete_failed');
        }
    }

    public function userStatistics()
    {
        SessionHelper::requireAdminWithMessage();
        
        $statistics = $this->accountModel->getUserStatistics();
        include 'app/views/product/userStatistics.php';
    }

    public function editUser($id)
    {
        SessionHelper::requireAdminWithMessage();
        
        $user = $this->accountModel->getUserById($id);
        if (!$user) {
            echo "Không tìm thấy người dùng.";
            return;
        }
        
        include 'app/views/product/editUser.php';
    }

    public function updateUser()
    {
        SessionHelper::requireAdminWithMessage();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $username = $_POST['username'];
            $fullname = $_POST['fullname'];
            $role = $_POST['role'];
            $password = $_POST['password'] ?? null;
            
            if (!empty($password)) {
                $result = $this->accountModel->updateUser($id, $username, $fullname, $role, $password);
            } else {
                $result = $this->accountModel->updateUser($id, $username, $fullname, $role);
            }
            
            if ($result === true) {
                header('Location: /WebBanHang/Product/users?message=updated');
            } else if (is_array($result)) {
                $errors = $result;
                $user = $this->accountModel->getUserById($id);
                include 'app/views/product/editUser.php';
            } else {
                header('Location: /WebBanHang/Product/users?error=update_failed');
            }
        }
    }

    public function cart()
    {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        include 'app/views/product/cart.php';
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($id)
    {
        // Yêu cầu đăng nhập để thêm vào giỏ hàng
        if (!SessionHelper::isLoggedIn()) {
            header('Location: /WebBanHang/account/login');
            exit;
        }

        $product = $this->productModel->getProductById($id);
        if (!$product) {
            echo "Không tìm thấy sản phẩm.";
            return;
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image
            ];
        }

        header('Location: /WebBanHang/Product/cart');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($id = null)
    {
        // Yêu cầu đăng nhập
        if (!SessionHelper::isLoggedIn()) {
            header('Location: /WebBanHang/account/login');
            exit;
        }
        
        // Handle AJAX request
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['CONTENT_TYPE'] === 'application/json') {
            header('Content-Type: application/json');
            
            $input = json_decode(file_get_contents('php://input'), true);
            $productId = $input['product_id'] ?? null;
            
            if (!$productId) {
                echo json_encode(['success' => false, 'message' => 'Invalid product ID']);
                return;
            }
            
            if (isset($_SESSION['cart'][$productId])) {
                unset($_SESSION['cart'][$productId]);
                
                echo json_encode([
                    'success' => true,
                    'message' => 'Product removed from cart',
                    'cart_count' => count($_SESSION['cart'])
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Product not found in cart']);
            }
            return;
        }
        
        // Handle regular GET request
        if ($id) {
            if (isset($_SESSION['cart'][$id])) {
                unset($_SESSION['cart'][$id]);
            }
            header('Location: /WebBanHang/Product/cart');
        } else {
            echo "ID sản phẩm không hợp lệ.";
        }
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng (AJAX)
    public function updateCart()
    {
        // Yêu cầu đăng nhập
        if (!SessionHelper::isLoggedIn()) {
            echo json_encode(['success' => false, 'message' => 'Not logged in']);
            return;
        }

        header('Content-Type: application/json');
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request method']);
            return;
        }
        
        // Get raw input and decode
        $rawInput = file_get_contents('php://input');
        $input = json_decode($rawInput, true);
        
        // Check for JSON decode errors
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Invalid JSON data']);
            return;
        }
        
        $productId = $input['product_id'] ?? null;
        $quantity = $input['quantity'] ?? null;
        
        // Validate inputs
        if (!$productId || !is_numeric($quantity) || $quantity < 1) {
            echo json_encode(['success' => false, 'message' => 'Invalid parameters']);
            return;
        }
        
        // Check if cart exists
        if (!isset($_SESSION['cart'])) {
            echo json_encode(['success' => false, 'message' => 'Cart not found']);
            return;
        }
        
        // Check if product exists in cart
        if (!isset($_SESSION['cart'][$productId])) {
            echo json_encode(['success' => false, 'message' => 'Product not found in cart']);
            return;
        }
        
        // Update quantity
        $_SESSION['cart'][$productId]['quantity'] = (int)$quantity;
        
        echo json_encode([
            'success' => true,
            'item_price' => $_SESSION['cart'][$productId]['price'],
            'new_quantity' => (int)$quantity,
            'message' => 'Cart updated successfully'
        ]);
    }    // Xóa toàn bộ giỏ hàng
    public function clearCart()
    {
        $_SESSION['cart'] = [];
        header('Location: /WebBanHang/Product/cart');
    }

    // Trang thanh toán
    public function checkout()
    {
        // Yêu cầu đăng nhập để thanh toán
        SessionHelper::requireLogin();
        include 'app/views/product/checkout.php';
    }

    // Xử lý thanh toán
    public function processCheckout()
    {
        // Yêu cầu đăng nhập
        SessionHelper::requireLogin();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            
            // Kiểm tra giỏ hàng
            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                echo "Giỏ hàng trống.";
                return;
            }
            
            // Bắt đầu giao dịch
            $this->db->beginTransaction();
            
            try {
                // Lưu thông tin đơn hàng vào bảng orders
                $query = "INSERT INTO orders (name, phone, address) VALUES (:name, :phone, :address)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':address', $address);
                $stmt->execute();
                
                $order_id = $this->db->lastInsertId();
                
                // Lưu chi tiết đơn hàng vào bảng order_details
                $cart = $_SESSION['cart'];
                foreach ($cart as $product_id => $item) {
                    $query = "INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)";
                    $stmt = $this->db->prepare($query);
                    $stmt->bindParam(':order_id', $order_id);
                    $stmt->bindParam(':product_id', $product_id);
                    $stmt->bindParam(':quantity', $item['quantity']);
                    $stmt->bindParam(':price', $item['price']);
                    $stmt->execute();
                }
                
                // Xóa giỏ hàng sau khi đặt hàng thành công
                unset($_SESSION['cart']);
                
                // Commit giao dịch
                $this->db->commit();
                
                // Chuyển hướng đến trang xác nhận đơn hàng
                header('Location: /WebBanHang/Product/orderConfirmation');
                exit();
                
            } catch (Exception $e) {
                // Rollback giao dịch nếu có lỗi
                $this->db->rollBack();
                echo "Đã xảy ra lỗi khi xử lý đơn hàng: " . $e->getMessage();
            }
        }
    }

    // Trang xác nhận đơn hàng
    public function orderConfirmation()
    {
        // Yêu cầu đăng nhập
        SessionHelper::requireLogin();
        include 'app/views/product/orderConfirmation.php';
    }
}
