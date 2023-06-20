@extends('admin.dashboardLayout')
@section('content')
<div class="content-wrapper">
<div class="card">
    <!-- .card-header -->
    <div class="card-header bg-gradient-blue">
      <h3 class="card-title">Categories List
      </h3>
      <a class="bg-gradient-blue" style="float: right;
      color: #fff;" href="{{route('category.create')}}">Create</a>
    </div>
    <!-- /.card-header -->

    <!-- .card-body -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Status</th>
          <th>Created</th>
          <th colspan="2">Action</th>
        </tr>
        </thead>

        <tbody>
          @foreach ($categories as $category)
          <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>{{$category->active}}</td>
            <td>{{$category->created_at}}</td>
            <td><a class="btn btn-primary"  href="{{route('category.edit', ['id'=>$category->id])}}">Update</a></td>
            <td><a class="btn btn-danger" onclick="return confirm('Do you want to delete this?')" href="{{route('category.delete', ['id'=>$category->id])}}">Delete</a></td>
          </tr>
          @endforeach
        </tbody>

        {{-- <tfoot>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Status</th>
          <th>Created</th>
        </tr>
        </tfoot> --}}
      </table>
    </div>
    <!-- /.card-body -->
    
   <div>
    @switch($msg)
      @case('Updated!')
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> {{$msg ?? ''}}</h5>
      </div>
        @break
      @case('Deleted!')
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> {{$msg ?? ''}}</h5>
      </div>
        @break
      @case('Not found a category!')
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> {{$msg ?? ''}}</h5>
      </div>
      @default
    @endswitch
   </div>
    
  </div>
  </div>
  @endsection