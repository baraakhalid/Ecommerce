
@extends('front.parent')
@section('title',__('cp.home'))


@section('styles')

@endsection

@section('content')
{{-- <body class="animsition"> --}}
	
	<!-- Header -->

    
	<!-- Cart -->
	{{-- <div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full" id="cart">
					
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40" id="total">
						
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="{{route('front.cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url({{asset('front/images/slide-01.jpg')}});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Women Collection 2018
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									NEW SEASON
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url({{asset('front/images/slide-02.jpg')}});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men New-Season
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Jackets & Coats
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url({{asset('front/images/slide-03.jpg')}});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men Collection 2018
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									New arrivals
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Banner -->

	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				@foreach ( $categories as $category)
					
				<div class="col-md-6 col-xl-4 p-b-30 lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="{{Storage::url($category->image ?? '')}}" height="200" alt="IMG-BANNER">

						<a href="{{route('front.products',['category_id'=>$category->id])}}"class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									{{$category->name}}
								</span>

								
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
				@endforeach

			
			</div>
		</div>
	</div>


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
					
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div   class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>
					@foreach ($categories as $category )
						

					<button id="categoryId" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" value="{{ $category->id }}" >
						{{$category->name}}
					</button>
					@endforeach


				

					

				

					
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="productId" class="row isotope-grid">
				@foreach ($products as $product )
					
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
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

								@php
								$currentDate = \Carbon\Carbon::now();
							    @endphp
								@if($product->has_offer && ($product->price > $product->offer_price))
								@if($currentDate->between($product->offers()->first()->start_date , $product->offers()->first()->end_date))

								{{-- {{$product->has_offer}} --}}
								{{-- @if($product->has_offer) --}}
								<del class="stext-105 cl3">
									{{$product->price}}$
									{{-- {{$product->offer_price}} --}}

								</del>

								<span class="stext-105 cl3">
									{{$product->price - $product->offer_price}}$

								</span>
								@else
								<span class="stext-105 cl3">
									{{$product->price}}$

								</span>
								@endif
								@else
								<span class="stext-105 cl3">
									{{$product->price}}$

								</span>
								@endif

							</div>

							<div id="favorite" class="block2-txt-child2 flex-r p-t-3">
								{{-- @if (Auth::guard('user')->check()) --}}
								{{-- <a  onclick="performFavorite({{$product->id }})"  data-id="{{$product->id}}" class="addToWishlist btn-addwish-b2 dis-block pos-relative js-addwish-b2" > --}}
									
									{{-- <a id="heart" onclick="performFavorite({{$product->id }})"   data-id="{{$product->id}}" class="fa fa-heart" ></a> --}}
									<a id="heart_{{$product->id}}" onclick="performFavorite({{$product->id }})"   data-id="{{$product->id}}" @if($product->is_favorite) class="fa fa-heart" @else  class="fa fa-heart-o" @endif></a>
									
							</div>
						</div>
					</div>
				</div>
				@endforeach

		
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section>





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
									<div class="size-204 flex-w flex-m respon6-next">
									    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="minus cl8 hov-btn3 trans-04 flex-c-m">
												<button  type="button" id="minus-button">
													-
												</button> 
												
												{{-- <i class="fs-16 zmdi zmdi-minus"></i> --}}
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" id="qty" min="1" value="1">

											<div class="plus cl8 hov-btn3 flex-c-m">
												<button  type="button" id="plus-button">
												+	
												</button> 
												{{-- <i class="fs-16 zmdi zmdi-plus"></i> --}}
											</div>
										</div>
									</div>

									<div class="size-204 flex-w flex-m respon6-next" id="cart-modal">
								
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

var qty=1;
  $("#minus-button").click(function() {
     qty = $("#qty").val();
    if (qty > 0) {
      $("#qty").val(parseInt(qty) - 1);
	  qty = $("#qty").val();

    }
	// alert(qty);

  });

  $("#plus-button").click(function() {
     qty = $("#qty").val();
    $("#qty").val(parseInt(qty) + 1);
	 qty = $("#qty").val();


  });



$('.js-show-modal1').on('click',function(e){
	
        e.preventDefault();


		var productId = $(this).data('id');
		let button = "";
		
				
		axios.get('/products/' + productId)
      .then(function (response) {
		var currentDate = moment().format("YYYY-MM-DD");
		var startDate = response.data.data.start_date;
		var endDate = response.data.data.end_date;
		// console.log(startDate);
		var offer_price = response.data.data.price;
		var price = response.data.data.price;
		if(response.data.data.has_offer  &&( currentDate >= startDate && currentDate <= endDate))
		 offer_price =response.data.data.offer_price;
		 else
		 offer_price =response.data.data.price;





		// $qty = document.getElementById('qty').value;
		// <button type='button' onclick="performCartStore(${productId}, ${response.data.data.price})" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">

		button += `	
		@if(Auth::guard('user')->check())
		<button type='button'onclick="performCartStore(${productId}, ${price}-${offer_price} )" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
		@else
		<a href="{{route('cms.login','user')}}"  class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">add to cart</a>
        @endif		`
		document.getElementById('cart-modal').innerHTML = button;

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



			let imagesHtml = "";

			 $.each(response.data.data.images , function(i, item){
                var images=item['url'];

				var imageUrl = `{{ url('uploads/images/${images}') }}`;
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

// 	$(document).ready(function() {
//   $('.filter-tope-group button').click(function() {
//     var categoryId = $(this).data('category-id');
//     alert(categoryId);

//     $.ajax({
//       url: '/',
//       method: 'GET',
//       data: {
//         category_id: categoryId
//       },
//       success: function(response) {
//         console.log(response.data.products);
//         // Update the isotope grid with the new data
//         // $('#row isotope-grid').html(data);
//       }
//     });
//   });
// });
$('#categoryId').on('click',function(){
        // alert('Value: '+this.value);
        getproducts(this.value);
    });
function getproducts(categoryId){
        axios.get('/products/'+categoryId)         
       .then(function (response) {
   
           $('#productId').empty();
           $.each(response.data.data , function(i , item){
			        // $('#row isotope-grid').html(item);

            console.log('Id: '+item['id']);

            $('#productId').append(new Option(item['name'],item['id']));
           });
          
       })
       .catch(function (error) {
     
       });
    } 



	



    $('.js-hide-modal1').on('click',function(){
		// alert(qty);
        $('.js-modal1').removeClass('show-modal1');
    });

		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		});



		

	function performCartStore(id ,productprice) {
			// alert( document.getElementById('qty').value);
      axios.post('/carts',{
            product_id:  id,
            quantity : parseInt(document.getElementById('qty').value),
            price:productprice,

      })
      .then(function (response) {
		$("#numOfProductsCart").attr("data-notify", response.data.numOfProductsCart);

          console.log(response);
          toastr.success(response.data.message,'' ,{positionClass: 'toast-bottom-right'});
          // window.location.href = '/rest/index';
      })
      .catch(function (error) {
          console.log(error.response);
          toastr.error(error.response.data.message,'' ,{positionClass: 'toast-bottom-right'});
      });
  }


//   $('.js-show-cart').on('click',function(){
//         $('.js-panel-cart').addClass('show-header-cart');


//     });



	</script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('front/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/slick/slick.min.js')}}"></script>
	<script src="{{asset('front/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/parallax100/parallax100.js')}}"></script>
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="{{asset('front/vendor/sweetalert/sweetalert.min.js')}}"></script>

	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/isotope/isotope.pkgd.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('front/vendor/sweetalert/sweetalert.min.js')}}"></script>

	<script>
		function updateFavoriteCount(count) {
        document.querySelector('#favorite-count').setAttribute('data-count', count);
         document.querySelector('#favorite-count').textContent = count;
} 



function performFavorite(id) {
	
    axios.post('/favorit_products', {
        product_id: id,
    })
    .then(function (response) {
		axios.get('/products/' + id)
      .then(function (response) {
		if (response.data.data.is_favorite) {

		$("#heart_" + id).removeClass("fa fa-heart-o");
			
		$("#heart_" + id).addClass("fa fa-heart");
		// document.getElementById('numOfProductsFavorite').innerHTML = response.data;
        } else {
			$("#heart_" + id).removeClass("fa fa-heart");
			$("#heart_" + id).addClass("fa fa-heart-o");
			// document.getElementById('numOfProductsFavorite').innerHTML = response.data;
		
        }
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
@endsection
{{-- </body>
</html> --}}


	