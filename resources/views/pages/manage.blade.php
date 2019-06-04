@extends('master')

@section('content')

<div class="row my-3">
    <div class="col-md-3 app-main__sidebar mb-3">
        <div class="module-title-p mb-3">
            <h3><span>Quản lý</span></h3>
            <div class="list-group" >
                <a href="{{route('manage')}}" class="list-group-item list-group-item-action" style="border-top-left-radius:0;border-top-right-radius:0">Sản phẩm</a>
                <a href="#" class="list-group-item list-group-item-action">Đơn hàng</a>
            </div>
        </div>
    </div>
    <div class="col-md-9 app-main__content mb-3">
        @yield('app-main__content')
    </div>
</div>



@endsection