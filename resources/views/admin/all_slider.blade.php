@extends('admin.admin_layout')
@section('admin_content')

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Sliders</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  
								  <th>Slider ID</th>
								  <th>Image</th>
								  <th>Status</th>
								  <th>Actions</th>
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
								
								<td>{{$row->slider_id}}</td>
								
								
								<td class=""><img style="height:300px;" src="{{asset('image/'.$row->slider_image)}}" /></td>
								
							
							<td>	
							@if ($row->activation_status==1)
							<span class="label label-success">Active</span>
						
							@else($row->activation_status==0)
							<span class="label label-warning">Inactive</span>
							@endif
							</td>

								
								
								<td class="center">
									@if ($row->activation_status==1)
									<a class="btn btn-warning" href="{{ URL::to('/inactive_slider/'.$row->slider_id) }}">
										<i class="halflings-icon white thumbs-down"></i>
									</a>
									@else($row->activation_status==0)
									<a class="btn btn-success" href="{{ URL::to('/active_slider/'.$row->slider_id) }}">
										<i class="halflings-icon white thumbs-up"></i>	
									</a>
									@endif

									
									


									<a class="btn btn-info" href="{{ URL::to('/edit_slider/'.$row->slider_id) }}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{ URL::to('/delete_slider/'.$row->slider_id) }}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
						  



						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection