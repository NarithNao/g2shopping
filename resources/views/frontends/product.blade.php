@extends('layouts.layout')

@section('content')

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Products</h1>
		<em></em>
		<h2><a href="{{url('index')}}">Home</a><label>/</label>Products</h2>
	</div>
</div>
<!--content-->
<div class="product">
	<div class="container">
		<div class="col-md-9">
			<div class="mid-popular">
				<div class="col-md-4 item-grid1 simpleCart_shelfItem">
					<div class=" mid-pop">
						<div class="pro-img">
							<img src="{{asset('frontend/images/pc.jpg')}}" class="img-responsive" alt="">
							<div class="zoom-icon ">
								<a class="picture" href="{{asset('frontend/images/pc.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
							</div>
						</div>
						<div class="mid-1">
							<div class="women">
								<div class="women-top">
									<h6><a href="{{url('details')}}">Sed ut perspiciati</a></h6>
									<span><em class="item_price">$70.00</em></span>
								</div>
								<div class="img item_add">
									<a href="#"><img src="{{asset('frontend/images/ca.png')}}" alt=""></a>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-grid1 simpleCart_shelfItem">
					<div class=" mid-pop">
						<div class="pro-img">
							<img src="{{asset('frontend/images/pc1.jpg')}}" class="img-responsive" alt="">
							<div class="zoom-icon ">
								<a class="picture" href="{{asset('frontend/images/pc1.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
							</div>
						</div>
						<div class="mid-1">
							<div class="women">
								<div class="women-top">
									<h6><a href="{{url('details')}}">At vero eos</a></h6>
									<span><em class="item_price">$70.00</em></span>
								</div>
								<div class="img item_add">
									<a href="#"><img src="{{asset('frontend/images/ca.png')}}" alt=""></a>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 item-grid1 simpleCart_shelfItem">
					<div class=" mid-pop">
						<div class="pro-img">
							<img src="{{asset('frontend/images/pc2.jpg')}}" class="img-responsive" alt="">
							<div class="zoom-icon ">
								<a class="picture" href="{{asset('frontend/images/pc2.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
							</div>
						</div>
						<div class="mid-1">
							<div class="women">
								<div class="women-top">
									<h6><a href="{{url('details')}}">Sed ut perspiciati</a></h6>
									<span><em class="item_price">$70.00</em></span>
								</div>
								<div class="img item_add">
									<a href="#"><img src="{{asset('frontend/images/ca.png')}}" alt=""></a>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-3 product-bottom">
			<!--categories-->
			<div class=" rsidebar span_1_of_left">
				<h4 class="cate">Categories</h4>
				<ul class="menu-drop">
					<li class="item1"><a href="#">Men </a>
						<ul class="cute">
							<li class="subitem1"><a href="{{url('details')}}">Cute Kittens </a></li>
							<li class="subitem2"><a href="{{url('details')}}">Strange Stuff </a></li>
							<li class="subitem3"><a href="{{url('details')}}">Automatic Fails </a></li>
						</ul>
					</li>
					<li class="item2"><a href="#">Women </a>
						<ul class="cute">
							<li class="subitem1"><a href="{{url('details')}}">Cute Kittens </a></li>
							<li class="subitem2"><a href="{{url('details')}}">Strange Stuff </a></li>
							<li class="subitem3"><a href="{{url('details')}}">Automatic Fails </a></li>
						</ul>
					</li>
					<li class="item3"><a href="#">Kids</a>
						<ul class="cute">
							<li class="subitem1"><a href="{{url('details')}}">Cute Kittens </a></li>
							<li class="subitem2"><a href="{{url('details')}}">Strange Stuff </a></li>
							<li class="subitem3"><a href="{{url('details')}}">Automatic Fails</a></li>
						</ul>
					</li>
					<li class="item4"><a href="#">Accessories</a>
						<ul class="cute">
							<li class="subitem1"><a href="{{url('details')}}">Cute Kittens </a></li>
							<li class="subitem2"><a href="{{url('details')}}">Strange Stuff </a></li>
							<li class="subitem3"><a href="{{url('details')}}">Automatic Fails</a></li>
						</ul>
					</li>
					<li class="item4"><a href="#">Shoes</a>
						<ul class="cute">
							<li class="subitem1"><a href="{{url('details')}}">Cute Kittens </a></li>
							<li class="subitem2"><a href="{{url('details')}}">Strange Stuff </a></li>
							<li class="subitem3"><a href="{{url('details')}}">Automatic Fails </a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!--initiate accordion-->
			<script type="text/javascript">
				$(function() {
					var menu_ul = $('.menu-drop > li > ul'),
							menu_a  = $('.menu-drop > li > a');
					menu_ul.hide();
					menu_a.click(function(e) {
						e.preventDefault();
						if(!$(this).hasClass('active')) {
							menu_a.removeClass('active');
							menu_ul.filter(':visible').slideUp('normal');
							$(this).addClass('active').next().stop(true,true).slideDown('normal');
						} else {
							$(this).removeClass('active');
							$(this).next().stop(true,true).slideUp('normal');
						}
					});

				});
			</script>
			<!--//menu-->
			{{--<section  class="sky-form">
				<h4 class="cate">Discounts</h4>
				<div class="row row1 scroll-pane">
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Upto - 10% (20)</label>
					</div>
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>40% - 50% (5)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (7)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (2)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other(50)</label>
					</div>
				</div>
			</section>--}}


			<!---->
			{{--<section  class="sky-form">
				<h4 class="cate">Type</h4>
				<div class="row row1 scroll-pane">
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Sofa Cum Beds (30)</label>
					</div>
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Bags  (30)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Caps & Hats (30)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Jackets & Coats   (30)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Jeans  (30)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Shirts   (30)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sunglasses  (30)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Swimwear  (30)</label>
					</div>
				</div>
			</section>--}}
			{{--<section  class="sky-form">
				<h4 class="cate">Brand</h4>
				<div class="row row1 scroll-pane">
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Roadstar</label>
					</div>
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Levis</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Persol</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Nike</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Edwin</label>
						<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>New Balance</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Paul Smith</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Ray-Ban</label>
					</div>
				</div>
			</section>--}}
		</div>
	<div class="clearfix"></div>
</div>

</div>
<!--//content-->
@endsection