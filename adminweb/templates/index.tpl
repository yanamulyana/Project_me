<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Login Administrator Anaku.com</title>
	
	<link href="css/login/style.css" rel="stylesheet" type="text/css">

</head>

<body>
	<div class="body"></div>
	
	<div class="grad"></div>
	<div class="header">
		<div>A<span>n</span><span>a</span><span>k</span><span>u</span>.Com</a></div>
		<!-- <p style="margin-left: 5px;">http://www.Anaku.com</p> -->
	</div>
	<br>
	<div class="login">
		<p>{$msg}</p>
		<form method="POST" action="index.php?mod=login&act=submit">
			<input type="text" placeholder="username" name="username" required><br>
			<input type="password" placeholder="password" name="password" required><br>
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>