@extends('clients.layouts.master')
@section('title', 'Fruitables - Sản phẩm')

@section('content')

    {{-- Link --}}
@section('title_page', 'Sản phẩm')
@section('title_page_home', 'Trang chủ')
@section('title_page_active', 'Sản phẩm')


<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        @include('clients.shops.side-bar')


        @include('clients.shops.product')
    </div>
</div>
</div>
</div>
</div>
<!-- Fruits Shop End-->
@include('clients.shops.action')
@endsection
