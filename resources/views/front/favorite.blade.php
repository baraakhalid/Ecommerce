@extends('front.parent')
@section('title',__('cp.favorite'))

@section('styles')

@endsection

@section('content')
<!-- breadcrumb -->
{{-- <div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Shoping Cart
		</span>
	</div>
</div> --}}

	<!-- Product -->
	
	<div class="bg0 m-t-80 p-b-140">
		<div class="container">
			
			<div class="row isotope-grid">
				@forelse ($products as $product )
					
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" id="favorit_div_{{$product->id}}">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{$product->main_image ?? ''}}" alt="IMG-PRODUCT">

							<a href="#" id= "js-show-modal1" data-id="{{ $product->id }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{$product->name}}
								</a>

								<span class="stext-105 cl3">
									{{$product->price}}
								</span>
							</div>

							<div id="favorite" class="block2-txt-child2 flex-r p-t-3">
									<a id="heart_{{$product->id}}" onclick="performFavorite({{$product->id }})"   data-id="{{$product->id}}" class="fa fa-heart" ></a>
									
							</div>
						</div>

					</div>

				</div>
				@empty
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" id="favorit_div">
					No Favorite Products !

				</div>
				@endforelse

		
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</div>
		



	
	<!-- Modal1 -->
	


	<div id="product-modal" class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="{{asset('front/images/icons/icon-close.png')}}" alt="CLOSE">
				</button>

				<div class="row" id="productDetails">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots">
									
								</div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb" id="images-product">


								</div>
							</div>
						</div>
					</div>	
					

					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 id="name" class="mtext-105 cl2 js-name-detail p-b-14">
								
							</h4>

							<span id="price" class="mtext-106 cl2">
								$ 
							</span>

							<p id="info" class="stext-102 cl3 p-t-23">
								
							</p>
							
							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time" id="size_id">
												<option>Choose an size</option>
												{{-- @foreach ($product->sizes->unique()->sortBy('id') as $size) --}}

												{{-- <option value="{{$size->id}}">{{$size->name}}</option> --}}
												{{-- @endforeach --}}
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time" id="color_id">


												{{-- <option>Choose an option</option>
												@foreach ($product->colors->unique() as $color)

												<option value="{{$color->id}}">{{$color->name}}</option>
												@endforeach --}}
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next" id="cart">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
{{-- 
										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button> --}}
									</div>
								</div>	
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
	@section('scripts')
  
	<script>

$('.js-show-modal1').on('click',function(e){
        e.preventDefault();

		var productId = $(this).data('id');
		let button = "";
		
				// button += `<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
				// 							Add to cart
				// 						</button>`;
		
				
		axios.get('/products/' + productId)
      .then(function (response) {
		button += ` <a  onclick="performCartStore(${productId}, ${response.data.data.price} )" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">add to cart</a>`;

		document.getElementById('cart').innerHTML = button;

		$('#name').text(response.data.data.name);
		$('#price').text( '$  '+response.data.data.price );
		$('#info').text(response.data.data.info);
		

		$('#color_id').empty();
            $.each(response.data.colors , function(i, item){
             $('#color_id').append(new Option(  item['name'] ,item['id'] ))
             });

		$('#size_id').empty();

            $.each(response.data.sizes , function(i, item){
             $('#size_id').append(new Option(  item['name'] ,item['id'] ))
             });


			 document.getElementById('images-product').innerHTML = response.data.data.images;

			let imagesHtml = "";
			 $.each(response.data.data.images , function(i, item){
                var images=item['url'];
				var imageUrl = `{{ Storage::url('${images}') }}`;
				imagesHtml += `<div class="item-slick3" data-thumb="${imageUrl}">
											<div class="wrap-pic-w pos-relative">
												<img src="${imageUrl}" alt="IMG-PRODUCT">
												<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="${imageUrl}">
												<i class="fa fa-expand"></i>
											</a>
												
											</div>
								</div>`;

				document.getElementById('images-product').innerHTML = imagesHtml;
			
});
		




        $('.js-modal1').addClass('show-modal1');
      })
      .catch(function (error) {
        console.log(error);
      });
    });



    $('.js-hide-modal1').on('click',function(){
        $('.js-modal1').removeClass('show-modal1');
    });

		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		});

		function performCartStore(id ,productprice ) {
			// alert(productprice);
      axios.post('/carts',{
            product_id:  id,
            quantity :1,
            price:productprice,

      })
      .then(function (response) {
          console.log(response);
          toastr.success(response.data.message);
          // window.location.href = '/rest/index';
      })
      .catch(function (error) {
          console.log(error.response);
          toastr.error(error.response.data.message);
      });
  }


	</script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('front/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/slick/slick.min.js')}}"></script>
	<script src="{{asset('front/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/parallax100/parallax100.js')}}"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>

<!--===============================================================================================-->
	<script src="{{asset('front/vendor/isotope/isotope.pkgd.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/sweetalert/sweetalert.min.js')}}"></script>
	<script src="{{asset('path/to/your/javascript.js')}}"></script>

	<script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.removeFromWishlist', function (e) {
            e.preventDefault();
           
            $.ajax({
                type: 'delete',
				url: '/cms/user/favorites/'+ $(this).attr('data-product-id'),
                data: {
                    'productId': $(this).attr('data-product-id'),
                },
                success: function (data) {
					swal( "Product deleted from favorite !");  
                    $(this).closest('.block2').remove();
                }
            });
        });
    </script>

	
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

		
function performFavorite(id) {
	
    axios.post('/favorit_products', {
        product_id: id,
    })
    .then(function (response) {
		console.log(id);
		axios.get('/favorit') 
		.then(function (response) {
		console.log(response.data.data);
     
		let products = "";

		$("#favorit_div_"+id).detach();
// $.each(response.data.data , function(i, item){

//    $("#favorit_div").innerHTML(`
  
// 					<!-- Block2 -->
// 					<div class="block2">
// 						<div class="block2-pic hov-img0">
// 							<img src="${response.data.data.main_image ?? ''}" alt="IMG-PRODUCT">

// 							<a href="#" id= "js-show-modal1" data-id="${response.data.data.id}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
// 								Quick View
// 							</a>
// 						</div>

// 						<div class="block2-txt flex-w flex-t p-t-14">
// 							<div class="block2-txt-child1 flex-col-l ">
// 								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
// 									${response.data.data.name}
// 								</a>

// 								<span class="stext-105 cl3">
// 									${response.data.data.price}
// 								</span>
// 							</div>

// 							<div id="favorite" class="block2-txt-child2 flex-r p-t-3">
// 									<a id="heart_${response.data.data.id}" onclick="performFavorite(${response.data.data.id})"   data-id="${response.data.data.id}" class="fa fa-heart" ></a>
									
// 							</div>
// 						</div>

// 					</div>

//    `);


// 	})
	})
	  
      .catch(function (error) {
        console.log(error);
      });
        console.log( response.data);
	  swal(response.data.message, "", "success");
	  $("#numOfProductsFavorite").attr("data-notify", response.data.numOfProductsFavorite);
		// document.getElementById('numOfProductsFavorite').innerHTML = response.data.numOfProductsFavorite;
      
    })
	.catch(function (error) {
        if(error.response.status === 401) {
            swal("You must be logged in to manage your wishlist !");
        }
});
}
	</script>
<!--===============================================================================================-->
	<script src="{{asset('front/js/main.js')}}"></script>

	@endsection


	