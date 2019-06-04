@extends('admin.master')

@section('content')

<div class="container">
    <div class="app-main__title">
        <div>
            <h4 class="my-3"><i class="fas fa-list mr-2"></i> Danh mục</h4>
            <span class="text-info">- Danh sách</span>
        </div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#insertCateModal"><i class="fas fa-plus"></i></button>         
    </div>
    <div class="app-main__content">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
        </div>
        @elseif($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <table class="table table-hover text-center" id="tbodyCate">
            <thead>
                <tr>
                    <th scope="col">Tên</th>
                    <th scope="col">Danh mục cha</th>
                    <th scope="col">Đường dẫn</th>
                    <th scope="col">Vị trí</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cate)
                <tr>
                    <td>{{$cate->name}}</td>
                    <td>
                        @if($cate->id_parent===0)
                            {{''}}
                        @endif
                    </td>
                    <td>{{$cate->name_url}}</td>
                    <td>{{$cate->order}}</td>
                    <td>
                        <a href="{{route('category.edit',$cate->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="{{route('category.destroy',$cate->id)}}" class="btn btn-sm btn-danger" onclick="return confirm(`Bạn muốn xóa danh mục này?`)"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>   
    </div> 
</div>

<div class="modal fade" id="insertCateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary"><i class="fa fa-plus"></i> Thêm danh mục</h5>
                <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('category.store')}}" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="name">Tên danh mục <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-sm" id="name" placeholder="Tên của danh mục..." required>
                            <small class="form-text invalid-alert text-danger"></small>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="id_parent">Danh mục cha <span class="text-danger">*</span></label>
                            <select name="id_parent" class="form-control form-control-sm" id="id_parent" required>
                                <option value="">----- Lựa chọn -----</option>
                                <option value="0">Không có</option>
                                @foreach($categories as $cate)
                                    @if(count($cate->child)>0)
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                        @foreach($cate->child as $c)
                                            <option value="{{$c->id}}">-- {{$c->name}}</option>
                                        @endforeach
                                    @elseif($cate->id_parent==0)
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>                    
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="name_url">Tên đường dẫn <span class="text-danger">*</span></label>
                            <input type="text" name="name_url" class="form-control form-control-sm" id="name_url" placeholder="Tên của danh mục..." required>
                            <small class="form-text invalid-alert text-danger"></small>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="order">Vị trí <span class="text-danger">*</span></label>
                            <input type="text" name="order" class="form-control form-control-sm" id="order" placeholder="Vị trí hiển thị ở giao diện..." required>
                        </div>
                    </div>  
                    <div class="form-group text-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_0" value="0">
                            <label class="form-check-label" for="status_0">Không hiện thị</label>
                        </div>                  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_1" value="1" checked>
                            <label class="form-check-label" for="status_1">Hiện thị</label>
                        </div> 
                    </div>                 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection('content')