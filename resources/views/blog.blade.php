@extends('layout')
@section('content')
@include('navbar')

	<section>
	
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						@foreach ($data as $row)
							
						<div class="single-blog-post">
							<h3>{{ $row->title}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> {{ $row->blogger_name }}</li>
									<li><i class="fa fa-calendar"></i> {{date('M d, Y h:ia',strtotime($row->created_at))}}</li>
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
								<img src="{{asset('blog_image/'.$row->blog_img)}}" alt="">
							</a>
							<p>{{ substr($row->body,0,250)}}{{ "......" }}</p>
							<a  class="btn btn-primary" href="blog_details/{{$row->blog_id}}">Read More</a>
						</div>
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br>


	@endsection('content')
	
	