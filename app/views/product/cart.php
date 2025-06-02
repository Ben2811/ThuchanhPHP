<?php include 'app/views/shares/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 py-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-3">
            <i class="fas fa-shopping-cart mr-3 text-indigo-600"></i>Giỏ hàng của bạn
        </h1>
        <p class="text-lg text-gray-600">Xem lại các sản phẩm trước khi thanh toán</p>
    </div>

    <?php if (!empty($cart)): ?>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6" id="cart-container">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-700 px-6 py-4 flex justify-between items-center">
                        <h2 class="text-lg font-bold text-white">Sản phẩm trong giỏ hàng</h2>
                        <a href="/WebBanHang/Product/clearCart" 
                           onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm khỏi giỏ hàng?')"
                           class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-md text-xs transition duration-300">
                            <i class="fas fa-trash mr-1"></i>Xóa tất cả
                        </a>
                    </div>
                    
                    <div class="divide-y divide-gray-200" id="cart-items">
                        <?php 
                        $total = 0;
                        foreach ($cart as $id => $item): 
                            $itemTotal = $item['price'] * $item['quantity'];
                            $total += $itemTotal;
                        ?>
                            <div class="p-4 hover:bg-gray-50 transition duration-300" data-product-id="<?php echo $id; ?>">
                                <div class="flex gap-4">
                                    <!-- Product Image -->
                                    <div class="flex-shrink-0">
                                        <?php if ($item['image']): ?>
                                            <img src="/WebBanHang/<?php echo $item['image']; ?>" 
                                                 alt="<?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>"
                                                 class="w-20 h-20 object-cover rounded-lg border-2 border-gray-200">
                                        <?php else: ?>
                                            <div class="w-20 h-20 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg border-2 border-gray-200 flex items-center justify-center">
                                                <i class="fas fa-image text-gray-500 text-xl"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Product Info -->
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-bold text-gray-900 mb-2 truncate">
                                            <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>
                                        </h3>
                                        
                                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
                                            <div class="space-y-2">
                                                <div class="flex items-center space-x-4 text-sm">
                                                    <span class="text-lg font-bold text-indigo-600">
                                                        <?php echo number_format($item['price'], 0, ',', '.'); ?> VND
                                                    </span>
                                                    <span class="text-gray-500">×</span>
                                                    <div class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm font-medium">
                                                        SL: <?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?>
                                                    </div>
                                                </div>
                                                <div class="text-lg font-bold text-gray-900">
                                                    = <span class="text-green-600"><?php echo number_format($itemTotal, 0, ',', '.'); ?> VND</span>
                                                </div>
                                            </div>
                                            
                                            <!-- Remove Button -->
                                            <div class="flex-shrink-0">
                                                <a href="/WebBanHang/Product/removeFromCart/<?php echo $id; ?>" 
                                                   onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')"
                                                   class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg transition duration-300 shadow-sm hover:shadow-md text-sm"
                                                   title="Xóa sản phẩm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-6">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-700 px-6 py-4">
                        <h2 class="text-lg font-bold text-white">
                            <i class="fas fa-calculator mr-2"></i>Tóm tắt đơn hàng
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
                            
                            <!-- Action Buttons -->
                            <div class="space-y-3 pt-4">
                                <a href="/WebBanHang/Product/checkout" 
                                   class="w-full bg-gradient-to-r from-indigo-600 to-purple-700 hover:from-indigo-700 hover:to-purple-800 text-white font-bold py-3 px-4 rounded-lg transition duration-300 transform hover:-translate-y-0.5 hover:shadow-lg text-center block text-sm">
                                    <i class="fas fa-credit-card mr-2"></i>Thanh toán ngay
                                </a>
                                <a href="/WebBanHang/Product" 
                                   class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-4 rounded-lg transition duration-300 text-center block text-sm">
                                    <i class="fas fa-arrow-left mr-2"></i>Tiếp tục mua sắm
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <!-- Empty Cart -->
        <div class="text-center py-20">
            <div class="w-32 h-32 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-shopping-cart text-gray-400 text-5xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Giỏ hàng của bạn đang trống</h2>
            <p class="text-lg text-gray-600 mb-8">Hãy khám phá các sản phẩm tuyệt vời của chúng tôi!</p>
            <a href="/WebBanHang/Product" 
               class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-700 hover:from-indigo-700 hover:to-purple-800 text-white font-bold px-8 py-4 rounded-lg transition duration-300 transform hover:-translate-y-1 hover:shadow-lg text-lg">
                <i class="fas fa-shopping-bag mr-2"></i>Bắt đầu mua sắm
            </a>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>