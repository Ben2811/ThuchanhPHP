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
                        <span class="text-gray-500 font-medium">Thống kê người dùng</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="bg-gradient-to-r from-primary-500 via-primary-600 to-accent-600 rounded-2xl p-6 text-white shadow-xl relative overflow-hidden mb-8">
            <div class="relative flex items-center space-x-3">
                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center animate-bounce-subtle">
                    <i class="fas fa-chart-bar text-2xl text-white"></i>
                </div>
                <div>
                    <h1 class="text-3xl lg:text-4xl font-bold mb-1">Thống kê người dùng</h1>
                    <p class="text-primary-100 text-base">Tổng quan về người dùng trong hệ thống</p>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Users -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Tổng số người dùng</p>
                        <p class="text-2xl font-bold text-gray-900"><?php echo number_format($statistics['total_users']); ?></p>
                    </div>
                </div>
            </div>

            <!-- Admin Count -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-crown text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Quản trị viên</p>
                        <p class="text-2xl font-bold text-gray-900"><?php echo number_format($statistics['admin_count']); ?></p>
                    </div>
                </div>
            </div>

            <!-- Regular Users -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-user text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Người dùng thường</p>
                        <p class="text-2xl font-bold text-gray-900"><?php echo number_format($statistics['user_count']); ?></p>
                    </div>
                </div>
            </div>

            <!-- Recent Users -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-user-plus text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Mới (30 ngày)</p>
                        <p class="text-2xl font-bold text-gray-900"><?php echo number_format($statistics['recent_users']); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- User Role Distribution -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-primary-50 to-accent-50 px-6 py-4 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center">
                        <i class="fas fa-chart-pie text-primary-600 mr-2"></i>
                        Phân bố vai trò
                    </h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <!-- Admin Percentage -->
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700">Quản trị viên</span>
                                <span class="text-sm text-gray-500"><?php echo number_format(($statistics['admin_count'] / $statistics['total_users']) * 100, 1); ?>%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-red-500 to-red-600 h-2 rounded-full" style="width: <?php echo ($statistics['admin_count'] / $statistics['total_users']) * 100; ?>%"></div>
                            </div>
                        </div>

                        <!-- User Percentage -->
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700">Người dùng thường</span>
                                <span class="text-sm text-gray-500"><?php echo number_format(($statistics['user_count'] / $statistics['total_users']) * 100, 1); ?>%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full" style="width: <?php echo ($statistics['user_count'] / $statistics['total_users']) * 100; ?>%"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <h4 class="font-semibold text-gray-700 mb-2">Tóm tắt</h4>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                                <span class="text-gray-600">Admin: <?php echo $statistics['admin_count']; ?></span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                                <span class="text-gray-600">User: <?php echo $statistics['user_count']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-primary-50 to-accent-50 px-6 py-4 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center">
                        <i class="fas fa-chart-line text-primary-600 mr-2"></i>
                        Hoạt động gần đây
                    </h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <!-- Growth Rate -->
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-semibold text-green-800">Tăng trưởng (30 ngày)</h4>
                                    <p class="text-2xl font-bold text-green-900"><?php echo $statistics['recent_users']; ?></p>
                                    <p class="text-sm text-green-600">người dùng mới</p>
                                </div>
                                <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-arrow-up text-white"></i>
                                </div>
                            </div>
                        </div>

                        <!-- System Health -->
                        <div class="space-y-3">
                            <h4 class="font-semibold text-gray-700">Tình trạng hệ thống</h4>
                            <div class="space-y-2">
                                <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                                    <span class="text-sm text-gray-600">Tổng tài khoản</span>
                                    <span class="font-medium text-gray-900"><?php echo $statistics['total_users']; ?></span>
                                </div>
                                <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                                    <span class="text-sm text-gray-600">Tỷ lệ admin</span>
                                    <span class="font-medium text-gray-900"><?php echo number_format(($statistics['admin_count'] / $statistics['total_users']) * 100, 1); ?>%</span>
                                </div>
                                <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                                    <span class="text-sm text-gray-600">Trạng thái</span>
                                    <span class="text-green-600 font-medium">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Hoạt động tốt
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-tools text-primary-600 mr-2"></i>
                Thao tác nhanh
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="/WebBanHang/Product/users" 
                   class="bg-gradient-to-r from-primary-600 to-accent-600 hover:from-primary-700 hover:to-accent-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg flex items-center justify-center space-x-2">
                    <i class="fas fa-users"></i>
                    <span>Quản lý người dùng</span>
                </a>
                
                <a href="/WebBanHang/Account/register" 
                   class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg flex items-center justify-center space-x-2">
                    <i class="fas fa-user-plus"></i>
                    <span>Thêm người dùng</span>
                </a>
                
                <button onclick="window.print()" 
                        class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg flex items-center justify-center space-x-2">
                    <i class="fas fa-print"></i>
                    <span>In báo cáo</span>
                </button>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
