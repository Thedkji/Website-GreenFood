<div id="billing-form" class="mb-10">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form id="edit-info-form" action="{{ route('client.information.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-12 col-12 mb-5">
                <label>Họ và tên*</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Họ và tên">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 col-12 mb-5">
                <label>Email Address*</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 col-12 mb-5">
                <label>Phone no*</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Số điện thoại">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 mb-5">
                <label>Address*</label>
                <input type="text" name="address" value="{{ old('address', $user->address) }}" placeholder="Nhập địa chỉ">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 mb-5">
                <button type="submit" class="btn btn-lg btn-round">Cập nhật</button>
            </div>
        </div>
    </form>
</div>
