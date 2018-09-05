@extends('layout')
@section('content')
@include('navbar')

				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						
					
						<div class="single-blog-post">
							<h3>{{ $data->title }}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> 
										{{ $data->blogger_name}}</li>
									
									<li><i class="fa fa-calendar"></i> {{date('M d, Y h:ia',strtotime($data->created_at))}}</li>
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="{{asset('blog_image/'.$data->blog_img)}}" alt="">
							</a>
							<p>
							{{ $data->body}}
							</p> <br>

						</div>
					</div><!--/blog-post-area-->
					


	@endsection('content')
	
	