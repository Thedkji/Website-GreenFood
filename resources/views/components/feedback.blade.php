{{-- feedback.blade.php --}}
@props(['name'])

@if ($errors->has($name))
<div class="text-danger">
    <ul>
        @foreach ($errors->get($name) as $error)
        <p>{{ $error }}</p>
        @endforeach
    </ul>
</div>
@elseif (old($name) !== null && old($name) !== '')
<p class="text-success">Đủ điều kiện</p>
@endif