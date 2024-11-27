@extends('clients.layouts.master')
@section('title', 'Fruitables - Sản phẩm')

{{-- Link --}}
@php
    $nameCate = \app\Models\Category::where('id', request()->category_id)->first();
@endphp

@if (request()->has('category_id'))
    @section('title_page', $nameCate->name)
    @section('title_page_home', 'Trang chủ')
    @section('title_page_active', 'Danh mục')
@else
    @section('title_page', 'Sản phẩm')
    @section('title_page_home', 'Trang chủ')
    @section('title_page_active', 'Sản phẩm')
@endif

@section('content')

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
