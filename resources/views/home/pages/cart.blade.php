@extends('home.includes.layout')

@section('section-1')
	<section class="jumbotron jumbotron-fluid" style="    background-color: white;
    border-bottom: 1px solid lightgrey;">
	   <div class="container">
	      <div class="jumbotron-header-bar__inner">
	        <!-- <ol role="navigation" aria-label="breadcrumbs" class="breadcrumb">
	           <li class=""><a href="{{url('/')}}"><span class="fa fa-home"></span></a></li>
	           <li class="active"><span>Shopping Cart</span></li>
	        </ol> -->
	       <!--  <h4 data-purpose="shopping-cart-title">Shopping Cart</h4> -->
	      </div>
	   </div>
	</section>
	<section class="cart">
@endsection
@section('section-2')
<style>
@media only screen and (max-width: 600px) {

    .price_btn{
        width: none !important;
        float: right;
        padding: 0px 30px !important;
    }
}
	table, th, td {
  border-bottom: 1px solid lightgrey;
}
#table1{
	width: 100%;
    text-align: center;
}
#table2{
	width: 100%;
    text-align: left;
}
th{
	font-size: 19px;
    font-weight: 600;
}
.title br {
    content: ' '
}

.title br:after {
    content: ' '
}
</style>

<div id="neuron-cart" class="neuron-cart pt-95 pb-100 md-pt-76 md-pb-80">
	<div class="container">
		@if(session('alert'))
			<div class="col-sm-9 col-sm">
				{!! session('alert') !!}
			</div>
		@endif 
		
		@if(count($courses) > 0 || count($ebooks) > 0)
		@php $total = 0;$products = array(); @endphp
		@foreach($courses as $key => $course)
				@php $total = @$course->getCourse->price + $total; @endphp
		@endforeach
		@foreach($ebooks as $key => $ebook)
				@php $total = @$ebook->getEbook->ebook_price + $total; @endphp
		@endforeach
		<table id="table1">
			<caption><h4 class="total-cart-title">Cart Totals</h4><br>
				<table id="table2">
                    <tbody>
                        <tr>
                            <th>Total</th>
                            <td>${{number_format($total, 2)}}</td>
                        </tr>
                    </tbody>
                </table><br>
                <div class="final-btn mt-30">
                    <a style="width: 220px; float: right;" href="{{url('user/checkout')}}" class="price_btn btn_hover">Proceed to checkout</a>
                </div>
			</caption>
			<thead>
				<tr>
					<th></th>
					<th>Product</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				@if(count($courses) > 0)
				@foreach($courses as $key => $course)
				@php $total = @$course->getCourse->price + $total; @endphp
				<tr>
					
					<td>
						<span class="product-remove pr-30">
                          <form action="{{route('cart.delete')}}" method="post">
					 		@csrf
					 		<input type="hidden" name="id" value="{{Crypt::encrypt(@$course->id)}}">
					 		<button style="border: none;background: none;" type="submit" class=""> <i class="fas fa-close"></i></button> 
					 	  </form>
				        </span>
				    </td>
					<td><a href="#"><img style="height: 150px;margin-top: 10px;" src="{{url('public/course-banners')}}/{{$course->getCourse->course_banner}}" alt="Product Image"></a><h6 class="title"><?php echo strip_tags(@$course->getCourse->course_title, '<br>') ?></h6></td>
					<td>${{number_format(@$course->getCourse->price,2)}}</td>
				</tr>
				@endforeach
				@endif
				@if(count($ebooks) > 0)
				@foreach($ebooks as $key => $ebook)
				@php $total = @$ebook->getEbook->ebook_price + $total; @endphp
				<tr>
					
					<td>
						<span class="product-remove pr-30">
                          <form action="{{route('cart.delete')}}" method="post">
					 		@csrf
					 		<input type="hidden" name="id" value="{{Crypt::encrypt(@$ebook->id)}}">
					 		<button style="border: none;background: none;" type="submit" class=""> <i class="fas fa-close"></i></button> 
					 	  </form>
				        </span>
				    </td>
					<td><a href="#"><img style="height: 150px;margin-top: 10px;" src="{{url('public/ebook-thumbnails')}}/{{$ebook->getEbook->ebook_thumbnail}}" alt="Product Image"></a><h6 class="title"><?php echo strip_tags(@$ebook->getEbook->ebook_title, '<br>') ?></h6></td>
					<td>${{number_format(@$ebook->getEbook->ebook_price,2)}}</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
		@endif
		@if(count($courses) == 0 && count($ebooks) == 0)
			<div class="col-sm-12 col-sm" style="margin-bottom: 9%;">
				<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i>Cart is empty!</div>
			</div>
	    @endif
	</div>
</div>
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