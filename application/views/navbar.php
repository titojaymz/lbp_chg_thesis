
<body class="fixed-left">
<!-- Modal Start -->
<!-- Modal Task Progress -->


<!-- Modal Logout -->
<div class="md-modal md-just-me" id="logout-modal">
	<div class="md-content">
		<h3><strong>Logout</strong> Confirmation</h3>
		<div>
			<p class="text-center">Are you sure want to logout from this awesome system?</p>
			<p class="text-center">
				<button class="btn btn-danger md-close">Nope!</button>
				<a href="<?php echo base_url('user/logout'); ?>" class="btn btn-success md-close">Yeah, I'm sure</a>
			</p>
		</div>
	</div>
</div>        <!-- Modal End -->
<!-- Begin page -->
<div id="wrapper">
	<!-- Top Bar Start gset_fullname -->
	<div class="topbar">
		<?php if ($access_level == -1){ ?>
		<div class="topbar-left">
			<div class="logo">
<!--				<a href="" class="rounded-image profile-image"><img src="--><?php //echo base_url('/images/dswd.jpg');?><!--"></a>-->
				<h1><a href="#"><img src="<?php echo base_url('/images/logo.png');?>" alt="Logo"></a>LCMS-AOC</h1>
			</div>
			<button class="button-menu-mobile open-left">
				<i class="fa fa-bars"></i>
			</button>
		</div>
		<?php } ?>
		<!-- Button mobile view to collapse sidebar menu -->
		<div class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-collapse2">
					<ul class="nav navbar-nav navbar-right top-navbar ">
						<li class="dropdown topbar-profile">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong><?php  echo $this->session->userdata('user_data') ?></strong> <i class="fa fa-caret-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?php // echo base_url('users/change_password/'.$uid.'');?>">Change Password</a></li>
								<li><a class="md-trigger" data-modal="logout-modal"><i class="icon-logout-1"></i> Logout</a></li>
							</ul>
						</li>

					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	</div>