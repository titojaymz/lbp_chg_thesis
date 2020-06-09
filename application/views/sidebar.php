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
                <?php if($access_level == -1 || $access_level == 1){ ?>
                <li class='has_sub'>
					<a href="#"><i class='icon-home-3'></i><span>Dashboard</span></a>
                    <ul>
                        <li><a href="<?php echo base_url('dashboard/index') ?>">No of land owners</a></li>
                        <li><a href="<?php echo base_url('dashboard/index2') ?>">No of FBs</a></li>
                        <li><a href="<?php echo base_url('dashboard/fully_paid_claims') ?>">Fully paid claims</a></li>
                        <li><a href="<?php echo base_url('dashboard/partial_paid_claims') ?>">Partially paid claims</a></li>
                        <li><a href="<?php echo base_url('dashboard/paid_under_ao2') ?>">Paid under AO2</a></li>
                        <li><a href="<?php echo base_url('dashboard/approved_claims') ?>">Approved claims</a></li>
                        <li><a href="<?php echo base_url('dashboard/area_approved') ?>">Total area - Fully paid</a></li>
                        <li><a href="<?php echo base_url('dashboard/area_partial_paid') ?>">Total area - Partially paid</a></li>
                        <li><a href="<?php echo base_url('dashboard/area_paid_under_ao2') ?>">Total area - Paid under AO2</a></li>
                        <li><a href="<?php echo base_url('dashboard/area_approved_claims') ?>">Total area - Approved claims</a></li>
                        <li><a href="<?php echo base_url('dashboard/area_pending') ?>">Total area - Pending claims</a></li>
                    </ul>
				</li>
                <?php } ?>
				<li>
					<a href="<?php echo base_url('landregistration') ?>"><i class='icon-pencil'></i><span>Masterlist</span></a>

				</li>
				<?php /* ?>
				<li class='has_sub'>
					<a href='javascript:void(0);'>
						<i class='icon-pencil-3'></i><span>Forms</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
					</a>
					<ul>
						<li><a href="<?php echo base_url('landregistration') ?>"><span>Land Registration</span></a></li>
					</ul>
				</li>
				<?php */ ?>
<!--				--><?php if($access_level == -1 || $access_level == 1){ ?>
					<li class='has_sub'>
						<a href='javascript:void(0);'>
							<i class='icon-book-2'></i><span>Libraries</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
						</a>
						<ul>
                            <li>
                                <a href="<?php echo base_url('landowner') ?>"><span>Landowners</span></a>
                            </li>
							<li>
								<a href="<?php echo base_url('psgc_region') ?>"><span>PSGC Region</span></a>
							</li>
							<li>
								<a href="<?php echo base_url('landclass') ?>"><span>Land Classification</span></a>
							</li>
							<li>
								<a href="<?php echo base_url('signatory') ?>"><span>Signatories</span></a>
							</li>
							<li>
								<a href="<?php echo base_url('position') ?>"><span>Position</span></a>
							</li>
							<li>
							    <a href="<?php echo base_url('division') ?>"><span>Division</span></a>
							</li>
							<li>
								<a href="<?php echo base_url('status') ?>"><span>Status</span></a>
							</li>
						</ul>
					</li>


				<li class='has_sub'>
					<a href='javascript:void(0);'>
						<i class='icon-music-1'></i><span>Reports</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
					</a>
					<ul>
						<li><a href="<?php echo base_url('reports/masterlistview') ?>"><span>Masterlist</span></a></li>
						<li><a href="<?php echo base_url('reports/approvedClaimsview') ?>"><span>Approved claims</span></a></li>
						<?php /*
                        <li><a href="<?php echo base_url('reports/approvedClaims') ?>"><span>Status CF Recieved from DAR</span></a></li>
						<li><a href="<?php echo base_url('reports/approvedClaims') ?>"><span>Summary of ApprvdClaim RA6657</span></a></li>
						<li><a href="<?php echo base_url('reports/approvedClaims') ?>"><span>Reasons Returned to DAR</span></a></li>
						<li><a href="<?php echo base_url('reports/approvedClaims') ?>"><span>Summary Land Valuation Accomp</span></a></li>
						<li><a href="<?php echo base_url('reports/approvedClaims') ?>"><span>Summary Approved Claims</span></a></li>
						<li><a href="<?php echo base_url('reports/approvedClaims') ?>"><span>Monthly Monitoring</span></a></li>
						<li><a href="<?php echo base_url('reports/approvedClaims') ?>"><span>Received Claim Folders</span></a></li>
                        */ ?>
					</ul>
				</li>
				<li class='has_sub'>
					<a href='javascript:void(0);'>
						<i class='icon-alert'></i><span>Access Control</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
					</a>
					<ul>
						<li><a href="<?php echo base_url('user/userlist');?>"><span>Users</span></a></li>
                        <li><a href="<?php echo base_url('user/userlevellist');?>"><span>User levels</span></a></li>
						<?php /* <li><a href="<?php echo base_url('user/userlist');?>"><span>Audit Trails</span></a></li> */ ?>
					</ul>
				</li>
				<?php } ?>
<!--				<li>-->
<!---->
<!--					<a href="#"><i class='glyphicon glyphicon-refresh'></i><span > Change Password</span><span class="pull-right"></span></a>-->
<!--				</li>-->
				<li>
					<a href='javascript:void(0);' class="md-trigger" data-modal="logout-modal"><i class="fa fa-power-off text-red-1"></i><span > Logout</span><span class="pull-right"></span></a>
				</li>
				<div class="clearfix"></div>
				</ul>
		</div>
		</div>
		</div>

<?php ?>