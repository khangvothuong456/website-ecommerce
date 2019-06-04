@extends('master')

@section('content')

<div class="module-title-p mb-3">
    <h3><span>Thông tin sản phẩm</span></h3>
    <div class="app-details-pro">
        <div class="text-center">
            <h2 class="name-pro text-center mt-3">{{$product->name}}</h2>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <img src="{{asset('uploads/products')}}/{{$product->image_link}}" alt="" style="width:100%;border-radius:4px;border:1px solid #ddd;padding:5px">
                <?php $list_img = explode(',',$product->image_list); ?>
                <div class="row">
                    @foreach($list_img as $img)
                    <div class="col-4 my-3">
                        <img src="{{asset('uploads/products')}}/{{$img}}" alt="" style="width:100%;border-radius:4px;border:1px solid #ddd;padding:5px;cursor:pointer">
                    </div>    
                    @endforeach
                </div>
            </div>
            <div class="col-sm-8">
                <form action="" method="POST">
                    <hr>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Màu sắc: </label>
                            <div class="col-sm-9">
                                <p id="price_pro" style="margin:0;margin-top:5px;font-size:18px">
                                    {{$product->color}}
                                </p>
                            </div>
                        </div>
                    <hr>
                    <div class="form-group row">
                        <label for="id_pro_attr" class="col-sm-3 col-form-label">Kích cỡ: </label>
                        <div class="col-sm-9">
                            <select id="id_pro_attr" class="form-control" required>
                                <option value="" selected disabled>----- Chọn kích cỡ -----</option>
                                @if(count($product->pro_attr)!=0)
                                    @foreach($product->pro_attr as $p_a)
                                    <option value="{{$p_a->id}}">{{$p_a->size}}</option>
                                    @endforeach
                                @else
                                    <option value="0" selected>Chỉ có 1 size duy nhất</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <hr>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Giá: </label>
                            <div class="col-sm-9">
                                <p id="price_pro" style="margin:0;margin-top:5px;color:#f00;font-size:18px;font-weight:bold">
                                    @if(count($product->pro_attr)==0)
                                        {{$product->price}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    <hr>
                    <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Tồn kho: </label>
                            <div class="col-sm-9">
                                <p id="qty_pro" style="margin:0;margin-top:5px;font-size:18px">
                                    @if(count($product->pro_attr)==0)
                                        {{$product->qty}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    <hr>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Số lượng mua: </label>
                            <div class="col-sm-9">
                                @if(count($product->pro_attr)==0)
                                    <input type="number" class="form-control" id="qty_buy" min="0" max="{{$product->qty}}" placeholder="0">
                                @else
                                   <input type="number" class="form-control" id="qty_buy" min="0" placeholder="0">
                                @endif
                            </div>
                        </div>
                    <hr>
                    <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Mô tả: </label>
                            <div class="col-sm-9">
                                <p style="margin:0;margin-top:5px;color:#444;font-size:18px">
                                    {{$product->description}}
                                </p>                                
                            </div>
                        </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-info"><i class="fas fa-arrow-left mr-1"></i> Tiếp tục mua sắm</button>
                        <button class="btn btn-primary"><i class="fas fa-cart-plus mr-1"></i> Mua ngay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection