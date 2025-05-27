<?php include 'app/views/shares/header.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 to-blue-50">
    <div class="max-w-md w-full mx-4">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:scale-105">
            <!-- Success Header -->
            <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-6 py-8 text-center">
                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4 animate-bounce">
                    <i class="fas fa-check text-green-500 text-3xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-2">Đặt hàng thành công!</h2>
                <p class="text-green-100">Cảm ơn bạn đã tin tưởng chúng tôi</p>
            </div>
            
            <!-- Content -->
            <div class="px-6 py-8">
                <div class="text-center space-y-4">
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-green-800 mb-2">
                            <i class="fas fa-gift mr-2"></i>Đơn hàng đã được xử lý
                        </h3>
                        <p class="text-green-700 text-sm">
                            Đơn hàng của bạn đã được tiếp nhận và đang trong quá trình xử lý. 
                            Chúng tôi sẽ giao hàng trong thời gian sớm nhất.
                        </p>
                    </div>
                    
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex items-center justify-center text-blue-600 mb-2">
                            <i class="fas fa-phone-alt mr-2"></i>
                            <span class="font-medium">Chúng tôi sẽ liên hệ</span>
                        </div>
                        <p class="text-blue-700 text-sm">
                            Đội ngũ của chúng tôi sẽ liên hệ với bạn trong vòng 24h để xác nhận đơn hàng.
                        </p>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="mt-8 space-y-3">
                    <a href="/WebBanHang/Product/" 
                       class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 transform hover:-translate-y-1 hover:shadow-lg flex items-center justify-center">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        Tiếp tục mua sắm
                    </a>
                    
                    <button onclick="window.print()" 
                            class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-lg transition duration-300 flex items-center justify-center">
                        <i class="fas fa-print mr-2"></i>
                        In đơn hàng
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Floating elements for decoration -->
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none overflow-hidden">
            <div class="absolute top-10 left-10 w-4 h-4 bg-green-400 rounded-full animate-pulse opacity-70"></div>
            <div class="absolute top-20 right-20 w-6 h-6 bg-blue-400 rounded-full animate-pulse opacity-50 delay-1000"></div>
            <div class="absolute bottom-20 left-20 w-5 h-5 bg-purple-400 rounded-full animate-pulse opacity-60 delay-500"></div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>