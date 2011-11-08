<body>
<div id="static-header-wrap">
	<div id="static-header-menu">
		<ul>
			<li><a href="/home" class="home">Home</a></li>
			<?php if($is_logged_in){
					echo'<li><a id="my-art" class="myart" href="/myart/">My Art</a></li>';
				}?>
				<li class="menu_right">
					<?php if($is_logged_in){
					 echo '<a href="/myaccount">My Account</a>';
					 } else {
					 	echo '<a href="/auth/login/">Sign Up/Login</a>';
					 }?>
				</li>
		</ul>
	</div>
	<div class="clear"></div>
</div>
<div id="static-left-wrap">
	<div id="static-left-menu">
	<ul id="left-nav-slide-in">
		 <li class="search search-trigger"><a href="" title="Search">Search</a></li>
	     <li class="featured"><a href="" title="Featured">Featured</a></li>
	     <li class="share"><span  class='st_sharethis_custom' displayText=''>Share</span><div class="clear"></div></li>
	</ul>
	</div>
	<div class="clear"></div>
</div>
<div id="static-right-wrap">
</div>

	<section id="page"> <!-- Defining the #page section with the section tag -->

	<header> <!-- Defining the header section of the page with the appropriate tag -->

		<h1><a href="/home">ReUseArt Logo</a></h1>

		<h3>and a fancy slogan</h3>

</header>