@extends('admin.admin_layout')
@section('admin_content')

<form class="form-horizontal" action="{{URL::to('/save_blog') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field()}}
          <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" name="title" id="title" type="text" placeholder="Enter Title">
          </div>
          <div class="form-group">
    <label for="body"> Body</label>
    <div class="controls">
      <textarea class="form-control" name="body" id="body" rows="3" required=""></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="blog_img"> Image</label>
    <div class="controls">
      <input type="file" name="blog_img" id="blog_img">
    </div>
  </div>

  <div class="form-group">
            <label for="blogger_name">Blogger Name</label>
            <input class="form-control" name="blogger_name" id="blogger_name" type="text" placeholder="Enter Blogger Name">
          </div>
          <div class="form-group">
            <label for="activation_status">Activation Status</label><br>
            <input type="radio" name="activation_status" id="activation_status" value="1">Active<br>
            <input type="radio" name="activation_status" id="activation_status" value="0">Inactive<br>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button> 
        </form>


@endsection