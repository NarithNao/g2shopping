@extends('layouts.layout')

@section('content')

<!--stary banner-->
<div class="banner">
	<div class="container">
		<section class="rw-wrapper">
			<h1 class="rw-sentence">
				<span>Fashion &amp; Beauty</span>
				<div class="rw-words rw-words-1">
					<span>Beautiful Designs</span>
					<span>Sed ut perspiciatis</span>
					<span> Totam rem aperiam</span>
					<span>Nemo enim ipsam</span>
					<span>Temporibus autem</span>
					<span>intelligent systems</span>
				</div>
				<div class="rw-words rw-words-2">
					<span>We denounce with right</span>
					<span>But in certain circum</span>
					<span>Sed ut perspiciatis unde</span>
					<span>There are many variation</span>
					<span>The generated Lorem Ipsum</span>
					<span>Excepteur sint occaecat</span>
				</div>
			</h1>
		</section>
	</div>
</div>
<!--end banner-->
<!--start content-->
<div class="content">
	<div class="container">
		<div class="content-top">
			<div class="col-md-6 col-md">
				<div class="col-1">
				 	<a href="{{url('details')}}" class="b-link-stroke b-animate-go  thickbox">
						<img src="{{asset('frontend/images/pi.jpg')}}" class="img-responsive" alt=""/>
						<div class="b-wrapper1 long-img">
		 					<p class="b-animate b-from-right b-delay03">Lorem ipsum</p>
							<label class="b-animate b-from-right b-delay03"></label>
							<h3 class="b-animate b-from-left b-delay03">Trendy</h3>
						</div>
					</a>
				</div>
				<div class="col-2">
					<span>Hot Deal</span>
					<h2><a href="{{url('details')}}">Luxurious &amp; Trendy</a></h2>
					<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years</p>
					<a href="{{url('details')}}" class="buy-now">Buy Now</a>
				</div>
			</div>

			<div class="col-md-6 col-md1">
				@foreach($cates as $cate)
				<div class="col-3">
					<a href="{{url('details')}}"><img src="{{asset('images/category/'.$cate->cate_image)}}" class="img-responsive" alt="" style="width: 500px; height: 300px;">
						<div class="col-pic">
							<p>Lorem Ipsum</p>
							<label></label>
							<h5>For {{$cate->cate_name}}</h5>
						</div>
					</a>
				</div>
				@endforeach
			</div>

			<div class="clearfix"></div>
		</div>
		<!--products-->
		<div class="content-mid">
			<h3>Trending Items</h3>
			<label class="line"></label>

			<div class="table-responsive">
				@foreach($cates as $cate)
				{{--<div class="col-md-3 item-grid simpleCart_shelfItem" style="padding-top: 20px;">
					<div class=" mid-pop">
						<div class="pro-img">
							<img src="{{asset('images/category/'.$cate->cate_image)}}" class="img-responsive" alt="" style="max-height: 320px; min-height: 200px;">
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
				</div>--}}
				<div class="col-sm-3 col-xs-6" >
					<div class="" style="border: 1px solid #888; margin: 20px 0px 0px 0;">
						<div class="img-box" style="margin: 3px auto; width: 98%; border: 1px solid #ccc; min-height: 300px; text-align: center; vertical-align: middle;">
							<img src="{{asset('images/category/'.$cate->cate_image)}}" class="" alt="" style="width: 100%; max-height: 300px; height: auto; display: block; margin:auto 0;">
						</div>
						<div class="pro_desc" style="margin: 10px auto; width: 98%; height: 60px; padding: 0 10px;">
							<div class="pro_detail pull-left" style="width: 80%; ">
								<div style="height: 50px;">
									<p>{{$cate->cate_name}}</p>
									<p>{{$cate->position}}</p>
								</div>
							</div>
							<div class="logo_buy pull-left" style="width: 20%;">
								<div style="height: 50px;;">
									<a href="#"><img src="{{asset('frontend/images/ca.png')}}" alt="" style="width: 100%; height: auto;"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
					<div class="col-sm-3 col-xs-6" >
						<div class="" style="border: 1px solid #888; margin: 20px 0px 0px 0;">
							<div class="img-box" style="margin: 3px auto; width: 98%; border: 1px solid #ccc; min-height: 300px; text-align: center; vertical-align: middle;">
								<img src="{{asset('images/category/'.$cate->cate_image)}}" class="" alt="" style="width: 100%; max-height: 300px; height: auto; display: block; margin:auto 0;">
							</div>
							<div class="pro_desc" style="margin: 10px auto; width: 98%; height: 60px; padding: 0 10px;">
								<div class="pro_detail pull-left" style="width: 80%; ">
									<div style="height: 50px;">
										<p>{{$cate->cate_name}}</p>
										<p>{{$cate->position}}</p>
									</div>
								</div>
								<div class="logo_buy pull-left" style="width: 20%;">
									<div style="height: 50px;;">
										<a href="#"><img src="{{asset('frontend/images/ca.png')}}" alt="" style="width: 100%; height: auto;"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>

		</div>
		<!--//products-->
	</div>
</div>
	<!--//content-->
@endsection