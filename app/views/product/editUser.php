<?php include 'app/views/shares/header.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-primary-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
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
                        <span class="text-gray-500 font-medium">Chỉnh sửa người dùng</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="bg-gradient-to-r from-primary-500 via-primary-600 to-accent-600 rounded-2xl p-6 text-white shadow-xl relative overflow-hidden mb-8">
            <div class="relative flex items-center space-x-3">
                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center animate-bounce-subtle">
                    <i class="fas fa-user-edit text-2xl text-white"></i>
                </div>
                <div>
                    <h1 class="text-3xl lg:text-4xl font-bold mb-1">Chỉnh sửa người dùng</h1>
                    <p class="text-primary-100 text-base">Cập nhật thông tin người dùng: <?php echo htmlspecialchars($user->username); ?></p>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-primary-50 to-accent-50 px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-bold text-gray-900 flex items-center">
                    <i class="fas fa-edit text-primary-600 mr-2"></i>
                    Thông tin người dùng
                </h2>
            </div>

            <div class="p-6">
                <?php if (isset($errors) && !empty($errors)): ?>
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <div>
                            <?php foreach ($errors as $error): ?>
                                <p><?php echo htmlspecialchars($error); ?></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <form method="POST" action="/WebBanHang/Product/updateUser" class="space-y-6">
                    <input type="hidden" name="id" value="<?php echo $user->id; ?>">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Username -->
                        <div class="group">
                            <label for="username" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-user text-primary-500 mr-2"></i>
                                Tên đăng nhập
                            </label>
                            <input type="text" 
                                   id="username" 
                                   name="username" 
                                   value="<?php echo htmlspecialchars($user->username); ?>"
                                   required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300 hover:border-primary-300 group-hover:shadow-sm"
                                   placeholder="Nhập tên đăng nhập">
                        </div>

                        <!-- Full Name -->
                        <div class="group">
                            <label for="fullname" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-id-card text-primary-500 mr-2"></i>
                                Họ và tên
                            </label>
                            <input type="text" 
                                   id="fullname" 
                                   name="fullname" 
                                   value="<?php echo htmlspecialchars($user->fullname); ?>"
                                   required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300 hover:border-primary-300 group-hover:shadow-sm"
                                   placeholder="Nhập họ và tên">
                        </div>

                        <!-- Role -->
                        <div class="group">
                            <label for="role" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-shield-alt text-primary-500 mr-2"></i>
                                Vai trò
                            </label>
                            <select id="role" 
                                    name="role" 
                                    required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300 hover:border-primary-300 group-hover:shadow-sm">
                                <option value="user" <?php echo ($user->role === 'user') ? 'selected' : ''; ?>>User</option>
                                <option value="admin" <?php echo ($user->role === 'admin') ? 'selected' : ''; ?>>Admin</option>
                            </select>
                        </div>

                        <!-- Password -->
                        <div class="group">
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-lock text-primary-500 mr-2"></i>
                                Mật khẩu mới
                                <span class="text-xs text-gray-500 ml-2">(để trống nếu không đổi)</span>
                            </label>
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300 hover:border-primary-300 group-hover:shadow-sm"
                                   placeholder="Nhập mật khẩu mới">
                        </div>
                    </div>

                    <!-- User Info Display -->
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <h3 class="text-sm font-semibold text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-info-circle text-gray-500 mr-2"></i>
                            Thông tin hiện tại
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                            <div>
                                <span class="text-gray-600">ID:</span>
                                <span class="font-medium text-gray-900 ml-2">#<?php echo $user->id; ?></span>
                            </div>
                            <div>
                                <span class="text-gray-600">Ngày tạo:</span>
                                <span class="font-medium text-gray-900 ml-2"><?php echo date('d/m/Y H:i', strtotime($user->created_at)); ?></span>
                            </div>
                            <div>
                                <span class="text-gray-600">Vai trò hiện tại:</span>
                                <span class="font-medium text-gray-900 ml-2 capitalize"><?php echo $user->role; ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <button type="submit" 
                                class="flex-1 bg-gradient-to-r from-primary-600 to-accent-600 hover:from-primary-700 hover:to-accent-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg flex items-center justify-center space-x-2">
                            <i class="fas fa-save"></i>
                            <span>Cập nhật người dùng</span>
                        </button>
                        
                        <a href="/WebBanHang/Product/userDetail/<?php echo $user->id; ?>" 
                           class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg flex items-center justify-center space-x-2">
                            <i class="fas fa-times"></i>
                            <span>Hủy</span>
                        </a>
                        
                        <a href="/WebBanHang/Product/users" 
                           class="flex-1 bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg flex items-center justify-center space-x-2">
                            <i class="fas fa-arrow-left"></i>
                            <span>Quay lại danh sách</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
