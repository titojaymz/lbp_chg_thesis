<?php
/**
 * Created by Josef Friedrich Baldo.
 * Date: 10 Oct 2017
 * Time: 17:56
 */
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Landbank Monitoring System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <!-- Base Css Files -->
    <link href="<?php echo base_url('assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/libs/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/libs/fontello/css/fontello.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/libs/animate-css/animate.min.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/libs/nifty-modal/css/component.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/libs/magnific-popup/magnific-popup.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/libs/ios7-switch/ios7-switch.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/libs/pace/pace.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/libs/sortable/sortable-theme-bootstrap.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/libs/bootstrap-datepicker/css/datepicker.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/libs/jquery-icheck/skins/all.css') ?>" rel="stylesheet" />
    <!-- Code Highlighter for Demo -->
    <link href="<?php echo base_url('assets/libs/prettify/github.css') ?>" rel="stylesheet" />

    <!-- Extra CSS Libraries Start -->
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Extra CSS Libraries End -->
    <link href="<?php echo base_url('assets/css/style-responsive.css') ?>" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('assets/html5shiv.js') ?>"></script>
    <script src="<?php echo base_url('assets/respond.min.js') ?>"></script>
    <![endif]-->

    <link rel="shortcut icon" href="<?php echo base_url('images/logo.png') ?>">
    <link rel="apple-touch-icon" href="<?php echo base_url('assets/img/apple-touch-icon.png') ?>" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assets/img/apple-touch-icon-57x57.png') ?>" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/img/apple-touch-icon-72x72.png') ?>" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-touch-icon-76x76.png') ?>" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/img/apple-touch-icon-114x114.png') ?>" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/img/apple-touch-icon-120x120.png') ?>" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('assets/img/apple-touch-icon-144x144.png') ?>" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/img/apple-touch-icon-152x152.png') ?>" />
</head>
<body class="fixed-left login-page">
<!-- Modal Start -->
<!-- Modal Task Progress -->
<div class="md-modal md-3d-flip-vertical" id="task-progress">
    <div class="md-content">
        <h3><strong>Task Progress</strong> Information</h3>
        <div>
            <p>CLEANING BUGS</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80&#37; Complete</span>
                </div>
            </div>
            <p>POSTING SOME STUFF</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                    <span class="sr-only">65&#37; Complete</span>
                </div>
            </div>
            <p>BACKUP DATA FROM SERVER</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                    <span class="sr-only">95&#37; Complete</span>
                </div>
            </div>
            <p>RE-DESIGNING WEB APPLICATION</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">100&#37; Complete</span>
                </div>
            </div>
            <p class="text-center">
                <button class="btn btn-danger btn-sm md-close">Close</button>
            </p>
        </div>
    </div>
</div>

<!-- Modal Logout -->
<div class="md-modal md-just-me" id="logout-modal">
    <div class="md-content">
        <h3><strong>Logout</strong> Confirmation</h3>
        <div>
            <p class="text-center">Are you sure want to logout from this awesome system?</p>
            <p class="text-center">
                <button class="btn btn-danger md-close">Nope!</button>
                <a href="login.html" class="btn btn-success md-close">Yeah, I'm sure</a>
            </p>
        </div>
    </div>
</div>        <!-- Modal End -->