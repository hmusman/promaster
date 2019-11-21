@extends('home.includes.layout')

@section('section-1')
	<section class="jumbotron jumbotron-fluid">
	   <div class="container">
	      <div class="jumbotron-header-bar__inner">
	        <ol role="navigation" aria-label="breadcrumbs" class="breadcrumb">
	           <li class=""><a href="{{url('/')}}"><span class="fa fa-home"></span></a></li>
	           <li class="active"><span>Shopping Cart</span></li>
	        </ol>
	        <h4 data-purpose="shopping-cart-title">Shopping Cart</h4>
	      </div>
	   </div>
	</section>
	<section class="cart">
		<div class="container col-sm">
			<div class="row col-sm">
				@if(session('alert'))
					<div class="col-sm-9 col-sm">
						{!! session('alert') !!}
					</div>
				@endif 
		@if(count($courses) > 0)
			@php $total = 0; @endphp
				<div class="col-md-9 col-sm">
					<h4 class="cart-header">{{count($courses)}} course (s) in Cart</h4>
				@foreach($courses as $course)
					@php $total = @$course->getCourse->price + $total; @endphp
						<div class="row cart-box">
							<div class="col-sm-2">
								<img class="img-responsive" src="{{url('public/course-thumbnails')}}/{{@$course->getCourse->course_thumbnail}}">
							</div>
							<div class="col-sm-8">
								<h4 class="cart-item-title">{{@$course->getCourse->course_title}}</h4>
								 <p class="cart-item-description">{{@$course->getCourse->course_description}}</p>
								 <div class="action-btns">
								 	<form action="{{route('cart.delete')}}" method="post">
								 		@csrf
								 		<input type="hidden" name="id" value="{{Crypt::encrypt(@$course->id)}}">
								 		<button type="submit" class="label label-danger"><i class="fa fa-trash"></i></button> 
								 	</form>
								</div>
							</div>
							<div class="col-sm-2 col-sm text-center">
								<span class="item-price">${{@$course->getCourse->price}}</span>
							</div>
						</div>
				@endforeach
				</div>
				<div class="col-md-3 checkout-box">
					<div class="total-price-box">
						<h3 class="total-price-title">${{number_format($total, 2)}}</h3>
						<h3 class="total-price">Total</h3>
					</div>
					<button class="btn btn-danger checkout-btn">Checkout</button>
				</div>
		@else
			<div class="col-sm-9 col-sm" style="margin-bottom: 9%;">
				<div class="alert alert-danger">Cart is empty!</div>
			</div>
		@endif
			</div>
		</div>
	</section>
@endsection


@section('script')
	<style type="text/css">
	.cart{
	    margin:10px!important;
	}
	.container > .row{
	    margin:10px!important;
	}
	.cart-box img{
	    width:100%!important;
	    height:auto;
	}
		/*.container {*/
		/*	width: 1170px !important;*/
		/*	max-width: 1170px !important;*/
		/*}*/

	</style>
@endsection