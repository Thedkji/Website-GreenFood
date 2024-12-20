<div class="myaccount-tab-menu nav" role="tablist">
    <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-user"></i>
        Thông tin cá nhân</a>

    <a href="#pass" data-toggle="tab"><i class="fa fa-key"></i>
        Đổi mật khẩu</a>

    <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
        Trạng thái đơn hàng</a>

    <a href="#history_order" data-toggle="tab"><i class="fa fa-history"></i>
        Lịch sử đơn hàng</a>
        @if($isEligibleForCoupon)
        <a href="#coupon" data-toggle="tab">
            <i class="fas fa-gift"></i> Khuyến mãi khách hàng mới
        </a>
    @endif    
        <a href="{{ route('client.information.logout') }}" id="logoutButton"><i class="fa fa-sign-out"></i> Đăng xuất</a>
        <form id="logoutForm" action="{{ route('client.information.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('logoutButton').addEventListener('click', function (e) {
        e.preventDefault(); 

        Swal.fire({
            title: 'Bạn có chắc muốn đăng xuất?',
            text: 'Thao tác này sẽ đăng xuất tài khoản của bạn.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đăng xuất',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logoutForm').submit();

                Swal.fire({
                    title: 'Đã đăng xuất!',
                    text: 'Bạn đã đăng xuất tài khoản thành công.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {

                    window.location.href = '{{ route('client.home') }}';  
                });
            }
        });
    });
</script>
