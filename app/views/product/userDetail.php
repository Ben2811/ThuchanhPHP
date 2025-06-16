<?php include 'app/views/shares/header.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-primary-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Breadcrumb -->
        <nav class="flex mb-6 animate-fade-in" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 bg-white/70 backdrop-blur-sm rounded-full px-4 py-2 shadow-sm border border-gray-200">
                <li class="inline-flex items-center">
                    <a href="/WebBanHang/Product/users" class="text-gray-600 hover:text-primary-600 transition-colors duration-300 font-medium">
                        <i class="fas fa-users mr-2"></i>
                        Người dùng
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                        <span class="text-gray-500 font-medium">Chi tiết người dùng #<?php echo $user->id; ?></span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- User Info -->
            <div class="lg:col-span-2 space-y-6">
                <!-- User Header -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-accent-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white text-2xl"></i>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900 mb-1"><?php echo htmlspecialchars($user->fullname); ?></h1>
                                <p class="text-gray-600">@<?php echo htmlspecialchars($user->username); ?></p>
                            </div>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <?php if ($user->role === 'admin'): ?>
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-red-100 text-red-800 border border-red-200">
                                    <i class="fas fa-crown mr-2"></i>
                                    Administrator
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 border border-blue-200">
                                    <i class="fas fa-user mr-2"></i>
                                    User
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- User Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                    <i class="fas fa-info-circle text-primary-600 mr-2"></i>
                                    Thông tin cơ bản
                                </h3>
                                <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-600 font-medium">ID:</span>
                                        <span class="text-gray-900 font-mono">#<?php echo $user->id; ?></span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-600 font-medium">Tên đăng nhập:</span>
                                        <span class="text-gray-900"><?php echo htmlspecialchars($user->username); ?></span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-600 font-medium">Họ và tên:</span>
                                        <span class="text-gray-900"><?php echo htmlspecialchars($user->fullname); ?></span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-600 font-medium">Vai trò:</span>
                                        <span class="text-gray-900 capitalize"><?php echo htmlspecialchars($user->role); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                    <i class="fas fa-clock text-primary-600 mr-2"></i>
                                    Thời gian
                                </h3>
                                <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-600 font-medium">Ngày tạo:</span>
                                        <span class="text-gray-900"><?php echo date('d/m/Y', strtotime($user->created_at)); ?></span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-600 font-medium">Giờ tạo:</span>
                                        <span class="text-gray-900"><?php echo date('H:i:s', strtotime($user->created_at)); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions Sidebar -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-tools text-primary-600 mr-2"></i>
                        Thao tác
                    </h3>
                    <div class="space-y-3">
                        <a href="/WebBanHang/Product/editUser/<?php echo $user->id; ?>" 
                           class="w-full bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600 text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg flex items-center justify-center space-x-2">
                            <i class="fas fa-edit"></i>
                            <span>Chỉnh sửa</span>
                        </a>
                        
                        <button onclick="confirmDelete(<?php echo $user->id; ?>, '<?php echo addslashes($user->username); ?>')" 
                                class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg flex items-center justify-center space-x-2">
                            <i class="fas fa-trash"></i>
                            <span>Xóa người dùng</span>
                        </button>
                        
                        <a href="/WebBanHang/Product/users" 
                           class="w-full bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg flex items-center justify-center space-x-2">
                            <i class="fas fa-arrow-left"></i>
                            <span>Quay lại</span>
                        </a>
                    </div>
                </div>

                <!-- User Stats -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-chart-pie text-primary-600 mr-2"></i>
                        Thống kê
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg border border-blue-200">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-calendar text-white"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-blue-800">Thành viên từ</p>
                                    <p class="text-xs text-blue-600"><?php echo date('d/m/Y', strtotime($user->created_at)); ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border border-green-200">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-shield-alt text-white"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-green-800">Quyền hạn</p>
                                    <p class="text-xs text-green-600 capitalize"><?php echo $user->role; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
