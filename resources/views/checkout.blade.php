@extends('layout')
@section('content')



<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Check out</li>
			</ol>
		</div><!--/breadcrums-->

		<div class="review-payment">
			<h2>Review & Payment</h2>
		</div>

		<div class="table-responsive cart_info">
			@php

			$contents=Cart::content();

			@endphp
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="size">Size</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach ($contents as $content)
					<tr>
						<td class="cart_product">
							<a href=""><img src="{{asset('image/'.$content->options->image)}}" style="height:90px;width: 120px;" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{$content->name}}</a></h4>
							<p>Brand: {{$content->options->brand}}</p>
						</td>

						<td class="cart_size">
							<p>{{$content->options->size}}</p>
						</td>
						<td class="cart_price">
							<p>{{$content->price}}</p>
						</td>

						<td class="cart_quantity">
							<p>{{$content->qty}}</p>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">{{$content->total}}</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{ URL::to('/delete_cart_item/'.$content->rowId) }}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach



					<tr>
						<td colspan="4">&nbsp;</td>
						<td colspan="2">
							<table class="table table-condensed total-result">
								<tr>
									<td>Cart Sub Total</td>
									<td>{{ Cart::subtotal() }}</td>
								</tr>
								<tr>
									<td>Exo Tax</td>
									<td>{{Cart::tax()}}</td>
								</tr>
								<tr class="shipping-cost">
									<td>Shipping Cost</td>
									<td>Free</td>										
								</tr>
								<tr>
									<td>Total</td>
									<td><span>{{Cart::total()}}</span></td>
								</tr>
							</table>

							
							
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="register-req">
			<p>Please give us necessary informations for shipping your desired product</p>
		</div><!--/register-req-->

		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-6">
					<div class="shopper-info">
						<p>Shopper Information</p>
						<form action="{{ url('/save_order') }}" method="post">
							{{ csrf_field() }}
							<input type="text" name="customer_name" id="customer_name" placeholder="Display Name">
							<input type="text" name="district" id="district" placeholder="District">
							<input type="text" name="shipping_address" id="shipping_address" placeholder="Shipping Address">
							<input type="phone" name="contact_no" id="contact_no" placeholder="Contact No">
							<div class="payment-options"><br>
								<p>Please select a payment method</p>
								<input type="radio" name="payment_method" value="cod"> Cash on Delivery<br>
								<input type="radio" name="payment_method" value="bkash"> Bkash<br>
								<input type="radio" name="payment_method" value="other"> Other




								<br><br>
								<button class="btn btn-primary" type="submit">Confirm</button>
								<a class="btn btn-primary" href="">Cancel</a>
							</form>
						</div>
					</div>
					


				</div>
			</section> <!--/#cart_items-->

			@endsection('content')



