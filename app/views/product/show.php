<?php include 'app/views/shares/header.php'; ?>

<div class="max-w-6xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/WebBanHang/Product/" class="text-gray-700 hover:text-indigo-600 transition duration-300">
                    <i class="fas fa-home mr-1"></i>Sản phẩm
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                    <span class="text-gray-500"><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Product Image -->
        <div class="space-y-4">
            <div class="aspect-w-1 aspect-h-1 bg-gray-100 rounded-2xl overflow-hidden shadow-lg">
                <?php if (isset($product->image) && $product->image): ?>
                    <img src="/WebBanHang/<?php echo $product->image; ?>" 
                         alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" 
                         class="w-full h-96 object-cover hover:scale-105 transition duration-500">
                <?php else: ?>
                    <div class="w-full h-96 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <div class="text-center">
                            <i class="fas fa-image text-gray-400 text-6xl mb-4"></i>
                            <p class="text-gray-500 text-lg">Không có hình ảnh</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Product Info -->
        <div class="space-y-6">
            <!-- Category Badge -->
            <div>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                    <i class="fas fa-tag mr-1"></i>
                    <?php echo isset($product->category_name) ? htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Không có danh mục'; ?>
                </span>
            </div>

            <!-- Product Name -->
            <h1 class="text-4xl font-bold text-gray-900 leading-tight">
                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
            </h1>

            <!-- Price -->
            <div class="flex items-center space-x-4">
                <span class="text-4xl font-bold text-indigo-600">
                    <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                </span>
                <span class="bg-green-100 text-green-800 text-sm px-3 py-1 rounded-full font-medium">
                    <i class="fas fa-check-circle mr-1"></i>Còn hàng
                </span>
            </div>

            <!-- Description -->
            <div class="bg-gray-50 rounded-xl p-6">
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Mô tả sản phẩm</h4>
                <p class="text-gray-600"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
            </div>

            <!-- Actions -->
            <div class="flex space-x-4 mt-6">
                <a href="/WebBanHang/Product/list" class="px-6 py-3 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition duration-300">Quay lại danh sách sản phẩm</a>
                <a href="/WebBanHang/Product/edit/<?php echo $product->id; ?>" class="px-6 py-3 bg-yellow-400 text-yellow-900 rounded-lg hover:bg-yellow-500 transition duration-300">Sửa sản phẩm</a>
                <a href="/WebBanHang/Product/delete/<?php echo $product->id; ?>" class="px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-300" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa sản phẩm</a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
