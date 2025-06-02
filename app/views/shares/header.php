<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm - Web Bán Hàng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        accent: {
                            50: '#fdf4ff',
                            100: '#fae8ff',
                            200: '#f5d0fe',
                            300: '#f0abfc',
                            400: '#e879f9',
                            500: '#d946ef',
                            600: '#c026d3',
                            700: '#a21caf',
                            800: '#86198f',
                            900: '#701a75',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'bounce-subtle': 'bounceSubtle 0.6s ease-in-out',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(-10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        bounceSubtle: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-5px)' }
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 20px rgba(14, 165, 233, 0.3)' },
                            '100%': { boxShadow: '0 0 30px rgba(217, 70, 239, 0.4)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .gradient-text {
            background: linear-gradient(135deg, #0ea5e9, #d946ef);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hover-lift {
            transition: all 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen font-sans">    <!-- Header Navigation -->
    <header class="glass-effect shadow-xl border-b border-white/20 sticky top-0 z-50 animate-fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">            <div class="flex justify-between items-center h-16">
                <!-- Logo/Brand -->
                <div class="flex items-center space-x-3 hover-lift">
                    <div class="relative">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-accent-600 rounded-xl flex items-center justify-center shadow-lg animate-glow">
                            <i class="fas fa-store text-white text-lg"></i>
                        </div>
                        <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full border-2 border-white animate-pulse"></div>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold gradient-text">WebBanHang</h1>
                        <p class="text-xs text-gray-600 font-medium">Quản lý sản phẩm hiện đại</p>
                    </div>
                </div>                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-1">
                    <a href="/WebBanHang/Product/" class="group px-3 py-2 rounded-lg text-gray-700 hover:text-primary-600 hover:bg-primary-50 transition-all duration-300 flex items-center space-x-2 hover-lift">
                        <div class="w-6 h-6 bg-primary-100 group-hover:bg-primary-200 rounded-lg flex items-center justify-center transition-colors duration-300">
                            <i class="fas fa-box text-primary-600 text-xs"></i>
                        </div>
                        <span class="font-medium text-sm">Sản phẩm</span>
                    </a>
                    <a href="/WebBanHang/Product/add" class="group px-3 py-2 rounded-lg text-gray-700 hover:text-green-600 hover:bg-green-50 transition-all duration-300 flex items-center space-x-2 hover-lift">
                        <div class="w-6 h-6 bg-green-100 group-hover:bg-green-200 rounded-lg flex items-center justify-center transition-colors duration-300">
                            <i class="fas fa-plus text-green-600 text-xs"></i>
                        </div>
                        <span class="font-medium text-sm">Thêm SP</span>
                    </a>
                    <a href="/WebBanHang/Category" class="group px-3 py-2 rounded-lg text-gray-700 hover:text-accent-600 hover:bg-accent-50 transition-all duration-300 flex items-center space-x-2 hover-lift">
                        <div class="w-6 h-6 bg-accent-100 group-hover:bg-accent-200 rounded-lg flex items-center justify-center transition-colors duration-300">
                            <i class="fas fa-tags text-accent-600 text-xs"></i>
                        </div>
                        <span class="font-medium text-sm">Danh mục</span>
                    </a>
                    <a href="/WebBanHang/Category/add" class="group px-4 py-2 rounded-lg bg-gradient-to-r from-primary-500 to-accent-600 text-white hover:from-primary-600 hover:to-accent-700 transition-all duration-300 flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:scale-105">
                        <div class="w-6 h-6 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-folder-plus text-white text-xs"></i>
                        </div>
                        <span class="font-medium text-sm">Thêm DM</span>
                    </a>
                </nav>                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="p-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-all duration-300 hover-lift">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                </div>
            </div>
        </div>        <!-- Mobile Navigation Menu -->
        <div class="md:hidden hidden animate-slide-up" id="mobile-menu">
            <div class="px-4 pt-3 pb-4 space-y-2 glass-effect border-t border-white/20">
                <a href="/WebBanHang/Product/" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-700 hover:text-primary-600 hover:bg-primary-50 transition-all duration-300">
                    <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-box text-primary-600 text-sm"></i>
                    </div>
                    <span class="font-medium">Danh sách sản phẩm</span>
                </a>
                <a href="/WebBanHang/Product/add" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-700 hover:text-green-600 hover:bg-green-50 transition-all duration-300">
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-plus text-green-600 text-sm"></i>
                    </div>
                    <span class="font-medium">Thêm sản phẩm</span>
                </a>
                <a href="/WebBanHang/Category" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-700 hover:text-accent-600 hover:bg-accent-50 transition-all duration-300">
                    <div class="w-8 h-8 bg-accent-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-tags text-accent-600 text-sm"></i>
                    </div>
                    <span class="font-medium">Danh sách danh mục</span>
                </a>
                <a href="/WebBanHang/Category/add" class="flex items-center space-x-3 px-3 py-2 rounded-lg bg-gradient-to-r from-primary-500 to-accent-600 text-white shadow-lg">
                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-folder-plus text-white text-sm"></i>
                    </div>
                    <span class="font-medium">Thêm danh mục</span>
                </a>
            </div>
        </div>
    </header>    <!-- Main Content Wrapper -->
    <main class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 animate-fade-in">

    <script>
        // Mobile menu toggle with smooth animation
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
            
            // Add rotation animation to menu button
            this.querySelector('i').classList.toggle('rotate-90');
        });

        // Add smooth scroll behavior
        document.documentElement.style.scrollBehavior = 'smooth';
    </script>