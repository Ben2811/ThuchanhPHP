<?php include 'app/views/shares/header.php'; ?>

<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Danh sách sản phẩm</h1>
            <p class="text-gray-600 mt-1">Quản lý và theo dõi tất cả sản phẩm của bạn</p>
        </div>
        <a href="/WebBanHang/Product/add" 
           class="bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-300 transform hover:-translate-y-1 hover:shadow-lg flex items-center">
            <i class="fas fa-plus mr-2"></i>Thêm sản phẩm mới
        </a>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($products as $product): ?>
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2 overflow-hidden border border-gray-100">
                <!-- Product Image -->
                <div class="aspect-w-16 aspect-h-12 bg-gray-100">
                    <?php if ($product->image): ?>
                        <img src="/WebBanHang/<?php echo $product->image; ?>" 
                             alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>"
                             class="w-full h-48 object-cover">
                    <?php else: ?>
                        <div class="w-full h-48 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-image text-gray-400 text-4xl mb-2"></i>
                                <p class="text-gray-500 text-sm">Không có hình ảnh</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Product Info -->
                <div class="p-6">
                    <!-- Category Badge -->
                    <div class="mb-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                            <i class="fas fa-tag mr-1"></i>
                            <?php echo isset($product->category_name) ? htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Không có danh mục'; ?>
                        </span>
                    </div>

                    <!-- Product Name -->
                    <h3 class="text-xl font-semibold text-gray-900 mb-2 line-clamp-2">
                        <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                    </h3>

                    <!-- Description -->
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                    </p>

                    <!-- Price -->
                    <div class="mb-4">
                        <span class="text-2xl font-bold text-indigo-600">
                            <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                        </span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-2">
                        <a href="/WebBanHang/Product/show/<?php echo $product->id; ?>" 
                           class="flex-1 bg-indigo-500 hover:bg-indigo-600 text-white text-center py-2 px-3 rounded-lg transition duration-300 text-sm">
                            <i class="fas fa-eye mr-1"></i>Xem
                        </a>
                        <a href="/WebBanHang/Product/edit/<?php echo $product->id; ?>" 
                           class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white text-center py-2 px-3 rounded-lg transition duration-300 text-sm">
                            <i class="fas fa-edit mr-1"></i>Sửa
                        </a>
                        <a href="/WebBanHang/Product/addToCart/<?php echo $product->id; ?>" 
                           class="flex-1 bg-green-500 hover:bg-green-600 text-white text-center py-2 px-3 rounded-lg transition duration-300 text-sm">
                            <i class="fas fa-cart-plus mr-1"></i>Mua
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Empty State -->
    <?php if (empty($products)): ?>
        <div class="text-center py-16">
            <div class="w-32 h-32 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-box-open text-gray-400 text-5xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Chưa có sản phẩm nào</h2>
            <p class="text-gray-600 mb-8">Hãy thêm sản phẩm đầu tiên của bạn!</p>
            <a href="/WebBanHang/Product/add" 
               class="inline-flex items-center bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold px-8 py-4 rounded-lg transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                <i class="fas fa-plus mr-2"></i>Thêm sản phẩm đầu tiên
            </a>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?></style>