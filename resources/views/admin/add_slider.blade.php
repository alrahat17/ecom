@extends('admin.admin_layout')
@section('admin_content')


			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider</h2>
					</div>
					
					<script>
						var msg = '{{Session::get('alert')}}';
						var exist = '{{Session::has('alert')}}';
						if(exist){
							alert(msg);
						}
					</script>
			
					


						
							
						
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/save_slider')}}"  method="post">
							{{csrf_field()}}
						  <fieldset>
							
							<div class="control-group">
								<label class="control-label" for="slider_image">	Slider Image</label>
								<div class="controls">
								  <input type="file" name="slider_image" id="slider_image">
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

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection
