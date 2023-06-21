@extends('admin.dashboardLayout')
@section('content')
<div class="content-wrapper">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
        </div>
        <form action="" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                        <label>Category name:</label>
                        <input type="text" name="name" class="form-control my-colorpicker1"  value="{{ $category->name }}">
                </div>
                <div class="form-group">
                        <label>Category description:</label>
                        <input type="text" name="description" class="form-control my-colorpicker1" value="{{ $category->description }}">
                    </div>
                    <div class="form-group">
                    <a class="btn btn-danger" href="{{route('category.list')}}">Back</a>
                    <input type="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
        <div class="form-group">
            @if($msg)
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> {{$msg ?? ''}}</h5>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection