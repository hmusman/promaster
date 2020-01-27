@extends('home.includes.layout')

@section('section-1')
	<section class="jumbotron jumbotron-fluid">
	   <div class="container">
	      <div class="jumbotron-header-bar__inner">
	        <ol role="navigation" aria-label="breadcrumbs" class="breadcrumb">
	           <li class=""><a href="{{url('/')}}"><span class="fa fa-home"></span></a></li>
	           <li class="active"><span>Shopping Cart</span></li>
	        </ol>
	       <!--  <h4 data-purpose="shopping-cart-title">Shopping Cart</h4> -->
	      </div>
	   </div>
	</section>
	<section class="cart">

<!-- 		<form action='https://sandbox.2checkout.com/checkout/purchase' method='post'>
				<input type='hidden' name='sid' value='{{ env('2CHECKOUT_SELLER_ID') }}' >
				<input type='hidden' name='mode' value='2CO' >
				<div class="row col-sm">

					@if(session('alert'))
						<div class="col-sm-9 col-sm">
							{!! session('alert') !!}
						</div>
					@endif 

			@if(count($courses) > 0)
				@php $total = 0;$products = array(); @endphp
					<div class="col-md-9 col-sm">
						<h4 class="cart-header">{{count($courses)}} course (s) in Cart</h4>
					@foreach($courses as $key => $course)
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
							<input type='hidden' name='li_{{$key}}_type' value='product' >
							<input type='hidden' name='li_{{$key}}_name' value='{{@$course->getCourse->course_title}}' >
							<input type='hidden' name='li_{{$key}}_price' value='{{@$course->getCourse->price}}' >
							<input type='hidden' name='li_{{$key}}_quantity' value='1' >
							<input type='hidden' name='li_{{$key}}_tangible' value='N' >
							@php  $products[$key] = @$course->id; @endphp
					        @endforeach

					<input type='hidden' name='purchase_step' value='review-cart' >
					<input type='hidden' name='total_quantity' value='{{count($courses) }}' >
					<input type='hidden' name='products' value='{{ json_encode(@$products) }}' >
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
			</form>  -->


		    <!-- Crat Inner Page Start Here -->
        <div id="neuron-cart" class="neuron-cart pt-95 pb-100 md-pt-76 md-pb-80">
            <div class="container">
                    @if(session('alert'))
						<div class="col-sm-9 col-sm">
							{!! session('alert') !!}
						</div>
					@endif 
                <form action='https://sandbox.2checkout.com/checkout/purchase' method='post'>
						<input type='hidden' name='sid' value='{{ env('2CHECKOUT_SELLER_ID') }}' >
						<input type='hidden' name='mode' value='2CO' >

							@if(count($courses) > 0)
							@php $total = 0;$products = array(); @endphp
		                <div class="cart-body">
		                    <div class="cart-detail">
		                        <table>
		                            <thead>
		                                <tr>
		                                    <th class="product-thumbnail" style="width: 80%;"><span class="pl-50 sm-pl-0">Product</span></th>
		                                      <th class="product-price">Price</th>
		                               
				                        </tr>
				                            </thead>
				                            <tbody>
				                         @foreach($courses as $key => $course)
										      @php $total = @$course->getCourse->price + $total; @endphp
				                                <tr class="cart-item">
				                                    <td class="product-thumbnail row">
				                                      <span class="product-remove pr-30">
			                                              <form action="{{route('cart.delete')}}" method="post">
													 		@csrf
													 		<input type="hidden" name="id" value="{{Crypt::encrypt(@$course->id)}}">
													 		<button style="border: none;background: none;margin-top: 75px;" type="submit" class=""> <i class="flaticon-cross-out"></i></button> 
													 	  </form>
											        </span>
		                                        <a href="#"><img src="{{url('public/course-thumbnails')}}/{{@$course->getCourse->course_thumbnail}}" alt="Product Image">{{@$course->getCourse->course_title}}</a>
		                                    </td>
		                                    <td class="product-price">${{@$course->getCourse->price}}</td>
		                                    <!-- <td class="product-quantity"><input type="number" class="input-text" step="1" min="1" value="1"></td> -->
		                                   <!--  <td class="product-subtotal">${{@$course->getCourse->price}}</td> -->
		                                </tr>

			                        <input type='hidden' name='li_{{$key}}_type' value='product' >
									<input type='hidden' name='li_{{$key}}_name' value='{{@$course->getCourse->course_title}}' >
									<input type='hidden' name='li_{{$key}}_price' value='{{@$course->getCourse->price}}' >
									<input type='hidden' name='li_{{$key}}_quantity' value='1' >
									<input type='hidden' name='li_{{$key}}_tangible' value='N' >
									@php  $products[$key] = @$course->id; @endphp
		                          <input type='hidden' name='purchase_step' value='review-cart' >
							      <input type='hidden' name='total_quantity' value='{{count($courses) }}' >
							      <input type='hidden' name='products' value='{{ json_encode(@$products) }}' >
							      @endforeach

		                            </tbody>
		                        </table>
		                    </div>

		                    <div class="cart-total">
		                        <h4 class="total-cart-title">Cart Totals</h4>
		                        <table>
		                            <tbody>
		                                <tr>
		                                    <th>Total</th>
		                                    <td>${{number_format($total, 2)}}</td>
		                                </tr>
		                            </tbody>
		                        </table>
		                        <div class="final-btn mt-30">
		                            <button style="width: 220px;" class="readon radius checkout-btn">Proceed to checkout</button>
		                        </div>
		                    </div>
		                </div>
		                @else
						<div class="col-sm-9 col-sm" style="margin-bottom: 9%;">
							<div class="alert alert-danger">Cart is empty!</div>
						</div>
			        @endif
               </form>
            </div>
        </div>
        <!-- Crat Inner Page End Here -->
	
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