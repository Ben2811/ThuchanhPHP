<?php include 'app/views/shares/header.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-primary-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Breadcrumb -->
        <nav class="flex mb-6 animate-fade-in" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 bg-white/70 backdrop-blur-sm rounded-full px-4 py-2 shadow-sm border border-gray-200">
                <li class="inline-flex items-center">
                    <a href="/WebBanHang/Product/orders" class="text-gray-600 hover:text-primary-600 transition-colors duration-300 font-medium">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        Đơn hàng
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                        <span class="text-gray-500 font-medium">Chi tiết đơn hàng #<?php echo $order->id; ?></span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Order Info -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Order Header -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 mb-2">Đơn hàng #<?php echo $order->id; ?></h1>
                            <p class="text-gray-600">Đặt vào <?php echo date('d/m/Y H:i', strtotime($order->created_at)); ?></p>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800 border border-green-200">
                                <i class="fas fa-check-circle mr-2"></i>
                                Đã đặt hàng
                            </span>
                        </div>
                    </div>

                    <!-- Customer Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                    <i class="fas fa-user text-primary-600 mr-2"></i>
                                    Thông tin khách hàng
                                </h3>
                                <div class="bg-gray-50 rounded-lg p-4 space-y-2">
                                    <div class="flex items-center">
                                        <span class="text-gray-600 font-medium w-20">Tên:</span>
                                        <span class="text-gray-900"><?php echo htmlspecialchars($order->name, ENT_QUOTES, 'UTF-8'); ?></span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-gray-600 font-medium w-20">SĐT:</span>
                                        <span class="text-gray-900"><?php echo htmlspecialchars($order->phone, ENT_QUOTES, 'UTF-8'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                    <i class="fas fa-map-marker-alt text-primary-600 mr-2"></i>
                                    Địa chỉ giao hàng
                                </h3>
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <p class="text-gray-900"><?php echo htmlspecialchars($order->address, ENT_QUOTES, 'UTF-8'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="bg-gradient-to-r from-primary-50 to-accent-50 px-6 py-4 border-b border-gray-100">
                        <h2 class="text-lg font-bold text-gray-900 flex items-center">
                            <i class="fas fa-box text-primary-600 mr-2"></i>
                            Sản phẩm đã đặt
                        </h2>
                    </div>
                    
                    <div class="divide-y divide-gray-200">
                        <?php foreach ($orderDetails as $item): ?>
                        <div class="p-6 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center space-x-4">
                                <!-- Product Image -->
                                <div class="flex-shrink-0">
                                    <?php if ($item->product_image): ?>
                                        <img src="/WebBanHang/<?php echo $item->product_image; ?>" 
                                             alt="<?php echo htmlspecialchars($item->product_name, ENT_QUOTES, 'UTF-8'); ?>"
                                             class="w-16 h-16 object-cover rounded-lg border-2 border-gray-200 shadow-sm">
                                    <?php else: ?>
                                        <div class="w-16 h-16 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg border-2 border-gray-200 flex items-center justify-center">
                                            <i class="fas fa-image text-gray-500"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- Product Info -->
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1"><?php echo htmlspecialchars($item->product_name, ENT_QUOTES, 'UTF-8'); ?></h3>
                                    <div class="flex items-center space-x-4 text-sm text-gray-600">
                                        <span>Giá: <?php echo number_format($item->price, 0, ',', '.'); ?> VND</span>
                                        <span>Số lượng: <?php echo $item->quantity; ?></span>
                                    </div>
                                </div>
                                
                                <!-- Item Total -->
                                <div class="text-right">
                                    <div class="text-lg font-bold text-primary-600">
                                        <?php echo number_format($item->price * $item->quantity, 0, ',', '.'); ?> VND
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg sticky top-6 border border-gray-100">
                    <div class="bg-gradient-to-r from-emerald-600 to-green-700 px-6 py-4 rounded-t-2xl">
                        <h2 class="text-lg font-bold text-white flex items-center">
                            <i class="fas fa-calculator text-white mr-2"></i>
                            Tổng kết đơn hàng
                        </h2>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <!-- Order Summary Details -->
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-600">Số sản phẩm:</span>
                                <span class="font-medium text-gray-900"><?php echo count($orderDetails); ?> sản phẩm</span>
                            </div>
                            
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-600">Tổng số lượng:</span>
                                <span class="font-medium text-gray-900">
                                    <?php 
                                    $totalQuantity = 0;
                                    foreach ($orderDetails as $item) {
                                        $totalQuantity += $item->quantity;
                                    }
                                    echo $totalQuantity;
                                    ?>
                                </span>
                            </div>
                            
                            <div class="border-t border-gray-200 pt-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Tổng cộng:</span>
                                    <span class="text-xl font-bold text-primary-600">
                                        <?php echo number_format($order->total_amount, 0, ',', '.'); ?> VND
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="pt-4 space-y-3">
                            <a href="/WebBanHang/Product/orders" 
                               class="w-full bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-700 font-bold py-3 px-4 rounded-lg transition-all duration-300 flex items-center justify-center space-x-2">
                                <i class="fas fa-arrow-left"></i>
                                <span>Quay lại danh sách</span>
                            </a>
                            
                            <a href="/WebBanHang/Product/deleteOrder/<?php echo $order->id; ?>" 
                               onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')"
                               class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 flex items-center justify-center space-x-2">
                                <i class="fas fa-trash"></i>
                                <span>Xóa đơn hàng</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
