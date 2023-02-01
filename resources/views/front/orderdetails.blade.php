@extends('front.parent')
@section('title',__('cp.order'))


@section('styles')

@endsection

@section('content')




	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
		
			<div class="row">

				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">ID</th>
									<th class="column-2">Image</th>
									<th class="column-3">Name</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

							@forelse ($detailsorders as $item)
								
								<tr class="table_row">
									<td class="column-1">
                                        #{{$item->order->id}}
									</td>
									<td class="column-2">
										<button type="button" onclick="#" class="how-itemcart1">
											<img src="{{$item->product->main_image}}" alt="IMG">
										</button>
									</td>
									<td class="column-3">{{$item->product->name}}</td>
									<td class="column-4">{{$item->quantity}}</td>
								
									
                                    <td  class= "sub-total column-5 total " >{{$item->total}}$</td>
								
                                </tr>
                                @empty
								

							@endforelse

							</table>
							<div class= "sub-total column-5 total ">
								Sub Total (Befor Discount): {{$subTotal}} $
							</div>
							<div class= "sub-total column-5 total ">
								Final Total (After Discount): {{$finalTotal}} $
							</div>
						</div>

					</div>
				</div>

		
			</div>
		</div>

	</form>
		
	
		


@endsection
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('front/vendor/select2/select2.min.js')}}"></script>

<!--===============================================================================================-->
	<script src="{{asset('front/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
<script src="{{asset('front/js/main.js')}}"></script>
<script src="{{asset('front/js/moment.min.js')}}"></script>


@endsection
