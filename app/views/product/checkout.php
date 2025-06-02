<?php include 'app/views/shares/header.php'; ?>

<?php
// Calculate cart total
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<div class="max-w-6xl mx-auto px-4 py-6">
    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-3">Thanh toán</h1>
        <p class="text-lg text-gray-600 mb-6">Hoàn tất đơn hàng của bạn</p>
        <div class="flex justify-center">
            <div class="flex items-center space-x-6">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center text-white text-sm font-bold">1</div>
                    <span class="ml-2 text-sm text-gray-600">Giỏ hàng</span>
                </div>
                <div class="w-12 h-0.5 bg-indigo-600"></div>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center text-white text-sm font-bold">2</div>
                    <span class="ml-2 text-sm font-bold text-indigo-600">Thanh toán</span>
                </div>
                <div class="w-12 h-0.5 bg-gray-300"></div>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center text-gray-500 text-sm font-bold">3</div>
                    <span class="ml-2 text-sm text-gray-500">Hoàn tất</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Check if cart is empty -->
    <?php if (empty($cart)): ?>
        <div class="text-center py-16">
            <div class="w-32 h-32 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-shopping-cart text-gray-400 text-5xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Giỏ hàng của bạn đang trống</h2>
            <p class="text-gray-600 mb-8">Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.</p>
            <a href="/WebBanHang/Product" 
               class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-700 hover:from-indigo-700 hover:to-purple-800 text-white font-bold px-8 py-4 rounded-lg transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                <i class="fas fa-shopping-bag mr-2"></i>Tiếp tục mua sắm
            </a>
        </div>
    <?php else: ?>
        <!-- Checkout Form -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Customer Information -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-700 px-6 py-4">
                    <h2 class="text-lg font-bold text-white">
                        <i class="fas fa-user-edit mr-2"></i>Thông tin giao hàng
                    </h2>
                </div>
                
                <form method="POST" action="/WebBanHang/Product/processCheckout" class="p-6 space-y-5">
                    <!-- Customer Name -->
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-user mr-1 text-indigo-600"></i>Họ và tên *
                        </label>
                        <input type="text" id="name" name="name" 
                               class="w-full px-4 py-3 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-600 transition duration-300" 
                               placeholder="Nhập họ và tên của bạn"
                               required>
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-phone mr-1 text-indigo-600"></i>Số điện thoại *
                        </label>
                        <input type="tel" id="phone" name="phone" 
                               class="w-full px-4 py-3 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-600 transition duration-300" 
                               placeholder="0123 456 789"
                               pattern="[0-9]{10,11}"
                               required>
                    </div>

                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-map-marker-alt mr-1 text-indigo-600"></i>Địa chỉ giao hàng *
                        </label>
                        <textarea id="address" name="address" rows="3"
                                  class="w-full px-4 py-3 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-600 transition duration-300" 
                                  placeholder="Nhập địa chỉ đầy đủ để giao hàng"
                                  required></textarea>
                    </div>

                    <!-- Notes -->
                    <div>
                        <label for="notes" class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-sticky-note mr-1 text-indigo-600"></i>Ghi chú (Tùy chọn)
                        </label>
                        <textarea id="notes" name="notes" rows="2"
                                  class="w-full px-4 py-3 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-600 transition duration-300" 
                                  placeholder="Ghi chú thêm cho đơn hàng..."></textarea>
                    </div>
            </div>

            <!-- Payment Method & Summary -->
            <div class="space-y-6">
                <!-- Cart Items Summary -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-cyan-700 px-6 py-4">
                        <h2 class="text-lg font-bold text-white">
                            <i class="fas fa-shopping-bag mr-2"></i>Sản phẩm đã chọn
                        </h2>
                    </div>
                    
                    <div class="p-6 max-h-64 overflow-y-auto">
                        <div class="space-y-3">
                            <?php foreach ($cart as $id => $item): ?>
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <div class="flex-1">
                                        <h4 class="text-sm font-semibold text-gray-900 truncate">
                                            <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>
                                        </h4>
                                        <p class="text-xs text-gray-500">
                                            SL: <?php echo $item['quantity']; ?> × <?php echo number_format($item['price'], 0, ',', '.'); ?> VND
                                        </p>
                                    </div>
                                    <div class="text-sm font-bold text-indigo-600">
                                        <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?> VND
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-700 px-6 py-4">
                        <h2 class="text-lg font-bold text-white">
                            <i class="fas fa-credit-card mr-2"></i>Phương thức thanh toán
                        </h2>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 hover:border-indigo-300 transition duration-300">
                            <input type="radio" name="payment_method" value="cod" class="mr-3 text-indigo-600" checked>
                            <div class="flex items-center">
                                <i class="fas fa-money-bill-wave text-green-600 mr-3 text-lg"></i>
                                <div>
                                    <div class="text-sm font-bold text-gray-900">Thanh toán khi nhận hàng (COD)</div>
                                    <div class="text-xs text-gray-600">Thanh toán bằng tiền mặt khi nhận hàng</div>
                                </div>
                            </div>
                        </label>
                        
                        <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 hover:border-indigo-300 transition duration-300">
                            <input type="radio" name="payment_method" value="bank_transfer" class="mr-3 text-indigo-600">
                            <div class="flex items-center">
                                <i class="fas fa-university text-blue-600 mr-3 text-lg"></i>
                                <div>
                                    <div class="text-sm font-bold text-gray-900">Chuyển khoản ngân hàng</div>
                                    <div class="text-xs text-gray-600">Chuyển khoản trước khi giao hàng</div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-700 px-6 py-4">
                        <h2 class="text-lg font-bold text-white">
                            <i class="fas fa-receipt mr-2"></i>Tóm tắt đơn hàng
                        </h2>
                    </div>
                    
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-700 font-medium">Tổng tiền hàng:</span>
                                <span class="font-bold text-gray-900"><?php echo number_format($total, 0, ',', '.'); ?> VND</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-700 font-medium">Phí vận chuyển:</span>
                                <span class="font-bold text-green-600">Miễn phí</span>
                            </div>
                            <div class="border-t pt-4">
                                <div class="flex justify-between items-center text-lg font-bold">
                                    <span class="text-gray-900">Tổng cộng:</span>
                                    <span class="text-indigo-600"><?php echo number_format($total, 0, ',', '.'); ?> VND</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:-translate-y-1 hover:shadow-lg text-sm">
                        <i class="fas fa-credit-card mr-2"></i>Xác nhận thanh toán
                    </button>
                    <a href="/WebBanHang/Product/cart" 
                       class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition duration-300 text-center block text-sm">
                        <i class="fas fa-arrow-left mr-2"></i>Quay lại giỏ hàng
                    </a>
                </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>