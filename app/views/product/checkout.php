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
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <!-- Header -->
        <div class="text-center mb-4 animate-fade-in">
            <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-primary-600 via-primary-700 to-accent-600 bg-clip-text text-transparent mb-2">
                Thanh Toán
            </h1>
            <p class="text-sm text-gray-600 mb-4">Hoàn tất đơn hàng của bạn một cách nhanh chóng và an toàn</p>
              <!-- Progress Steps -->
            <div class="flex justify-center">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center group">
                        <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-md animate-bounce-subtle">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="ml-2 text-xs font-medium text-green-600">Giỏ hàng</span>
                    </div>
                    
                    <div class="w-8 h-1 bg-gradient-to-r from-green-500 to-primary-500 rounded-full"></div>
                    
                    <div class="flex items-center group">
                        <div class="w-8 h-8 bg-gradient-to-r from-primary-500 to-accent-500 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-md animate-glow">
                            2
                        </div>
                        <span class="ml-2 text-xs font-bold text-primary-600">Thanh toán</span>
                    </div>
                    
                    <div class="w-8 h-1 bg-gray-200 rounded-full"></div>
                    
                    <div class="flex items-center group">
                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 text-xs font-bold">
                            3
                        </div>
                        <span class="ml-2 text-xs text-gray-500">Hoàn tất</span>
                    </div>
                </div>
            </div>
        </div>        <!-- Check if cart is empty -->        <?php if (empty($cart)): ?>
            <div class="text-center py-8 animate-slide-up">
                <div class="w-24 h-24 bg-gradient-to-br from-primary-100 to-accent-100 rounded-full flex items-center justify-center mx-auto mb-4 animate-bounce-subtle">
                    <svg class="w-12 h-12 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 2.5M7 13l2.5 2.5M13 7v10a2 2 0 01-2 2H9a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Giỏ hàng của bạn đang trống</h2>
                <p class="text-sm text-gray-600 mb-4 max-w-md mx-auto">Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.</p>                <a href="/WebBanHang/Product" 
                   class="inline-flex items-center bg-gradient-to-r from-primary-600 to-accent-600 hover:from-primary-700 hover:to-accent-700 text-white font-bold px-4 py-2 rounded-lg transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg shadow-md">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    Tiếp tục mua sắm
                </a>
            </div>
        <?php else: ?>            <!-- Checkout Form -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 animate-slide-up" style="animation-delay: 0.2s;">
                <!-- Customer Information -->
                <div class="bg-white rounded-lg shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-primary-50 to-accent-50 px-4 py-3 border-b border-gray-100">
                        <h2 class="text-lg font-bold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Thông tin giao hàng
                        </h2>
                    </div>
                    
                    <form method="POST" action="/WebBanHang/Product/processCheckout" class="p-4 space-y-4">                        <!-- Customer Name -->
                        <div class="group">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1 flex items-center">
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
                                       class="w-full px-3 py-2 pl-10 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white shadow-sm"
                                       placeholder="Nhập họ và tên của bạn">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>                        <!-- Phone Number -->
                        <div class="group">
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-1 flex items-center">
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
                                       minlength="10"
                                       maxlength="15"
                                       class="w-full px-3 py-2 pl-10 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white shadow-sm"
                                       placeholder="0123456789">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                            </div>
                        </div><!-- Address -->
                        <div class="group">
                            <label for="address" class="block text-sm font-semibold text-gray-700 mb-1 flex items-center">
                                <svg class="w-4 h-4 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Địa chỉ giao hàng <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <textarea id="address" 
                                          name="address" 
                                          rows="2"
                                          required
                                          class="w-full px-3 py-2 pl-10 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white shadow-sm resize-none"
                                          placeholder="Nhập địa chỉ đầy đủ để giao hàng"></textarea>
                                <div class="absolute top-2 left-0 flex items-start pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>                        <!-- Notes -->
                        <div class="group">
                            <label for="notes" class="block text-sm font-semibold text-gray-700 mb-1 flex items-center">
                                <svg class="w-4 h-4 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Ghi chú (Tùy chọn)
                            </label>
                            <div class="relative">
                                <textarea id="notes" 
                                          name="notes" 
                                          rows="2"
                                          class="w-full px-3 py-2 pl-10 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white shadow-sm resize-none"
                                          placeholder="Ghi chú thêm cho đơn hàng..."></textarea>
                                <div class="absolute top-2 left-0 flex items-start pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                </div>                <!-- Payment Method & Summary -->
                <div class="space-y-6">
                    <!-- Payment Method -->
                    <div class="bg-white rounded-lg shadow-lg border border-gray-100 overflow-hidden">
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-4 py-3 border-b border-gray-100">
                            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                                Phương thức thanh toán
                            </h2>
                        </div>
                        
                        <div class="p-4 space-y-3">
                            <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 hover:border-primary-300 transition duration-300 group checked:border-green-500">
                                <input type="radio" name="payment_method" value="cod" class="mr-3 text-primary-600 focus:ring-primary-500" checked>
                                <div class="flex items-center flex-1">
                                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors duration-300">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-gray-900">Thanh toán khi nhận hàng (COD)</div>
                                        <div class="text-xs text-gray-600">Thanh toán bằng tiền mặt khi nhận hàng</div>
                                        <div class="text-xs text-green-600 font-medium mt-1">✓ An toàn - Không cần trả trước</div>
                                    </div>
                                </div>
                            </label>
                            
                            <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 hover:border-primary-300 transition duration-300 group">
                                <input type="radio" name="payment_method" value="bank_transfer" class="mr-3 text-primary-600 focus:ring-primary-500">
                                <div class="flex items-center flex-1">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors duration-300">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-gray-900">Chuyển khoản ngân hàng</div>
                                        <div class="text-xs text-gray-600">Chuyển khoản trước khi giao hàng</div>
                                        <div class="text-xs text-blue-600 font-medium mt-1">📱 Nhanh chóng - Xử lý tự động</div>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Simple Order Total -->
                    <div class="bg-white rounded-lg shadow-lg border border-gray-100 overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-4 py-3 border-b border-gray-100">
                            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Tổng đơn hàng
                            </h2>
                        </div>
                        
                        <div class="p-4">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-gray-900">Tổng cộng:</span>
                                <span class="text-2xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent"><?php echo number_format($total, 0, ',', '.'); ?> VND</span>
                            </div>
                            <div class="text-sm text-gray-600 mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Miễn phí vận chuyển
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3">
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg shadow-md flex items-center justify-center group relative overflow-hidden text-lg">
                            <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                            <svg class="w-5 h-5 mr-2 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="relative z-10">Đặt hàng ngay</span>
                        </button>
                        
                        <div class="grid grid-cols-2 gap-3">
                            <a href="/WebBanHang/Product/cart" 
                               class="bg-white border-2 border-gray-300 hover:border-gray-400 hover:bg-gray-50 text-gray-700 font-bold py-3 px-4 rounded-lg transition-all duration-300 text-center flex items-center justify-center group">
                                <svg class="w-4 h-4 mr-1 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                <span class="text-sm">Quay lại giỏ hàng</span>
                            </a>
                            <a href="/WebBanHang/Product" 
                               class="bg-primary-50 border-2 border-primary-200 hover:border-primary-300 hover:bg-primary-100 text-primary-700 font-bold py-3 px-4 rounded-lg transition-all duration-300 text-center flex items-center justify-center group">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                                <span class="text-sm">Tiếp tục mua sắm</span>
                            </a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>    <?php endif; ?>
</div>

<!-- Enhanced JavaScript for better UX -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Payment method selection enhancement
    const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
    const paymentLabels = document.querySelectorAll('label');
    
    paymentMethods.forEach((method, index) => {
        method.addEventListener('change', function() {
            // Remove selected state from all labels
            paymentLabels.forEach(label => {
                if (label.querySelector('input[name="payment_method"]')) {
                    label.classList.remove('border-green-500', 'bg-green-50');
                    label.classList.add('border-gray-200');
                }
            });
            
            // Add selected state to current label
            if (this.checked) {
                const currentLabel = this.closest('label');
                currentLabel.classList.remove('border-gray-200');
                currentLabel.classList.add('border-green-500', 'bg-green-50');
            }
        });
    });
    
    // Initialize first payment method as selected
    const firstPayment = document.querySelector('input[name="payment_method"]:checked');
    if (firstPayment) {
        const firstLabel = firstPayment.closest('label');
        firstLabel.classList.remove('border-gray-200');
        firstLabel.classList.add('border-green-500', 'bg-green-50');
    }
    
    // Form validation enhancement
    const form = document.querySelector('form');
    const submitBtn = document.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.innerHTML;
    
    form.addEventListener('submit', function(e) {
        // Add loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <svg class="w-4 h-4 mr-2 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>Đang xử lý...</span>
        `;
        
        // Validate required fields
        const requiredFields = form.querySelectorAll('input[required], textarea[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('border-red-500');
                field.classList.remove('border-gray-200');
            } else {
                field.classList.remove('border-red-500');
                field.classList.add('border-gray-200');
            }
        });
          // Phone number basic validation
        const phoneField = document.getElementById('phone');
        if (phoneField.value && phoneField.value.replace(/\D/g, '').length < 10) {
            isValid = false;
            phoneField.classList.add('border-red-500');
            alert('Vui lòng nhập số điện thoại có ít nhất 10 chữ số');
        }
        
        if (!isValid) {
            e.preventDefault();
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
            return false;
        }
    });
    
    // Real-time phone number formatting
    const phoneInput = document.getElementById('phone');
    phoneInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 11) value = value.slice(0, 11);
        
        if (value.length >= 4) {
            value = value.slice(0, 4) + ' ' + value.slice(4);
        }
        if (value.length >= 8) {
            value = value.slice(0, 8) + ' ' + value.slice(8);
        }
        
        e.target.value = value;
    });
    
    // Auto-resize textareas
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    });
    
    // Add smooth scroll to form errors
    function scrollToError() {
        const errorField = document.querySelector('.border-red-500');
        if (errorField) {
            errorField.scrollIntoView({ behavior: 'smooth', block: 'center' });
            errorField.focus();
        }
    }
    
    // Enhanced input focus states
    const inputs = document.querySelectorAll('input, textarea');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('ring-2', 'ring-primary-500', 'ring-opacity-50');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('ring-2', 'ring-primary-500', 'ring-opacity-50');
        });
    });
});
</script>

<?php include 'app/views/shares/footer.php'; ?>