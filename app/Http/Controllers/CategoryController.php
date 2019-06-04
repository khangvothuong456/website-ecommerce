<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return view('admin.pages.category.index',compact('categories'));
    }

    function store(Request $req)
    {
        $this->validate($req,[
            'name' => 'min:2|max:32',
            'name_url' => 'min:2|max:32|unique:categories',
        ],[
            'name.min' => 'Tên danh mục phải có ít nhất 2 ký tự',
            'name.max' => 'Tên danh mục có nhiều nhất 32 ký tự',
            'name_url.min' => 'Tên đường dẫn danh mục phải có ít nhất 2 ký tự',
            'name_url.max' => 'Tên đường dẫn danh mục có nhiều nhất 32 ký tự',
            'name_url.unique' => 'Tên đường dẫn danh mục này đã tồn tại.',
        ]);

        $cate = new Category;
        $cate->id_parent = $req->id_parent;    
        $cate->name = $req->name;    
        $cate->name_url = $req->name_url;    
        $cate->order = $req->order;   
        $cate->status = $req->status;
        $cate->save();

        return redirect()->route('category')->with('success','Thêm danh mục thành công');
    }

    function edit($id)
    {
        $cate = Category::findOrFail($id);
        return view('admin.pages.category.update',compact($cate));
    }

    function update(Request $req, $id)
    {

    }

    function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('sucess','Xóa danh mục thành công');
    }
}
