<?php include 'app/views/shares/header.php'; ?>

<?php 
// Kiểm tra đăng nhập
if (!SessionHelper::isLoggedIn()) {
    echo '<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 via-white to-primary-50">';
    echo '<div class="text-center">';
    echo '<div class="mb-6">';
    echo '<svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
    echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>';
    echo '</svg>';
    echo '<h2 class="text-2xl font-bold text-gray-900 mb-2">Cần đăng nhập</h2>';
    echo '<p class="text-gray-600 mb-6">Bạn cần đăng nhập để xem giỏ hàng</p>';
    echo '<a href="/WebBanHang/account/login" class="bg-primary-600 text-white px-6 py-3 rounded-lg hover:bg-primary-700 transition-colors">Đăng nhập</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    include 'app/views/shares/footer.php';
    exit;
}
?>

<div class="max-w-7xl mx-auto px-4 py-6 animate-fade-in">    <!-- Enhanced Header -->
    <div class="text-center mb-6">
        <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-r from-primary-500 to-accent-600 rounded-xl shadow-lg mb-3 animate-bounce-subtle">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0L12 13"/>
            </svg>
        </div>
        <h1 class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-primary-600 via-primary-700 to-accent-600 bg-clip-text text-transparent mb-3">Giỏ hàng của bạn</h1>
        <p class="text-gray-600 text-base max-w-2xl mx-auto">Xem lại các sản phẩm trước khi thanh toán</p>
    </div>

    <?php if (!empty($cart) && is_array($cart)): ?>        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6" id="cart-container">
            <!-- Enhanced Cart Items -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="bg-gradient-to-r from-primary-600 to-accent-700 px-6 py-4 flex justify-between items-center">
                        <h2 class="text-lg font-bold text-white flex items-center">
                            <div class="w-6 h-6 bg-white/20 rounded-lg flex items-center justify-center mr-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                            </div>
                            Sản phẩm trong giỏ hàng
                        </h2>
                        <a href="/WebBanHang/Product/clearCart" 
                           onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm khỏi giỏ hàng?')"
                           class="bg-red-500/80 hover:bg-red-500 backdrop-blur-sm text-white px-3 py-2 rounded-lg text-xs font-semibold transition-all duration-300 transform hover:scale-105">
                            <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Xóa tất cả
                        </a>
                    </div>
                    
                    <div class="divide-y divide-gray-200/50" id="cart-items">
                        <?php 
                        $total = 0;
                        foreach ($cart as $id => $item): 
                            $itemTotal = $item['price'] * $item['quantity'];
                            $total += $itemTotal;
                        ?>                            <div class="p-4 hover:bg-gradient-to-r hover:from-gray-50 hover:to-blue-50 transition-all duration-300 group" data-product-id="<?php echo $id; ?>">
                                <div class="flex gap-4">
                                    <!-- Enhanced Product Image -->
                                    <div class="flex-shrink-0">
                                        <?php if (!empty($item['image'])): ?>
                                            <div class="relative">                                                <img src="/WebBanHang/<?php echo $item['image']; ?>" 
                                                     alt="<?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>"
                                                     class="w-20 h-20 object-cover rounded-xl border-2 border-gray-200 group-hover:border-primary-300 transition-colors shadow-md">
                                                <div class="absolute -top-1 -right-1 w-5 h-5 bg-primary-500 text-white rounded-full flex items-center justify-center text-xs font-bold" id="badge-quantity-<?php echo $id; ?>">
                                                    <?php echo $item['quantity']; ?>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="w-20 h-20 bg-gradient-to-br from-gray-200 to-gray-300 rounded-xl border-2 border-gray-200 flex items-center justify-center relative">                                                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                <div class="absolute -top-1 -right-1 w-5 h-5 bg-primary-500 text-white rounded-full flex items-center justify-center text-xs font-bold" id="badge-quantity-<?php echo $id; ?>">
                                                    <?php echo $item['quantity']; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Enhanced Product Info -->
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-bold text-gray-900 mb-2 truncate group-hover:text-primary-600 transition-colors">
                                            <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>
                                        </h3>
                                        
                                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
                                            <div class="space-y-2">
                                                <div class="flex items-center space-x-3">
                                                    <div class="flex items-center space-x-2">
                                                        <span class="text-base font-bold text-primary-600">
                                                            <?php echo number_format($item['price'], 0, ',', '.'); ?>
                                                        </span>
                                                        <span class="text-gray-500 font-medium text-sm">VND</span>
                                                    </div>                                                    <span class="text-gray-400">×</span>
                                                    <!-- Quantity Controls -->
                                                    <div class="flex items-center space-x-2">
                                                        <button onclick="updateQuantity(<?php echo $id; ?>, <?php echo $item['quantity'] - 1; ?>)" 
                                                                class="w-6 h-6 bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-white rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 disabled:opacity-50 disabled:cursor-not-allowed" 
                                                                <?php echo $item['quantity'] <= 1 ? 'disabled' : ''; ?>>
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                                            </svg>
                                                        </button>
                                                        <div class="bg-gradient-to-r from-primary-100 to-accent-100 text-primary-800 px-3 py-1 rounded-lg font-bold text-xs min-w-[50px] text-center">
                                                            <span id="quantity-<?php echo $id; ?>">SL: <?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                        </div>
                                                        <button onclick="updateQuantity(<?php echo $id; ?>, <?php echo $item['quantity'] + 1; ?>)" 
                                                                class="w-6 h-6 bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>                                                <div class="flex items-center space-x-2">
                                                    <span class="text-gray-600 font-medium text-sm">Thành tiền:</span>
                                                    <span class="text-xl font-bold bg-gradient-to-r from-primary-600 via-primary-700 to-accent-600 bg-clip-text text-transparent" id="item-total-<?php echo $id; ?>">
                                                        <?php echo number_format($itemTotal, 0, ',', '.'); ?> VND
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <!-- Enhanced Remove Button -->
                                            <div class="flex-shrink-0">
                                                <a href="/WebBanHang/Product/removeFromCart/<?php echo $id; ?>" 
                                                   onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')"
                                                   class="bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-white px-3 py-2 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105 flex items-center space-x-2"
                                                   title="Xóa sản phẩm">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    <span class="hidden sm:inline text-xs">Xóa</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>            <!-- Enhanced Cart Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden sticky top-6 border border-gray-100">
                    <div class="bg-gradient-to-r from-emerald-600 to-green-700 px-6 py-4">
                        <h2 class="text-lg font-bold text-white flex items-center">
                            <div class="w-6 h-6 bg-white/20 rounded-lg flex items-center justify-center mr-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            Tóm tắt đơn hàng
                        </h2>
                    </div>
                    
                    <div class="p-6">
                        <div class="space-y-4">
                            <!-- Order Details -->
                            <div class="space-y-3">                                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                    <span class="text-gray-700 font-medium text-sm">Số lượng sản phẩm:</span>
                                    <span class="font-bold text-base text-gray-900" id="total-items"><?php echo count($cart); ?> món</span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                    <span class="text-gray-700 font-medium text-sm">Tổng tiền hàng:</span>
                                    <span class="font-bold text-base text-gray-900" id="subtotal"><?php echo number_format($total, 0, ',', '.'); ?> VND</span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                    <span class="text-gray-700 font-medium text-sm">Phí vận chuyển:</span>
                                    <span class="font-bold text-green-600 text-sm">Miễn phí</span>
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="bg-gradient-to-r from-emerald-50 to-green-50 p-4 rounded-xl border border-emerald-200">                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Tổng cộng:</span>
                                    <span class="text-2xl font-bold bg-gradient-to-r from-primary-600 via-primary-700 to-accent-600 bg-clip-text text-transparent" id="grand-total"><?php echo number_format($total, 0, ',', '.'); ?> VND</span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-3">
                                <a href="/WebBanHang/Product/checkout" 
                                   class="w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl flex items-center justify-center space-x-2 text-base">
                                    <div class="w-6 h-6 bg-white/20 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                        </svg>
                                    </div>
                                    <span>Thanh toán ngay</span>
                                </a>
                                
                                <a href="/WebBanHang/Product/" 
                                   class="w-full bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-700 font-bold py-3 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center justify-center space-x-2 text-base">
                                    <div class="w-6 h-6 bg-white rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                        </svg>
                                    </div>
                                    <span>Tiếp tục mua sắm</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>        <!-- Enhanced Empty Cart State -->
        <div class="text-center py-16">
            <div class="relative">
                <div class="w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl">
                    <div class="w-24 h-24 bg-gradient-to-br from-primary-100 to-accent-100 rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0L12 13"/>
                        </svg>
                    </div>
                </div>
                <div class="absolute top-3 left-1/2 transform -translate-x-1/2 w-5 h-5 bg-yellow-400 rounded-full animate-bounce"></div>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-3">Giỏ hàng trống</h2>
            <p class="text-gray-600 mb-6 text-base max-w-md mx-auto">Hãy thêm một số sản phẩm vào giỏ hàng để bắt đầu mua sắm!</p>
            <a href="/WebBanHang/Product/" 
               class="inline-flex items-center bg-gradient-to-r from-primary-500 to-accent-600 hover:from-primary-600 hover:to-accent-700 text-white font-bold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl space-x-3">
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
                <span class="text-base">Khám phá sản phẩm</span>
            </a>
        </div>    <?php endif; ?>
</div>

<script>
async function updateQuantity(productId, newQuantity) {
    if (newQuantity < 1) return;
    
    console.log('Updating quantity for product:', productId, 'to:', newQuantity);
    
    try {
        const requestData = {
            product_id: productId,
            quantity: newQuantity
        };
        
        console.log('Sending request data:', requestData);
        
        const response = await fetch('/WebBanHang/Product/updateCart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(requestData)
        });
        
        console.log('Response status:', response.status);
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const result = await response.json();
        console.log('Server response:', result);
        
        if (result.success) {
            // Update quantity display
            const quantityElement = document.getElementById('quantity-' + productId);
            const badgeElement = document.getElementById('badge-quantity-' + productId);
            
            if (quantityElement) {
                quantityElement.textContent = 'SL: ' + newQuantity;
            }
            if (badgeElement) {
                badgeElement.textContent = newQuantity;
            }
            
            // Update item total
            const itemTotal = result.item_price * newQuantity;
            const totalElement = document.getElementById('item-total-' + productId);
            if (totalElement) {
                totalElement.textContent = new Intl.NumberFormat('vi-VN').format(itemTotal) + ' VND';
            }
            
            // Update all buttons for this product
            updateButtonStates(productId, newQuantity);
            
            // Recalculate and update totals
            updateCartTotals();
            
            // Show success feedback
            showNotification('Đã cập nhật số lượng!', 'success');
        } else {
            console.error('Server error:', result);
            showNotification('Lỗi: ' + (result.message || 'Unknown error'), 'error');
        }
    } catch (error) {
        console.error('Error updating quantity:', error);
        showNotification('Có lỗi xảy ra khi cập nhật số lượng! ' + error.message, 'error');
    }
}

function updateButtonStates(productId, currentQuantity) {
    // Find the product row
    const productRow = document.querySelector(`[data-product-id="${productId}"]`);
    if (!productRow) return;
    
    // Find buttons within this row
    const decrementBtn = productRow.querySelector('button[onclick*="updateQuantity(' + productId + ',"]');
    const incrementBtn = productRow.querySelectorAll('button[onclick*="updateQuantity(' + productId + ',"]')[1];
    
    if (decrementBtn) {
        decrementBtn.setAttribute('onclick', `updateQuantity(${productId}, ${currentQuantity - 1})`);
        if (currentQuantity <= 1) {
            decrementBtn.disabled = true;
            decrementBtn.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            decrementBtn.disabled = false;
            decrementBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    }
    
    if (incrementBtn) {
        incrementBtn.setAttribute('onclick', `updateQuantity(${productId}, ${currentQuantity + 1})`);
    }
}

function updateCartTotals() {
    let totalItems = 0;
    let grandTotal = 0;
    
    // Get all product rows
    const productRows = document.querySelectorAll('[data-product-id]');
    
    productRows.forEach(row => {
        const productId = row.getAttribute('data-product-id');
        const quantityElement = document.getElementById('quantity-' + productId);
        const totalElement = document.getElementById('item-total-' + productId);
        
        if (quantityElement && totalElement) {
            // Extract quantity from text like "SL: 2"
            const quantityText = quantityElement.textContent.replace('SL: ', '');
            const quantity = parseInt(quantityText) || 0;
            
            // Extract total from text like "50,000 VND"
            const totalText = totalElement.textContent.replace(/[^\d]/g, '');
            const itemTotal = parseInt(totalText) || 0;
            
            totalItems += quantity;
            grandTotal += itemTotal;
        }
    });
    
    // Update displays
    document.getElementById('total-items').textContent = totalItems + ' món';
    document.getElementById('subtotal').textContent = new Intl.NumberFormat('vi-VN').format(grandTotal) + ' VND';
    document.getElementById('grand-total').textContent = new Intl.NumberFormat('vi-VN').format(grandTotal) + ' VND';
}

function showNotification(message, type) {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg text-white font-semibold transform transition-all duration-300 translate-x-full opacity-0 ${
        type === 'success' ? 'bg-green-500' : 'bg-red-500'
    }`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Show notification
    setTimeout(() => {
        notification.classList.remove('translate-x-full', 'opacity-0');
    }, 100);
    
    // Hide notification
    setTimeout(() => {
        notification.classList.add('translate-x-full', 'opacity-0');
        setTimeout(() => {
            if (document.body.contains(notification)) {
                document.body.removeChild(notification);
            }
        }, 300);
    }, 3000);
}

// Initialize cart page
document.addEventListener('DOMContentLoaded', function() {
    console.log('Cart page loaded');
    
    // Initialize button states for all products
    const productRows = document.querySelectorAll('[data-product-id]');
    productRows.forEach(row => {
        const productId = row.getAttribute('data-product-id');
        const quantityElement = document.getElementById('quantity-' + productId);
        
        if (quantityElement) {
            const quantityText = quantityElement.textContent.replace('SL: ', '');
            const currentQuantity = parseInt(quantityText) || 1;
            updateButtonStates(productId, currentQuantity);
        }
    });
    
    console.log('Cart initialized with', productRows.length, 'products');
});
</script>

<?php include 'app/views/shares/footer.php'; ?>