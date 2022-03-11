<!-- jquery -->
<script src="<?php echo base_url().'asset/bootstrap-4.6.1-dist'?>/js/jquery-3.5.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url().'asset/bootstrap-4.6.1-dist'?>/js/bootstrap.min.js" type="text/javascript"></script>


<!-- sweet alert -->
<script src="<?php echo base_url().'asset/bootstrap-4.6.1-dist'?>/js/sweetalert.min.js" type="text/javascript"></script>


</head>
<body>
<?php 
 if (!$_SESSION['use_id']) {
     $path = base_url();
     header("Location: " . $path);
     exit();
 }
 ?>