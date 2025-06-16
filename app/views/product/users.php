<?php include 'app/views/shares/header.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-primary-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="bg-gradient-to-r from-primary-500 via-primary-600 to-accent-600 rounded-2xl p-6 text-white shadow-xl relative overflow-hidden mb-8">
            <div class="relative flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                <div class="flex-1">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center animate-bounce-subtle">
                            <i class="fas fa-users text-2xl text-white"></i>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold mb-1">Quản lý người dùng</h1>
                            <p class="text-primary-100 text-base">Theo dõi và quản lý tất cả người dùng trong hệ thống</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-3 text-sm text-primary-100">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-layer-group"></i>
                            <span><?php echo count($users); ?> người dùng</span>
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
                               placeholder="Tìm kiếm người dùng..." 
                               class="px-4 py-2 rounded-l-lg text-gray-900 border-2 border-white/20 focus:outline-none focus:border-white/50 bg-white/90 backdrop-blur-sm">
                        <button type="submit" class="bg-white/20 border-2 border-l-0 border-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-r-lg transition-colors">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    
                    <a href="/WebBanHang/Product/userStatistics" 
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
                    <p class="text-sm text-green-700">Người dùng đã được xóa thành công!</p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($_GET['message']) && $_GET['message'] == 'updated'): ?>
        <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-lg shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-green-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700">Người dùng đã được cập nhật thành công!</p>
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
                    <p class="text-sm text-red-700">Có lỗi xảy ra khi xóa người dùng!</p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && $_GET['error'] == 'update_failed'): ?>
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-lg shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-circle text-red-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">Có lỗi xảy ra khi cập nhật người dùng!</p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Users Table -->
        <?php if (!empty($users)): ?>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Tên đăng nhập
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Họ và tên
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Vai trò
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Ngày tạo
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Thao tác
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($users as $user): ?>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-gray-900">#<?php echo $user->id; ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-accent-500 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-user text-white text-sm"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($user->username); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"><?php echo htmlspecialchars($user->fullname); ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php if ($user->role === 'admin'): ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800 border border-red-200">
                                        <i class="fas fa-crown mr-1"></i>
                                        Admin
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800 border border-blue-200">
                                        <i class="fas fa-user mr-1"></i>
                                        User
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <?php echo date('d/m/Y H:i', strtotime($user->created_at)); ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <a href="/WebBanHang/Product/userDetail/<?php echo $user->id; ?>" 
                                       class="inline-flex items-center px-3 py-2 text-xs font-medium text-primary-600 bg-primary-50 border border-primary-200 rounded-lg hover:bg-primary-100 hover:text-primary-700 transition-colors duration-200">
                                        <i class="fas fa-eye mr-1"></i>
                                        Xem
                                    </a>
                                    <a href="/WebBanHang/Product/editUser/<?php echo $user->id; ?>" 
                                       class="inline-flex items-center px-3 py-2 text-xs font-medium text-yellow-600 bg-yellow-50 border border-yellow-200 rounded-lg hover:bg-yellow-100 hover:text-yellow-700 transition-colors duration-200">
                                        <i class="fas fa-edit mr-1"></i>
                                        Sửa
                                    </a>
                                    <button onclick="confirmDelete(<?php echo $user->id; ?>, '<?php echo addslashes($user->username); ?>')" 
                                            class="inline-flex items-center px-3 py-2 text-xs font-medium text-red-600 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 hover:text-red-700 transition-colors duration-200">
                                        <i class="fas fa-trash mr-1"></i>
                                        Xóa
                                    </button>
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
        <div class="mt-8 flex justify-center">
            <nav class="flex items-center space-x-2">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="/WebBanHang/Product/users/<?php echo $i; ?><?php echo !empty($_GET['search']) ? '?search=' . urlencode($_GET['search']) : ''; ?>" 
                       class="px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 <?php echo ($i == $currentPage) ? 'bg-primary-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300'; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>
            </nav>
        </div>
        <?php endif; ?>

        <?php else: ?>
        <!-- Empty State -->
        <div class="bg-white rounded-2xl shadow-lg p-12 text-center border border-gray-100">
            <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-users text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Không tìm thấy người dùng</h3>
            <p class="text-gray-600 mb-6">Hiện tại không có người dùng nào trong hệ thống.</p>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
function confirmDelete(userId, username) {
    if (confirm(`Bạn có chắc chắn muốn xóa người dùng "${username}"?`)) {
        window.location.href = `/WebBanHang/Product/deleteUser/${userId}`;
    }
}
</script>

<?php include 'app/views/shares/footer.php'; ?>
