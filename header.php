
<!DOCTYPE html>
<html>
<head>

<!--PROGRESSIVE WEB APP-->
<link rel="manifest" href="manifest.json">

<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="application-name" content="foodShop">
<meta name="apple-mobile-web-app-title" content="foodShop">
  <meta name="theme-color" content="#2F3BA2"/>
<meta name="msapplication-starturl" content="index.php">
<!--fine PROGRESSIVE WEB APP-->

<title>Ecommerce Dinamico PHP</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>

<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!--PAGINATION-->
<link rel="stylesheet" href="css/pagination.css">

<!-- css 404 -->
<link rel="stylesheet" href="css/404.css" class="rel">
<!-- favicon  -->
<link rel="shortcut icon" type="image/png" href="favicon.png">

<!--PROGRESSIVE WEB APP-->

<!--supporto manifest safari e iexplorer IOs-->
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="PWAGram">
 

  <link rel="apple-touch-icon" href="images/manifest/icon-192x192.png" sizes="192x192">
  <link rel="apple-touch-icon" href="images/manifest/icon-256x256.png" sizes="256x256">
  <link rel="apple-touch-icon" href="images/manifest/icon-384x384.png" sizes="384X384">
  <link rel="apple-touch-icon" href="images/manifest/icon-512x512.png" sizes="512x512">
<!--  https://it.goodbarber.com/blog/ios-apre-le-sue-porte-alle-progressive-web-app-a579/
 https://www.youtube.com/watch?v=jy6hX48pRHw
 -->
  <link rel="apple-touch-icon" href="images/manifest/icon-512x512.png" sizes="512x512">
  <link rel="apple-touch-icon" href="touch-icon-iphone-retina.png" sizes="144x144">
    <meta name="apple-mobile-web-app-status-bar" content="#aa7700">
  
<!--explorer-->

  <meta name="msapplication-TileImage" content="images/app-icon-144.png">
  <meta name="msapplication-TileColor" content="#fff">
  <meta name="theme-color" content="#3f51b5">
  
<!--  splash images-->
<link href="/splashscreens/iphone5_splash.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)"  />
<link rel="apple-touch-startup-image" href="/splashscreens/iphone6_splash.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)"  />
<link rel="apple-touch-startup-image" href="/splashscreens/iphoneplus_splash.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image"/>
<link href="/splashscreens/iphonex_splash.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="/splashscreens/iphonexr_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/splashscreens/iphonexsmax_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="/splashscreens/ipad_splash.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/splashscreens/ipadpro1_splash.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/splashscreens/ipadpro3_splash.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/splashscreens/ipadpro2_splash.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<!--https://blog.expo.io/enabling-ios-splash-screens-for-progressive-web-apps-34f06f096e5c-->
<link rel="apple-touch-startup-image" 
media="screen and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)"
href="/splashscreens/iphonex_splash.png" />
<!--fine splash screen-->

<!-- service worker -->
<!--script per il service worker -->
<!-- <script src="script.js"></script> -->

<!-- css notification -->
<link rel="stylesheet" href="css/notification.css">
<!--FINE PROGRESSIVE WEB APP-->
</head>
	
<body>
<!-- header -->