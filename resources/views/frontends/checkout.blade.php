@extends('layouts.layout')

@section('content')

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Checkout</h1>
		<em></em>
		<h2><a href="{{url('index')}}">Home</a><label>/</label>Checkout</h2>
	</div>
</div>
<!--login-->
	<script>
		$(document).ready(function(c) {
			$('.close1').on('click', function(c){
				$('.cart-header').fadeOut('slow', function(c){
					$('.cart-header').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function(c) {
			$('.close2').on('click', function(c){
				$('.cart-header1').fadeOut('slow', function(c){
					$('.cart-header1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function(c) {
			$('.close3').on('click', function(c){
				$('.cart-header2').fadeOut('slow', function(c){
					$('.cart-header2').remove();
				});
			});
		});
	</script>

<div class="container">
	<div class="check-out">
		<div class="panel panel-default">
			<div class="panel-heading">Order List</div>
			<div class="panel-body">
				<div class="bs-example4" data-example-id="simple-responsive-table">
					<div class="table-responsive">
						<table class="table-heading simpleCart_shelfItem">
							<tr>
								<th class="table-grid">Item</th>
								<th>Prices</th>
								<th >Delivery </th>
								<th>Subtotal</th>
							</tr>
							<tr class="cart-header">
								<td class="ring-in">
									<a href="{{url('details')}}" class="at-in"><img src="{{asset('frontend/images/ch.jpg')}}" class="img-responsive" alt=""></a>
									<div class="sed">
										<h5><a href="{{url('details')}}">Sed ut perspiciatis unde</a></h5>
										<p>(At vero eos et accusamus et iusto odio dignissimos ducimus ) </p>

									</div>
									<div class="clearfix"> </div>
									<div class="close1"> </div>
								</td>
								<td>$100.00</td>
								<td>FREE SHIPPING</td>
								<td class="item_price">$100.00</td>
								<td class="add-check"><a class="item_add hvr-skew-backward" href="#">Add To Wishlist</a></td>
							</tr>
							<tr class="cart-header">
								<td class="ring-in">
									<a href="{{url('details')}}" class="at-in"><img src="{{asset('frontend/images/ch2.jpg')}}" class="img-responsive" alt=""></a>
									<div class="sed">
										<h5><a href="{{url('details')}}">Sed ut perspiciatis unde</a></h5>
										<p>(At vero eos et accusamus et iusto odio dignissimos ducimus ) </p>
									</div>
									<div class="clearfix"> </div>
									<div class="close2"> </div>
								</td>
								<td>$100.00</td>
								<td>FREE SHIPPING</td>
								<td class="item_price">$100.00</td>
								<td class="add-check"><a class="item_add hvr-skew-backward" href="#">Add To Wishlist</a></td>
							</tr>
							<tr class="cart-header">
								<td class="ring-in">
									<a href="{{url('details')}}" class="at-in"><img src="{{asset('frontend/images/ch1.jpg')}}" class="img-responsive" alt=""></a>
									<div class="sed">
										<h5><a href="{{url('details')}}">Sed ut perspiciatis unde</a></h5>
										<p>(At vero eos et accusamus et iusto odio dignissimos ducimus ) </p>
									</div>
									<div class="clearfix"> </div>
									<div class="close3"> </div>
								</td>
								<td>$100.00</td>
								<td>FREE SHIPPING</td>
								<td class="item_price">$100.00</td>
								<td class="add-check"><a class="item_add hvr-skew-backward" href="#">Add To Wishlist</a></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">Order Summary</div>
			<div class="panel-body">
				<div class="bs-example4" data-example-id="simple-responsive-table">
					<div class="table-responsive">
						<table class="table-heading simpleCart_shelfItem">
							<tr class="cart-header">
								<td class="ring-in"> </td>
								<td> </td>
								<td class="pull-right">Total</td>
								<td class="item_price">$500.00</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="produced">
					<a href="{{url('details')}}" class="hvr-skew-backward">Produced To Buy</a>
				</div>
			</div>
		</div>

    </div>
</div>
<!--//login-->
@endsection