<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <?php if (isset($product->image) && $product->image): ?>
                <img src="/WebBanHang/<?php echo $product->image; ?>" alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" class="img-fluid">
            <?php else: ?>
                <div class="alert alert-info">Không có hình ảnh</div>
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <h1><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></h1>
            <div class="badge bg-primary mb-2">
                <?php echo isset($product->category_name) ? htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Không có danh mục'; ?>
            </div>
            <h3 class="text-danger"><?php echo number_format($product->price, 0, ',', '.'); ?> VND</h3>
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Mô tả sản phẩm</h4>
                </div>
                <div class="card-body">
                    <p><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            </div>
            
            <div class="mt-4">
                <a href="/WebBanHang/Product/list" class="btn btn-secondary">Quay lại danh sách sản phẩm</a>
                <a href="/WebBanHang/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning">Sửa sản phẩm</a>
                <a href="/WebBanHang/Product/delete/<?php echo $product->id; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa sản phẩm</a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
