<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Landbank Monitoring System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="description" content="">
	<meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
	<meta name="author" content="Huban Creative">

	<!-- Base Css Files -->
<!--	<link href="--><?php //echo base_url('assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet'); ?><!--" />-->
	<link href="<?php echo base_url('assets/jqueryui/jquery-ui.min.css" rel="stylesheet'); ?>" />
	<link href="<?php echo base_url('assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet'); ?>" />

	<script src="<?php echo base_url('assets/jquery-1.12.2.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jqueryui/external/jquery/jquery.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jqueryui/jquery-ui.min.js'); ?>"></script>

	<link href="<?php echo base_url('assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet'); ?>" />
	<link href="<?php echo base_url('assets/libs/fontello/css/fontello.css" rel="stylesheet'); ?>" />
	<link href="<?php echo base_url('assets/libs/animate-css/animate.min.css" rel="stylesheet'); ?>" />
	<link href="<?php echo base_url('assets/libs/nifty-modal/css/component.css" rel="stylesheet'); ?>" />
	<link href="<?php echo base_url('assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet'); ?>" />
	<link href="<?php echo base_url('assets/libs/ios7-switch/ios7-switch.css" rel="stylesheet'); ?>" />
	<link href="<?php echo base_url('assets/libs/pace/pace.css" rel="stylesheet'); ?>" />
	<link href="<?php echo base_url('assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet'); ?>" />
	<link href="<?php echo base_url('assets/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet'); ?>" />
<!--	<link href="--><?php //echo base_url('assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet'); ?><!--" />-->
<!--	<link href="--><?php //echo base_url('assets/libs/jquery-icheck/skins/all.css" rel="stylesheet'); ?><!--" />-->
	<!-- Code Highlighter for Demo -->
	<link href="<?php echo base_url('assets/libs/prettify/github.css" rel="stylesheet'); ?>" />



	<!-- Extra CSS Libraries Start -->
	<link href="<?php echo base_url('assets/libs/rickshaw/rickshaw.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/libs/morrischart/morris.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/libs/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/libs/jquery-clock/clock.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/libs/bootstrap-calendar/css/bic_calendar.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/libs/sortable/sortable-theme-bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/libs/jquery-weather/simpleweather.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/libs/bootstrap-xeditable/css/bootstrap-editable.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/libs/jquery-datatables/css/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css" />
	<!-- Extra CSS Libraries End -->
	<link href="<?php echo base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
	<!--<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>-->
<!--	<![endif]-->

	<link rel="shortcut icon" href="<?php echo base_url('images/logo.png') ?>">
	<link rel="apple-touch-icon" href="<?php echo base_url('assets/img/apple-touch-icon.png'); ?>" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assets/img/apple-touch-icon-57x57.png'); ?>" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/img/apple-touch-icon-72x72.png'); ?>" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-touch-icon-76x76.png'); ?>" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/img/apple-touch-icon-114x114.png'); ?>" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/img/apple-touch-icon-120x120.png'); ?>" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('assets/img/apple-touch-icon-144x144.png'); ?>" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/img/apple-touch-icon-152x152.png'); ?>" />

	<!-- bootgrid -->
	<link href="<?php echo base_url('assets/bootgrid/js/jquery.bootgrid.css'); ?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/bootgrid/js/jquery-1.11.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/bootgrid/js/jquery.bootgrid.min.js'); ?>"></script>

	<!-- Charts JS -->
	<script src="<?php echo base_url('assets/charts/Chart.bundle.js') ?>"></script>
	<script src="<?php echo base_url('assets/charts/Chart.bundle.min.js') ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/charts/Chart.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/charts/Chart.min.css') ?>">


</head>
<style>
	ul.breadcrumb {
		padding: 8px 16px;
		list-style: none;
		background-color: #eee;
	}
	ul.breadcrumb li {display: inline;}
	ul.breadcrumb li+li:before {
		padding: 8px;
		color: black;
		/*content: "/\00a0";*/
	}
	ul.breadcrumb li a {color: black;}
</style>