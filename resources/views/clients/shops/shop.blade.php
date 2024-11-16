@extends('clients.layouts.master')

@section('title', 'Fruitables - Sản phẩm')

@section('content')
    @include('clients.layouts.components.singer-page')




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
