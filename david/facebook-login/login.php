<?php

// https://developers.facebook.com/docs/reference/login/#permissions

require 'src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook( array('appId' => '327709837366013', 'secret' => 'a96463e45658ba46a0ba3c6e86030f0f', ));

// Get User ID
$user = $facebook -> getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
	try {
		// Proceed knowing you have a logged in user who's authenticated.
		$user_profile = $facebook -> api('/me');
	} catch (FacebookApiException $e) {
		error_log($e);
		$user = null;
	}
}

// Login or logout url will be needed depending on current user state.
if ($user) {
	$logoutUrl = $facebook -> getLogoutUrl();
} else {
	$loginUrl = $facebook -> getLoginUrl(array(
		'scope' => 'user_about_me, user_hometown, email'
	));
}

// This call will always work since we are fetching public data.
$naitik = $facebook -> api('/naitik');
?>


<!DOCTYPE html>

	<head>
		<title>The Bucket List</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<!--
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css" />
		-->
		<link rel="stylesheet" href="bootstrap/css/social-buttons.css" />
		<style>
			body {
				font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
			}
			h1 a {
				text-decoration: none;
				color: #3b5998;
			}
			h1 a:hover {
				text-decoration: underline;
			}
		</style>
	</head>
	
	
	<body>
		<h1>Login</h1>
		<?php if ($user): ?>
			<a href="<?php echo $logoutUrl; ?>">
				Log out
			</a>
		<?php else: ?>
			<div>
				Login using OAuth 2.0 handled by the PHP SDK:
				<br /><br />
				<a href="<?php echo $loginUrl; ?>">
					<img src="http://icons.iconarchive.com/icons/fasticon/web-2/48/FaceBook-icon.png" alt="Login here">
				</a>
			</div>
		<?php endif ?>

			<h3>PHP Session</h3>	
			<pre><?php print_r($_SESSION); ?></pre>			
			

 		<?php if ($user): ?>
			<h3>You</h3>
			<img src="https://graph.facebook.com/<?php echo $user; ?>/picture">
	
			<h3>Your User Object (/me)</h3>
			<pre><?php print_r($user_profile); 
					echo $user_profile['first_name'];
					echo '<br>';
					echo $user_profile['last_name'];
					echo '<br>';
					echo $user_profile['email'];
					echo '<br>';
					echo $user_profile['user_birthday'];
				
				?></pre>
		<?php else: ?>
			<strong><em>You are not Connected.</em></strong>
		<?php endif ?>
	</body>
</html>
