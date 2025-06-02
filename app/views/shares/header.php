<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm - Web Bán Hàng</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Header Navigation -->
    <header class="bg-white shadow-lg border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo/Brand -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="/WebBanHang/" class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-store text-white text-sm"></i>
                            </div>
                            <span class="text-xl font-bold text-gray-900">WebBanHang</span>
                        </a>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/WebBanHang/Product/" class="text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-md text-sm font-medium transition duration-200 flex items-center space-x-1">
                            <i class="fas fa-box text-sm"></i>
                            <span>Sản phẩm</span>
                        </a>
                        <a href="/WebBanHang/Product/add" class="text-gray-600 hover:text-green-600 hover:bg-green-50 px-3 py-2 rounded-md text-sm font-medium transition duration-200 flex items-center space-x-1">
                            <i class="fas fa-plus text-sm"></i>
                            <span>Thêm sản phẩm</span>
                        </a>
                        <a href="/WebBanHang/Category" class="text-gray-600 hover:text-purple-600 hover:bg-purple-50 px-3 py-2 rounded-md text-sm font-medium transition duration-200 flex items-center space-x-1">
                            <i class="fas fa-tags text-sm"></i>
                            <span>Danh mục</span>
                        </a>
                        <a href="/WebBanHang/Category/add" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-200 flex items-center space-x-1">
                            <i class="fas fa-plus text-sm"></i>
                            <span>Thêm danh mục</span>
                        </a>
                    </div>
                </nav>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="bg-gray-50 p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" aria-controls="mobile-menu" aria-expanded="false" onclick="toggleMobileMenu()">
                        <span class="sr-only">Mở menu chính</span>
                        <i class="fas fa-bars text-lg" id="menu-icon"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-gray-50 border-t border-gray-200">
                <a href="/WebBanHang/Product/" class="text-gray-600 hover:text-blue-600 hover:bg-blue-50 block px-3 py-2 rounded-md text-base font-medium transition duration-200">
                    <i class="fas fa-box text-sm mr-2"></i>Sản phẩm
                </a>
                <a href="/WebBanHang/Product/add" class="text-gray-600 hover:text-green-600 hover:bg-green-50 block px-3 py-2 rounded-md text-base font-medium transition duration-200">
                    <i class="fas fa-plus text-sm mr-2"></i>Thêm sản phẩm
                </a>
                <a href="/WebBanHang/Category" class="text-gray-600 hover:text-purple-600 hover:bg-purple-50 block px-3 py-2 rounded-md text-base font-medium transition duration-200">
                    <i class="fas fa-tags text-sm mr-2"></i>Danh mục
                </a>
                <a href="/WebBanHang/Category/add" class="bg-blue-500 hover:bg-blue-600 text-white block px-3 py-2 rounded-md text-base font-medium transition duration-200">
                    <i class="fas fa-plus text-sm mr-2"></i>Thêm danh mục
                </a>
            </div>
        </div>
    </header>
</body>
</html>