<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    // trang chính
    function index()
    {
        $products = Product::all();//inRandomOrder()->where('status','=','1')->take(12)->get(); // chỉ hiện sản phẩm đã duyệt lên (chọn ngẫu nhiên)
        return view('pages.index',compact('products'));
    }
    
    // tìm kiếm 
    function search()
    {
        return redirect()->route('home');
    }

    // xem chi tiêt sản phẩm
    function detailsProduct($name_url)
    {
        $product = Product::where('name_url','=',$name_url)->first();
        return view('pages.details_product',compact('product'));
    }
    
    // xem giỏ hàng
    function getCart()
    {
        return view('pages.cart');
    }

    // thanh toán
    function getCheckout()
    {
        return view('pages.checkout');
    }
    function postCheckout(){}
 
}
