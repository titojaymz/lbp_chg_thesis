
<?php $access = $this->session->userdata('gset_access') ;

$uid = $this->session->userdata('gset_userID');?>
<!-- Top Bar End -->
<!-- Left Sidebar Start -->
<div class="left side-menu">
	<div class="sidebar-inner slimscrollleft">
		<div class="clearfix"></div>
		<!--- Profile -->
		<div class="profile-info">
			<div class="col-xs-4">
			</div>
			<div class="col-xs-8">
				<div class="profile-text">Welcome</div>
			</div>
		</div>
		<!--- Divider -->
		<div class="clearfix"></div>
		<hr class="divider" />
		<div class="clearfix"></div>
		<!--- Divider -->
		<div id="sidebar-menu">
			<ul>
				<li>
						<a href="<?php echo base_url('public_access/index');?>"><i class='icon-home-3'></i><span>Dashboard</span></a>

				</li>
				<li class='has_sub'>
					<a href='javascript:void(0);'>
						<i class='icon-pencil-3'></i><span>Request Forms</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
					</a>
					<ul>
						<li><a href="<?php echo base_url('transport') ?>"><span>Transportation</span></a></li>
						<li><a href="<?php echo base_url('procurement') ?>"><span>Procurement</span></a></li>
						<li><a href="<?php echo base_url('hr') ?>"><span>Human Resource</span></a></li>
						<li><a href="<?php echo base_url('bld_ofc_prop') ?>"><span>Building/Office/Property</span></a></li>
						<li><a href="<?php echo base_url('records') ?>"><span>Records</span></a></li>
						<li><a href="<?php echo base_url('other_logistics') ?>"><span>Other Logistic Request</span></a></li>
					</ul>
				</li>
<!--				--><?php //if($access == -1){ ?>
					<li class='has_sub'>
						<a href='javascript:void(0);'>
							<i class='icon-book-2'></i><span>Libraries</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
						</a>
						<ul>
							<li><a href="#"><span>Status</span></a></li>
							<li><a href="#"><span>Maintenance</span></a></li>
							<li><a href="#"><span>Facility</span></a></li>
							<li><a href="#"><span>Conference Room</span></a></li>
							<li><a href="#"><span>Vehicle</span></a></li>
							<li><a href="#"><span>Drivers</span></a></li>
						</ul>
					</li>


				<li class='has_sub'>
					<a href='javascript:void(0);'>
						<i class='icon-music-1'></i><span>Reports</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
					</a>
					<ul>
						<li><a href="#"><span>Accomplished Request</span></a></li>
					</ul>
				</li>
				<li class='has_sub'>
					<a href='javascript:void(0);'>
						<i class='icon-alert'></i><span>Access Control</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
					</a>
					<ul>
						<li><a href="<?php echo base_url('user/userlist');?>"><span>Users</span></a></li>
					</ul>
				</li>
				<li>

					<a href="#"><i class='glyphicon glyphicon-refresh'></i><span > Change Password</span><span class="pull-right"></span></a>
				</li>

				<li>

					<a href="#"><i class='fa fa-magic'></i><span >Download User Manual</span><span class="pull-right"></span></a>
				</li>
				<li>
					<a href='javascript:void(0);' class="md-trigger" data-modal="logout-modal"><i class="fa fa-power-off text-red-1"></i><span > Logout</span><span class="pull-right"></span></a>
				</li>
				<div class="clearfix"></div>
				</ul>
		</div>
		</div>
		</div>

<?php ?>