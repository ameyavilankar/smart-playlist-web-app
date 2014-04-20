<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../images/ico/favicon.png">

		<title>Sagar Raut</title>

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="../css/custom.css" rel="stylesheet">

		<!--The library for social icons  -->
		<link href="../font-awesome-4.0.3/css/font-awesome.css" rel="stylesheet">

		<link href="../css/social-buttons.css" rel="stylesheet">

	</head>

	<body>

		<div class="navbar-purple navbar navbar-inverse navbar-fixed-top " role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Sagar Raut</a>
				</div>

				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="../index.php">Home</a>
						</li>
						<li>
							<a href="#">About me</a>
						</li>
						<li>
							<a href="../documents/sagar_raut_resume.pdf" target="_blank">Résumé</a>
						</li>
						<li class="dropdown active">
							<a href="./work.php" class="dropdown-toggle" data-toggle="dropdown">Work<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="../work.php">View all</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="../SG.php">SocialGreek</a>
								</li>

								<li>
									<a href="../safe_passage.php">Safe Passage</a>
								</li>

								<li>
									<a href="../tangible_data.php">Tangible Data</a>
								</li>
							</ul>
						</li>
					</ul>

					<div class="nav navbar-nav navbar-right">
						<ol class="breadcrumb">
							<li>
								<a href="../index.php">Home</a>
							</li>
							<li class="active">
								Work
							</li>

						</ol>

					</div>

				</div><!--/.navbar-collapse -->
			</div>
		</div>

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron jumbo-min">

		</div>

		<div class="container">
			<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-facebook-square"></i> Your FaceBook details</h3>
						</div>
						<div class="panel-body" >
							<div id="message-panel">
								<p>
									Please login to see your details
								</p>
								
							</div>
								
							<div class="text-center">
									<button id="loginbutton" class="btn btn-primary">
										Login to facebook
									</button>
							</div>	
								
							<div class="text-center">
								<button id="logoutbutton" class="btn btn-primary">
									Logout from facebook
								</button>
							</div>

						</div>
					</div>

				</div>
			</div>

			<?php
			include '../footer.php';
			?>
		</div>
		<!-- /container -->

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			window.fbAsyncInit = function() {
				FB.init({
					appId : '686853958004368',
					status : true, // check login status
					cookie : true, // enable cookies to allow the server to access the session
					xfbml : true // parse XFBML
				});

				// Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
				// for any authentication related change, such as login, logout or session refresh. This means that
				// whenever someone who was previously logged out tries to log in again, the correct case below
				// will be handled.
				FB.Event.subscribe('auth.authResponseChange', function(response) {
					// Here we specify what we do with the response anytime this event occurs.
					if (response.status === 'connected') {
						//$('#loginbutton').hide();
						// The response object is returned with a status field that lets the app know the current
						// login status of the person. In this case, we're handling the situation where they
						// have logged in to the app.
						testAPI();
					} else if (response.status === 'not_authorized') {
						// In this case, the person is logged into Facebook, but not into the app, so we call
						// FB.login() to prompt them to do so.
						// In real-life usage, you wouldn't want to immediately prompt someone to login
						// like this, for two reasons:
						// (1) JavaScript created popup windows are blocked by most browsers unless they
						// result from direct interaction from people using the app (such as a mouse click)
						// (2) it is a bad experience to be continually prompted to login upon page load.
						FB.login();
					} else {
						// In this case, the person is not logged into Facebook, so we call the login()
						// function to prompt them to do so. Note that at this stage there is no indication
						// of whether they are logged into the app. If they aren't then they'll see the Login
						// dialog right after they log in to Facebook.
						// The same caveats as above apply to the FB.login() call here.

						//FB.login();
					}
				});
			};

			// Load the SDK asynchronously
			( function(d) {
					var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
					if (d.getElementById(id)) {
						return;
					}
					js = d.createElement('script');
					js.id = id;
					js.async = true;
					js.src = "//connect.facebook.net/en_US/all.js";
					ref.parentNode.insertBefore(js, ref);
				}(document));

			// Here we run a very simple test of the Graph API after login is successful.
			// This testAPI() function is only called in those cases.
			function testAPI() {
				console.log('Welcome!  Fetching your information.... ');
				FB.api('/me', function(response) {
					console.log('Good to see you, ' + response.name + '.');
					console.log("Sagar's User ID is: " + response.id);
					$('#loginbutton').hide();
					$("#logoutbutton").show();
					$('#message-panel').html('<p>Good to see you, ' + response.name + '.<br />' + "Your user ID is: " + response.id + '<br /> Your email is: '+response.email +'</p>');
				});
			}
		</script>

		<script type="text/javascript">
			$(document).ready(function() {
				
				$("#logoutbutton").hide();

				$('#logoutbutton').click(function(){
					FB.logout(function(response){
						$('#message-panel').html("<p> Please login to see your details </p>");
						$('#loginbutton').show();
						$('#logoutbutton').hide();
						
					});
				});

			$('#loginbutton').click(function() {
			FB.login(function(response){},{scope: 'email'});
			

			});
			});
		</script>
	</body>
</html>
