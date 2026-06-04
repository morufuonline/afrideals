<?php include_once('includes/header.php'); ?> 

<?php
if(!isset($_SESSION["login"])){
redirect("index.php");
}

/*foreach ($_POST as $key => $value) {
    //do something
    echo $key . ' has the value of ' . $value;
}*/
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
<div class="col-md-3"></div>
<div class="col-md-6">
<form class="" role="form">
<h6>About Product</h6><hr>
	<div class="form-group">
    <label for="product">Product Brand</label>
   <select name="brand" class="form-control">
					  <option>Select Brand</option>
    </select>
  </div>
  <div class="form-group">
    <label for="product">Model</label>
    <input type="text" name="model" class="form-control" placeholder="Model">
   </div>

   <div class="form-group">
    <label for="product">Product image #1</label>
    <input type="file" name="image1" class="form-control">
   </div>

   <div class="form-group">
     <label for="product">Product image #2</label>
    <input type="file" name="image2" class="form-control">
   </div>

   <div class="form-group">
    <label for="product">Product image #3</label>
    <input type="file" name="image3" class="form-control">
   </div>

   <div class="form-group">
    <label for="product">Details</label>
    <textarea name="details" class="form-control" rows="6" placeholder="Details"></textarea>
   </div>

   <div class="form-group">
    <label for="product">Price</label>
    <input type="text" name="price" class="form-control" placeholder="Price">
   </div>

   <div class="checkbox">
      <label><input type="checkbox"> Negotiable</label>
    </div>
   <br>

  <h6>About You</h6><hr>
  	<div class="form-group">
    <label for="product">State of sales</label>
	<select name="state" class="form-control">
					  <option>Select State</option>
					  <option>Abuja FCT</option>
                      <option>Abia</option>
                      <option>Adamawa</option>
                      <option>Akwa Ibom</option>
                      <option>Anambra</option>
                      <option>Bauchi</option>
                      <option>Bayelsa</option>
                      <option>Benue</option>
                      <option>Borno</option>
                      <option>Cross River</option>
                      <option>Delta</option>
                      <option>Ebonyi</option>
                      <option>Edo</option>
                      <option>Ekiti</option>
                      <option>Enugu</option>
                      <option>Gombe</option>
                      <option>Imo</option>
                      <option>Jigawa</option>
                      <option>Kaduna</option>
                      <option>Kano</option>
                      <option>Katsina</option>
                      <option>Kebbi</option>
                      <option>Kogi</option>
                      <option>Kwara</option>
                      <option>Lagos</option>
                      <option>Nassarawa</option>
                      <option>Niger</option>
                      <option>Ogun</option>
                      <option>Ondo</option>
                      <option>Osun</option>
                      <option>Oyo</option>
                      <option>Plateau</option>
                      <option>Rivers</option>
                      <option>Sokoto</option>
                      <option>Taraba</option>
                      <option>Yobe</option>
                      <option>Zamfara</option>
	</select>
</div>

	<div class="form-group">
    <label for="product">City</label>
	<select name="region" class="form-control">
		<option>Select a city</option>
		<option>Abuja Cities</option>
		<option>Lagos Cities</option>
		<option>Rivers cities</option>
		<option>Kano cities</option>
		<option>Ibadan cities</option>
	</select>
</div>

<div class="form-group">
    <label for="product">Name</label>
    <input type="text" name="name" class="form-control" placeholder="Name">
   </div>

   <div class="form-group">
    <label for="product">Phone number</label>
    <input type="text" name="phone" class="form-control" placeholder="Phone number">
   </div>

   <div class="form-group">
    <label for="product">Email</label>
    <input type="text" name="email" class="form-control" placeholder="Email">
   </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<div class="col-md-3"></div>
</div>
</div>
</section>
<?php include_once('includes/footer.php'); ?> 