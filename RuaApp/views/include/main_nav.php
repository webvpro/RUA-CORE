<body>
<ul id="left-nav-slide-in">
	 <li class="home"><a href="" title="Home"></a></li>
     <li class="about"><a href="" title="About"></a></li>
	
</ul>
	<section id="page"> <!-- Defining the #page section with the section tag -->

	<header> <!-- Defining the header section of the page with the appropriate tag -->

		<h1><a href="/home">ReUseArt Logo</a></h1>

		<h3>and a fancy slogan</h3>

		<nav id="menu" class="clear"> <!-- The nav link semantically marks your main site navigation -->

			<ul>
				<li ><a href="#" class="drop">Categories</a><div class="dropdown_5columns">  
       						 <div class="col_5">
                <h2>This is an example of a large container with 5 columns</h2>
            </div>
            
            <div class="col_1">
                <p class="black_box">This is a dark grey box text. Fusce in metus at enim porta lacinia vitae a arcu. Sed sed lacus nulla mollis porta quis.</p>
            </div>
            
            <div class="col_1">
                <p>Phasellus vitae sapien ac leo mollis porta quis sit amet nisi. Mauris hendrerit, metus cursus accumsan tincidunt.</p>
            </div>
            
            <div class="col_1">
                <p class="italic">This is a sample of an italic text. Consequat scelerisque. Fusce sed lectus at arcu mollis accumsan at nec nisi porta quis sit amet.</p>
            </div>
            
            <div class="col_1">
                <p>Curabitur euismod gravida ante nec commodo. Nunc dolor nulla, semper in ultricies vitae, vulputate porttitor neque.</p>
            </div>
            
            <div class="col_1">
                <p class="strong">This is a sample of a bold text. Aliquam sodales nisi nec felis hendrerit ac eleifend lectus feugiat scelerisque.</p>
            </div>
        
            <div class="col_5">
                <h2>Here is some content with side images</h2>
            </div>
           
            <div class="col_3">
            
                <img src="/theme/all/images/01.jpg" width="70" height="70" class="img_left imgshadow" alt="" />
                <p>Maecenas eget eros lorem, nec pellentesque lacus. Aenean dui orci, rhoncus sit amet tristique eu, tristique sed odio. Praesent ut interdum elit. Sed in sem mauris. Aenean a commodo mi. Praesent augue lacus.<a href="#">Read more...</a></p>
        
                <img src="/theme/all/images/02.jpg" width="70" height="70" class="img_left imgshadow" alt="" />
                <p>Aliquam elementum felis quis felis consequat scelerisque. Fusce sed lectus at arcu mollis accumsan at nec nisi. Aliquam pretium mollis fringilla. Nunc in leo urna, eget varius metus. Aliquam sodales nisi.<a href="#">Read more...</a></p>
            
            </div>
            
            <div class="col_2">
            
                <p class="black_box">This is a black box, you can use it to highligh some content. Sed sed lacus nulla, et lacinia risus. Phasellus vitae sapien ac leo mollis porta quis sit amet nisi. Mauris hendrerit, metus cursus accumsan tincidunt.Quisque vestibulum nisi non nunc blandit placerat. Mauris facilisis, risus ut lobortis posuere, diam lacus congue lorem, ut condimentum ligula est vel orci. Donec interdum lacus at velit varius gravida. Nulla ipsum risus.</p>
            
            </div> 
        			<div></li>
				<li><a href="#" class="drop">Featured</a><!-- Begin 4 columns Item -->
    
		        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
		        
		            <div class="col_4">
		                <h2>This is a heading title</h2>
		            </div>
		            
		            <div class="col_1">
		            
		                <h3>Some Links</h3>
		                <ul>
		                    <li><a href="#">ThemeForest</a></li>
		                    <li><a href="#">GraphicRiver</a></li>
		                    <li><a href="#">ActiveDen</a></li>
		                    <li><a href="#">VideoHive</a></li>
		                    <li><a href="#">3DOcean</a></li>
		                </ul>   
		                 
		            </div>
		    
		            <div class="col_1">
		            
		                <h3>Useful Links</h3>
		                <ul>
		                    <li><a href="#">NetTuts</a></li>
		                    <li><a href="#">VectorTuts</a></li>
		                    <li><a href="#">PsdTuts</a></li>
		                    <li><a href="#">PhotoTuts</a></li>
		                    <li><a href="#">ActiveTuts</a></li>
		                </ul>   
		                 
		            </div>
		    
		            <div class="col_1">
		            
		                <h3>Other Stuff</h3>
		                <ul>
		                    <li><a href="#">FreelanceSwitch</a></li>
		                    <li><a href="#">Creattica</a></li>
		                    <li><a href="#">WorkAwesome</a></li>
		                    <li><a href="#">Mac Apps</a></li>
		                    <li><a href="#">Web Apps</a></li>
		                </ul>   
		                 
		            </div>
		    
		            <div class="col_1">
		            
		                <h3>Misc</h3>
		                <ul>
		                    <li><a href="#">Design</a></li>
		                    <li><a href="#">Logo</a></li>
		                    <li><a href="#">Flash</a></li>
		                    <li><a href="#">Illustration</a></li>
		                    <li><a href="#">More...</a></li>
		                </ul>   
		                 
		            </div>
		            
		        </div><!-- End 4 columns container -->
		    
		    </li><!-- End 4 columns Item -->
				<li><a href="#article2">Popular</a></li>
				<li><a id="sell-my-art" href="/sellart/">Sell My Art</a></li>
				<li class="menu_right">
					<?php if($is_logged_in){
					 echo '<a href="/auth/logout">Sign Out</a>';
					 } else {
					 	echo '<a href="/auth/login/">Sign In</a>';
					 }?>
				</li>

			</ul>

		</nav>
		<div id="search"> <input type="text" id="s" name="s" onclick="this.value='';" value="Site Search" /> <input type="image" class="btn" id="searchsubmit" value="Search" src="/theme/all/images/search.jpg" name="" /></div class="search-filter"><div></div>
	</header>