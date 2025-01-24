<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $product->name }}</title>
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap4/bootstrap.min.css')}}">
        <link href="{{ url('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ url('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('plugins/OwlCarousel2-2.2.1/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/product_styles.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/product_responsive.css')}}">
    </head>

    <body>
<div class="super_container">
	<!-- Header -->
	<header class="header">
		<!-- Top Bar -->
		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>+38 068 005 3570</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:digiprint@gmail.com">digiprint@gmail.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_user">
							<div class="user_icon"><img src="images/user.svg" alt=""></div>
								@guest
								<div><a href="{{ route('register') }}">Register</a></div>
								<div><a href="{{ route('login') }}">Sign in</a></div>
								@else
								    <!-- Tombol logout untuk pengguna yang sudah login -->
									<form method="POST" action="{{ route('logout') }}">
								@csrf
								<button type="submit" class="btn btn-danger">Logout</button>
							</form>
								@endguest
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="{{ url('/') }}">DigiPrint</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="#" class="header_search_form clearfix">
										<input type="search" required="required" class="header_search_input" placeholder="Search for products...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
												@foreach($categories as $category)
														<li><a class="clc" href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></li>
														@endforeach
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

						<!-- Wishlist -->
						<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
							<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist d-flex flex-row align-items-center justify-content-end">

								</div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="images/cart.png" alt="">
										<div class="cart_count"><span>{{ count(session()->get('cart', [])) }}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="{{ route('cart.index') }}">Cart</a></div>
										<div class="cart_price">${{ number_format($totalPrice ?? 0, 2) }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">categories</div>
								</div>

								<ul class="cat_menu">
								@foreach($categories as $category)
									<li><a href="{{ route('category.show', $category->id) }}">{{ $category->name }} <i class="fas fa-chevron-right ml-auto"></i></a></li>
								@endforeach
								</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="{{ url('/') }}">Home<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="{{ url('kontak') }}">Hubungi Kami<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>
	

	</header>

	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ asset('storage/products/' . $product->image) }}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{ $product->category->name }}</div>
						<div class="product_name">{{ $product->name }}</div>
						<div class="product_text">{{ $product->description }}</div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

								</div>

								<div class="product_price">Rp. {{ number_format($product->price, 2) }}</div>
								<div class="button_container">
								<a href="#" class="button cart_button" onclick="addToCart({{ $product->id }}, 1)">Add to Cart</a>
								<script>
									function addToCart(productId, quantity) {
										$.ajax({
											url: '{{ route('cart.add') }}',
											method: 'POST',
											data: {
												_token: '{{ csrf_token() }}',
												product_id: productId,
												quantity: quantity
											},
											success: function(response) {
												// Pastikan respons berisi message dan tampilkan alert
												if (response && response.message) {
													alert(response.message);  // Tampilkan pesan dari server
												} else {
													alert('Produk berhasil ditambahkan ke keranjang.');
												}
											},
											error: function(xhr, status, error) {
												console.log(xhr.responseText); // Tampilkan log error jika ada
												alert('Produk berhasil ditambahkan ke keranjang.');
											}
										});
									}
								</script>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

			<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">DigiPrint</a></div>
						</div>
						<div class="footer_phone">+62 068 005 3570</div>
						<div class="footer_contact_text">
							<p>Jln Bhayangkara no.44</p>
							<p>Surakarta</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
				<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="fa fa-heart" aria-hidden="true"></i></a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{ url('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ url('css/bootstrap4/popper.js')}}"></script>
<script src="{{ url('css/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{ url('plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{ url('plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{ url('plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{ url('plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{ url('plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{ url('plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{ url('plugins/easing/easing.js')}}"></script>
<script src="{{ url('js/product_custom.js')}}"></script>

</body>

</html>