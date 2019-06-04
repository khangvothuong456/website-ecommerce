@extends('pages.merchant.master')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb" class="my-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('merchant-channel')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('product-M.index')}}">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm 1 sản phẩm mới</li>
        </ol>
    </nav>

    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
    @elseif($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="{{route('product-M.store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Thông tin cơ bản</h5>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Tên sản phẩm...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_cate" class="col-sm-2 col-form-label">Loại sản phẩm</label>
                    <div class="col-sm-10">
                        <select name="id_cate" id="id_cate" class="form-control">
                            <option selected>----- Chọn loại sản phẩm -----</option>
                            @foreach($categories as $cate)
                            @if($cate->id_parent===0)
                            <option value="{{$cate->id}}" disabled>{{$cate->name}}</option>
                                @foreach($cate->child as $sub_cate)
                                <option value="{{$sub_cate->id}}" disabled> -> {{ $sub_cate->name}}</option>
                                    @foreach($sub_cate->child as $c)
                                    <option value="{{$c->id}}"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--> {{ $c->name}}</option>
                                    @endforeach
                                @endforeach
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Mô tả sản phẩm</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Mô tả sản phẩm..."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="color" class="col-sm-2 col-form-label">Màu sắc</label>
                    <div class="col-sm-10">
                        <input type="text" name="color" class="form-control" id="color" placeholder="Màu sắc sản phẩm...">
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="card-title">Thông tin bán hàng</h5>
                    <select name="pro_type" id="pro_type" class="px-1">
                        <option value="0" selected>Sản phẩm chỉ một kích cỡ</option>
                        <option value="1">Sản phẩm nhiều kích cỡ</option>
                    </select>
                </div>
                <div id="info_sell_by_pro_type">
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Giá</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" class="form-control" id="price" placeholder="Giá sản phẩm...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="qty" class="col-sm-2 col-form-label">Số lượng</label>
                        <div class="col-sm-10">
                            <input type="text" name="qty" class="form-control" id="qty" placeholder="Số lượng sản phẩm...">
                        </div>
                    </div>                
                </div>  
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Quản lý truyền thông</h5>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Hình ảnh sản phẩm</label>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="image_link">Ảnh đại diện</label>
                            <input type="file" name="image" class="form-control form-control-sm" id="image_link">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="image_list">Ảnh liên quan</label>
                            <input type="file" name="images[]" class="form-control form-control-sm" id="image_list" multiple>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-right mb-3">
            <button type="reset" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i> Hủy</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Lưu</button>
        </div>
    </form>
<div>

@endsection