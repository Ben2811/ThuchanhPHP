<?php include 'app/views/shares/header.php'; ?>

<!-- Hero Section with Success Animation -->
<div class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50 to-blue-50 relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23059669" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    
    <!-- Floating particles for decoration -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-10 left-10 w-2 h-2 bg-green-400 rounded-full animate-bounce opacity-70 delay-75"></div>
        <div class="absolute top-20 right-20 w-3 h-3 bg-emerald-400 rounded-full animate-bounce opacity-60 delay-150"></div>
        <div class="absolute top-40 left-1/4 w-2 h-2 bg-blue-400 rounded-full animate-bounce opacity-50 delay-300"></div>
        <div class="absolute bottom-20 left-20 w-2 h-2 bg-green-500 rounded-full animate-bounce opacity-80 delay-500"></div>
        <div class="absolute bottom-40 right-1/3 w-2 h-2 bg-emerald-500 rounded-full animate-bounce opacity-60 delay-700"></div>
    </div>
    
    <div class="flex items-center justify-center min-h-screen py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-lg w-full">
            <!-- Success Card -->
            <div class="animate-fade-in bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-500">
                <!-- Success Header with Enhanced Animation -->
                <div class="relative bg-gradient-to-r from-green-500 via-emerald-500 to-green-600 px-6 py-8 text-center overflow-hidden">
                    <!-- Background decoration -->
                    <div class="absolute inset-0 bg-gradient-to-r from-green-400/20 to-emerald-400/20"></div>
                    <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M20,20 Q50,5 80,20 Q95,50 80,80 Q50,95 20,80 Q5,50 20,20 Z" fill="white" fill-opacity="0.1"/%3E%3C/svg%3E')] opacity-30"></div>
                    
                    <div class="relative z-10">
                        <!-- Animated Success Icon -->
                        <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg animate-bounce-subtle">
                            <div class="relative">
                                <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <!-- Glow effect -->
                                <div class="absolute inset-0 w-10 h-10 bg-green-400 rounded-full blur opacity-20 animate-pulse"></div>
                            </div>
                        </div>
                        
                        <h1 class="text-2xl md:text-3xl font-bold text-white mb-2 animate-slide-up">
                            Đặt hàng thành công!
                        </h1>
                        <p class="text-green-100 text-base animate-slide-up delay-100">
                            Cảm ơn bạn đã tin tưởng chúng tôi
                        </p>
                    </div>
                </div>
                
                <!-- Content Section -->
                <div class="px-6 py-6 space-y-6">
                    <!-- Success Messages -->
                    <div class="space-y-6 animate-slide-up delay-200">
                        <!-- Order Processed Card -->
                        <div class="group bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 rounded-2xl p-6 hover:border-green-300 transition-all duration-300 hover:shadow-lg">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-green-800 mb-2">
                                        Đơn hàng đã được xử lý
                                    </h3>
                                    <p class="text-green-700 leading-relaxed">
                                        Đơn hàng của bạn đã được tiếp nhận và đang trong quá trình xử lý. 
                                        Chúng tôi sẽ giao hàng trong thời gian sớm nhất.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Information Card -->
                        <div class="group bg-gradient-to-r from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-2xl p-6 hover:border-blue-300 transition-all duration-300 hover:shadow-lg">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-blue-800 mb-2">
                                        Chúng tôi sẽ liên hệ
                                    </h3>
                                    <p class="text-blue-700 leading-relaxed">
                                        Đội ngũ của chúng tôi sẽ liên hệ với bạn trong vòng 24h để xác nhận đơn hàng 
                                        và thông báo thời gian giao hàng cụ thể.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Order Tracking Info -->
                        <div class="group bg-gradient-to-r from-purple-50 to-pink-50 border-2 border-purple-200 rounded-2xl p-6 hover:border-purple-300 transition-all duration-300 hover:shadow-lg">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-purple-800 mb-2">
                                        Theo dõi đơn hàng
                                    </h3>
                                    <p class="text-purple-700 leading-relaxed">
                                        Bạn có thể theo dõi tình trạng đơn hàng thông qua email hoặc số điện thoại đã đăng ký.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="space-y-4 animate-slide-up delay-300">
                        <a href="/WebBanHang/Product/" 
                           class="group w-full bg-gradient-to-r from-primary-600 to-accent-600 hover:from-primary-700 hover:to-accent-700 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl flex items-center justify-center space-x-3 shadow-lg">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0L12 13m0 0l2.5 5"/>
                            </svg>
                            <span>Tiếp tục mua sắm</span>
                        </a>
                        
                        <button onclick="window.print()" 
                                class="group w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-4 px-8 rounded-2xl transition-all duration-300 hover:shadow-lg flex items-center justify-center space-x-3 border-2 border-gray-200 hover:border-gray-300">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                            </svg>
                            <span>In xác nhận đơn hàng</span>
                        </button>
                        
                        <div class="text-center pt-4">
                            <p class="text-sm text-gray-500">
                                Cần hỗ trợ? Liên hệ với chúng tôi qua 
                                <a href="tel:+84123456789" class="text-primary-600 hover:text-primary-700 font-medium">
                                    0123-456-789
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced CSS for animations -->
<style>
    @keyframes bounce-subtle {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
        }
    }
    
    .animate-bounce-subtle {
        animation: bounce-subtle 2s ease-in-out infinite;
    }
    
    .animate-fade-in {
        animation: fadeIn 0.8s ease-out;
    }
    
    .animate-slide-up {
        animation: slideUp 0.6s ease-out forwards;
        opacity: 0;
        transform: translateY(20px);
    }
    
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    @keyframes slideUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Print styles */
    @media print {
        body * {
            visibility: hidden;
        }
        .bg-gradient-to-r {
            background: #f3f4f6 !important;
        }
    }
</style>