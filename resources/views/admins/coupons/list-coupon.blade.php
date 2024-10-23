@extends('admins.layouts.master')
@section('title', 'Dashboard | Velzon - Admin - Danh sách mã giảm giá')
@section('start-page-title', 'Danh sách mã giảm giá')
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('admin.coupons.showCoupon') }}">Mã giảm giá</a></li>
    <li class="breadcrumb-item active">Danh sách mã giảm giá</li>
@endsection
@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="row g-4 mb-3">
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end">
                <div class="search-box ms-2">
                    <input type="text" class="form-control search" placeholder="Search...">
                    <i class="ri-search-line search-icon"></i>
                </div>
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </div>

    <div class="">
        <div class="table-responsive mt-4 mt-xl-0">
            <table class="table table-striped table-nowrap align-middle mb-0">
                <thead>
                    <tr style="text-align: center">
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Coupon-Amount</th>
                        <th scope="col">Minimum-Spend</th>
                        <th scope="col">Maximum-Spend</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Start_Date</th>
                        <th scope="col">Expiration_Date</th>
                        <th scope="col">Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Description</th>
                        <th scope="col">Coupon_Category_ID</th>
                        <th scope="col">Coupon_Product_ID</th>
                        <th scope="col">Coupon_User_ID</th>
                        <th scope="col">Thao_Tác</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">
                    @foreach ($coupons as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->coupon_amount, 0, ',', '.') }} đ</td>
                            <td>{{ number_format($item->minimum_spend, 0, ',', '.') }} đ</td>
                            <td>{{ number_format($item->maximum_spend, 0, ',', '.') }} đ</td>

                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->start_date }}</td>
                            <td>{{ $item->expiration_date }}</td>
                            <td>
                                @switch($item->type)
                                    @case(0)
                                        Công khai
                                    @break

                                    @case(1)
                                        Riêng tư
                                    @break
                                @endswitch
                            </td>
                            <td>
                                @switch($item->status)
                                    @case(0)
                                        Phát hành
                                    @break
                                    @case(1)
                                        Chưa phát hành
                                    @break
                                    @case(2)
                                        Chờ phát hành
                                    @break
                                    @case(3)
                                        Hết Hạn
                                    @break
                                @endswitch
                            </td>
                            <td>{{ $item->description }}</td>
                            <td>
                                @foreach ($item->categories as $category)
                                    <span>{{ $category->id }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($item->products as $product)
                                    <span>{{ $product->id }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($item->users as $user)
                                    <span>{{ $user->id }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="hstack gap-3 flex-wrap">
                                    <!-- Link sửa mã giảm giá -->
                                    <a href="{{ route('admin.coupons.editCoupon', $item->id) }}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                    
                                    <!-- Form xóa mã giảm giá -->
                                    <form action="{{ route('admin.coupons.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="link-danger fs-15 border-0 bg-transparent" onclick="return confirm('Bạn có chắc chắn muốn xóa mã giảm giá này?')">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        {{ $coupons->links() }}
    </div>
@endsection
