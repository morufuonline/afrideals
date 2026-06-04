<?php include_once('includes/header.php'); 

if(!isset($_SESSION["login"])){
message("You must login before posting ad.");
redirect("register.php");
}
?> 
<style type="">
	#categories div a{
		width:100%;
		padding: 10px;
		font-weight: bold;
	}
	#ads_result{
		margin-top:2em;
		border-top: 2px solid #f5f5f5;
	}
	#categories2{
    background-color: #fff;
    width: 86.6%;
    border: 2px solid #fff;
    box-shadow: 5px solid #000;
    margin-top: -18px;
	}
	.post-image{
		text-align:center;
		margin-top: -2em;
		padding:0 5px;
	}
	.post-sales{

			width:45%; 
			margin:4% 2.5%;
			border:2px solid #ccc;
			border-radius: 5px;

	}

	.link{
	  color: #336699;
	  font-weight: normal;
	}

	.link:hover{
		text-decoration: none;
	}

	.post-li li{
		color: #9e9e9e;
    font-size: 13px;
    font-weight: 550;
    line-height: 30px;
}
	}

	@media screen and (max-width: 991px) {
   .post-sales{

			width:90%; 
			margin:10% 5%;
}
</style>
<section id="section">
<div class="container">

<div class="container well" id="categories" style="">

<h5 class="text-center">Welcome, Let's post an ad. choose any option below:</h5>
<p class="text-center">Post more on afrideals.com by <a href="register.php" class="link">logging in</a> first. Note that we visit first-time posters for verification.</p>

<div class="col-md-6 post-sales">
	<p class="text-center"><img src="icons/form4.png"></p>
	<p class="text-center" style="font-weight:bold">Are you a seller?</p><hr>
	<p><a href="sell-cat.php" class="link" style="font-weight: normal;">Sell an item or service<span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>
	<p><a href="rent-cat.php" class="link" style="font-weight: normal;">Offer a property for rent <span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>
	<p><a href="job-form.php?subcat=73" class="link" style="font-weight: normal;">Post a job vacancy for free<span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>

</div>
<div class="col-md-6 post-sales">
	<p class="text-center"><img src="icons/form5.png"></p>
	<p class="text-center" style="font-weight:bold">Are you a buyer?</p><hr>
	<p><a href="search.php" class="link" style="font-weight: normal;">Buy your product here<span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>
	<p><a href="search.php" class="link" style="font-weight: normal;">Look for a property to buy <span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>
	<p style="height:4.5em"></p>
</div>
<p style="text-align: center"><img src="icons/form1.png"> Your free posting allowance.<br><a href="#" class="link">Learn about posting ads for free on afrideals.com</a></p>



</div>

</div>
</section>

<section id="section">
<div class="container">

<div class="container well" id="categories" style="">

<h5 class="text-left">Quick rules</h5>
<p class="text-center">Posting on afrideals.com is generally free, however, there is a listing fee of ₦ 1,000 for job ads. All ads must follow our rules:</p>

<div class="col-md-6">
	<ul class="post-li">
		<li>Make sure you post in the correct category.</li>
<li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
<li>Do not upload pictures with watermarks.</li>
	</ul>
</div>
<div class="col-md-6">
	<ul class="post-li">
		<li>Do not post network marketing or pyramid scheme job ads.</li>
<li>Do not put your email or phone numbers in the title or description.</li>
<li>We only publish ads from verified sellers. When you create an ad for the first time, we will contact you within 24 hours to verify your identity.</li>
	</ul>
</div>
<p style="text-align: right"><a href="#" class="link">Click here to see all our posting rules<span class="glyphicon glyphicon-chevron-right"></span></a></p>



</div>

</div>
</section>
<?php include_once('includes/footer.php'); ?> 