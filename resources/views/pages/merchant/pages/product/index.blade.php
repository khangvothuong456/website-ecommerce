@extends('pages.merchant.master')

@section('content')

<div class="container py-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('merchant-channel')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('product-M.index')}}">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tất cả</li>
        </ol>
    </nav>

    <div class="text-right my-3">
        <a href="{{route('product-M.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm 1 sản phẩm mới</a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Hình</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Loại sản phẩm</th>
                <th scope="col" class="text-center">Giá</th>
                <th scope="col" class="text-center">Tồn</th>
                <th scope="col" class="text-center">Duyệt</th>
                <th scope="col" class="text-center">Cập nhật</th>
            </tr>
        </thead>
        <tbody>
            @if(count($products)>0)
                @foreach($products as $p)
                <tr>
                    <th scope="row">{{$p->id}}</th>
                    <td><img src="{{asset('uploads/products')}}/{{$p->image_link}}" alt="" width="80"></td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->name}}</td>
                    <td class="text-center">{{$p->price}}</td>
                    <td class="text-center">{{$p->qty}}</td>
                    <td class="text-center"><span class="{{$p->status==0?'text-danger':'text-success'}}">{{$p->status==0?'Chờ duyệt':'Đã duyệt'}}</span></td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection