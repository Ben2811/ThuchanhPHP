<?php
class SessionHelper
{
    /**
     * Khởi tạo session nếu chưa được khởi tạo
     */
    public static function init()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Kiểm tra xem người dùng đã đăng nhập chưa
     */
    public static function isLoggedIn()
    {
        self::init();
        return isset($_SESSION['username']) && !empty($_SESSION['username']);
    }

    /**
     * Lấy username của người dùng hiện tại
     */
    public static function getUsername()
    {
        self::init();
        return $_SESSION['username'] ?? null;
    }

    /**
     * Lấy role của người dùng hiện tại
     */
    public static function getRole()
    {
        self::init();
        return $_SESSION['role'] ?? null;
    }

    /**
     * Kiểm tra xem người dùng có phải admin không
     */
    public static function isAdmin()
    {
        return self::getRole() === 'admin';
    }

    /**
     * Lưu thông tin đăng nhập vào session
     */
    public static function login($username, $role = 'user')
    {
        self::init();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
    }    /**
     * Đăng xuất và xóa session
     */
    public static function logout()
    {
        self::init();
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        unset($_SESSION['cart']); // Xóa giỏ hàng khi đăng xuất
    
    }

    /**
     * Lấy số lượng items trong giỏ hàng
     */
    public static function getCartCount()
    {
        self::init();
        return isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    }

    /**
     * Kiểm tra quyền truy cập cho admin
     */
    public static function requireAdmin()
    {
        if (!self::isLoggedIn() || !self::isAdmin()) {
            header('Location: /WebBanHang/account/login');
            exit();
        }
    }

    /**
     * Kiểm tra quyền đăng nhập
     */
    public static function requireLogin()
    {
        if (!self::isLoggedIn()) {
            header('Location: /WebBanHang/account/login');
            exit();
        }
    }    /**
     * Kiểm tra quyền admin và hiển thị thông báo
     */
    public static function requireAdminWithMessage()
    {
        if (!self::isLoggedIn()) {
            die('<!DOCTYPE html>
                <html lang="vi">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Cần đăng nhập</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 0; padding: 50px; background-color: #f9fafb; }
                        .container { max-width: 500px; margin: 0 auto; background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center; }
                        h2 { color: #dc2626; margin-bottom: 20px; }
                        p { color: #374151; margin-bottom: 15px; line-height: 1.5; }
                        .btn { display: inline-block; background-color: #2563eb; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; margin: 10px; transition: background-color 0.3s; }
                        .btn:hover { background-color: #1d4ed8; }
                        .btn-secondary { background-color: #6b7280; }
                        .btn-secondary:hover { background-color: #4b5563; }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h2>🔐 Cần đăng nhập</h2>
                        <p>Bạn cần đăng nhập để truy cập trang này.</p>
                        <a href="/WebBanHang/Account/login" class="btn">Đăng nhập ngay</a>
                        <a href="/WebBanHang/Product" class="btn btn-secondary">Về trang chủ</a>
                    </div>
                </body>
                </html>');
        }
        
        if (!self::isAdmin()) {
            die('<!DOCTYPE html>
                <html lang="vi">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Không có quyền truy cập</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 0; padding: 50px; background-color: #f9fafb; }
                        .container { max-width: 500px; margin: 0 auto; background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center; }
                        h2 { color: #dc2626; margin-bottom: 20px; }
                        p { color: #374151; margin-bottom: 15px; line-height: 1.5; }
                        .user-info { background: #fef2f2; border: 1px solid #fca5a5; padding: 15px; border-radius: 6px; margin: 20px 0; }
                        .btn { display: inline-block; background-color: #2563eb; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; margin: 10px; transition: background-color 0.3s; }
                        .btn:hover { background-color: #1d4ed8; }
                        .btn-secondary { background-color: #6b7280; }
                        .btn-secondary:hover { background-color: #4b5563; }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h2>🚫 Không có quyền truy cập</h2>
                        <div class="user-info">
                            <strong>Tài khoản:</strong> ' . htmlspecialchars(self::getUsername()) . '<br>
                            <strong>Vai trò:</strong> ' . htmlspecialchars(self::getRole()) . '
                        </div>
                        <p>Chỉ có <strong>Admin</strong> mới được phép truy cập trang này.</p>
                        <p>Nếu bạn cần quyền truy cập, vui lòng liên hệ quản trị viên.</p>
                        <a href="/WebBanHang/Product" class="btn">Về trang chủ</a>
                        <a href="/WebBanHang/Product/cart" class="btn btn-secondary">Xem giỏ hàng</a>
                    </div>
                </body>
                </html>');
        }
    }    /**
     * Kiểm tra đăng nhập và hiển thị thông báo
     */
    public static function requireLoginWithMessage()
    {
        if (!self::isLoggedIn()) {
            die('<!DOCTYPE html>
                <html lang="vi">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Cần đăng nhập</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 0; padding: 50px; background-color: #f9fafb; }
                        .container { max-width: 500px; margin: 0 auto; background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center; }
                        h2 { color: #dc2626; margin-bottom: 20px; }
                        p { color: #374151; margin-bottom: 15px; line-height: 1.5; }
                        .btn { display: inline-block; background-color: #2563eb; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; margin: 10px; transition: background-color 0.3s; }
                        .btn:hover { background-color: #1d4ed8; }
                        .btn-secondary { background-color: #6b7280; }
                        .btn-secondary:hover { background-color: #4b5563; }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h2>🔐 Cần đăng nhập</h2>
                        <p>Bạn cần đăng nhập để truy cập trang này.</p>
                        <a href="/WebBanHang/Account/login" class="btn">Đăng nhập ngay</a>
                        <a href="/WebBanHang/Product" class="btn btn-secondary">Về trang chủ</a>
                    </div>
                </body>
                </html>');
        }
    }

    /**
     * Lấy thông tin người dùng đầy đủ
     */
    public static function getUserInfo()
    {
        return [
            'username' => self::getUsername(),
            'role' => self::getRole(),
            'isLoggedIn' => self::isLoggedIn(),
            'isAdmin' => self::isAdmin(),
            'cartCount' => self::getCartCount()
        ];
    }
}
