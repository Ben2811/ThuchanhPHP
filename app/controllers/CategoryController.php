<?php

require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');
require_once('app/helpers/SessionHelper.php');

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        SessionHelper::init();
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    public function index()
    {
        $this->list();
    }

    public function list()
    {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    public function show($id)
    {
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            include 'app/views/category/show.php';
        } else {
            echo "Không tìm thấy danh mục.";
        }
    }    public function add()
    {
        // Chỉ admin mới được phép thêm danh mục
        SessionHelper::requireAdminWithMessage();
        
        include 'app/views/category/add.php';
    }    public function save()
    {
        // Chỉ admin mới được phép lưu danh mục
        SessionHelper::requireAdminWithMessage();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            
            $result = $this->categoryModel->addCategory($name, $description);
            
            if (is_array($result)) {
                $errors = $result;
                include 'app/views/category/add.php';
            } else {
                $_SESSION['success'] = "Thêm danh mục thành công.";
                header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
                header("Cache-Control: post-check=0, pre-check=0", false);
                header("Pragma: no-cache");
                header('Location: /WebBanHang/Category');
                exit();
            }
        }
    }    public function edit($id)
    {
        // Chỉ admin mới được phép chỉnh sửa danh mục
        SessionHelper::requireAdminWithMessage();
        
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            include 'app/views/category/edit.php';
        } else {
            echo "Không tìm thấy danh mục.";
        }
    }    public function update()
    {
        // Chỉ admin mới được phép cập nhật danh mục
        SessionHelper::requireAdminWithMessage();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'] ?? '';
            
            $edit = $this->categoryModel->updateCategory($id, $name, $description);
            
            if ($edit) {
                header('Location: /WebBanHang/Category');
                exit();
            } else {
                echo "Đã xảy ra lỗi khi cập nhật danh mục.";
            }
        }
    }    public function delete($id)
    {
        // Chỉ admin mới được phép xóa danh mục
        SessionHelper::requireAdminWithMessage();
        
        $hasProducts = $this->categoryModel->hasProducts($id);
        
        if ($hasProducts) {
            $_SESSION['error'] = "Không thể xóa danh mục này vì có sản phẩm liên quan.";
            header('Location: /WebBanHang/Category');
            exit();
        }
        
        if ($this->categoryModel->deleteCategory($id)) {
            $_SESSION['success'] = "Xóa danh mục thành công.";
            header('Location: /WebBanHang/Category');
            exit();
        } else {
            echo "Đã xảy ra lỗi khi xóa danh mục.";
        }
    }
}
?>