@extends('admin.admin_layout')
@section('admin_content')

<form class="form-horizontal" action="{{URL::to('/save_item') }}" method="post">
          {{ csrf_field()}}
          

          <div class="form-group">
            <label for="Category_name">Category</label>
            <div class="controls">
              <select class="form-control" name="category_id">
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
            <label for="item_name">Item Name</label>
            <input class="form-control" name="item_name" id="item_name" type="text" placeholder="Enter Item Name">
          </div>
          <div class="form-group">
            <label for="item_des">Item Description</label>
            <input class="form-control" name="item_des" id="item_des" type="text" placeholder="Enter Item Description">
          </div>
          <div class="form-group">
            <label for="item_des">Activation Status</label><br>
            <input type="radio" name="activation_status" id="activation_status" value="1">Active<br>
            <input type="radio" name="activation_status" id="activation_status" value="0">Inactive<br>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button> 
        </form>


@endsection