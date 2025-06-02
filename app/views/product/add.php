<?php include 'app/views/shares/header.php'; ?>

<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">
            <i class="fas fa-plus-circle mr-3 text-indigo-600"></i>Thêm sản phẩm mới
        </h1>
        <p class="text-gray-600">Tạo sản phẩm mới cho cửa hàng của bạn</p>
    </div>

    <!-- Error Messages -->
    <?php if (!empty($errors)): ?>
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-circle text-red-400"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Có lỗi xảy ra:</h3>
                    <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Form -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4">
            <h2 class="text-xl font-semibold text-white">
                <i class="fas fa-edit mr-2"></i>Thông tin sản phẩm
            </h2>
        </div>
        
        <form method="POST" action="/WebBanHang/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();" class="p-6 space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Product Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-tag mr-1 text-indigo-500"></i>Tên sản phẩm *
                        </label>
                        <input type="text" id="name" name="name" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200" 
                               placeholder="Nhập tên sản phẩm"
                               required>
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-dollar-sign mr-1 text-indigo-500"></i>Giá bán (VND) *
                        </label>
                        <input type="number" id="price" name="price" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200" 
                               step="0.01" 
                               min="0"
                               placeholder="0"
                               required>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-list mr-1 text-indigo-500"></i>Danh mục *
                        </label>
                        <select id="category_id" name="category_id" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200" 
                                required>
                            <option value="">Chọn danh mục</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category->id; ?>">
                                    <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-align-left mr-1 text-indigo-500"></i>Mô tả sản phẩm *
                        </label>
                        <textarea id="description" name="description" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200" 
                                  placeholder="Mô tả chi tiết về sản phẩm..."
                                  required></textarea>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-image mr-1 text-indigo-500"></i>Hình ảnh sản phẩm
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-indigo-400 transition duration-200">
                            <div class="space-y-2">
                                <div class="flex justify-center">
                                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                                </div>
                                <div>
                                    <label for="image" class="cursor-pointer">
                                        <span class="text-indigo-600 hover:text-indigo-500 font-medium">Chọn file</span>
                                        <span class="text-gray-500"> hoặc kéo thả vào đây</span>
                                    </label>
                                    <input type="file" id="image" name="image" class="hidden" accept="image/*">
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                <button type="submit" 
                        class="flex-1 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold py-4 px-6 rounded-lg transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                    <i class="fas fa-plus mr-2"></i>Thêm sản phẩm
                </button>
                <a href="/WebBanHang/Product/list" 
                   class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-4 px-6 rounded-lg transition duration-300 text-center">
                    <i class="fas fa-arrow-left mr-2"></i>Quay lại danh sách
                </a>
            </div>
        </form>
    </div>
</div>

<script>
// Image upload preview
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // You can add image preview functionality here
            console.log('Image selected:', file.name);
        };
        reader.readAsDataURL(file);
    }
});
</script>

<?php include 'app/views/shares/footer.php'; ?>