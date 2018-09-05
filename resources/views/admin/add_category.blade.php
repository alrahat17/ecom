@extends('admin.admin_layout')
@section('admin_content')

<form class="form-horizontal" action="{{URL::to('/save_category') }}" method="post">
          {{ csrf_field()}}
          <div class="form-group">
            <label for="category_name">Category Name</label>
            <input class="form-control" name="category_name" id="category_name" type="text" placeholder="Enter Category Name">
          </div>
          <div class="form-group">
            <label for="category_des">Category Description</label>
            <input class="form-control" name="category_des" id="category_des" type="text" placeholder="Enter Category Description">
          </div>
          <div class="form-group">
            <label for="category_des">Activation Status</label><br>
            <input type="radio" name="activation_status" id="activation_status" value="1">Active<br>
            <input type="radio" name="activation_status" id="activation_status" value="0">Inactive<br>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button> 
        </form>


@endsection