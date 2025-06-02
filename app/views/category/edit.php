<?php include 'app/views/shares/header.php'; ?>

<div class="container mx-auto px-4 mt-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Sửa danh mục</h1>
    
    <?php if (isset($errors) && !empty($errors)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc list-inside">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <div class="bg-white shadow-md rounded-lg p-6">
        <form method="POST" action="/WebBanHang/Category/update">
            <input type="hidden" name="id" value="<?php echo $category->id; ?>">
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Tên danh mục</label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="name" name="name" 
                      value="<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Mô tả</label>
                <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="description" name="description" rows="3"><?php 
                    echo htmlspecialchars($category->description ?? '', ENT_QUOTES, 'UTF-8'); 
                ?></textarea>
            </div>
            
            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-6 rounded transition duration-200">Lưu thay đổi</button>
                <a href="/WebBanHang/Category" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-6 rounded transition duration-200">Quay lại</a>
            </div>
        </form>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
