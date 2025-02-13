<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap4/bootstrap.min.css')}}">
        <link href="{{ url('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ url('css/cart_styles.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/cart_responsive.css')}}">

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

	<!-- Cart -->

	<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Shopping Cart</div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach ($cartItems as $item) <!-- Looping untuk setiap item dalam keranjang -->
                                <li class="cart_item clearfix">
                                    @if($item['image']) <!-- Akses image dari array $item -->
                                        <div class="cart_item_image">
                                            <img src="{{ asset('storage/products/' . $item['image']) }}" alt="{{ $item['name'] }}">
                                        </div>
                                    @else
                                        <p>No image available</p>
                                    @endif
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Name</div>
                                            <div class="cart_item_text">{{ $item['name'] }}</div> <!-- Akses nama dari array $item -->
                                        </div>
                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">Color</div>
                                            <div class="cart_item_text"><span style="background-color:#999999;"></span>Silver</div>
                                        </div>
                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Quantity</div>
                                            <div class="cart_item_text">{{ $item['quantity'] }}</div> <!-- Akses quantity dari array $item -->
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Price</div>
                                            <div class="cart_item_text">Rp. {{ number_format($item['price'], 2) }}</div> <!-- Akses price dari array $item -->
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Total</div>
                                            <div class="cart_item_text">Rp. {{ number_format($item['price'] * $item['quantity'], 2) }}</div> <!-- Hitung total berdasarkan quantity dan price -->
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Order Total -->
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Order Total:</div>
                            <div class="order_total_amount">Rp. {{ number_format($totalPrice, 2) }}</div> <!-- Total harga -->
                        </div>
                    </div>
					<div class="cart_buttons">
    <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf
        <button type="submit" class="button cart_button_checkout">Checkout</button>
    </form>
</div>

                </div>
            </div>
        </div>
    </div>
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
        <script src="{{ url('plugins/easing/easing.js')}}"></script>
        <script src="{{ url('(js/cart_custom.js')}}"></script>
</body>

</html>