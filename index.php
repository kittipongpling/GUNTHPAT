<?PHP
require_once('models/Contact_us.php');
require_once('models/Slide.php');
$img_path = "../img_upload/contact_us/";
$contact_us_model = new Contact_us;
$contact_us = $contact_us_model -> getContact_us();
$slide_model = new Slide;
$slide = $slide_model -> slideRoom01();

?>
<html>
<head>
    <?PHP require_once('view/header.inc.php'); ?>
</head>
<body>
    <?PHP require_once('view/home/index.inc.php');?>
    <?PHP require_once('view/footer.inc.php'); ?>
    <!-- Bootstrap core JavaScript -->
    <script src="template/frontend/vendor/jquery/jquery.min.js"></script>
    <script src="template/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for this template -->
    <script src="template/frontend/js/agency.min.js"></script>
</body>
<script src="template/frontend/js/agency.min.js"></script>
<html>