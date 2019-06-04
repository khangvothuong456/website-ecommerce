<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\SlideShow;

class SlideShowController extends Controller
{
    function store(Request $req)
    {
        if($req->hasFile('img_list'))
        {
            $img_list = $req->img_list;
            $file_extension = ['jpg','png'];
            $flag_save = true;
            foreach($img_list as $img)
            {
                $extension = $img->getClientOriginalExtension();
                $check = in_array($extension,$file_extension);
                if(!$check)
                {
                    $flag_save = false;
                    break;
                }
            }

            if($flag_save===true)
            {
                $ss = new SlideShow;
                foreach($req->img_list as $img) 
                {
                    $new_name_img = Str::random(4).'_'.time().'.'.$img->getClientOriginalExtension();
                    $data_img_list[] = $new_name_img;
                    $img->move('uploads/slideshow/',$new_name_img);                
                }
                $ss->img_list = implode(',',$data_img_list);
                $ss->save();
                return redirect()->back()->with('success','Thêm ảnh Slide-show thành công!');
            }
            else
                return redirect()->back()->with('error','Thêm ảnh Slide-show thất bại!');
        }
    }
}
