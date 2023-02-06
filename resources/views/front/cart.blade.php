@extends('front.parent')
@section('title',__('cp.cart'))


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
			@if($isFull)
			<div class="row">

				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

							@forelse ($carts as $item)
								
								<tr class="table_row">
									<td class="column-1">
										<button type="button" onclick="confirmDelete('{{$item->id }}',this)" class="how-itemcart1">
											<img src="{{$item->product->main_image}}" alt="IMG">
										</button>
									</td>
									<td class="column-2">{{$item->product->name}}</td>
									<td class="column-3">$ @if ($item->has_offer)
										{{$item->offer_price}}
										@else
										{{$item->price}}
									@endif</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="minus cl8 hov-btn3 trans-04 flex-c-m">
											<form>

												<button onclick="changequantity({{$item->id}} ,{{$item->product->id }} , false)" type="button" class="minus-button" data-id="{{ $item->product->id }}">
													-
												</button> 
											</form>
												
												{{-- <i class="fs-16 zmdi zmdi-minus"></i> --}}
											</div>
											<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" id="qty_{{ $item->product->id}}" min="1" value="{{$item->quantity}}">

											<div class="plus cl8 hov-btn3 flex-c-m">
												<form>
												<button onclick="changequantity({{$item->id}} ,{{$item->product->id }} ,true)" type="button" class="plus-button " data-id="{{ $item->product->id }}">
												+	
												</button> 
												</form>
												{{-- <i class="fs-16 zmdi zmdi-plus"></i> --}}
											</div>
										</div>
									</td>
									<td  class= "sub-total column-5 total " id="total_{{$item->product->id}}" >{{$item->price * $item->quantity}}$</td>
								</tr>
								@empty
								No Item In Cart

							@endforelse

							</table>
							
						</div>

						{{-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm"> --}}
							<div class=" m-r-20 m-tb-5">
									
								<a  href="{{route('orders.create')}}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									Proceed to Checkout
								</a>
							</div>

							
						{{-- </div> --}}
					</div>
				</div>

				
			</div>
		</div>

		@endif
		<div class="row">
			No Item In Cart!
		</div>
	</form>
		
	
		


<!-- Moddal-->
	<div  class="wrap-modal1 js-modal1 p-t-100 p-b-30">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container" style="max-width: 600px">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="{{asset('front/images/icons/icon-close.png')}}"  alt="CLOSE">
				</button>

				{{-- <div class="row">	 --}}

				
					<div class=" p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
								{{-- addresses form--}}
                    <form id="create-form" >
							<div class="p-t-25">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										{{__('cp.city')}}
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select id="cityId" class="js-select2" name="time">
												<option>Choose an option</option>
												@foreach ($cities as $city)
												<option value="{{$city->id}}">{{$city->name}}</option>
												@endforeach
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										{{__('cp.area')}}
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select id="areaId" class="js-select2" name="time">
												<option>Choose an option</option>
												
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

							
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										{{__('cp.street')}}
									</div>
									<input id="street" style="height: 45px" class="bor8 p-lr-28 size-204 respon6-next" type="text" name="text" >
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										{{__('cp.building')}}
									</div>
									<input id="building" style="height: 45px" class="bor8 size-204 p-lr-28 respon6-next" type="text" name="text" >
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										{{__('cp.flat')}}
									</div>
									<input id="flat" style="height: 45px" class="bor8 size-204 p-lr-28 respon6-next" type="text" name="text" >
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										

										<button type="button" onclick="performStore()" style="float: right" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Save
										</button>
									</div>
								</div>	
							</div>
                    </form>
							
						</div>
					</div>
				{{-- </div> --}}
			</div>
		</div>
	</div>

@endsection
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>

		
var qty=1;
var total=0;

$('.js-show-modal1').on('click',function(e){
        e.preventDefault();
        $('.js-modal1').addClass('show-modal1');
    });
    $('.js-hide-modal1').on('click',function(){
        $('.js-modal1').removeClass('show-modal1');
    });
	$('#cityId').on('change',function(){
        // alert('Value: '+this.value);
        getareas(this.value);
    });
    function getareas(cityId){
        axios.get('/areas/'+cityId)         
       .then(function (response) {
   
           $('#areaId').empty();
           $.each(response.data.data , function(i , item){
            console.log('Id: '+item['id']);
            $('#areaId').append(new Option(item['name'],item['id']));
           });
          
       })
       .catch(function (error) {
     
       });
    } 


	function performStore() {
       
	   axios.post('/addresses', {
		street: document.getElementById('street').value,
		building: document.getElementById('building').value,
		flat: document.getElementById('flat').value,
		cityId: document.getElementById('cityId').value,
		areaId: document.getElementById('areaId').value,


	   })
	   .then(function (response) {
		toastr.success(response.data.message);
		   document.getElementById('create-form').reset();

          $('.js-modal1').removeClass('show-modal1');
		var addressId = response.data.id;

		// alert(addressId)

		axios.get('/addresses/' + addressId)
      .then(function (response) {
		let addresses = "";
		 addresses = `<div class="radion_btn">
			<input type="radio" id="${addressId}"  value="${addressId}"/>
		 	  <label for="f-option6">${response.data.data.city.name} | ${response.data.data.area.name} |${response.data.data.building} |${response.data.data.street} |${response.data.data.flate_num}  </label>

		 		</div>`;
		console.log(addresses)

        $("#myList").append(addresses);

	})
      .catch(function (error) {
        console.log(error);
      });

	   });
   }

$(".minus-button").click(function() {


	// alert(11);
	  var productId = $(this).data('id');
	// changequantity(productId);


	axios.get('/products/' + productId)
      .then(function (response) {
		var has_offer = response.data.data.has_offer;
		qty = $("#qty_" + productId).val();
    if (qty > 1) {
      $("#qty_" + productId).val(parseInt(qty) - 1);
	  qty = $("#qty_" + productId).val();
	  if(response.data.data.has_offer){
	  total = qty * response.data.data.offer_price;
	  }
	  else
	  total = qty * response.data.data.price;
	//   $("#total").val(parseInt(total) * qty );
	  $('#total_' + productId).text(total +'$');
	  
	  getTotal();
	//   applayCoupon();

    }
	
		
	})
      .catch(function (error) {
        console.log(error);
      });

    
	// alert(qty);

  });

  $(".plus-button").click(function() {


	var productId = $(this).data('id');
	// changequantity(productId);
	axios.get('/products/' + productId)
      .then(function (response) {
	console.log(response.data.data.has_offer);

		var has_offer = response.data.data.has_offer;
     qty = $("#qty_" + productId).val();
    $("#qty_" + productId).val(parseInt(qty) + 1);
	 qty = $("#qty_" + productId).val();
	 if(has_offer)
	  total = qty * response.data.data.offer_price;
	  else
	  total = qty * response.data.data.price;
	  $('#total_' + productId).text( total +'$');
	  getTotal();
	//   applayCoupon();

		
	})
      .catch(function (error) {
        console.log(error);
      });


    
  });

  function changequantity(id ,productId ,plus) {

	var formData = new FormData();
	if(plus)
        formData.append('quantity', parseInt(document.getElementById('qty_' + productId).value) +1);
	else
	formData.append('quantity',parseInt(document.getElementById('qty_' + productId).value) - 1);

        formData.append('_method','PUT');     

axios.post('/carts/'+ id ,formData)

.then(function (response) {

	toastr.success(response.data.message ,'' ,{positionClass: 'toast-bottom-right'});
	// getTotal();
})
.catch(function (error) {
	// alert(11);
	// console.log(error.response);
	
	toastr.error(error.response.data.message,'' ,{positionClass: 'toast-bottom-right'});
});

}

  function getTotal() {

	axios.get('/total')
		.then(function (response) {
			$.total = response.data.total;
			$.finalTotal = response.data.total;
			
		//  total = response.data.total;
		// var subTotal = response.data.total;
	$('#sub-total').text( $.total +'$');

    $('#final-total').text( $.total  +'$');

		})
      .catch(function (error) {
		toastr.error(error.response.data.message,'' ,{positionClass: 'toast-bottom-right'});

        // console.log(error);
      });

	 

}

getTotal();

function confirmDelete(id,reference){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            performDelete(id,reference);
        }
        });
    			
	}










    function performDelete(id, reference) {
        axios.delete('/carts/'+id)
        .then(function (response) {
		$("#numOfProductsCart").attr("data-notify", response.data.numOfProductsCart);

            console.log(response);
            // toastr.success(response.data.message);
            reference.closest('tr').remove();

            showMessage(response.data);
        })
        .catch(function (error) {
            console.log(error.response);
            // toastr.error(error.response.data.message);
            showMessage(error.response.data);
        });
    }
	function showMessage(data) {
        Swal.fire(
            data.title,
            data.text,
            data.icon
        );
    }




axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };


		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
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
