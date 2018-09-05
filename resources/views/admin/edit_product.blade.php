@extends('admin.admin_layout')
@section('admin_content')


<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>


<form class="form-horizontal" action="{{url('/update_product',$data->product_id)}}"  method="post" enctype="multipart/form-data">
  {{csrf_field()}}


  <div class="form-group">
    <label for="product_name"> Product Name</label>

    <input class="form-control" type="text" name="product_name" id="product_name" value="{{ $data->product_name }}">
  </div>


  <div class="form-group">
    <label for="product_des"> Product Description</label>
    <div class="controls">
      <textarea class="form-control" name="product_des" id="product_des" rows="3">{{$data->product_des }}</textarea>
    </div>
  </div>

  
  <div class="form-group">
    <label for="product_price"> Product Price</label>
    <div class="controls">
      <input class="form-control" type="text" name="product_price" id="product_price" required="" value="{{$data->product_price}}">
    </div>
  </div>


  <div class="control-group">
   <div class="col col-md-3"><label for="product_size" class=" form-control-label"> Size </label></div>
   <div class="col-8 col-md-2"><input type="text" id="product_size" name="product_size" value="{{$data->product_size}}"  class="form-control">
    <span class="help-block"> (all sizes are optional fields)</span>
  </div> 
</div>

<div class="form-group">
  <div class="col col-md-3"><label for="product_size2" class=" form-control-label"> Size 2</label></div>
  <div class="col-8 col-md-2"><input type="text" id="product_size2" name="product_size2" value="{{$data->product_size2}}"  class="form-control">
  </div>
</div>

<div class="form-group">
  <div class="col col-md-3"><label for="product_size3" class=" form-control-label">Size 3</label></div>
  <div class="col-8 col-md-2"><input type="text" id="product_size3" name="product_size3" value="{{$data->product_size3}}"  class="form-control">

  </div>
</div>

<div class="form-group">
  <div class="col col-md-3"><label for="product_size4" class=" form-control-label"> Size 4</label></div>
  <div class="col-8 col-md-2"><input type="text" id="product_size4" name="product_size4" value="{{$data->product_size4}}"  class="form-control">

  </div>
</div>





<button type="submit" class="btn btn-primary">Submit</button>

</form>





@endsection