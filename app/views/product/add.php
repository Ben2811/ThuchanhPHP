<?php include 'app/views/shares/header.php'; ?>

<div class="max-w-5xl mx-auto animate-fade-in">
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-primary-500 to-accent-600 rounded-2xl shadow-xl mb-4 animate-bounce-subtle">
            <i class="fas fa-plus-circle text-white text-2xl"></i>
        </div>
        <h1 class="text-3xl lg:text-4xl font-bold gradient-text mb-3">Thêm sản phẩm mới</h1>
        <p class="text-gray-600 text-base max-w-2xl mx-auto">Tạo sản phẩm mới cho cửa hàng của bạn với giao diện hiện đại và dễ sử dụng</p>
    </div>

    <!-- Error Messages -->
    <?php if (!empty($errors)): ?>
        <div class="bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-400 p-4 mb-6 rounded-xl shadow-md animate-slide-up">
            <div class="flex">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-exclamation-circle text-red-500 text-sm"></i>
                    </div>
                </div>
                <div class="ml-3">
                    <h3 class="text-base font-bold text-red-800 mb-2">Có lỗi xảy ra:</h3>
                    <ul class="space-y-1 text-red-700 text-sm">
                        <?php foreach ($errors as $error): ?>
                            <li class="flex items-center space-x-2">
                                <i class="fas fa-chevron-right text-xs"></i>
                                <span><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Form -->
    <div class="glass-effect rounded-2xl shadow-xl overflow-hidden border border-white/20">
        <div class="bg-gradient-to-r from-primary-500 to-accent-600 px-6 py-4">
            <h2 class="text-xl font-bold text-white flex items-center">
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-edit text-white text-sm"></i>
                </div>
                Thông tin sản phẩm
            </h2>
        </div>

        <form method="POST" action="/WebBanHang/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();" class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Product Name -->
                    <div class="group">
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-2 flex items-center">
                            <div class="w-5 h-5 bg-primary-100 rounded-lg flex items-center justify-center mr-2">
                                <i class="fas fa-tag text-primary-600 text-xs"></i>
                            </div>
                            Tên sản phẩm *
                        </label>
                        <input type="text" id="name" name="name"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-3 focus:ring-primary-100 focus:border-primary-500 transition-all duration-300 text-base hover:border-primary-300"
                            placeholder="Nhập tên sản phẩm..."
                            required>
                    </div> <!-- Price -->
                    <div class="group">
                        <label for="price" class="block text-sm font-bold text-gray-700 mb-2 flex items-center">
                            <div class="w-5 h-5 bg-primary-100 rounded-lg flex items-center justify-center mr-2">
                                <i class="fas fa-dollar-sign text-primary-600 text-xs"></i>
                            </div>
                            Giá bán *
                        </label>
                        <div class="relative">
                            <input type="number"
                                id="price"
                                name="price"
                                class="w-full px-4 py-3 pr-16 border-2 border-gray-200 rounded-xl focus:ring-3 focus:ring-primary-100 focus:border-primary-500 transition-all duration-300 text-base hover:border-primary-300"
                                placeholder="Nhập giá sản phẩm..."
                                step="1000"
                                min="0"
                                required>
                            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-primary-600 font-bold text-sm bg-primary-50 px-2 py-1 rounded-lg border border-primary-200">
                                VND
                            </div>
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="group">
                        <label for="category_id" class="block text-sm font-bold text-gray-700 mb-2 flex items-center">
                            <div class="w-5 h-5 bg-accent-100 rounded-lg flex items-center justify-center mr-2">
                                <i class="fas fa-list text-accent-600 text-xs"></i>
                            </div>
                            Danh mục *
                        </label>
                        <select id="category_id" name="category_id"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-3 focus:ring-accent-100 focus:border-accent-500 transition-all duration-300 text-base hover:border-accent-300"
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
                    <div class="group">
                        <label for="description" class="block text-sm font-bold text-gray-700 mb-2 flex items-center">
                            <div class="w-5 h-5 bg-blue-100 rounded-lg flex items-center justify-center mr-2">
                                <i class="fas fa-align-left text-blue-600 text-xs"></i>
                            </div>
                            Mô tả sản phẩm *
                        </label>
                        <textarea id="description" name="description" rows="5"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-3 focus:ring-blue-100 focus:border-blue-500 transition-all duration-300 text-base hover:border-blue-300 resize-none"
                            placeholder="Mô tả chi tiết về sản phẩm, tính năng, ưu điểm..."
                            required></textarea>
                    </div>

                    <!-- Enhanced Image Upload -->
                    <div class="group">
                        <label for="image" class="block text-sm font-bold text-gray-700 mb-2 flex items-center">
                            <div class="w-5 h-5 bg-purple-100 rounded-lg flex items-center justify-center mr-2">
                                <i class="fas fa-image text-purple-600 text-xs"></i>
                            </div>
                            Hình ảnh sản phẩm
                        </label>
                        <div class="relative">
                            <div id="upload-area" class="border-3 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-primary-400 transition-all duration-300 bg-gradient-to-br from-gray-50 to-gray-100 hover:from-primary-50 hover:to-accent-50 cursor-pointer group">
                                <div class="space-y-3">
                                    <div class="flex justify-center">
                                        <div class="w-12 h-12 bg-gradient-to-r from-primary-500 to-accent-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-cloud-upload-alt text-xl text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-base font-bold text-gray-700 mb-1">Chọn hình ảnh sản phẩm</p>
                                        <p class="text-gray-500 text-sm">Kéo thả file vào đây hoặc click để chọn</p>
                                    </div>
                                    <p class="text-xs text-gray-400">PNG, JPG, GIF tối đa 10MB</p>
                                </div>
                                <input type="file" id="image" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                            </div>

                            <!-- Image Preview -->
                            <div id="image-preview" class="hidden mt-3 p-3 bg-white rounded-xl border-2 border-green-200">
                                <div class="flex items-center space-x-3">
                                    <img id="preview-img" src="" alt="Preview" class="w-16 h-16 object-cover rounded-lg">
                                    <div class="flex-1">
                                        <p class="font-semibold text-gray-800 text-sm" id="file-name"></p>
                                        <p class="text-xs text-gray-500" id="file-size"></p>
                                    </div>
                                    <button type="button" id="remove-image" class="w-8 h-8 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg flex items-center justify-center transition-colors">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 pt-6 mt-6 border-t border-gray-200">
                <button type="submit"
                    class="flex-1 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl flex items-center justify-center space-x-2 text-base">
                    <div class="w-6 h-6 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-plus text-sm"></i>
                    </div>
                    <span>Thêm sản phẩm</span>
                </button>
                <a href="/WebBanHang/Product/list"
                    class="flex-1 bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-700 font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center justify-center space-x-2 text-base">
                    <div class="w-6 h-6 bg-white rounded-lg flex items-center justify-center">
                        <i class="fas fa-arrow-left text-sm"></i>
                    </div>
                    <span>Quay lại danh sách</span>
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Image upload functionality
    const imageInput = document.getElementById('image');
    const uploadArea = document.getElementById('upload-area');
    const imagePreview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    const fileName = document.getElementById('file-name');
    const fileSize = document.getElementById('file-size');
    const removeButton = document.getElementById('remove-image');

    // Drag and drop functionality
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('border-primary-500', 'bg-primary-50');
    });

    uploadArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('border-primary-500', 'bg-primary-50');
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('border-primary-500', 'bg-primary-50');

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            imageInput.files = files;
            handleImageUpload(files[0]);
        }
    });

    // Image upload preview
    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            handleImageUpload(file);
        }
    });

    function handleImageUpload(file) {
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                fileName.textContent = file.name;
                fileSize.textContent = formatFileSize(file.size);
                imagePreview.classList.remove('hidden');
                uploadArea.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    }

    // Remove image
    removeButton.addEventListener('click', () => {
        imageInput.value = '';
        imagePreview.classList.add('hidden');
        uploadArea.classList.remove('hidden');
    });

    // Format file size
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    // Simple form validation
    function validateForm() {
        const name = document.getElementById('name').value.trim();
        const price = document.getElementById('price').value;
        const description = document.getElementById('description').value.trim();
        const category = document.getElementById('category_id').value;

        if (!name || !price || !description || !category) {
            alert('Vui lòng điền đầy đủ thông tin bắt buộc!');
            return false;
        }

        if (parseFloat(price) <= 0) {
            alert('Vui lòng nhập giá sản phẩm hợp lệ!');
            return false;
        }

        return true;
    }

    // Add smooth animations
    document.querySelectorAll('input, select, textarea').forEach(element => {
        element.addEventListener('focus', function() {
            this.parentElement.classList.add('scale-105');
        });

        element.addEventListener('blur', function() {
            this.parentElement.classList.remove('scale-105');
        });
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch('/WebBanHang/api/category')
            .then(response => response.json())
            .then(data => {
                const categorySelect = document.getElementById('category_id');
                data.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    categorySelect.appendChild(option);
                });
            });
        document.getElementById('add-product-form').addEventListener('submit',
            function(event) {
                event.preventDefault();
                const formData = new FormData(this);
                                 
                fetch('/WebBanHang/api/product', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(text => {
                        console.log('Raw response:', text); // Log the raw response text
                        try {
                            const data = text;
                            if (data.message === 'Product created successfully') {
                                location.href = '/WebBanHang/Product';
                            } else {
                                alert('Thêm sản phẩm thất bại');
                            }
                        } catch (error) {
                            console.error('Error parsing JSON:', error);
                            alert('Lỗi: Không thể phân tích JSON từ phản hồi của máy chủ.');
                        }
                    });
            });
    });
</script>