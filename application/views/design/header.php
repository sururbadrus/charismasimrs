<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Free HTML5 Bootstrap Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link href="<?php echo base_url('assets/plugins/css/bootstrap-cerulean.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/plugins/css/charisma-app.css');?>" rel="stylesheet">
   <!-- <link href='<?php //echo base_url('assets/plugins/bower_components/fullcalendar/dist/fullcalendar.css');?>' rel='stylesheet'>
    <link href='<?php // echo base_url('assets/plugins/bower_components/fullcalendar/dist/fullcalendar.print.css');?>' rel='stylesheet' media='print'>-->
    <link href='<?php echo base_url('assets/plugins/bower_components/chosen/chosen.min.css')?>' rel='stylesheet'>
    <!--link href='<?php // echo base_url('assets/plugins/bower_components/colorbox/example3/colorbox.css');?>' rel='stylesheet'-->
    <!--link href='<?php // echo base_url('assets/plugins/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css');?>' rel='stylesheet'-->
    <link href='<?php echo base_url('assets/plugins/css/jquery.noty.css');?>' rel='stylesheet'>
    <link href='<?php echo base_url('assets/plugins/css/noty_theme_default.css');?>' rel='stylesheet'>
    <link href='<?php echo base_url('assets/plugins/css/elfinder.min.css');?>' rel='stylesheet'>
    <link href='<?php echo base_url('assets/plugins/css/elfinder.theme.css');?>' rel='stylesheet'>
    <link href='<?php echo base_url('assets/plugins/css/jquery.iphone.toggle.css');?>' rel='stylesheet'>
    <link href='<?php echo base_url('assets/plugins/css/uploadify.css');?>' rel='stylesheet'>
    <link href='<?php echo base_url('assets/plugins/css/animate.min.css');?>' rel='stylesheet'>
	<link href='<?php echo base_url('assets/plugins/css/spiner.css');?>' rel='stylesheet'>
   
    <script src="<?php echo base_url('assets/plugins/bower_components/jquery/jquery.min.js');?>"></script>
    
     <script src="<?php echo base_url('assets/plugins/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    
    <!-- library for cookie management -->
    <script src="<?php echo base_url('assets/plugins/js/jquery.cookie.js');?>"></script>
    <!-- calender plugin -->
    <script src='<?php echo base_url('assets/plugins/bower_components/moment/min/moment.min.js');?>'></script>
    <!--script src='<?php //echo base_url('assets/plugins/bower_components/fullcalendar/dist/fullcalendar.min.js');?>'></script-->
    <!-- data table plugin -->
    <!--script src='<?php //echo base_url('assets/plugins/js/jquery.dataTables.min.js');?>'></script-->
    
    <!-- select or dropdown enhancer -->
    <script src="<?php echo base_url('assets/plugins/bower_components/chosen/chosen.jquery.min.js');?>"></script>
    <!-- plugin for gallery image view -->
    <!--script src="<?php //echo base_url('assets/plugins/bower_components/colorbox/jquery.colorbox-min.js');?>"></script-->
    <!-- notification plugin -->
    <script src="<?php echo base_url('assets/plugins/js/jquery.noty.js');?>"></script>
    <!-- library for making tables responsive -->
    <!--script src="<?php //echo base_url('assets/plugins/bower_components/responsive-tables/responsive-tables.js');?>"></script-->
    <!-- tour plugin -->
    <!--script src="<?php //echo base_url('assets/plugins/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js');?>"></script-->
    <!-- star rating plugin -->
    <script src="<?php echo base_url('assets/plugins/js/jquery.raty.min.js');?>"></script>
    <!-- for iOS style toggle switch -->
    <script src="<?php echo base_url('assets/plugins/js/jquery.iphone.toggle.js');?>"></script>
    <!-- autogrowing textarea plugin -->
    <!--script src="<?php // echo base_url('assets/plugins/js/jquery.autogrow-textarea.js');?>"></script-->
    <!-- multiple file upload plugin -->
    <script src="<?php echo base_url('assets/plugins/js/jquery.uploadify-3.1.min.js');?>"></script>
    <!-- history.js for cross-browser state change on ajax -->
    <script src="<?php echo base_url('assets/plugins/js/jquery.history.js');?>"></script>
    <!-- application script for Charisma demo -->
    <!--script src="<?php //echo base_url('assets/plugins/js/charisma.js');?>"></script-->
    
	<?php
	
			if (isset($dp) && $dp==true) {
				echo assets_css(array('pub/dist/css/bootstrap-datetimepicker.min.css'));
                echo assets_js(array('pub/dist/js/bootstrap-datetimepicker.min.js','pub/dist/locales/bootstrap-datetimepicker.id.js'));
            }
			if (isset($dd) && $dd==true) {
				echo assets_css(array('pub/css/bootstrap-select.min.css'));
                echo assets_js(array('pub/js/bootstrap-select.min.js'));
            }
			if (isset($ac) && $ac==true) {
				echo assets_js(array('pub/js/bootstrap3-typeahead.min.js'));
            }
			
			if (isset($dt) && $dt==true) {
				echo assets_css(array('datatables/dataTables.bootstrap.css'));
                echo assets_js(array('datatables/jquery.dataTables.min.js','datatables/dataTables.bootstrap.min.js'));
            }
			
			if (isset($jq) && $jq==true) {
				echo assets_css(array('pub/css/girlly/jquery-ui-1.10.3.custom.min.css','pub/css/ui.jqgrid.css','pub/css/ui.jqgrid-bootstrap.css','pub/css/ui.jqgrid-bootstrap-ui.css'));
                echo assets_js(array('pub/js/jquery.jqGrid.min.js','pub/js/i18n/grid.locale-en.js'));
            }
			
			if (isset($valid) && $valid==true) {
				echo assets_css(array('pub/css/validate_engine.css'));
                echo assets_js(array('pub/js/validate_engine_eng.js','pub/js/validate_engine.js'));
           
			}
			
			if (isset($tree) && $tree==true) {
				echo assets_css(array('pub/css/skin/ui.dynatree.css','pub/css/jquery-ui-1.8.21.custom.css'));
                echo assets_js(array('pub/js/jquery-ui-1.10.3.custom.min.js','pub/js/jquery.dynatree.min.js'));
            }
			
			if (isset($edit_txt) && $edit_txt==true) {
				echo assets_css(array('pub/css/font.min.css','pub/css/editor.css'));
                echo assets_js(array('pub/js/editor.js'));
            }
			
			
	
		
	?>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body class="preloader3 ">

<div id="preloader" style="position: fixed; width: 100%; height: 100%;">
    <div class="spinner">
        <div class="sk-dot1"></div><div class="sk-dot2"></div>
        <div class="rect3"></div><div class="rect4"></div>
        <div class="rect5"></div>
    </div>
</div>

<div id="curtain" style="display: none; position: fixed; width: 100%; height: 100%; background-color: rgba(255,255,255,.5); z-index: 9999">
    <div class="spinner">
        <div class="sk-dot1"></div><div class="sk-dot2"></div>
        <div class="rect3"></div><div class="rect4"></div>
        <div class="rect5"></div>
    </div>
</div>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"> <?php echo assets_img('img/logo20.png',array('class'=>'hidden-xs'));?> 
                <span>SIM RS</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="login.html">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="#"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Dropdown <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                </li>
            </ul>

        </div>
    </div>
    <!-- topbar ends -->

<div class="container">
   
            <!-- content starts -->
           
