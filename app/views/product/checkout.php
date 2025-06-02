<?php include 'app/views/shares/header.php'; ?>

<?php
// Calculate cart total
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-primary-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="text-center mb-8 animate-fade-in">
            <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-primary-600 via-primary-700 to-accent-600 bg-clip-text text-transparent mb-3">
                Thanh Toán
            </h1>
            <p class="text-lg text-gray-600 mb-6">Hoàn tất đơn hàng của bạn một cách nhanh chóng và an toàn</p>
            
            <!-- Progress Steps -->
            <div class="flex justify-center">
                <div class="flex items-center space-x-6">
                    <div class="flex items-center group">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center text-white text-sm font-bold shadow-lg animate-bounce-subtle">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="ml-2 text-sm font-medium text-green-600">Giỏ hàng</span>
                    </div>
                    
                    <div class="w-12 h-1 bg-gradient-to-r from-green-500 to-primary-500 rounded-full"></div>
                    
                    <div class="flex items-center group">
                        <div class="w-10 h-10 bg-gradient-to-r from-primary-500 to-accent-500 rounded-full flex items-center justify-center text-white text-sm font-bold shadow-lg animate-glow">
                            2
                        </div>
                        <span class="ml-2 text-sm font-bold text-primary-600">Thanh toán</span>
                    </div>
                    
                    <div class="w-12 h-1 bg-gray-200 rounded-full"></div>
                    
                    <div class="flex items-center group">
                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 text-sm font-bold">
                            3
                        </div>
                        <span class="ml-2 text-sm text-gray-500">Hoàn tất</span>
                    </div>
                </div>
            </div>
        </div>        <!-- Check if cart is empty -->
        <?php if (empty($cart)): ?>
            <div class="text-center py-16 animate-slide-up">
                <div class="w-32 h-32 bg-gradient-to-br from-primary-100 to-accent-100 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce-subtle">
                    <svg class="w-16 h-16 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 2.5M7 13l2.5 2.5M13 7v10a2 2 0 01-2 2H9a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-3">Giỏ hàng của bạn đang trống</h2>
                <p class="text-lg text-gray-600 mb-6 max-w-md mx-auto">Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.</p>
                <a href="/WebBanHang/Product" 
                   class="inline-flex items-center bg-gradient-to-r from-primary-600 to-accent-600 hover:from-primary-700 hover:to-accent-700 text-white font-bold px-6 py-3 rounded-xl transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-xl shadow-lg">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    Tiếp tục mua sắm
                </a>
            </div>
        <?php else: ?>
            <!-- Checkout Form -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 animate-slide-up" style="animation-delay: 0.2s;">
                <!-- Customer Information -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-primary-50 to-accent-50 px-6 py-4 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Thông tin giao hàng
                        </h2>
                    </div>
                    
                    <form method="POST" action="/WebBanHang/Product/processCheckout" class="p-6 space-y-6">                        <!-- Customer Name -->
                        <div class="group">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <svg class="w-4 h-4 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Họ và tên <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       required
                                       class="w-full px-3 py-3 pl-10 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white shadow-sm"
                                       placeholder="Nhập họ và tên của bạn">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="group">
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <svg class="w-4 h-4 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                Số điện thoại <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="tel" 
                                       id="phone" 
                                       name="phone" 
                                       required
                                       pattern="[0-9]{10,11}"
                                       class="w-full px-3 py-3 pl-10 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white shadow-sm"
                                       placeholder="0123 456 789">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="group">
                            <label for="address" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <svg class="w-4 h-4 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Địa chỉ giao hàng <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <textarea id="address" 
                                          name="address" 
                                          rows="3"
                                          required
                                          class="w-full px-3 py-3 pl-10 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white shadow-sm resize-none"
                                          placeholder="Nhập địa chỉ đầy đủ để giao hàng"></textarea>
                                <div class="absolute top-3 left-0 flex items-start pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Notes -->
                        <div class="group">
                            <label for="notes" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <svg class="w-4 h-4 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Ghi chú (Tùy chọn)
                            </label>
                            <div class="relative">
                                <textarea id="notes" 
                                          name="notes" 
                                          rows="2"
                                          class="w-full px-4 py-4 pl-12 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white shadow-sm resize-none"
                                          placeholder="Ghi chú thêm cho đơn hàng..."></textarea>
                                <div class="absolute top-4 left-0 flex items-start pl-4 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                </div>

                <!-- Payment Method & Summary -->
                <div class="space-y-8">
                    <!-- Cart Items Summary -->
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 px-8 py-6 border-b border-gray-100">
                            <h2 class="text-xl font-bold text-gray-900 flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                                Sản phẩm đã chọn
                            </h2>
                        </div>
                        
                        <div class="p-6 max-h-80 overflow-y-auto">
                            <div class="space-y-4">
                                <?php foreach ($cart as $id => $item): ?>
                                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100 hover:shadow-md transition-all duration-300">
                                        <div class="flex-1">
                                            <h4 class="text-sm font-semibold text-gray-900 mb-1">
                                                <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>
                                            </h4>
                                            <p class="text-xs text-gray-500 flex items-center">
                                                <span class="bg-primary-100 text-primary-800 px-2 py-1 rounded-full text-xs font-medium mr-2">
                                                    SL: <?php echo $item['quantity']; ?>
                                                </span>
                                                × <?php echo number_format($item['price'], 0, ',', '.'); ?> VND
                                            </p>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-lg font-bold text-primary-600">
                                                <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?> VND
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-8 py-6 border-b border-gray-100">
                            <h2 class="text-xl font-bold text-gray-900 flex items-center">
                                <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                                Phương thức thanh toán
                            </h2>
                        </div>
                        
                        <div class="p-6 space-y-4">
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 hover:border-primary-300 transition duration-300 group">
                                <input type="radio" name="payment_method" value="cod" class="mr-4 text-primary-600 focus:ring-primary-500" checked>
                                <div class="flex items-center flex-1">
                                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4 group-hover:bg-green-200 transition-colors duration-300">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-gray-900">Thanh toán khi nhận hàng (COD)</div>
                                        <div class="text-xs text-gray-600">Thanh toán bằng tiền mặt khi nhận hàng</div>
                                    </div>
                                </div>
                            </label>
                            
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 hover:border-primary-300 transition duration-300 group">
                                <input type="radio" name="payment_method" value="bank_transfer" class="mr-4 text-primary-600 focus:ring-primary-500">
                                <div class="flex items-center flex-1">
                                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4 group-hover:bg-blue-200 transition-colors duration-300">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-gray-900">Chuyển khoản ngân hàng</div>
                                        <div class="text-xs text-gray-600">Chuyển khoản trước khi giao hàng</div>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-8 py-6 border-b border-gray-100">
                            <h2 class="text-xl font-bold text-gray-900 flex items-center">
                                <svg class="w-6 h-6 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Tóm tắt đơn hàng
                            </h2>
                        </div>
                        
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-gray-700 font-medium">Tổng tiền hàng:</span>
                                    <span class="font-bold text-gray-900"><?php echo number_format($total, 0, ',', '.'); ?> VND</span>
                                </div>
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-gray-700 font-medium">Phí vận chuyển:</span>
                                    <span class="font-bold text-green-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Miễn phí
                                    </span>
                                </div>
                                <div class="border-t border-gray-200 pt-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-xl font-bold text-gray-900">Tổng cộng:</span>
                                        <span class="text-2xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent"><?php echo number_format($total, 0, ',', '.'); ?> VND</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-4">
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-xl shadow-lg flex items-center justify-center text-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Xác nhận thanh toán
                        </button>
                        <a href="/WebBanHang/Product/cart" 
                           class="w-full bg-white border-2 border-gray-300 hover:border-gray-400 hover:bg-gray-50 text-gray-700 font-bold py-4 px-6 rounded-xl transition-all duration-300 text-center block flex items-center justify-center text-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Quay lại giỏ hàng
                        </a>
                    </div>
                    </form>
                </div>
            </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>