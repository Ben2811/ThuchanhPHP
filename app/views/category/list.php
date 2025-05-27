<?php include 'app/views/shares/header.php'; ?>

<div class="container mx-auto px-4 mt-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Danh sách danh mục</h1>
    
    <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <?php 
                echo $_SESSION['success']; 
                unset($_SESSION['success']); 
            ?>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?php 
                echo $_SESSION['error']; 
                unset($_SESSION['error']); 
            ?>
        </div>
    <?php endif; ?>
    
    <a href="/WebBanHang/Category/add" class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded mb-6 inline-block transition duration-200">Thêm danh mục mới</a>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Tên danh mục</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Mô tả</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (empty($categories)): ?>
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Không có danh mục nào</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($categories as $category): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo $category->id; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td class="px-6 py-4 text-sm text-gray-900"><?php echo htmlspecialchars($category->description ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                <a href="/WebBanHang/Category/edit/<?php echo $category->id; ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs font-medium transition duration-200">Sửa</a>
                                <a href="/WebBanHang/Category/delete/<?php echo $category->id; ?>" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-medium transition duration-200" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
