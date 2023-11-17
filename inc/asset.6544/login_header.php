<?php 
	// here url page
    $url_automatics = "https://".$_SERVER['HTTP_HOST'];
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
  	<title><?php echo $titlePage; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- meta tag help seo -->
    <meta name="description" content="الوصف هنا">
    <meta name="keywords" content="كلمات,المفتاحية">
	<!-- icon -->
    <link rel="apple-touch-icon" href="<?= $url_automatics; ?>/assets/img/icon.png">
    <link rel="icon" type="image/x-icon" href="<?= $url_automatics; ?>/assets/img/icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url_automatics; ?>/assets/img/icon.png">
	<!-- css file and bootstrap -->
	<link rel="stylesheet" href="<?= $url_automatics; ?>/assets/css/bootstrap.min.css">
	<!-- here style css -->
	<link rel="stylesheet" href="<?= $url_automatics; ?>/login/css/custom.css">
	</head>
<body>