<?php include 'app/views/shares/header.php'; ?>

<div class="space-y-6 animate-fade-in">
    <!-- Enhanced Header Section -->
    <div class="bg-gradient-to-r from-accent-500 via-purple-600 to-primary-600 rounded-2xl p-6 text-white shadow-xl relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 bg-gradient-to-r from-white/5 to-white/10"></div>
        <div class="absolute top-0 right-0 w-48 h-48 bg-white/5 rounded-full -translate-y-24 translate-x-24"></div>
        <div class="absolute bottom-0 left-0 w-36 h-36 bg-white/5 rounded-full translate-y-18 -translate-x-18"></div>
        
        <div class="relative flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div class="flex-1">
                <div class="flex items-center space-x-3 mb-3">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center animate-bounce-subtle">
                        <i class="fas fa-tags text-2xl text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-bold mb-1">Danh sách danh mục</h1>
                        <p class="text-purple-100 text-base">Quản lý và tổ chức các danh mục sản phẩm của bạn</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3 text-sm text-purple-100">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-layer-group"></i>
                        <span><?php echo isset($categories) ? count($categories) : 0; ?> danh mục</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-clock"></i>
                        <span>Cập nhật: <?php echo date('d/m/Y'); ?></span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="/WebBanHang/Category/add" 
                   class="group bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white font-bold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl flex items-center space-x-2 border border-white/20">
                    <div class="w-6 h-6 bg-white/20 rounded-lg flex items-center justify-center group-hover:bg-white/30 transition-colors">
                        <i class="fas fa-plus text-sm"></i>
                    </div>
                    <span>Thêm danh mục mới</span>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Enhanced Alert Messages -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-gradient-to-r from-emerald-500 to-green-600 text-white px-8 py-6 rounded-2xl shadow-xl flex items-center space-x-4 animate-slide-up">
            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                <i class="fas fa-check text-xl"></i>
            </div>
            <div>
                <h3 class="font-bold text-lg">Thành công!</h3>
                <p><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-gradient-to-r from-red-500 to-rose-600 text-white px-8 py-6 rounded-2xl shadow-xl flex items-center space-x-4 animate-slide-up">
            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                <i class="fas fa-exclamation-triangle text-xl"></i>
            </div>
            <div>
                <h3 class="font-bold text-lg">Có lỗi xảy ra!</h3>
                <p><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            </div>
        </div>
    <?php endif; ?>
      <!-- Enhanced Categories Grid -->
    <?php if (!empty($categories) && is_array($categories)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($categories as $category): ?>
                <div class="group glass-effect rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-white/20">
                    <!-- Category Header -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-accent-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-tag text-white text-xl"></i>
                            </div>
                            <div class="w-10 h-10 bg-gradient-to-br from-primary-100 to-accent-100 rounded-full flex items-center justify-center">
                                <span class="text-primary-700 font-bold text-sm"><?php echo $category->id; ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Category Info -->
                    <div class="space-y-4">
                        <h3 class="text-2xl font-bold text-gray-900 group-hover:text-accent-600 transition-colors">
                            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                        </h3>
                        
                        <p class="text-gray-600 leading-relaxed">
                            <?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-3 mt-8 pt-6 border-t border-gray-200">
                        <a href="/WebBanHang/Category/edit/<?php echo $category->id; ?>" 
                           class="flex-1 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg text-center">
                            <i class="fas fa-edit mr-2"></i>Chỉnh sửa
                        </a>
                        <a href="/WebBanHang/Category/delete/<?php echo $category->id; ?>" 
                           onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')"
                           class="flex-1 bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg text-center">
                            <i class="fas fa-trash mr-2"></i>Xóa
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- Enhanced Empty State -->
        <div class="text-center py-20">
            <div class="relative">
                <div class="w-40 h-40 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-8 shadow-2xl">
                    <div class="w-32 h-32 bg-gradient-to-br from-accent-100 to-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-inbox text-accent-500 text-6xl"></i>
                    </div>
                </div>
                <div class="absolute top-4 left-1/2 transform -translate-x-1/2 w-6 h-6 bg-yellow-400 rounded-full animate-bounce"></div>
            </div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Chưa có danh mục nào</h2>
            <p class="text-gray-600 mb-8 text-lg max-w-md mx-auto">Hãy tạo danh mục đầu tiên để bắt đầu tổ chức sản phẩm của bạn</p>
            <a href="/WebBanHang/Category/add" 
               class="inline-flex items-center bg-gradient-to-r from-accent-500 to-purple-600 hover:from-accent-600 hover:to-purple-700 text-white font-bold px-10 py-5 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl space-x-4">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-plus text-xl"></i>
                </div>
                <span class="text-lg">Tạo danh mục đầu tiên</span>
            </a>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>
