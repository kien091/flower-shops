<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="./assets/js/main.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
		integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./assets/CSS/style.css">
	<link rel="stylesheet" href="./assets/CSS/responsive.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="./assets/css/toast_message.css">
	<script src="./assets/js/toast_message.js"></script>
	<title>Flower Shop</title>
	<script>
		var countDownDate = new Date("May 30, 2023 00:00:00").getTime();
		var x = setInterval(
			function () {
				var now = new Date().getTime();
				var distance = countDownDate - now;
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				document.querySelector(".days").innerHTML = days + " Ngày";
				document.querySelector(".hours").innerHTML = hours + " Giờ";
				document.querySelector(".minutes").innerHTML = minutes + " Phút";
				document.querySelector(".seconds").innerHTML = seconds + " Giây";

			}, 1000);
	</script>
</head>

<body>
	<div id='header'>
		<div class="main-nav-container">
			<div class="menu-header">
				<div class="menu-main">
					<nav class="navbar navbar-expand-sm w-100">
						<button class="navbar-toggler" type="button" data-toggle="collapse"
							data-target="#collapsibleNavbar">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</button>
						<div class="collapse navbar-collapse" id="collapsibleNavbar">
							<ul class="navbar-nav">
								<li class="nav-item ">
									<a class="nav-link" href="#">
										<i class="fa-solid fa-house"></i>
										Home</a>
								</li>
								<li class="nav-item ">
									<a class="nav-link" href="#content">
										<i class="fa-solid fa-rectangle-ad"></i> Introduce</a>
								</li>
								<li class="nav-item ">
									<a class="nav-link" href="#product"><i class="fa-brands fa-shopify"></i> Product</a>
								</li>
								<li class="nav-item ">
									<a class="nav-link" href="#contact">
										<i class="fa-solid fa-phone"></i>
										contact</a>
								</li>
								<li class="nav-item ">
									<a class="nav-link" href="#footer">
										<i class="fa-solid fa-rectangle-ad"></i> More Introduction</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
				<div class="menu-account">
					<nav class="navbar navbar-expand-sm w-100">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
									<i class="fa-solid fa-user"></i>
									Account
								</a>
								<div class="dropdown-menu bg-purple">
									<?php
										require_once("./connect.php");

										$id_account = $_COOKIE['id'];
										$sql = "SELECT role FROM account WHERE id_account = '$id_account'";
										if(mysqli_fetch_assoc(mysqli_query($conn, $sql))['role'] == 0){
											?>
											<a class="nav-link text-dark decor" href="./admin.php">
												<i class="fa-sharp fa-solid fa-user-tie"></i> Admin</a>
											<?php
										}
									?>
									<a class="nav-link text-dark decor" href="./profile.php">
										<i class="fa-sharp fa-solid fa-user-tie"></i> Profile</a>
									<a class="nav-link text-dark decor " href="./history_order.php">
										<i class="fa-solid fa-right-to-bracket"></i> Order</a>
									<a class="nav-link text-dark decor" href="./index.php">
										<i class="fa-solid fa-right-from-bracket"></i> Log out</a>
								</div>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="header-with-search">
				<div class="header-with-search__Logo">
					<a href="#"><img src="./assets/images/Logo/logo1-removebg.png" alt="" class="img-logo"></a>
				</div>
				<div class="header-with-search__Search">
					<input type="text" placeholder="Search by Keyword Flower" class="snize-input-style">
					<button class="btn-ssize btn-normal"><i class="fa-solid fa-magnifying-glass"></i></button>

				</div>
				<div class="account-nav border-center">
					<a href="" style="text-decoration: none; color: inherit; font-size: 150%;">
						<i class="fa-solid fa-cart-shopping cart"></i>
					</a>
				</div>
			</div>
		</div>

	</div>
	<div id="slider">
		<div class="slides">
			<div id="slideshow">
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="./assets/images/Slider/Slider1.jpg" alt="Name" class="size-img-bg">
							<div class="carousel-caption d-none d-md-block">
								<h2 class="text-dark" style="font-weight:bold;">Hoa mang niềm vui đến với mọi nhà 2</h5>
									<p style="color: red; font-size: 25px; font-weight:400;">Không có cuộc sống nào là tự do, đôi khi
										nhẹ nhàng với một tuyên truyền run rẩy.</p>
							</div>
						</div>
						<div class="carousel-item">
							<img src="./assets/images/Slider/Slider2.jpg" alt="Name" class="size-img-bg">
							<div class="carousel-caption d-none d-md-block text-dark">
								<h2 class="text-dark" style="font-weight:bold;">Hoa mang niềm vui đến với mọi nhà</h5>
									<p style="color: red; font-size: 25px; font-weight:400;">Khách hàng là rất quan trọng, khách hàng
										sẽ được theo dõi bởi khách hàng.</p>
							</div>
						</div>
						<div class="carousel-item">
							<img src="./assets/images/Slider/Slider3.jpg" alt="Name" class="size-img-bg">
							<div class="carousel-caption d-none d-md-block text-dark">
								<h2 style="font-weight:bold; color: #00e300;">Hoa mang niềm vui đến với mọi nhà 1</h5>
									<p style="color: red; font-size: 25px; font-weight:400;">Đó là một cơ hội tuyệt vời để theo đuổi
										một nghề nghiệp hay một sự nghiệp.</p>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		<div class="Quick-search">
			<div class="Quick-search__Logo">
				<p>QUICK SEARCH</p>
			</div>
			<div class="Pet-select select">
				<select name="pets">
					<option value="">Select Categories</option>
					<option value="Birthday">Birthday Flower</option>
					<option value="Valentine">Valentine</option>
					<option value="Anniversary Flower">Anniversary Flower</option>
					<option value="Decoration Flower">Decoration Flower</option>
				</select>
			</div>
			<div class="Price-select select">
				<select name="prices">
					<option value="">Select Prices</option>
					<option value="Birthday">100000</option>
					<option value="Valentine">10000000-2000000</option>
				</select>
			</div>

			<button class="btn-normal btn-quick border-center"><i class="fa-brands fa-searchengin"></i></button>
		</div>
	</div>
	<div id="content" class="smtop">
		<div class="img-about">
			<div class="about-section">
				<div class="container-word ">
					<h4 class="section-heading">A LITTLE SHOP ABOUT ME</h4>
					<p class="section-sub-heading">We love Flower</p>
					<p class="section-about">
						Chào mừng đến với shop bán hoa của chúng tôi! Với nhiều năm kinh nghiệm trong ngành, chúng tôi
						tự hào mang đến cho khách hàng những bó hoa đẹp và tinh tế nhất!
					</p>
				</div>

			</div>
		</div>
		<div class="purchase-progress">
			<div class="container">
				<div class="row  justify-content-between custom-class">
					<div class="col-12 col-sm-12 .col-md-1 col-lg-4 col-xl-4">
						<div class="card ">
							<div class="card-body benefit">
								<div class="icon-be" style="font-size: 30px;">
									<i class="fa-solid fa-truck"></i>
								</div>
								<div class="box-tittle">
									<h4 class="infor">Giao hàng 24/7</h4>
									<div class="box-content">
										<p>Tiền vận chuyển rẻ</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12 .col-md-1 col-lg-4 col-xl-4">
						<div class="card ">
							<div class="card-body benefit">
								<div class="icon-be" style="font-size: 30px;">
									<i class="fa-solid fa-truck"></i>
								</div>
								<div class="box-tittle">
									<h4 class="infor">Vẫn Chuyển an toàn</h4>
									<div class="box-content">
										<p>An toàn là trên hết</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12 .col-md-1 col-lg-4 col-xl-4">
						<div class="card ">
							<div class="card-body benefit">
								<div class="icon-be" style="font-size: 30px;">
									<i class="fa-solid fa-rotate"></i>
								</div>
								<div class="box-tittle">
									<h4 class="infor">Chính sách đổi trả</h4>
									<div class="box-content">
										<p>Nhanh gọn</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div id="product" class="smtop">
		<div class="heading-product">
			<h3 class="heading-items">
				Valentine Flower
			</h3>
		</div>
		<div class="container-fluid">
			<div class="row members-list">
				<?php
					require_once("./connect.php");

					$sql = "SELECT * FROM product WHERE categories = 'Valentine Day'";
                    $result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result)){
						?>
						<form class="col-6 col-sm-4 .col-md-1 col-lg-4 mb-5" method="POST" action="./order.php">
							<div class="card ">
								<div class="card-body item-product center">
									<div class="row">
										<div class="col-lg-6">
											<img src="./assets/images/product/<?php echo $row['image']?>" alt=""
												class="card-img-top pic-product">
										</div>
										<div class="col-lg-6 text">
											<h4 class="card-title text-center"><?php echo $row['name']?></h4>
											<p class="text-muted" style="font-size:13px; height: 150px"><?php echo $row['note']?></p>
											<p class="card-text text-center"><?php echo $row['price'] . ".000 VND"?></p>
											<button type="submit" class="btn-normal s-full-width js-buy-btn" value="<?php echo $row['id_product']?>" name="submit" 
												style="width: 100%;">Order</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						<?php
					}
				?>
			</div>
		</div>
		<div class="heading-product">
			<h3 class="heading-items">
				Birthday flower
			</h3>
		</div>
		<div class="container-fluid">
			<div class="row members-list">
				<?php
					require_once("./connect.php");

					$sql = "SELECT * FROM product WHERE categories = 'Birthday'";
                    $result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result)){
						?>
						<form class="col-6 col-sm-4 .col-md-1 col-lg-4 mb-5" method="POST" action="./order.php">
							<div class="card ">
								<div class="card-body item-product center">
									<div class="row">
										<div class="col-lg-6">
											<img src="./assets/images/product/<?php echo $row['image']?>" alt=""
												class="card-img-top pic-product">
										</div>
										<div class="col-lg-6 text">
											<h4 class="card-title text-center"><?php echo $row['name']?></h4>
											<p class="text-muted" style="font-size:13px; height: 150px"><?php echo $row['note']?></p>
											<p class="card-text text-center"><?php echo $row['price'] . ".000 VND"?></p>
											<button type="submit" class="btn-normal s-full-width js-buy-btn" value="<?php echo $row['id_product']?>" name="submit" 
												style="width: 100%;">Order</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						<?php
					}
				?>
			</div>
		</div>
	</div>
	<div id="subrice">
		<div class="project">
			<div class="text-project">
				<h3 class="heading-project text-center">Top 3 typical employees of the month</h3>
				<p class="Sub-heading-project">Tận tâm , chu đáo , nhiệt huyết</p>
			</div>
			<div class="container-fluid">
				<div class="row members-list justify-content-between custom-class">
					<div class="col-12 col-sm-12 .col-md-1 col-lg-4 col-xl-4">
						<div class="card ">
							<div class="card-body places-list text-center">
								<img src="./assets/images/Content/project/Staft/staft1.jpg" alt="New York"
									class="staft-img">
								<h3 class="heading">James Joriged</h3>
								<p class="staft-time">Thu 27 Nov 2003</p>
								<p class="staft-desc">2 years (as of 2021)</p>
								<button class="btn-normal s-full-width js-buy-btn">Contact a consultant</button>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12 .col-md-1 col-lg-4 col-xl-4">
						<div class="card ">
							<div class="card-body places-list text-center">
								<img src="./assets/images/Content/project/Staft/staft1.jpg" alt="New York"
									class="staft-img">
								<h3 class="heading">James Joriged</h3>
								<p class="staft-time">Thu 27 Nov 2003</p>
								<p class="staft-desc">2 years (as of 2021)</p>
								<button class="btn-normal s-full-width js-buy-btn">Contact a consultant</button>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12 .col-md-1 col-lg-4 col-xl-4">
						<div class="card ">
							<div class="card-body places-list text-center">
								<img src="./assets/images/Content/project/Staft/staft1.jpg" alt="New York"
									class="staft-img">
								<h3 class="heading">James Joriged</h3>
								<p class="staft-time">Thu 27 Nov 2003</p>
								<p class="staft-desc">2 years (as of 2021)</p>
								<button class="btn-normal s-full-width js-buy-btn">Contact a consultant</button>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div id="saleoff">
		<div class="sale-img">
			<img src="./assets//images/SaleOff/sale.jpg" alt="" class="flower-sale">
		</div>
		<div class="countdown">
			<h2 style="text-align: center; color: #fd0000;">Hurry Up!!!</h2>
			<h3 style="text-align: center; ">Hot Deal ! <span style="color: #fd0000;">Sale up to 30%</span></h3>
			<p style="text-align: center; ">Nhanh tay kẻo , nhân ngày 30 tháng 4 shop sẽ sale sập sàng các loại hoa</p>
			<div class="countdown-time">
				<span class="days"></span>
				<span class="hours"></span>
				<span class="minutes"></span>
				<span class="seconds"></span>
			</div>
			<div style="text-align: center;" class="btn-shop">
				<button type="button" class="btn btn-danger">Shop Now</button>
			</div>
		</div>

	</div>
	<div id="contact" class="smtop">
		<h2 class="section-heading">Liên hệ</h2>
		<p class="section-sub-heading">Liên hệ với chúng tôi dưới đây</p>
		<div class="text-center" style="display: block;">
			<p class="mt-16"><i class="fa-solid fa-location-dot"></i> 22 Đ. Nguyễn Đình Chiểu, Vĩnh Phước, Nha Trang,
				Vĩnh Phước, Việt Nam</p>
			<p class="mt-16"><i class="fa-solid fa-phone"></i> Phone: <a href="tell:  +00 151515"> +00 151515</a></p>
			<p class="mt-16"><i class="fa-solid fa-envelope"></i> Email: <a
					href="mailto: mail@mail.com">mail@mail.com</a></p>
		</div>
		<div class="map">
			<a
				href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%91%E1%BA%A1i+h%E1%BB%8Dc+T%C3%B4n+%C4%90%E1%BB%A9c+Th%E1%BA%AFng+-+Ph%C3%A2n+hi%E1%BB%87u+Kh%C3%A1nh+H%C3%B2a/@12.27103,109.2014306,17.25z/data=!4m6!3m5!1s0x317067ec4dea80dd:0xa0bcb74ba7ab732c!8m2!3d12.2709155!4d109.2035822!16s%2Fg%2F1tdzj140?hl=vi-VN">
				<img src="./assets/images/contact/ShopFlowerAddress.PNG" class="shop-image" style="width:100%">
			</a>
		</div>
	</div>
	<div id="footer">
		<div class="contain">
			<div class="row">
				<div class="col-md-3 col-sm-6 mr-n2">
					<div class="about-us text-center">
						<h5 style="color: #ca9a47;">Shop Flower</h5>
						<p style="color: #ca9a47; font-size: 12px;">
							<i class="fa-solid fa-location-dot"></i> 22 Đ. Nguyễn Đình Chiểu, Vĩnh Phước, Nha Trang,
							Vĩnh Phước, Việt Nam
						</p>
						<p style="color: #ca9a47; font-size: 12px">
							<i class="fa-solid fa-phone"></i> Phone: +00 151515
						</p>
						<p style="color: #ca9a47; font-size: 12px">
							<i class="fa-solid fa-envelope"></i> E-mail : ShopBanHoa@gmail.com
						</p>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 mr-n2">
					<div class="info text-center">
						<h3 style="color: #ca9a47;">Working Hours</h3>
						<ul style="color: #ca9a47; list-style: none; font-size: 12px;">
							<li>Monday : 10AM - 9PM</li>
							<li>Tuesday : 10AM - 9PM</li>
							<li>Wednesday : 10AM - 9PM</li>
							<li>Thursday : 10AM - 9PM</li>
							<li>Friday : 10AM - 9PM</li>
							<li>Saturday : 10AM - 5PM</li>
							<li>Sunday : Closed</li>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 mr-n2">
					<div class="info text-center">
						<h3 style="color: #ca9a47;">Infomation</h3>
						<ul style="color: #ca9a47; list-style: none; font-size: 12px;">
							<li>About Us</li>
							<li>Sale</li>
							<li>priacy</li>
							<li>Our policy</li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 mr-n2">
					<div class="info text-center">
						<h3 style="color: #ca9a47;">Follow Us</h3>
						<ul style="color: #ca9a47; list-style: none; font-size: 30px;">
							<i class="fa-brands fa-facebook"></i>
							<i class="fa-brands fa-twitter"></i>
							<i class="fa-brands fa-youtube"></i>
							<i class="fa-brands fa-tiktok"></i>
						</ul>
					</div>
				</div>
			</div>


			<div class="subrice"></div>
			<div class="openning"></div>
		</div>
	</div>

	<div class="toast" data-autohide="false" style="z-index: 999999;"></div>
	<script>
		const message = localStorage.getItem("message");
		console.log(message);
		if(message == "success"){
			showWelcome();
		}
		else if(message == "successOrder"){
			showSuccessOrder();
		}
		else if(message == "errorOrder"){
			showErrorOrder();
		}
		localStorage.setItem("message", "");
	</script>
</body>

</html>