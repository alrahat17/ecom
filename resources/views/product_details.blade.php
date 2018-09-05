@extends('layout')
@section('content')
@include('navbar')


<div class="col-sm-9 padding-right">
	<div class="product-details"><!--product-details-->
		<div class="col-sm-5">
			<div class="view-product">
				<img src="{{asset('image/'.$data->product_img)}}" alt="" />
				<!--<h3>ZOOM</h3>-->
			</div>





		</div>
		<div class="col-sm-7">
			<div class="product-information"><!--/product-information-->
				<img src="images/product-details/new.jpg" class="newarrival" alt="" />
				<h2>{{$data->product_name  }}</h2>
				
				<img src="images/product-details/rating.png" alt="" />
				<span>
					<span>৳{{$data->product_price}}</span>

					<form action="{{URL::to('/add_to_cart')}}" method="post">
						{{ csrf_field() }}
						
						<label>Quantity:</label>
						<input type="text" name="qty" id="qty" value="1" required="required" />

						<br><br>
						
						<label>Size:</label>	
						<div class="flex-m flex-w p-b-10">
							
							<select class="custom-select" name="select_product_size" id="select_product_size">
								{{-- <option selected>Select Size</option> --}}
								<label>Select Size</label>
								<option>{{ $data->product_size }}</option>
								<option>{{ $data->product_size2 }}</option>
								<option>{{ $data->product_size3 }}</option>
								<option>{{ $data->product_size4 }}</option>
							</select>
						</div>

						<br>

						
						


						<input type="hidden" name="product_id" value="{{ $data->product_id }}">

						<button type="submit" class="btn btn-fefault cart">
							

							<i class="fa fa-shopping-cart"></i>Add to cart
							

						</span>



					</button>

				</form>
			</span>

			<p><b>Availability:</b> In Stock</p>
			<p><b>Condition:</b> New</p>
			<p><b>Brand:</b> {{$data->brand_name}}</p>
			<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
	</div>
</div><!--/product-details-->



<div class="col-sm-12 padding-right">
	<div class="features_items"><!--features_items-->

		<h2 class="title text-center">Recommended Items</h2>
		@foreach ($recom  as $row)
		{{-- expr --}}

		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img style="height:250px;" src="{{asset('image/'.$row->product_img)}}">
						<a href="/product_details/{{$row->product_id}}/{{$row->item_id}}">
							<h4>{{$row->product_name }}</h4></a>

							<p>{{$row->brand_name }}</p>
							<h3>৳  {{$row->product_price}}</h3>
							
						</div>
						
					</div>
					
				</div>
			</div>
			@endforeach
			
			
			

		</div>
	</div>
</div>
</section>



@endsection('content')