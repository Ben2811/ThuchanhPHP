<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h1>Sửa danh mục</h1>
    
    <?php if (isset($errors) && !empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <form method="POST" action="/WebBanHang/Category/update">
        <input type="hidden" name="id" value="<?php echo $category->id; ?>">
        
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" 
                  value="<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?php 
                echo htmlspecialchars($category->description ?? '', ENT_QUOTES, 'UTF-8'); 
            ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        <a href="/WebBanHang/Category" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>
