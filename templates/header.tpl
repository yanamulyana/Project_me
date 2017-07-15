<!DOCTYPE html>
<html>
	<head>
	
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<title>{$metaTitle}</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta property="fb:app_id" content="1602132343403497">
		<link href="css/font.css" rel="stylesheet">
		<link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/paging.css" rel="stylesheet">
		
		<link href="css/flexslider.css" rel="stylesheet">
		
		<!--[if IE 7]>
		<link href="css/font-awesome/css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->
		
		<link  rel="stylesheet" href="css/style.css">
		<link  rel="stylesheet" href="css/responsive.css">
		
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/jquery.validate.min.js"></script>
		<script src="js/jquery-migrate-1.1.1.min.js"></script>
		<script src="css/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/ajax.js"></script>
		
		<script type="text/javascript" src="js/css_browser_selector.js"></script>
		<script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing-1.3.js"></script>
		<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
		<script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		
		<style>
		@media screen and (max-device-width: 640px){
			.row-fluid .span4 {
			  width: 48.93617021276595%;
			  *width: 48.88297872340425%;
			}
		}
		</style>
	</head>
	
	<body class="homepage2" onload="autorefresh('session.php')">

	<div class="bg">
	
	<div id="fb-root"></div>
	
	{literal}
		<script>
			var appid = 'YOUR_APP_ID_FB';
			window.fbAsyncInit = function() {
				FB.init({
					appId: appid,
					cookie: true,
					status: true,
					xfbml: true,
					oauth : true, // enables OAuth 2.0
					version : 'v2.5',
					frictionlessRequests : true
				});
			};
			
			(function() {
				var e = document.createElement('script'); e.async = true;
				e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
				document.getElementById('fb-root').appendChild(e);
			}());
			
			function connect_fb(){
				FB.login(function (response) {
					if (response.authResponse) {
						var access_token =   FB.getAuthResponse()['accessToken'];
						
						if(access_token==undefined) {
							access_token=response.authResponse.accessToken;
						}
						
						$.ajax({
							async:false,
							url: "register.php",
							dataType: "json",
							type : "POST",
							data: {
								oauth_token:access_token
							},
							beforeSend: function (response) {
								$('body').append('<div id="ajaxBusy"><p id="ajaxBusyMsg">Please wait...</p></div>');
								//$("#ajaxBusy").show();
							},
							complete: function(){
								$("#ajaxBusy").hide();
							},
							success: function () {
								var str = window.location.href;
								
								if(str.indexOf("sign") + 1) {
									top.location.href = "http://localhost/tokoonline"
								}
								else{
									window.location.reload();
								}
							}
						});
					}
				}, { scope: 'email, public_profile, user_friends' });
			}	
		</script>
	{/literal}