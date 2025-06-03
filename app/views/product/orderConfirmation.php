<?php include 'app/views/shares/header.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-50 relative">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%23059669" fill-opacity="0.05"%3E%3Ccircle cx="20" cy="20" r="1"/%3E%3C/g%3E%3C/svg%3E')] opacity-60"></div>

    <div class="flex items-center justify-center min-h-screen py-6 px-4">
        <div class="max-w-md w-full">           
            <div class="animate-fade-in bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-green-500 to-emerald-500 px-4 py-6 text-center">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-3 shadow-lg animate-bounce-subtle">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <h1 class="text-xl font-bold text-white mb-1">Đặt hàng thành công!</h1>
                    <p class="text-green-100 text-sm">Cảm ơn bạn đã tin tưởng chúng tôi</p>
                </div>
                
                <!-- Compact Content -->
                <div class="px-4 py-4 space-y-4">
                    <!-- Enhanced Status Cards -->
                    <div class="space-y-3">
                        <!-- Order Status -->
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-lg p-3 hover:shadow-sm transition-all duration-300">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-green-800">Đơn hàng đã được xử lý</h3>
                                    <p class="text-xs text-green-600">Đang chuẩn bị giao hàng</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Info -->
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-lg p-3 hover:shadow-sm transition-all duration-300">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-blue-800">Chúng tôi sẽ liên hệ</h3>
                                    <p class="text-xs text-blue-600">Trong vòng 24h để xác nhận</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Order ID Display -->
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 rounded-lg p-3">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold text-purple-800">Mã đơn hàng</h3>
                                        <p class="text-xs text-purple-600 font-mono" id="order-id">#<?php echo date('YmdHis') . rand(100, 999); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      <!-- Quick Actions -->
                    <div class="pt-2">
                        <a href="/WebBanHang/Product/" 
                           class="w-full bg-gradient-to-r from-primary-600 to-accent-600 hover:from-primary-700 hover:to-accent-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-md flex items-center justify-center space-x-2 text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <span>Tiếp tục mua sắm</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Simple CSS for animations -->
<style>
    @keyframes bounce-subtle {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-3px); }
    }
    
    .animate-bounce-subtle {
        animation: bounce-subtle 2s ease-in-out infinite;
    }
    
    .animate-fade-in {
        animation: fadeIn 0.6s ease-out;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    /* Copy feedback animation */
    .copied {
        background-color: #10b981 !important;
        color: white !important;
        transform: scale(0.95);
    }
    
    /* Mobile responsiveness */
    @media (max-width: 480px) {
        .max-w-md {
            max-width: calc(100vw - 2rem);
        }
    }
</style>

<!-- Simple JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add entrance animation
    setTimeout(() => {
        document.querySelector('.animate-fade-in').style.transform = 'scale(1)';
        document.querySelector('.animate-fade-in').style.opacity = '1';
    }, 100);
});

// Copy order ID function
function copyOrderId() {
    const orderIdText = document.getElementById('order-id').textContent;
    navigator.clipboard.writeText(orderIdText).then(() => {
        const button = event.target;
        const originalText = button.textContent;
        button.classList.add('copied');
        button.textContent = 'Đã sao chép!';
        
        setTimeout(() => {
            button.classList.remove('copied');
            button.textContent = originalText;
        }, 2000);
    }).catch(() => {
        alert('Không thể sao chép. Vui lòng thử lại!');
    });
}
</script>

<?php include 'app/views/shares/footer.php'; ?>