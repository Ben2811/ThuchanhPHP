<?php include 'app/views/shares/header.php'; ?>

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <div class="mx-auto h-16 w-16 bg-gradient-to-br from-green-500 to-blue-600 rounded-full flex items-center justify-center shadow-lg animate-bounce-subtle">
                <i class="fas fa-user-plus text-white text-2xl"></i>
            </div>
            <h2 class="mt-6 text-3xl font-bold bg-gradient-to-r from-green-600 via-blue-600 to-purple-600 bg-clip-text text-transparent">
                Đăng ký tài khoản
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Đã có tài khoản? <a href="/WebBanHang/Account/login" class="font-medium text-primary-600 hover:text-primary-500 transition-colors duration-300">đăng nhập ngay</a>
            </p>
        </div>
        
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
            <?php if (isset($errors) && !empty($errors)): ?>
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <span><?php echo htmlspecialchars(is_array($errors) ? implode(', ', $errors) : $errors); ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <form action="/WebBanHang/Account/save" method="post" class="space-y-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user mr-2 text-primary-600"></i>
                        Tên đăng nhập
                    </label>
                    <input type="text" 
                           id="username" 
                           name="username" 
                           value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
                           required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300 hover:border-primary-300"
                           placeholder="Nhập tên đăng nhập">
                </div>

                <div>
                    <label for="fullname" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-id-card mr-2 text-primary-600"></i>
                        Họ và tên
                    </label>
                    <input type="text" 
                           id="fullname" 
                           name="fullname" 
                           value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>"
                           required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300 hover:border-primary-300"
                           placeholder="Nhập họ và tên đầy đủ">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-primary-600"></i>
                        Mật khẩu
                    </label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300 hover:border-primary-300"
                           placeholder="Nhập mật khẩu">
                </div>

                <div>
                    <label for="confirmpassword" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-primary-600"></i>
                        Xác nhận mật khẩu
                    </label>
                    <input type="password" 
                           id="confirmpassword" 
                           name="confirmpassword" 
                           required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300 hover:border-primary-300"
                           placeholder="Nhập lại mật khẩu">
                </div>

                <div class="flex items-center">
                    <input id="agree-terms" 
                           name="agree-terms" 
                           type="checkbox" 
                           required
                           class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                    <label for="agree-terms" class="ml-2 block text-sm text-gray-900">
                        Tôi đồng ý với <a href="#" class="text-primary-600 hover:text-primary-500 font-medium">Điều khoản dịch vụ</a>
                    </label>
                </div>

                <button type="submit" 
                        class="w-full bg-gradient-to-r from-primary-500 to-accent-600 hover:from-primary-600 hover:to-accent-700 text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-xl flex items-center justify-center space-x-2">
                    <i class="fas fa-user-plus"></i>
                    <span>Đăng ký tài khoản</span>
                </button>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Hoặc đăng ký với</span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-3 gap-3">
                    <button class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors duration-300">
                        <i class="fab fa-facebook-f text-blue-600"></i>
                    </button>

                    <button class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors duration-300">
                        <i class="fab fa-google text-red-500"></i>
                    </button>

                    <button class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors duration-300">
                        <i class="fab fa-twitter text-blue-400"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>