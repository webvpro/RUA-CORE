<!DOCTYPE html> <!-- The new doctype -->

<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>ReUsedArt.com Galleries</title>
	<link rel="stylesheet" type="text/css" href="/theme/rua-ui-theme/jquery-ui-1.8.16.custom.css" />
	
	<link rel="stylesheet" type="text/css" href="/theme/all/css/styles.css" />
	<link rel="stylesheet" type="text/css" href="/theme/all/css/menu.css" />
	<link rel="stylesheet" type="text/css" href="/theme/all/css/forms.css" />
	<!-- Internet Explorer HTML5 enabling script: -->

	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<style type="text/css">

			.clear {
				zoom: 1;
				display: block;
			}

		</style>

	<![endif]-->
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>
	<script src="/javascript/jquery/scrollTo/jquery.scrollTo-1.4.2.min.js"></script>
	<script type='text/javascript' src='/javascript/webforms2-0.5.4/webforms2-p.js'></script>
	
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/googleapis/0.0.4/googleapis.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/jsapi"></script>

<script type="text/javascript">
  google.load("identitytoolkit", "1.0", {packages: ["ac"]});
</script>
<script type="text/javascript">
  $(function() {
    window.google.identitytoolkit.setConfig({
        developerKey: "AIzaSyDdQBtdNy78XmLQQJhjWoZktesK95C3_sM",
        companyName: "ReUsedArt.com",
        callbackUrl: "/signin",
        realm: "",
        userStatusUrl: "/welcome",
        loginUrl: "/login",
        signupUrl: "/signup",
        homeUrl: "/home",
        logoutUrl: "/signin",
        language: "en",
        idps: ["Gmail", "Yahoo", "Hotmail"],
        tryFederatedFirst: true,
        useCachedUserStatus: false
    });
    $("#navbar").accountChooser();
     $('#left-nav-slide-in a').stop().animate({'marginLeft':'-325px'},1000);

                $('ul#left-nav-slide-in > li').hover(
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-2px'},200);
                    },
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-325px'},200);
                    }
                );
                
  });
</script>

</head>

<body>

	
