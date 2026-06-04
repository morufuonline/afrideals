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
<p><a href="#" class="link category" lang="1" style="font-weight: normal;" data-toggle="modal" data-target="#myModal"> <span><img src="icons/car.png" width=5%;></span> Cars and Vehicles<span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>
<p><a href="#" class="link category" lang="2" style="font-weight: normal;" data-toggle="modal" data-target="#myModal"> <span><img src="icons/electronic.png" width=5%;></span> Electronics<span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>
<p><a href="#" class="link category" lang="3" style="font-weight: normal;" data-toggle="modal" data-target="#myModal"> <span><img src="icons/home.png" width=5%;></span> Properties<span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>
<p><a href="#" class="link category" lang="4" style="font-weight: normal;" data-toggle="modal" data-target="#myModal"> <span><img src="icons/garden.png" width=5%;></span> Home and Garden<span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>
<p><a href="#" class="link category" lang="5" style="font-weight: normal;" data-toggle="modal" data-target="#myModal"> <span><img src="icons/clothing.png" width=5%;></span> Clothing, Health and Beauty<span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>
<p><a href="#" class="link category" lang="6" style="font-weight: normal;" data-toggle="modal" data-target="#myModal"> <span><img src="icons/sport.png" width=5%;></span> Hobby, Sport and Kids<span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>
<p><a href="#" class="link category" lang="7" style="font-weight: normal;" data-toggle="modal" data-target="#myModal"> <span><img src="icons/service.png" width=5%;></span> Business, Services and Industry<span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>
<p><a href="#" class="link category" lang="8" style="font-weight: normal;" data-toggle="modal" data-target="#myModal"> <span><img src="icons/edu.png" width=5%;></span> Education <span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>
<p><a href="#" class="link category" lang="9" style="font-weight: normal;" data-toggle="modal" data-target="#myModal"> <span><img src="icons/pet.png" width=5%;></span> Pets and Animals <span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>
<p><a href="#" class="link category" lang="10" style="font-weight: normal;" data-toggle="modal" data-target="#myModal"> <span><img src="icons/agric.png" width=5%;></span> Food and Agriculture <span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>
<p><a href="sell-form.php?subcat=67" class="link category" style="font-weight: normal;"> <span><img src="icons/other.png" width=5%;></span> Other<span style="float: right" class="glyphicon glyphicon-chevron-right"></span></a></p><hr>

</div>
<div class="col-md-6">


<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
<div class="modal-content modal_result">
</div>
</div></div>

  
</div>
</div>

</div>
</section>

<?php include_once('includes/footer.php'); ?> 

<script>
<!--

$(document).ready(function () {

$(".category").click(function(){
var this_lang = $(this).attr("lang");
if(this_lang != ""){
$(".modal_result").html("<i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i>");
$.post( "process_data.php", { get_sub_cat : "1" , category : this_lang }, function(data){
$(".modal_result").html(data);
});
}
});

});

//-->
</script>