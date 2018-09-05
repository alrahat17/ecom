@extends('admin.admin_layout')
@section('admin_content')


<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>


<form class="form-horizontal" action="{{url('/save_product')}}"  method="post" enctype="multipart/form-data">
  {{csrf_field()}}


  <div class="form-group">
    <label for="product_name"> Product Name</label>

    <input class="form-control" type="text" name="product_name" id="product_name" required="">
  </div>


  <div class="form-group">
    <label for="category_id"> Category</label>
    <div class="controls">
      <select class="form-control" id="category_id" name="category_id">
        <?php 
        $cat_select=DB::table('tbl_category')
        ->where('activation_status',1)  
        ->get();

        foreach ($cat_select as $category)
        {
          ?>

          <option value="{{$category->category_id}}">{{$category->category_name}}</option>  

          <?php
        }

        ?>

      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="category_id"> Item</label>
    <div class="controls">
      <select class="form-control" id="item_id" name="item_id">
        <?php 
        $item_select=DB::table('tbl_item')
        ->where('activation_status',1)  
        ->get();

        foreach ($item_select as $item)
        {
          ?>

          <option value="{{$item->item_id}}">{{$item->item_name}}</option>  

          <?php
        }

        ?>

      </select>
    </div>
  </div>
  <div class="form-group">
    <label  for="brand_id"> Brand</label>
    <div class="controls">
      <select class="form-control" id="brand_id" name="brand_id">
        <?php 
        $brand_select=DB::table('tbl_brand')
        ->where('activation_status',1)  
        ->get();

        foreach ($brand_select as $brand)
        {
          ?>

          <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>  

          <?php
        }

        ?>

      </select>
    </div>
  </div>


  <div class="form-group">
    <label for="product_des"> Product Description</label>
    <div class="controls">
      <textarea class="form-control" name="product_des" id="product_des" rows="3" required=""></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="product_img"> Product Image</label>
    <div class="controls">
      <input type="file" name="product_img" id="product_img">
    </div>
  </div>

  <div class="form-group">
    <label for="product_price"> Product Price</label>
    <div class="controls">
      <input class="form-control" type="text" name="product_price" id="product_price" required="">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="activation_status">Activation Status</label>
    <div class="controls">
      <label class="radio">
        <input type="radio" name="activation_status" id="activation_status1" value="1" checked=""> Active<br>
      </label>
      <label class="radio">
        <input type="radio" name="activation_status" id="activation_status2" value="0"> Inactive
      </label>
    </div>
  </div>

  <div class="control-group">
   <div class="col col-md-3"><label for="product_size" class=" form-control-label"> Size </label></div>
   <div class="col-8 col-md-2"><input type="text" id="product_size" name="product_size" placeholder="Enter product Size" class="form-control">
    <span class="help-block"> (all sizes are optional fields)</span>
  </div> 
</div>

<div class="form-group">
  <div class="col col-md-3"><label for="product_size2" class=" form-control-label"> Size 2</label></div>
  <div class="col-8 col-md-2"><input type="text" id="product_size2" name="product_size2" placeholder="Enter product Size" class="form-control">
  </div>
</div>

<div class="form-group">
  <div class="col col-md-3"><label for="product_size3" class=" form-control-label">Size 3</label></div>
  <div class="col-8 col-md-2"><input type="text" id="product_size3" name="product_size3" placeholder="Enter product Size" class="form-control">

  </div>
</div>

<div class="form-group">
  <div class="col col-md-3"><label for="product_size4" class=" form-control-label"> Size 4</label></div>
  <div class="col-8 col-md-2"><input type="text" id="product_size4" name="product_size4" placeholder="Enter product Size" class="form-control">

  </div>
</div>





<button type="submit" class="btn btn-primary">Submit</button>

</form>





@endsection