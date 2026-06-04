<?php include_once('includes/header.php'); ?> 

<?php
if(!isset($_SESSION["login"])){
redirect("index.php");
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
.icon-img img{
	width:5%;
}
</style>
<section id="section">
<div class="container">

<div class="container well" id="categories" style="">

<h5 class="text-left">Sell an item or service</h5><hr>

<div class="col-md-6">
	<p class="text-leftr" style="font-weight:bold">Select a category...</p><hr>
	<p><a href="rent-form.php?subcat=68" class="link" style="font-weight: normal;"> Houses</a></p><hr>

	<p><a href="rent-form.php?subcat=69" class="link" style="font-weight: normal;">Apartments</a></p><hr>

	<p><a href="rent-form.php?subcat=70" class="link" style="font-weight: normal;"> Rooms</a></p><hr>

	<p><a href="rent-form.php?subcat=71" class="link" style="font-weight: normal;"> Land</a></p><hr>

	<p><a href="rent-form.php?subcat=72" class="link" style="font-weight: normal;">Commercial Property</a></p><hr>

</div>

     </div></div>
</section>
<?php include_once('includes/footer.php'); ?> 