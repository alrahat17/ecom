@extends('admin.admin_layout')
@section('admin_content')

<form class="form-horizontal" action="{{url('/update_item',$data->item_id)}}" method="post">
          {{ csrf_field()}}
          

         

          <div class="form-group">
            <label for="item_name">Item Name</label>
            <input class="form-control" name="item_name" id="item_name" type="text" value="{{ $data->item_name }}">
          </div>
          <div class="form-group">
            <label for="item_des">Item Description</label>
            <input class="form-control" name="item_des" id="item_des" type="text" value="{{$data->item_des }}" >
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button> 
        </form>


@endsection