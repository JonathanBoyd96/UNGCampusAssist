<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><? echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>assets/css/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<? echo base_url(); ?>assets/js/ready.js"></script>
</head>

<body>
<div class="header">
	<div id="logo">
    	
    </div>
    <div class="topMenu">

    </div>
    <div class="clear"></div>
</div>
<div class="content">
	<div class="leftMenu">
    	<? $this->load->view('template/menu'); ?>
    </div>
    <div class="mainContent">
    	<? $this->load->view($content); ?>
    </div>
    <div class="clear"></div>
</div>
<div class="footer">
Site created by Christian Brooks
</div>
</body>
</html>