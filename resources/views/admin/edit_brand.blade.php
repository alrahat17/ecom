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
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit brand</h2>
		</div>








		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="{{url('/update_brand',$data->brand_id)}}"  method="post">
			{{csrf_field()}}
			<fieldset>

				<div class="control-group">
					<label class="control-label" for="brand_name">Brand Name</label>
					<div class="controls">
						<input type="text" name="brand_name" id="brand_name" value="{{ $data->brand_name }}">
					</div>
				</div>


				<div class="control-group">
					<label class="control-label hidden-phone" for="brand_des">brand Description</label>
					<div class="controls">
						<textarea name="brand_des" id="brand_des" rows="4" >{{$data->brand_des}}</textarea>
					</div>
				</div>




				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Update</button>
					<button type="reset" class="btn">Cancel</button>
				</div>
			</fieldset>
		</form>   

	</div>
</div><!--/span-->

</div><!--/row-->


@endsection

