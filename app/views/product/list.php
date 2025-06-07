<?php include 'app/views/shares/header.php'; ?>

<div class="space-y-8 animate-fade-in">    <!-- Enhanced Header Section -->
    <div class="bg-gradient-to-r from-primary-500 via-primary-600 to-accent-600 rounded-2xl p-6 text-white shadow-xl relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 bg-gradient-to-r from-white/5 to-white/10"></div>
        <div class="absolute top-0 right-0 w-48 h-48 bg-white/5 rounded-full -translate-y-24 translate-x-24"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/5 rounded-full translate-y-16 -translate-x-16"></div>
        
        <div class="relative flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div class="flex-1">
                <div class="flex items-center space-x-3 mb-3">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center animate-bounce-subtle">
                        <i class="fas fa-box text-2xl text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-bold mb-1">Danh sách sản phẩm</h1>
                        <p class="text-primary-100 text-base">Khám phá và quản lý tất cả sản phẩm của bạn</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3 text-sm text-primary-100">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-layer-group"></i>
                        <span><?php echo count($products); ?> sản phẩm</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-clock"></i>
                        <span>Cập nhật: <?php echo date('d/m/Y'); ?></span>
                    </div>
                </div>            </div>
            <?php if (SessionHelper::isAdmin()): ?>
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="/WebBanHang/Product/add" 
                   class="group bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white font-bold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl flex items-center space-x-2 border border-white/20">
                    <div class="w-6 h-6 bg-white/20 rounded-lg flex items-center justify-center group-hover:bg-white/30 transition-colors">
                        <i class="fas fa-plus text-sm"></i>
                    </div>
                    <span>Thêm sản phẩm mới</span>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>    <!-- Enhanced Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <?php foreach ($products as $product): ?>
            <div class="group glass-effect rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-white/20">
                <!-- Enhanced Product Image -->
                <div class="relative aspect-w-16 aspect-h-12 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                    <?php if ($product->image): ?>
                        <img src="/WebBanHang/<?php echo $product->image; ?>" 
                             alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>"
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                    <?php else: ?>
                        <div class="w-full h-48 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                            <div class="text-center">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-2 shadow-lg">
                                    <i class="fas fa-image text-gray-400 text-xl"></i>
                                </div>
                                <p class="text-gray-500 text-sm font-medium">Không có hình ảnh</p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Overlay with category -->
                    <div class="absolute top-3 left-3">
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-bold bg-white/90 backdrop-blur-sm text-primary-700 border border-white/30">
                            <i class="fas fa-tag mr-1"></i>
                            <?php echo isset($product->category_name) ? htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Không có danh mục'; ?>
                        </span>
                    </div>
                      <!-- Quick action overlay -->
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <div class="flex space-x-2">
                            <a href="/WebBanHang/Product/show/<?php echo $product->id; ?>" 
                               class="w-10 h-10 bg-white/20 backdrop-blur-sm text-white rounded-full flex items-center justify-center hover:bg-white/30 transition-all duration-200 transform hover:scale-110">
                                <i class="fas fa-eye text-sm"></i>
                            </a>
                            <?php if (SessionHelper::isAdmin()): ?>
                            <a href="/WebBanHang/Product/edit/<?php echo $product->id; ?>" 
                               class="w-10 h-10 bg-white/20 backdrop-blur-sm text-white rounded-full flex items-center justify-center hover:bg-white/30 transition-all duration-200 transform hover:scale-110">
                                <i class="fas fa-edit text-sm"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Product Info -->
                <div class="p-5 space-y-3">
                    <!-- Product Name -->
                    <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-primary-600 transition-colors">
                        <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                    </h3>

                    <!-- Description -->
                    <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                        <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                    </p>

                    <!-- Price Section -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <span class="text-2xl font-bold gradient-text">
                                <?php echo number_format($product->price, 0, ',', '.'); ?>
                            </span>
                            <span class="text-gray-500 font-medium">VND</span>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                    </div>                    <!-- Enhanced Action Buttons -->
                    <?php if (SessionHelper::isAdmin()): ?>
                    <div class="grid grid-cols-4 gap-2 pt-3">
                        <a href="/WebBanHang/Product/show/<?php echo $product->id; ?>" 
                           class="bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white text-center py-2 px-3 rounded-lg transition-all duration-300 text-xs font-semibold transform hover:scale-105 hover:shadow-lg">
                            <i class="fas fa-eye mb-1"></i>
                            <div>Xem</div>
                        </a>
                        <a href="/WebBanHang/Product/edit/<?php echo $product->id; ?>" 
                           class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white text-center py-2 px-3 rounded-lg transition-all duration-300 text-xs font-semibold transform hover:scale-105 hover:shadow-lg">
                            <i class="fas fa-edit mb-1"></i>
                            <div>Sửa</div>
                        </a>
                        <a href="/WebBanHang/Product/delete/<?php echo $product->id; ?>" 
                           onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')"
                           class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white text-center py-2 px-3 rounded-lg transition-all duration-300 text-xs font-semibold transform hover:scale-105 hover:shadow-lg">
                            <i class="fas fa-trash mb-1"></i>
                            <div>Xóa</div>
                        </a>
                        <a href="/WebBanHang/Product/addToCart/<?php echo $product->id; ?>" 
                           class="bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white text-center py-2 px-3 rounded-lg transition-all duration-300 text-xs font-semibold transform hover:scale-105 hover:shadow-lg">
                            <i class="fas fa-cart-plus mb-1"></i>
                            <div>Mua</div>
                        </a>
                    </div>
                    <?php else: ?>
                    <div class="grid grid-cols-2 gap-2 pt-3">
                        <a href="/WebBanHang/Product/show/<?php echo $product->id; ?>" 
                           class="bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white text-center py-2 px-3 rounded-lg transition-all duration-300 text-xs font-semibold transform hover:scale-105 hover:shadow-lg">
                            <i class="fas fa-eye mb-1"></i>
                            <div>Xem</div>
                        </a>
                        <a href="/WebBanHang/Product/addToCart/<?php echo $product->id; ?>" 
                           class="bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white text-center py-2 px-3 rounded-lg transition-all duration-300 text-xs font-semibold transform hover:scale-105 hover:shadow-lg">
                            <i class="fas fa-cart-plus mb-1"></i>
                            <div>Mua</div>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Enhanced Empty State -->
    <?php if (empty($products)): ?>
        <div class="text-center py-20">
            <div class="relative">
                <div class="w-40 h-40 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-8 shadow-2xl">
                    <div class="w-32 h-32 bg-gradient-to-br from-primary-100 to-accent-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-box-open text-primary-500 text-6xl"></i>
                    </div>
                </div>
                <div class="absolute top-4 left-1/2 transform -translate-x-1/2 w-6 h-6 bg-yellow-400 rounded-full animate-bounce"></div>
            </div>            <h2 class="text-4xl font-bold text-gray-900 mb-4">Chưa có sản phẩm nào</h2>
            <p class="text-gray-600 mb-8 text-lg max-w-md mx-auto">
                <?php if (SessionHelper::isAdmin()): ?>
                    Hãy bắt đầu bằng cách thêm sản phẩm đầu tiên cho cửa hàng của bạn!
                <?php else: ?>
                    Hiện tại chưa có sản phẩm nào trong cửa hàng. Vui lòng quay lại sau!
                <?php endif; ?>
            </p>
            <?php if (SessionHelper::isAdmin()): ?>
            <a href="/WebBanHang/Product/add" 
               class="inline-flex items-center bg-gradient-to-r from-primary-500 to-accent-600 hover:from-primary-600 hover:to-accent-700 text-white font-bold px-10 py-5 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl space-x-4">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-plus text-xl"></i>
                </div>
                <span class="text-lg">Thêm sản phẩm đầu tiên</span>
            </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>