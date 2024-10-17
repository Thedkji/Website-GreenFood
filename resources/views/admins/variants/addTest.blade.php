@extends('admins.layouts.master')

@section('title', 'Variant | Thêm mới biến thể con')

@section('start-page-title' , 'Thêm mới biến thể con')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<form action="{{route('admin.variants.create_test')}}" method="post">
    @csrf
    @method('POST')
    <div class="mb-3">
        <label for="">Name</label>
        <input type="text" name="name" id="" value="{{old('name')}}">
    </div>
    <div class="mb-3">
        <label for="">Price</label>
        <input type="text" name="price" id="" value="{{old('price')}}">
    </div>
    <div class="mb-3">
        <label for="">Tag</label>
        <input type="text" name="tag" id="" value="{{old('tag')}}">
    </div>
    <button type="submit">Thêm</button>
</form>

@endsection