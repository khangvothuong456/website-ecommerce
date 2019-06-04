@extends('admin.master')

@section('content')

<div class="container">
    <div class="app-main__title">
        <div>
            <h4 class="my-3"><i class="far fa-images mr-2"></i>  Slide-show</h4>
            <span class="text-info">- Danh sách</span>
        </div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#insertSlideShowModal"><i class="fas fa-plus"></i></button>         
    </div>
    <div class="app-main__content">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
        </div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{session()->get('error')}}
        </div>
        @endif
        <table class="table table-hover text-center" id="tbodyCate">
            <thead>
                <tr>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>   
    </div> 
</div>

<div class="modal fade" id="insertSlideShowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary"><i class="fa fa-plus"></i> Thêm slide-show</h5>
                <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('slideShow.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="img_list">Hình ảnh <span class="text-danger">*</span></label>
                        <input type="file" name="img_list[]" class="form-control form-control-sm" id="img_list" multiple required>
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