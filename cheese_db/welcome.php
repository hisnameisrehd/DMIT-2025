<?php
include("includes/header.php");
?>

<div class="row container mt-3">
	<div class="col-8" style="height:609px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">
	<div class="widget-styles">
	
		<h2 class="display-title">Explore the Many Cheeses!</h2><br />

<h3 style="padding-left:2rem;">
This project is a catalog of cheese!
</h3>
<p>Below are some key features of this project</p>
<ul>
<li><strong>Login/Register function added.</strong> <p style="padding:0.5rem 1rem;">Users that register will have their information stored in a seperate table. Additionally, all passwords are stored are encrypted rather than plain text.</p></li>
<li><strong>Custom Range selector added.</strong> <p style="padding:0.5rem 1rem;">A minimum value can be selected on the left slider, while a max is selcted on the right. The filter will return cheeses that are within the given range.</p></li>
<li><strong>Favorite Counter.</strong> <p style="padding:0.5rem 1rem;">I have added a field in the database that tracks how many times a person has viewed the cheese details. The resulting cheese is displayed in the top right corner of the page</p></li>
</ul>

<p style="color:red;"><strong>you must sign in or register!</strong></p>
<div class="row">
<button class="btn btn-success pr-3 mr-2 ml-4">Login</button>
<button class="btn btn-info">Register</button>
</div>
		
</div>




		<?php
		include("includes/footer.php");
		?>