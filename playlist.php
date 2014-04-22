<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/splash/splash-icon.png">
    <link rel="apple-touch-startup-image" href="images/splash/splash-screen.png"
          media="screen and (max-device-width: 320px)"/>
    <link rel="apple-touch-startup-image" href="images/splash/splash-screen%402x.png"
          media="(max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2)"/>
    <link rel="apple-touch-startup-image" sizes="640x1096" href="images/splash/splash-screen%403x.png"/>
    <link rel="apple-touch-startup-image" sizes="1024x748" href="images/splash/splash-screen-ipad-landscape.html"
          media="screen and (min-device-width : 481px) and (max-device-width : 1024px) and (orientation : landscape)"/>
    <link rel="apple-touch-startup-image" sizes="768x1004" href="images/splash/splash-screen-ipad-portrait.png"
          media="screen and (min-device-width : 481px) and (max-device-width : 1024px) and (orientation : portrait)"/>
    <link rel="apple-touch-startup-image" sizes="1536x2008" href="images/splash/splash-screen-ipad-portrait-retina.png"
          media="(device-width: 768px)	and (orientation: portrait)	and (-webkit-device-pixel-ratio: 2)"/>
    <link rel="apple-touch-startup-image" sizes="1496x2048" href="images/splash/splash-screen-ipad-landscape-retina.png"
          media="(device-width: 768px)	and (orientation: landscape)	and (-webkit-device-pixel-ratio: 2)"/>

    <title>Nearby Events</title>

    <link href="styles/style.css" rel="stylesheet" type="text/css">
    <link href="styles/framework.css" rel="stylesheet" type="text/css">
    <link href="styles/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="styles/owl.theme.css" rel="stylesheet" type="text/css">
    <link href="styles/swipebox.css" rel="stylesheet" type="text/css">
    <link href="styles/colorbox.css" rel="stylesheet" type="text/css">

    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="scripts/jqueryui.js"></script>
    <script type="text/javascript" src="scripts/owl.carousel.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.swipebox.js"></script>
    <script type="text/javascript" src="scripts/colorbox.js"></script>
    <script type="text/javascript" src="scripts/snap.js"></script>
    <script type="text/javascript" src="scripts/contact.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
    <script type="text/javascript" src="scripts/framework.js"></script>
    <script type="text/javascript" src="scripts/framework.launcher.js"></script>

    <style>

        ol {
            font: 15px 'trebuchet MS', 'lucida sans';
            padding: 0;
            margin-bottom: 4em;
            text-shadow: 0 1px 0 rgba(255, 255, 255, .5);
        }

        ol ol {
            margin: 0 0 0 2em;
        }

    .rectangle-list h3 {
	color: white;
	margin: 0px;
	font-size: 18px;
	font-style: normal;
    }

        .rectangle-list a {
            position: relative;
            display: block;
            padding: .4em .4em .4em .8em;
            *padding: .4em;
            background: #383838;
            color: #FFFFFF;
            text-decoration: none;
            -webkit-transition: all .3s ease-out;
            -moz-transition: all .3s ease-out;
            -ms-transition: all .3s ease-out;
            -o-transition: all .3s ease-out;
            transition: all .3s ease-out;
        }

        .rectangle-list a:hover {
            background: #E34E47;
        }

        .rectangle-list a:before {
            position: absolute;
            left: -2.5em;
            top: 50%;
            margin-top: -1em;
            background: #383838;
            color: #fff;
            height: 2em;
            width: 2em;
            line-height: 2em;
            text-align: center;
            font-weight: bold;
        }

        .rectangle-list a:after {
            position: absolute;
            content: '';
            border: .5em solid transparent;
            left: -1em;
            top: 50%;
            margin-top: -.5em;
            -webkit-transition: all .3s ease-out;
            -moz-transition: all .3s ease-out;
            -ms-transition: all .3s ease-out;
            -o-transition: all .3s ease-out;
            transition: all .3s ease-out;
        }

        .rectangle-list a:hover:after {
            left: -.5em;
            border-left-color: #666;
        }
    </style>

    <script type="text/javascript">
	function populateList(FBID, EID) {
        	$.getJSON("http://ec2-54-84-22-77.compute-1.amazonaws.com/epi/1/song?FacebookID=" + FBID + "&EventID=" + EID, function (data) {
            		var items = [];
            		for (var i = 0, len = data.length; i < len; i++) {
                		items.push("<li><a><h3>" + data[i].Name + "</h3>" + data[i].Artist + "</a></li>");
            		}
	
            		console.log(items);
            		$("#playlist").html(items);
        	});
	}
    </script>

</head>
<body>

<div id="preloader">
    <div id="status">
        <p class="center-text">
            Loading the content...
            <em>Loading depends on your connection speed!</em>
        </p>
    </div>
</div>

<div id="fb-root"></div>
<script type="text/javascript" src="FBLogin.js"></script>
<script>
    window.fbAsyncInit = function () {
	initFacebook(function (uid, accesstoken) {
		populateList(uid, "<?php echo $_GET['eventID']; ?>");
	});
    };
</script>

<div class="header">
    <a href="#" class="show-navigation"></a>
    <a href="#" class="hide-navigation"></a>
    <img src="images/app-logo.png" class="page-logo" alt="img">
</div>

<div class="navigation">
    <div class="navigation-wrapper">
        <div class="nav-item">
            <a href="index.html" class="homepage-icon">Homepage<em class="unselected-item"></em></a>
        </div>
        <div class="nav-item">
            <a href="nearby.html" class="nearby-icon">Nearby<em class="selected-item"></em></a>
        </div>
        <div class="nav-item">
            <a href="viewRecommendedPlaylist.html" class="playlist-icon">Playlist<em class="unselected-item"></em></a>
        </div>
        <div class="nav-item">
            <a href="#" class="submenu-item events-icon">EVENTS<em class="dropdown-item"></em></a>

            <div class="submenu">
                <a href="addevents.html">Add Events <em class="unselected-item"></em></a>
                <a href="viewevents.html">View Events <em class="unselected-item"></em></a>
                <a href="#">Delete Events <em class="unselected-item"></em></a>
            </div>
        </div>
        <div class="nav-item">
            <a href="#" class="profile-icon">My Profile <em class="unselected-item"></em></a>
        </div>
    </div>
</div>

<div class="page-header-clear"></div>

<div>
    <h2>My Songs:</h2>
    <ol class="rectangle-list" id="playlist">
    </ol>
</div>
<!--<div class="homepage-wrapper">-->
<!---->
<!---->

<!--&lt;!&ndash;<div class="playlist-show">&ndash;&gt;-->
<!--&lt;!&ndash;<ul  align="center">&ndash;&gt;-->
<!--&lt;!&ndash;</ul>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->

<!--<div class="footer">-->
<!--<img class="footer" src="images/CIC.png">-->

<!--<div class="clear"></div>-->
<!--<p class="homepage-copyright">TEAM S.A.T.A.N<br>Copyright 2014. <br>All Rights Reserved.</p>-->
<!--</div>-->

<!--</div>-->
</body>
</html>
