<header class="header-desktop2">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="header-wrap2">
				<div class="logo d-block d-lg-none">
					<a href="#">
						<h2 style="color: white;">MyCoffeeBook</h2>
					</a>
				</div>
				<div class="header-button2">
					<div class="header-button-item mr-0 js-sidebar-btn">
						<i class="zmdi zmdi-menu"></i>
					</div>
					<div class="setting-menu js-right-sidebar d-none d-lg-block">
						<div class="account-dropdown__body">
							<div class="account-dropdown__item">
								<a href="#">
									<i class="zmdi zmdi-settings"></i>Setting</a>
							</div>
						<h2 style="color: white;">MyCoffeeBook</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
	<div class="logo">
		<a href="#">
			<img src="images/icon/logo-white.png" alt="Cool Admin" />
		</a>
	</div>
	<div class="menu-sidebar2__content js-scrollbar1">
		<div class="account2">
			<div class="image img-cir img-120">
				<img src="images/icon/avatar-big-01.jpg" alt="John Doe" />
			</div>
			<h4 class="name">Admin</h4>
			<a href="<?php echo _URL.'admin/logout' ?>">Sign out</a>
		</div>
		<nav class="navbar-sidebar2">
			<ul class="list-unstyled navbar__list">
				<li>
					<a href="<?php echo _URL.'admin/main' ?>">
						<i class="fas fa-tachometer-alt"></i>Dashboard</a>
				</li>
				<li>
					<a href="#">
						<i class="fas fa-book"></i>Data Resep</a>
				</li>
				<li>
					<a href="<?php echo _URL.'admin/user' ?>">
						<i class="fas fa-user"></i>Data Users</a>
				</li>
				<li>
					<a href="<?php echo _URL.'admin/kriteria' ?>">
						<i class="fas fa-align-left"></i>Data Kriteria</a>
				</li>
				<li>
					<a href="#">
						<i class="fas fa-calendar-check"></i>Data Nilai Kriteria</a>
				</li>
				
			</ul>
		</nav>
	</div>
</aside>