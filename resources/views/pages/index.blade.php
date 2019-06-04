@extends('master')

@section('content')

<div class="module-title-p">
    <h3><span>Sản phẩm gợi ý</span></h3>
    <div class="row my-3">
        @foreach($products as $p)
        <div class="col-lg-3 col-md-4 col-6">
            <div class="app-product-box">
                <div>
                    <img src="{{asset('uploads/products')}}/{{$p->image_link}}" alt="">
                    <a href="{{route('details_product',$p->name_url)}}" class="app-product-box__sell"><i class="fas fa-cart-plus"></i></a>
                </div>    
                <div>
                    <h2>{{$p->name}}</h2>
                    <p>
                        @if(count($p->pro_attr)<1)
                            <i>{{ number_format($p->price,0,'.','.')}}<sup>đ</sup></i>
                        @else
                            <?php $sum=0; ?>
                            @foreach($p->pro_attr as $p_a)
                                <?php $sum+=$p_a->price; ?>
                            @endforeach
                            <i>{{ number_format($sum/count($p->pro_attr),0,'.','.')}}<sup>đ</sup></i>
                        @endif                        
                    </p>
                </div>
            </div>
        </div>            
        @endforeach
    </div>
</div>

@endsection