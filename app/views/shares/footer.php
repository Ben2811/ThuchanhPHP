    </main>

<footer class="mt-auto bg-gradient-to-br from-gray-900 via-slate-900 to-gray-900 text-white relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute inset-0 bg-gradient-to-r from-primary-900/20 to-accent-900/20"></div>
    <div class="absolute inset-0">
        <div class="absolute top-0 left-1/4 w-32 h-32 bg-primary-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-40 h-40 bg-accent-500/10 rounded-full blur-3xl"></div>
    </div>
      <!-- Main Footer Content -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="lg:col-span-2">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-accent-600 rounded-xl flex items-center justify-center shadow-xl animate-glow">
                        <i class="fas fa-store text-white text-lg"></i>
                    </div>
                    <div>
                        <span class="text-2xl font-bold gradient-text">WebBanHang</span>
                        <p class="text-gray-400 text-xs">Nền tảng quản lý hiện đại</p>
                    </div>
                </div>
                <p class="text-gray-300 mb-6 max-w-md text-sm leading-relaxed">
                    Hệ thống quản lý sản phẩm hiện đại và thông minh, giúp bạn dễ dàng theo dõi, 
                    cập nhật và quản lý thông tin sản phẩm một cách hiệu quả và chuyên nghiệp.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="group w-12 h-12 bg-gray-800/50 hover:bg-primary-600 rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:shadow-lg">
                        <i class="fab fa-facebook-f text-gray-400 group-hover:text-white transition-colors"></i>
                    </a>
                    <a href="#" class="group w-12 h-12 bg-gray-800/50 hover:bg-blue-400 rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:shadow-lg">
                        <i class="fab fa-twitter text-gray-400 group-hover:text-white transition-colors"></i>
                    </a>
                    <a href="#" class="group w-12 h-12 bg-gray-800/50 hover:bg-pink-600 rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:shadow-lg">
                        <i class="fab fa-instagram text-gray-400 group-hover:text-white transition-colors"></i>
                    </a>
                    <a href="#" class="group w-12 h-12 bg-gray-800/50 hover:bg-primary-700 rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:shadow-lg">
                        <i class="fab fa-linkedin-in text-gray-400 group-hover:text-white transition-colors"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold mb-6 text-white flex items-center">
                    <div class="w-8 h-8 bg-primary-500/20 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-cogs text-primary-400 text-sm"></i>
                    </div>
                    Quản lý sản phẩm
                </h3>
                <ul class="space-y-4">                    <li>
                        <a href="/WebBanHang/Product/" class="group text-gray-300 hover:text-primary-400 transition-all duration-300 flex items-center space-x-3 hover-lift">
                            <div class="w-8 h-8 bg-gray-800/50 group-hover:bg-primary-500/20 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fas fa-box text-xs"></i>
                            </div>
                            <span class="font-medium">Danh sách sản phẩm</span>
                        </a>
                    </li>
                    <?php if (SessionHelper::isAdmin()): ?>
                    <li>
                        <a href="/WebBanHang/Product/add" class="group text-gray-300 hover:text-green-400 transition-all duration-300 flex items-center space-x-3 hover-lift">
                            <div class="w-8 h-8 bg-gray-800/50 group-hover:bg-green-500/20 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fas fa-plus text-xs"></i>
                            </div>
                            <span class="font-medium">Thêm sản phẩm</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a href="/WebBanHang/Product/cart" class="group text-gray-300 hover:text-accent-400 transition-all duration-300 flex items-center space-x-3 hover-lift">
                            <div class="w-8 h-8 bg-gray-800/50 group-hover:bg-accent-500/20 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fas fa-shopping-cart text-xs"></i>
                            </div>
                            <span class="font-medium">Giỏ hàng</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h3 class="text-xl font-bold mb-6 text-white flex items-center">
                    <div class="w-8 h-8 bg-accent-500/20 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-tags text-accent-400 text-sm"></i>
                    </div>
                    Danh mục
                </h3>
                <ul class="space-y-4">
                    <li>
                        <a href="/WebBanHang/Category" class="group text-gray-300 hover:text-accent-400 transition-all duration-300 flex items-center space-x-3 hover-lift">
                            <div class="w-8 h-8 bg-gray-800/50 group-hover:bg-accent-500/20 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fas fa-list text-xs"></i>
                            </div>
                            <span class="font-medium">Danh sách danh mục</span>
                        </a>
                    </li>
                    <li>
                        <a href="/WebBanHang/Category/add" class="group text-gray-300 hover:text-green-400 transition-all duration-300 flex items-center space-x-3 hover-lift">
                            <div class="w-8 h-8 bg-gray-800/50 group-hover:bg-green-500/20 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fas fa-folder-plus text-xs"></i>
                            </div>
                            <span class="font-medium">Thêm danh mục</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="group text-gray-300 hover:text-blue-400 transition-all duration-300 flex items-center space-x-3 hover-lift">
                            <div class="w-8 h-8 bg-gray-800/50 group-hover:bg-blue-500/20 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fas fa-chart-bar text-xs"></i>
                            </div>
                            <span class="font-medium">Thống kê</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bottom Footer -->
    <div class="relative border-t border-gray-800/50 bg-gray-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="text-gray-400 text-sm flex items-center">
                    <i class="fas fa-copyright mr-2 text-primary-400"></i>
                    <span>© 2024 WebBanHang. Tất cả quyền được bảo lưu.</span>
                </div>
                <div class="flex space-x-8 text-sm">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 hover-lift">Chính sách bảo mật</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 hover-lift">Điều khoản sử dụng</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300 hover-lift">Liên hệ</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Enhanced Interactions -->
<script>
    // Add smooth scrolling to all anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add loading animation to buttons
    document.querySelectorAll('button, .btn').forEach(button => {
        button.addEventListener('click', function() {
            if (!this.disabled) {
                this.classList.add('animate-bounce-subtle');
                setTimeout(() => {
                    this.classList.remove('animate-bounce-subtle');
                }, 600);
            }
        });
    });

    // Add intersection observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);

    // Observe all cards and sections
    document.querySelectorAll('.bg-white, .glass-effect, .card').forEach(el => {
        observer.observe(el);
    });
</script>
</body>
</html>
