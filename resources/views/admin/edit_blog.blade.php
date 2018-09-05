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
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit blog</h2>
		</div>








		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="{{url('/update_blog',$data->blog_id)}}"  method="post">
			{{csrf_field()}}
			<fieldset>

				<div class="form-group">
					<label for="title">Title</label>
					<input class="form-control" name="title" id="title" type="text" value="{{ $data->title }}">
				</div>
				<div class="form-group">
					<label for="body"> Body</label>
					<div class="controls">
						<textarea class="form-control" name="body" id="body" rows="3" required="">{{$data->body }}</textarea>
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
					<input class="form-control" name="blogger_name" id="blogger_name" type="text" value="{{$data->blogger_name}}">
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

