<?php include_once('includes/header.php'); ?> 
<style type="">
	#categories div a{
		width:100%;
		padding: 10px;
		font-weight: bold;
		color: #fff;
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
</style>
<section id="section">
<div class="container">

<div class="container well" id="categories" style="">
<div class="col-md-3 text-center"><a href="#" class="btn btn-md btn-primary"><span class="fa fa-map-marker"></span> Select Location</a></div>
<div class="col-md-3 text-center"><a href="#" class="btn btn-primary btn-md"><span class="fa fa-tag"></span> Select Category</a></div>
<div class="col-md-6" style="background:#337ab7; padding:4px; border-radius:5px">
<div class="col-md-8">
<input type="text" name="" class="form-control" placeholder="What are you searching for?">
</div>
<div class="col-md-4">
<span class="fa fa-search" style="color:#fff;"></span> <button type="submit" name="" class="btn btn-md btn-primary"> Search</button>
</div>	
</div>
</div>

<div class="container well" id="categories2">

<div class="col-md-3" style="border-right:3px solid #f7f7f7;">

<p>Sort results by:</p><hr>
<select name="result" class="form-control">
	<option>Most Recent</option>
	<option>Most lowest price</option>
</select><br>

<p>Type of poster</p><hr>
<p><input type="radio" name=""> All posters</p>
<p><input type="radio" name=""> Only members</p>

<p data-toggle="collapse" data-target="#demo" style="cursor:pointer">Category <span class="caret"></span></p><hr>

<div id="demo" class="collapse">
<p style="font-weight:bold;">All Categories</p>
<p><span class="icon"><img src="icons/car.png"></span><a href=""> Cars and Vehicles (262)</a></p>
<p><span class="icon"><img src="icons/electronic.png"><a href=""> Electronics (262)</a></p>
<p><span class="icon"><img src="icons/home.png"><a href=""> Properties (262)</a></p>
<p><span class="icon"><img src="icons/clothing.png"><a href=""> Clothing, Health & Beauty (262)</a></p>
<p><span class="icon"><img src="icons/garden.png"><a href=""> Home and Garden (262)</a></p>
<p><span class="icon"><img src="icons/service.png"><a href=""> Business, Services and Industry (262)</a></p>
<p><span class="icon"><img src="icons/job.png"><a href=""> Job Vacancies (262)</a></p>
<p><span class="icon"><img src="icons/sport.png"><a href=""> Hobby, Sport & Kids (262)</a></p>
<p><span class="icon"><img src="icons/edu.png"><a href=""> Education (262)</a></p>
<p><span class="icon"><img src="icons/pet.png"><a href=""> Pets & Animals (262)</a></p>
<p><span class="icon"><img src="icons/agric.png"><a href=""> Food & Agriculture (262)</a></p>
<p><span class="icon"><img src="icons/other.png"><a href=""> Other (262)</a></p>


</div>

<p data-toggle="collapse" data-target="#location" style="cursor:pointer">Location <span class="caret"></span></p><hr>

<div id="location" class="collapse">
<p style="font-weight:bold;">All of Nigeria</p>
<p><a href="#">Abuja FCT (54)</a></p>
         <p><a href="#">Abia (54)</a></p>
         <p><a href="#">Adamawa (54)</a></p>
         <p><a href="#">Akwa Ibom (54)</a></p>
         <p><a href="#">Anambra (54)</a></p>
         <p><a href="#">Bauchi (54)</a></p>
         <p><a href="#">Bayelsa (54)</a></p>
         <p><a href="#">Benue (54)</a></p>
         <p><a href="#">Bornu (54)</a></p>
         <p><a href="#">Cross River (54)</a></p>
         <p><a href="#">Delta (54)</a></p>
         <p><a href="#">Ebonyi (54)</a></p>
         <p><a href="#">Edo (54)</a></p>
         <p><a href="#">Ekiti (54)</a></p>
         <p><a href="#">Enugu (54)</a></p>
         <p><a href="#">Gombe (54)</a></p>
         <p><a href="#">Imo (54)</a></p>
         <p><a href="#">Jigawa (54)</a></p>
         <p><a href="#">kaduna (54)</a></p>
         <p><a href="#">Kano (54)</a></p>
         <p><a href="#">Katsina (54)</a></p>
         <p><a href="#">Kebbi (54)</a></p>

         <p><a href="#">kogi (54)</a></p>
         <p><a href="#">Kwara (54)</a></p>
         <p><a href="#">Lagos (54)</a></p>
         <p><a href="#">Nassarawa (54)</a></p>
         <p><a href="#">Niger (54)</a></p>
         <p><a href="#">Ogun v</a></p>
         <p><a href="#">Ondo (54)</a></p>
         <p><a href="#">Oyo (54)</a></p>
         <p><a href="#">Osun (54)</a></p>
         <p><a href="#">Plateau (54)</a></p>
         <p><a href="#">Rivers (54)</a></p>
         <p><a href="#">Sokoto (54)</a></p>
         <p><a href="#">Taraba (54)</a></p>
         <p><a href="#">Yobe (54)</a></p>
         <p><a href="#">Zamfara v</a></p>
</div>
</div>

<div class="col-md-9">

	<div class="col-md-9">
	<div class="col-md-12" style="border-bottom:1px solid #ccc;">
		<div class="col-md-4"><img src="images/digital.png"  style="width:100%"></div>
		<div class="col-md-8">
		  <h5>Digital Press Machine</h5>
		  <p><span>Member</span> <span>8 minutes ago</span>, Lagos Island.</p>
		  <p style="font-weight:bold">&#8358;150,000</p>
		</div>
	</div>

	<div class="col-product col-md-12" style="border-bottom:1px solid #ccc;">
		<div class="col-md-4"><img src="images/digital.png"  style="width:100%"></div>
		<div class="col-md-8">
		  <h5>Digital Press Machine</h5>
		  <p><span>Member</span> <span>8 minutes ago</span>, Lagos Island.</p>
		  <p style="font-weight:bold">&#8358;150,000</p>
		</div>
	</div>

	<div class="col-md-12" style="border-bottom:1px solid #ccc;">
		<div class="col-md-4"><img src="images/digital.png" style="width:100%"></div>
		<div class="col-md-8">
		  <h5>Digital Press Machine</h5>
		  <p><span>Member</span> <span>8 minutes ago</span>, Lagos Island.</p>
		  <p style="font-weight:bold">&#8358;150,000</p>
		</div>
	</div>

	<div class="col-md-12" style="border-bottom:1px solid #ccc;">
		<div class="col-md-4"><img src="images/digital.png"  style="width:100%"></div>
		<div class="col-md-8">
		  <h5>Digital Press Machine</h5>
		  <p><span>Member</span> <span>8 minutes ago</span>, Lagos Island.</p>
		  <p style="font-weight:bold">&#8358;150,000</p>
		</div>
	</div>

	<div class="col-md-12" style="border-bottom:1px solid #ccc;">
		<div class="col-md-4"><img src="images/digital.png"  style="width:100%"></div>
		<div class="col-md-8">
		  <h5>Digital Press Machine</h5>
		  <p><span>Member</span> <span>8 minutes ago</span>, Lagos Island.</p>
		  <p style="font-weight:bold">&#8358;150,000</p>
		</div>
	</div>
    
   
<ul class="pagination" style="">
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="">....</a></li>  
  <li class="next"><a href="#">Next</a></li>
</ul>
	</div>
	<div class="col-md-3"></div>
	
</div>

</div>

</div>
</section>
<?php include_once('includes/footer.php'); ?> 