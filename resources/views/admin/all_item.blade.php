@extends('admin.admin_layout')
@section('admin_content')

<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tables</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
          <div class="card-body">
          	<div class="table-responsive">
          		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          			<thead>
          				<tr>
          					<th>ID</th>
                    <th>Name</th>
          					<th>Category</th>
          					<th>Description</th>
          					<th>Status</th>
          					<th>Action</th>
          					
          				</tr>
          			</thead>

          			<tbody>
          				<script>
          					var msg = '{{Session::get('alert')}}';
          					var exist = '{{Session::has('alert')}}';
          					if(exist){
          						alert(msg);
          					}
          				</script>
          				@foreach($data as $row)
          				<tr>
          					<td>{{$row->item_id}}</td>
                    <td>{{$row->item_name}}</td>
          					<td>{{$row->category_name}}</td>
          					<td>{{$row->item_des}}</td>
          					<td>
          					@if ($row->activation_status==1)
							<span class="label label-success">Active</span>
						
							@else($row->activation_status==0)
							<span class="label label-warning">Inactive</span>
							@endif
							</td>
          					
          					<td>
          					@if ($row->activation_status==1)
									<a class="btn btn-warning" href="{{ URL::to('/inactive_item/'.$row->item_id) }}">
										<i class="fa fa-thumbs-down"></i>
									</a>
									@else($row->activation_status==0)
									<a class="btn btn-success" href="{{ URL::to('/active_item/'.$row->item_id) }}">
										<i class="fa fa-thumbs-up"></i>	
									</a>
									@endif


									<a class="btn btn-info" href="{{ URL::to('/edit_item/'.$row->item_id) }}">
										<i class="fa fa-edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{ URL::to('/delete_item/'.$row->item_id) }}">
										<i class="fa fa-trash"></i> 
									</a>
          					</td>
          				</tr>
          				@endforeach
          				
          			</tbody>
          		</table>
          	</div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>

          @endsection