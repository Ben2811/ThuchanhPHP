<?php include 'app/views/shares/header.php'; ?>

<!-- Hero Section -                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   required
                                   value="<?php echo isset($product) ? htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') : ''; ?>"
                                   class="w-full px-3 py-3 pl-8 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white shadow-sm text-sm"
                                   placeholder="Nhập tên sản phẩm...">v class="relative bg-gradient-to-br from-primary-50 via-white to-accent-50 py-8">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23f1f5f9" fill-opacity="0.3"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-fade-in">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-r from-primary-500 to-accent-500 rounded-xl mb-4 shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </div>
            <h1 class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-primary-600 via-primary-700 to-accent-600 bg-clip-text text-transparent mb-3">
                Chỉnh Sửa Sản Phẩm
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Cập nhật thông tin sản phẩm để mang đến trải nghiệm tốt nhất cho khách hàng
            </p>
        </div>
    </div>
</div>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <!-- Error Messages -->
    <?php if (!empty($errors)): ?>
        <div class="animate-slide-up mb-4">
            <div class="bg-red-50 border-l-4 border-red-400 rounded-lg p-3 shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-4 w-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Có lỗi xảy ra:</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc list-inside space-y-1">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>    <!-- Main Form -->
    <div class="animate-slide-up bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary-50 to-accent-50 px-4 py-3 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                Thông tin sản phẩm
            </h2>
        </div>        
        <form method="POST" action="/WebBanHang/Product/update" enctype="multipart/form-data" class="p-6">
            <input type="hidden" name="id" value="<?php echo isset($product) ? $product->id : ''; ?>">
              <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-4">
                    <!-- Product Name -->
                    <div class="group">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <svg class="w-4 h-4 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            Tên sản phẩm <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   required
                                   value="<?php echo isset($product) ? htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') : ''; ?>"
                                   class="w-full px-3 py-3 pl-8 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white shadow-sm text-sm"
                                   placeholder="Nhập tên sản phẩm...">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400 group-focus-within:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="group">
                        <label for="price" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <svg class="w-4 h-4 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                            </svg>
                            Giá (VND) <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" 
                                   id="price" 
                                   name="price" 
                                   required
                                   step="1000"
                                   value="<?php echo isset($product) ? htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8') : ''; ?>"
                                   class="w-full px-3 py-3 pl-10 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white shadow-sm text-sm"
                                   placeholder="0">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400 group-focus-within:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="group">
                        <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <svg class="w-4 h-4 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H5m14 18H5"/>
                            </svg>
                            Danh mục <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select id="category_id" 
                                    name="category_id" 
                                    required
                                    class="w-full px-3 py-3 pl-10 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white shadow-sm appearance-none cursor-pointer text-sm">                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category->id; ?>" <?php echo isset($product) && $category->id == $product->category_id ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400 group-focus-within:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H5m14 18H5"/>
                                </svg>
                            </div>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Description -->
                    <div class="group">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <svg class="w-4 h-4 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                            </svg>
                            Mô tả <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <textarea id="description" 
                                      name="description" 
                                      rows="5"
                                      required
                                      class="w-full px-3 py-3 pl-10 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white shadow-sm resize-none"
                                      placeholder="Mô tả chi tiết về sản phẩm..."><?php echo isset($product) ? htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                            <div class="absolute top-3 left-0 flex items-start pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400 group-focus-within:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                                </svg>
                            </div>
                        </div>
                    </div>                    <!-- Image Upload -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <svg class="w-4 h-4 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Hình ảnh sản phẩm
                        </label>
                          <!-- Current Image Display -->
                        <?php if (isset($product) && $product->image): ?>
                            <div class="mb-4">
                                <p class="text-sm text-gray-600 mb-2">Hình ảnh hiện tại:</p>
                                <div class="relative inline-block group">
                                    <img src="/WebBanHang/<?php echo $product->image; ?>" 
                                         alt="Current product image" 
                                         class="w-32 h-32 object-cover rounded-xl border-4 border-white shadow-lg group-hover:shadow-xl transition-all duration-300">
                                    <div class="absolute -top-2 -right-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-lg">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- File Upload Area -->
                        <div id="drop-area" class="relative border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-primary-500 transition-all duration-300 group cursor-pointer bg-gray-50 hover:bg-primary-50">
                            <input type="file" id="image" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                            <input type="hidden" name="existing_image" value="<?php echo isset($product) ? $product->image : ''; ?>">
                            
                            <div class="space-y-3">
                                <div class="w-12 h-12 bg-gradient-to-r from-primary-500 to-accent-500 rounded-full flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-base font-semibold text-gray-700 group-hover:text-primary-700 transition-colors duration-300">
                                        Chọn hình ảnh mới hoặc kéo thả vào đây
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        PNG, JPG, GIF tối đa 10MB
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Preview Area -->
                        <div id="preview-container" class="mt-3 hidden">
                            <p class="text-xs text-gray-600 mb-2">Xem trước:</p>
                            <img id="preview-image" class="w-24 h-24 object-cover rounded-lg border-2 border-gray-200 shadow-sm">
                        </div>
                    </div>
                </div>
            </div>            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row sm:justify-end gap-3 pt-6 mt-6 border-t border-gray-100">
                <a href="/WebBanHang/Product/list" 
                   class="inline-flex items-center justify-center px-4 py-2 border-2 border-gray-300 text-gray-700 bg-white rounded-lg hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-300 font-medium shadow-sm hover:shadow-md text-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Quay lại
                </a>
                <button type="submit" 
                        class="inline-flex items-center justify-center px-6 py-2 bg-gradient-to-r from-primary-600 to-accent-600 text-white rounded-lg hover:from-primary-700 hover:to-accent-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Lưu thay đổi
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Enhanced Image Upload Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('image');
    const previewContainer = document.getElementById('preview-container');
    const previewImage = document.getElementById('preview-image');

    // Handle file selection
    fileInput.addEventListener('change', handleFiles);

    // Handle drag and drop
    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.classList.add('border-primary-500', 'bg-primary-50');
    });

    dropArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        dropArea.classList.remove('border-primary-500', 'bg-primary-50');
    });

    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dropArea.classList.remove('border-primary-500', 'bg-primary-50');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            handleFiles();
        }
    });

    function handleFiles() {
        const file = fileInput.files[0];
        if (file) {
            // Validate file type
            if (!file.type.startsWith('image/')) {
                alert('Vui lòng chọn file hình ảnh!');
                return;
            }

            // Validate file size (10MB)
            if (file.size > 10 * 1024 * 1024) {
                alert('File quá lớn! Vui lòng chọn file nhỏ hơn 10MB.');
                return;
            }

            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    }
});
</script>

<?php include 'app/views/shares/footer.php'; ?>