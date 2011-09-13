<!-- content-wrap starts here -->
	<div id="content-wrap"><div id="content">	 
	
		<div id="sidebar" >	
				<button class="new-list-button">Create New List</button>
				<div class="sep"></div>
				<div class="sidebox">
					<h1>Lots of Lists</h1>
					<ul class="sidemenu">
						<li><a href="/mylists" class="my-lists">My Lists</a></li>
						<li><a href="/friendlists" class="my-lists">My Freind's Lists</a></li>
						<li><a href="/gallery">List Gallery</a></li>
						<li><a href="http://www.styleshout.com/">Top Lists</a> </li>
					</ul>		
				</div>
			
				<div class="sidebox">
					<h1>Sponsors</h1>
					<ul class="sidemenu">
						<li><a href="http://www.dreamhost.com/r.cgi?287326">Dreamhost</a></li>
						<li><a href="http://www.4templates.com/?aff=ealigam">4templates</a></li>
						<li><a href="http://store.templatemonster.com/?aff=ealigam">TemplateMonster</a></li>	
						<li><a href="http://www.fotolia.com/partner/114283">Fotolia.com</a></li>									
						<li><a href="http://www.dreamstime.com/res338619">Dreamstime.com</a></li> 		
					</ul>
				</div>
			
				<div class="sidebox">
					<h1>Wise Words</h1>
			
					<p>&quot;Everybody thinks of changing humanity and nobody 
					thinks of changing himself.&quot;</p>		
			
					<p class="align-right">- Leo Tolstoy</p>		
				</div>
			
				<div class="sidebox">
					<h1>RSS Feed</h1>
					<p><a href="index.html" ><img src="images/theme/bluepigment/rssfeed.gif" alt="RSS Feed" class="rssfeed" /></a><br />
					subscribe to the <strong><a href="index.html" >rss feed</a></strong>
					</p>
				</div>	
				
		</div>	
	
		<div id="main">		
		
			<div class="box">
			
					
				<h1><a href="index.html">Welcome to <span class="white"> ListMagnet</span></a></h1>
				
				
				
				<p>Create, Share your.. Shopping, Party, Honey Do, Bucket or any list you can think of here on</p>
			
			</div>			
			
			<div class="box">
			
				
				<h3>List Activity</h3>							
				
				<table id="my-list-table">
					<thead>
					<tr>
						<th class="first"><strong>List</strong></th>
						<th><strong>Item</strong></th>
						<th><strong>Action</strong></th>
						<th><strong>When</strong></th>
					</tr>
					</thead>
					<tbody>
					 <?php foreach($lists as $row):?> 
					 <tr class="row-b">
							<td class="first"><?=$row->lm_list_name?></td>
							<td><?=$row->lm_create_dttm?></td>
							<td><?=$row->lm_list_name?></td>
							<td><?=$row->lm_list_name?></td>
						</tr>
					<?php endforeach;?>  
					<tr class="row-a">
						<td class="first">07.18.2007</td>
						<td><a href="index.html">Augue non nibh</a></td>
						<td><a href="index.html">Lobortis commodo metus vestibulum</a></td>
					</tr>
					<tr class="row-b">
						<td class="first">07.18.2007</td>
						<td><a href="index.html">Fusce ut diam bibendum</a></td>
						<td><a href="index.html">Purus in eget odio in sapien</a></td>
					</tr>
					<tr class="row-a">
						<td class="first">07.18.2007</td>
						<td><a href="index.html">Maecenas et ipsum</a></td>
						<td><a href="index.html">Adipiscing blandit quisque eros</a></td>
					</tr>
					<tr class="row-b">
						<td class="first">07.18.2007</td>
						<td><a href="index.html">Sed vestibulum blandit</a></td>
						<td><a href="index.html">Cras lobortis commodo metus lorem</a></td>
					</tr>
					</tbody>
				</table>
				<h3>Example Form</h3>
				
				<form action="#">		
					<p>
						<label>Name</label>
						<input name="dname" value="Your Name" type="text" size="30" />
						<label>Email</label>
						<input name="demail" value="Your Email" type="text" size="30" />
						<label>Your Comments</label>
						<textarea rows="5" cols="5"></textarea>
						<br />	
						<input class="button" type="submit" />		
					</p>		
				</form>	
			
			</div>			
			
			<br />				
										
		</div>			
		
	
	<!-- content-wrap ends here -->		
	</div></div>