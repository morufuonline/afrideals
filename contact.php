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
<div class="col-md-2"></div>
<div class="col-md-8">
  <form class="" role="form">
<h5>Contact us</h5>
<p>If you did not find the answer to your question or problem, please get in touch with us using the form below and we will respond to your message as soon as possible.</p>

 <div class="form-group">
    <label for="product">Name</label>
  <input type="text" name="name" placeholder="Your name" class="form-control">
</div>

 <div class="form-group">
    <label for="product">Email</label>
  <input type="text" name="email" placeholder="Your email" class="form-control">
</div>

<div class="form-group">
    <label for="product">Message</label>
    <textarea name="details" class="form-control" rows="6" placeholder="Message here"></textarea>
   </div>

  <button type="submit" class="btn btn-primary">Contact us</button>
</form>
</div>


<div class="col-md-2">
</div>
</div>
</div>
</section>
<?php include_once('includes/footer.php'); ?> 