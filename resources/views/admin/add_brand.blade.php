@extends('admin.admin_layout')
@section('admin_content')

<form class="form-horizontal" action="{{URL::to('/save_brand') }}" method="post">
          {{ csrf_field()}}
          <div class="form-group">
            <label for="brand_name">Brand Name</label>
            <input class="form-control" name="brand_name" id="brand_name" type="text" placeholder="Enter Category Name">
          </div>
          <div class="form-group">
            <label for="brand_des">Brand Description</label>
            <input class="form-control" name="brand_des" id="brand_des" type="text" placeholder="Enter Category Description">
          </div>
          <div class="form-group">
            <label for="brand_des">Activation Status</label><br>
            <input type="radio" name="activation_status" id="activation_status" value="1">Active<br>
            <input type="radio" name="activation_status" id="activation_status" value="0">Inactive<br>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button> 
        </form>


@endsection