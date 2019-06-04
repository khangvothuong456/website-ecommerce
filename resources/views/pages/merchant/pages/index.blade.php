@extends('pages.merchant.master')

@section('content')

<nav class="my-5">
    <div class="container text-center">
        <h1 class="mb-5">Chào mừng đến với Alumbale - Kênh người bán</h1>
        <div class="d-flex justify-content-center">
            <div style="display:inline-block">
                <a href="{{route('product-M.index')}}"><i class="fas fa-gift" style="width:120px;height:120px;border-radius:50%;background:var(--primary);text-align:center;line-height:120px;color:#f2f2f2;font-size:44px"></i></a>
                <h2 style="font-size:24px;text-align:center;margin-top:15px">Sản phẩm</h2>
            </div>
            <div style="display:inline-block;margin:0 75px">
                <a href="{{route('manage-bill-M')}}"><i class="fas fa-dollar-sign" style="width:120px;height:120px;border-radius:50%;background:var(--success);text-align:center;line-height:120px;color:#f2f2f2;font-size:44px"></i></a>
                <h2 style="font-size:24px;text-align:center;margin-top:15px">Đơn hàng</h2>
            </div>
            <div style="display:inline-block">
                <a href="{{route('manage-wallet-M')}}"><i class="fas fa-wallet" style="width:120px;height:120px;border-radius:50%;background:var(--warning);text-align:center;line-height:120px;color:#f2f2f2;font-size:44px"></i></a>
                <h2 style="font-size:24px;text-align:center;margin-top:15px">Ví Alumbale</h2>
            </div>
        </div>            
    </div>
</nav>

@endsection