<?php include 'app/views/shares/header.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-primary-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-primary-500 via-primary-600 to-accent-600 rounded-2xl p-6 text-white shadow-xl relative overflow-hidden mb-8">
            <div class="absolute inset-0 bg-gradient-to-r from-white/5 to-white/10"></div>
            <div class="absolute top-0 right-0 w-48 h-48 bg-white/5 rounded-full -translate-y-24 translate-x-24"></div>
            
            <div class="relative flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                <div class="flex-1">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center animate-bounce-subtle">
                            <i class="fas fa-shopping-cart text-2xl text-white"></i>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold mb-1">Quản lý đơn hàng</h1>
                            <p class="text-primary-100 text-base">Theo dõi và quản lý tất cả đơn hàng của khách hàng</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-3 text-sm text-primary-100">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-layer-group"></i>
                            <span><?php echo count($orders); ?> đơn hàng</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-clock"></i>
                            <span>Cập nhật: <?php echo date('d/m/Y'); ?></span>
                        </div>
                    </div>
                </div>
                
                <!-- Search and Actions -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <form method="GET" class="flex">
                        <input type="text" name="search" value="<?php echo htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                               placeholder="Tìm kiếm đơn hàng..." 
                               class="px-4 py-2 rounded-l-lg text-gray-900 border-2 border-white/20 focus:outline-none focus:border-white/50 bg-white/90 backdrop-blur-sm">
                        <button type="submit" class="bg-white/20 border-2 border-l-0 border-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-r-lg transition-colors">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    
                    <a href="/WebBanHang/Product/orderStatistics" 
                       class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white font-bold px-6 py-2 rounded-lg transition-all duration-300 flex items-center space-x-2 border border-white/20">
                        <i class="fas fa-chart-bar"></i>
                        <span>Thống kê</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Messages -->
        <?php if (isset($_GET['message']) && $_GET['message'] == 'deleted'): ?>
        <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-lg shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-green-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700">Đơn hàng đã được xóa thành công!</p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && $_GET['error'] == 'delete_failed'): ?>
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-lg shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-circle text-red-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">Có lỗi xảy ra khi xóa đơn hàng!</p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Orders Table -->
        <?php if (!empty($orders)): ?>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Mã đơn hàng
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Khách hàng
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Số điện thoại
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Tổng tiền
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Ngày đặt
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Thao tác
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($orders as $order): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-r from-primary-500 to-accent-500 rounded-lg flex items-center justify-center">
                                        <span class="text-white font-bold text-sm">#<?php echo $order->id; ?></span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-gray-900"><?php echo htmlspecialchars($order->name, ENT_QUOTES, 'UTF-8'); ?></div>
                                <div class="text-sm text-gray-500 truncate max-w-xs" title="<?php echo htmlspecialchars($order->address, ENT_QUOTES, 'UTF-8'); ?>">
                                    <?php echo htmlspecialchars($order->address, ENT_QUOTES, 'UTF-8'); ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-phone text-gray-400 mr-2"></i>
                                    <span class="text-sm text-gray-900"><?php echo htmlspecialchars($order->phone, ENT_QUOTES, 'UTF-8'); ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-primary-600">
                                    <?php echo number_format($order->total_amount ?? 0, 0, ',', '.'); ?> VND
                                </div>
                                <div class="text-xs text-gray-500"><?php echo $order->total_items ?? 0; ?> sản phẩm</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"><?php echo date('d/m/Y', strtotime($order->created_at)); ?></div>
                                <div class="text-xs text-gray-500"><?php echo date('H:i', strtotime($order->created_at)); ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="/WebBanHang/Product/orderDetail/<?php echo $order->id; ?>" 
                                       class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-3 py-1 rounded-lg transition-all duration-300 text-xs">
                                        <i class="fas fa-eye mr-1"></i>Chi tiết
                                    </a>
                                    <a href="/WebBanHang/Product/deleteOrder/<?php echo $order->id; ?>" 
                                       onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')"
                                       class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-3 py-1 rounded-lg transition-all duration-300 text-xs">
                                        <i class="fas fa-trash mr-1"></i>Xóa
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
        <div class="flex justify-center mt-8">
            <nav class="flex space-x-2">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php if ($i == $currentPage): ?>
                        <span class="bg-primary-600 text-white px-4 py-2 rounded-lg font-bold"><?php echo $i; ?></span>
                    <?php else: ?>
                        <a href="/WebBanHang/Product/orders/<?php echo $i; ?><?php echo !empty($_GET['search']) ? '?search=' . urlencode($_GET['search']) : ''; ?>" 
                           class="bg-white text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-lg border border-gray-300 transition-colors">
                            <?php echo $i; ?>
                        </a>
                    <?php endif; ?>
                <?php endfor; ?>
            </nav>
        </div>
        <?php endif; ?>

        <?php else: ?>
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                <div class="w-24 h-24 bg-gradient-to-br from-primary-100 to-accent-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-primary-500 text-4xl"></i>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-3">Chưa có đơn hàng nào</h3>
            <p class="text-gray-600 mb-6 text-base max-w-md mx-auto">
                Hiện tại chưa có đơn hàng nào được đặt hoặc không tìm thấy kết quả phù hợp.
            </p>
            <a href="/WebBanHang/Product/" 
               class="inline-flex items-center bg-gradient-to-r from-primary-500 to-accent-600 hover:from-primary-600 hover:to-accent-700 text-white font-bold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl space-x-3">
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-box text-lg"></i>
                </div>
                <span class="text-base">Quay lại sản phẩm</span>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
