<?php include_once('includes/header.php'); ?> 
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
<div class="col-md-4">
  <form class="" role="form">
<h6>Search whatever you want</h6><hr>

 <div class="form-group">
    <label for="product">Categories</label>
  <select name="region" class="form-control">
    <option>Select a category</option>
  </select>
</div>

 <div class="form-group">
    <label for="product">Category Options</label>
  <select name="region" class="form-control">
    <option>Select option</option>
  </select>
</div>

<div class="form-group">
    <label for="product">State</label>
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
    <label for="product">Industry</label>
   <select name="industry" class="form-control">
           <option value="">Industry Type*</option>
           <option value="accounting_finance">Accounting / Finance</option>
           <option value="agriculture">Agriculture</option>
           <option value="construction">Civil Engineering / Construction</option>
           <option value="customer_service">Customer Service</option>
           <option value="design">Design, Art / Photography</option>
           <option value="engineering">Engineering / Architecture</option>
           <option value="fashion">Fashion / Beauty</option>
           <option value="food">Food / Catering</option>
           <option value="general">General Labour</option>
           <option value="household_help">House Help</option>
           <option value="it_telecom">IT / Telecom</option>
           <option value="legal">Legal</option>
           <option value="management">Business / Corporate Management</option>
           <option value="manufacturing">Manufacturing</option>
           <option value="marketing">Media, Advertising / Marketing</option>
           <option value="medical">Medical / Biotech</option>
           <option value="office">Secretary / Office Admin</option>
           <option value="oil_gas">Oil / gas</option>
           <option value="research">Research / Development</option>
           <option value="sales">Sales / Retail</option>
           <option value="security">Security</option>
           <option value="teaching">Teaching</option>
           <option value="tourism">Hotels / Tourism</option>
           <option value="tradesmen_craftsmen">Tradesmen / Craftsmen</option>
           <option value="transport">Transportation</option>
           <option value="travel">Travel / Airline</option>
           <option value="work_overseas">Work Overseas</option>
    </select>
  </div>

  <div class="form-group">
    <label for="product">Job type</label>
  <select name="region" class="form-control">
    <option>Select Job type</option>
    <option>Full time</option>
    <option>Part time</option>
    <option>Contract</option>
    <option>Internship</option>
    <option>Temporary</option>
    <option>Others</option>
  </select>
</div>
 

  <button type="submit" class="btn btn-primary">Search</button>
</form>
</div>


<div class="col-md-8">
</div>
</div>
</div>
</section>
<?php include_once('includes/footer.php'); ?> 