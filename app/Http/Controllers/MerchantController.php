<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Product;
use App\Pro_Attr;
use Image;

class MerchantController extends Controller
{
    function merchantChannel()
    {
        return view('pages.merchant.pages.index');
    }   

    // quản lý sản phẩm
    function getProductManagementM()
    {
        $products = Product::orderBy('id','DESC')->where('id_user','=',Auth::user()->id)->get();
        return view('pages.merchant.pages.product.index',compact('products'));
    }
    function getInsertProductM() // qua trang thêm sản phẩm
    {
        return view('pages.merchant.pages.product.insert');
    }
    function postInsertProductM(Request $req) // thêm sản phẩm
    {
        $pro = new Product;
        $pro->name = $req->name;
        $pro->name_url = str_slug($req->name);
        $pro->id_user = Auth::user()->id;
        $pro->id_cate = $req->id_cate;
        $pro->description = $req->description;
        $pro->color = $req->color;

        if($req->pro_type == 0)
        {
            $pro->price = $req->price;
            $pro->qty = $req->qty;
        }
        else
        {
            $pro->price = 0;
            $pro->qty = 0;
        }

        $image_link = $req->image;
        $pro->image_link = Str::random(4).'_'.time().'.'.$image_link->getClientOriginalExtension();
        $image_link->move('uploads/products/',$pro->image_link);
        
        if(is_array($req->images) && !empty($req->images))
        {
            foreach($req->images as $img)
            {
                $pro->image_list = Str::random(4).'_'.time().'.'.$img->getClientOriginalExtension();
                $img->move('uploads/products/',$pro->image_list);
                $data[] = $pro->image_list;
            }
            $pro->image_list = implode(',',$data);
        }
        
        $pro->status = 0; // sản phẩm phải chờ duyệt từ webmaster
        $pro->save();

        if($req->pro_type == 1)
        {
            foreach($req->size as $k => $v)
            {
                $p_a = new Pro_Attr;
                $p_a->id_pro = $pro->id;
                $p_a->size = $req->size[$k];
                $p_a->price = $req->price[$k];
                $p_a->qty = $req->qty[$k];  
                $p_a->save();              
            }
        }

        return redirect()->route('product-M.create')->with('success','Thêm sản phẩm mới thành công!');
    }

    function getUpdateProductM() // qua trang cập nhật sản phẩm
    {}
    function postUpdateProductM() // cập nhật sản phẩm (không được cập nhật số lượng)
    {}

    // quản lý hóa đơn
    function getBillManagementM(){}

    // quản lý tài khoản
    function getWalletManagementM(){}
}
