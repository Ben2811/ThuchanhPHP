<?php include 'app/views/shares/header.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-primary-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Breadcrumb -->
        <nav class="flex mb-6 animate-fade-in" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 bg-white/70 backdrop-blur-sm rounded-full px-4 py-2 shadow-sm border border-gray-200">
                <li class="inline-flex items-center">
                    <a href="/WebBanHang/Product/" class="text-gray-600 hover:text-primary-600 transition-colors duration-300 font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                        </svg>
                        Sản phẩm
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                        <span class="text-gray-500 font-medium"><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">            <!-- Product Image -->
            <div class="space-y-4 animate-slide-up">
                <div class="relative group">
                    <div class="aspect-square bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                        <?php if (isset($product->image) && $product->image): ?>
                            <img src="/WebBanHang/<?php echo $product->image; ?>" 
                                 alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <?php else: ?>
                            <div class="w-full h-full bg-gradient-to-br from-gray-100 via-gray-50 to-primary-50 flex items-center justify-center">
                                <div class="text-center animate-bounce-subtle">
                                    <div class="w-16 h-16 bg-gradient-to-r from-primary-500 to-accent-500 rounded-full flex items-center justify-center mb-4 mx-auto shadow-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <p class="text-gray-500 text-lg font-medium">Không có hình ảnh</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- Decorative elements -->
                    <div class="absolute -top-3 -right-3 w-16 h-16 bg-gradient-to-r from-accent-400 to-primary-500 rounded-full opacity-20 blur-xl"></div>
                    <div class="absolute -bottom-3 -left-3 w-20 h-20 bg-gradient-to-r from-primary-400 to-accent-500 rounded-full opacity-15 blur-xl"></div>
                </div>
            </div>            <!-- Product Info -->
            <div class="space-y-6 animate-slide-up" style="animation-delay: 0.2s;">
                <!-- Category Badge -->
                <div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gradient-to-r from-primary-100 to-accent-100 text-primary-800 border border-primary-200 shadow-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        <?php echo isset($product->category_name) ? htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Không có danh mục'; ?>
                    </span>
                </div>

                <!-- Product Name -->
                <div>
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight mb-3">
                        <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                    </h1>
                    <div class="h-1 w-16 bg-gradient-to-r from-primary-500 to-accent-500 rounded-full"></div>
                </div>

                <!-- Price & Status -->
                <div class="flex items-center space-x-4">
                    <span class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">
                        <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                    </span>
                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800 border border-green-200 shadow-sm animate-pulse">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Còn hàng
                    </span>
                </div>

                <!-- Description -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-gray-100">
                    <h4 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Mô tả sản phẩm
                    </h4>
                    <p class="text-gray-700 text-base leading-relaxed"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                </div>                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-3">
                    <a href="/WebBanHang/Product/list"
                       class="inline-flex items-center justify-center px-4 py-2 border-2 border-gray-300 text-gray-700 bg-white rounded-lg hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-300 font-medium shadow-sm hover:shadow-md">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Quay lại
                    </a>
                    
                    <a href="/WebBanHang/Product/edit/<?php echo $product->id; ?>" 
                       class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-lg hover:from-yellow-600 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Chỉnh sửa
                    </a>
                    
                    <a href="/WebBanHang/Product/delete/<?php echo $product->id; ?>" 
                       class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                       onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Xóa
                    </a>
                </div>
            </div>
        </div>        <!-- Related Products Section -->
        <div class="mt-12 animate-slide-up" style="animation-delay: 0.4s;">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Sản phẩm liên quan</h3>
                <p class="text-gray-600 text-base">Khám phá thêm các sản phẩm tương tự</p>
                <div class="h-1 w-16 bg-gradient-to-r from-primary-500 to-accent-500 rounded-full mx-auto mt-3"></div>
            </div>
            
            <!-- Placeholder for related products -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <?php for($i = 0; $i < 4; $i++): ?>
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-900 mb-2">Sản phẩm liên quan</h4>
                        <p class="text-primary-600 font-bold">Giá: 000,000 VND</p>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
