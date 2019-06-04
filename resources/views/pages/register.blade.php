@extends('master')

@section('content')

<div class="row my-3">
    <div class="col-lg-6 app-main__sidebar mb-3">
        <div class="module-title-g mb-3">
            <h3><span>Đăng nhập</span></h3>
        </div>
        <form action="{{route('login')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="email_L" class="col-sm-3 col-form-label">Tài khoản</label>
                <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" id="email_L" placeholder="Email của bạn..." required>
                    <div class="invalid-feedback">Email này đã có người sử dụng.</div>
                </div>
            </div>
            <div class="form-group row">
                <label for="password_L" class="col-sm-3 col-form-label">Mật khẩu</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="password_L" placeholder="Mật khẩu..." minlength="8" maxlength="32" required>
                </div>
            </div>
            <div class="text-right">
                <button class="btn btn-primary">Đăng nhập</button>
            </div>          
        </form>
    </div>
    <div class="col-lg-6 app-main__content mb-3">
        <div class="module-title-p mb-3">
            <h3><span>Đăng ký</span></h3>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
        @elseif(session()->has('warning'))
        <div class="alert alert-warning" role="alert">
            {{ session()->get('warning') }}
        </div>
        @endif
        <form action="{{route('register.store')}}" method="POST">
            {{ csrf_field() }}
            <h5>Thông tin cá nhân</h5>
            <div class="form-group row offset-md-2">
                <label for="name" class="col-sm-3 col-form-label">Họ tên</label>
                <div class="col-sm-9">
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Họ tên của bạn..." required>
                </div>
            </div>
            <div class="form-group row offset-md-2">
                <label for="phone" class="col-sm-3 col-form-label">Điện thoại</label>
                <div class="col-sm-9">
                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="phone" placeholder="Điện thoại của bạn..." required>
                </div>
            </div>
            <h5>Thông tin tài khoản</h5>
            <div class="form-group row offset-md-2">
                <label for="email" class="col-sm-3 col-form-label">Tài khoản</label>
                <div class="col-sm-9">
                    <input type="email" name="email" value="{{old('email')}}" class="form-control {{$errors->has('email')? 'is-invalid' : ''}}" id="email" placeholder="Email của bạn..." required>
                    <div class="invalid-feedback">Email này đã có người sử dụng.</div>
                </div>
            </div>
            <div class="form-group row offset-md-2">
                <label for="password_R" class="col-sm-3 col-form-label">Mật khẩu</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control {{$errors->has('confirm_password')? 'is-invalid' : ''}}" id="password" placeholder="Mật khẩu..." minlength="8" maxlength="32" required>
                </div>
            </div>
            <div class="form-group row offset-md-2">
                <label for="confirm_password" class="col-sm-3 col-form-label">Xác nhận</label>
                <div class="col-sm-9">
                    <input type="password" name="confirm_password" class="form-control {{$errors->has('confirm_password')? 'is-invalid' : ''}}" id="confirm_password" placeholder="Xác nhận mật khẩu..." required>
                    <div class="invalid-feedback">Mật khẩu không trùng khớp.</div>
                </div>
            </div>  
            <div class="text-right">
                <button class="btn btn-primary">Đăng ký</button>
            </div>          
        </form>
    </div>
</div>

@endsection