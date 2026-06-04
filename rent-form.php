<?php include_once('includes/header.php'); ?> 

<?php
if(!isset($_SESSION["login"])){
redirect("index.php");
}

$error = 0;
$data_array = "";
$user_id = $_SESSION["user_id"];
$date_time = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$data_array = array();
$array_hold = array("date_time" => "'$date_time'");
$data_array = array_merge($data_array,$array_hold);

foreach ($_POST as $key => $value) {

$array_hold = $get_required = "";
$get_exist = in_table("COUNT(id) as total", "fields", "WHERE caption = '$key'", "total");
$get_required = in_table("required", "fields", "WHERE caption = '$key'", "required");
$get_format = in_table("format", "fields", "WHERE caption = '$key'", "format");
$value = ($get_format == "number" && $get_exist != 0)?testQty($value):test_input($value);
if($get_required == 1 && empty($value) or !isset($_SESSION["pictures"]) or count($_SESSION["pictures"]) == 0){
$error = 1;
}

if(!empty($value)){
$array_hold = array($key => "'$value'");
$data_array = array_merge($data_array,$array_hold);
}
}

//Submit when free from error
if($error == 0){
$db->insert($data_array, "properties");

$get_id = in_table("id", "properties", "WHERE user_id = '$user_id' AND date_time = '$date_time'", "id");

$c = 0;
foreach($_SESSION["pictures"] as $pic_name => $disp_pic){
$c++;
$file_name = "{$user_id}pic" . trim_date($date_time) ."img{$c}.jpg";
rename("images/trimmed_images/{$pic_name}","images/trimmed_images/{$file_name}");
rename("images/properties_images/{$pic_name}","images/properties_images/{$file_name}");
unset($_SESSION["pictures"][$pic_name]);
}

$_SESSION["success"] = "<div style='background:#099; color:#fff; font-size:16px; text-align:center; padding:10px; padding-top:15px; padding-bottom:15px; margin:10px; cursor:default;'>Upload was successful. Thank you.</div>";
unset($_SESSION["pictures"]);
redirect("");
}else{
$_SESSION["notSuccess"] = "<div style='background:#900; color:#fff; font-size:16px; text-align:center; padding:10px; padding-top:15px; padding-bottom:15px; margin:10px; cursor:default;'>Not submitted! Valid input required for all required (*) fields.</div>";
}

}
?>

<script src="js/jquery-1.9.1.js"></script>

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
.categories{
background:#333;
}
</style>
<section id="section">
<div class="container">
<div class="container well" id="categories" style="">
<?php 
if(isset($_SESSION["success"]) && !isset($_POST["rent"])){
echo $_SESSION["success"];
unset($_SESSION["success"]);
}
if(isset($_SESSION["notSuccess"])){
echo $_SESSION["notSuccess"];
unset($_SESSION["notSuccess"]);
}
?>

<?php
if(isset($_REQUEST["subcat"])){
$subcat = testQty($_REQUEST["subcat"]);

$category_id = in_table("category", "subcategories", "WHERE id = '$subcat'", "category");
$subcategory = in_table("subcategory", "subcategories", "WHERE id = '$subcat'", "subcategory");
$category = in_table("category", "categories", "WHERE id = '$category_id'", "category");
}
?>

<div style="font-size:16px; background:#eee; padding:10px; text-align:center;"><b>Category:</b> <?php echo $category; ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> <?php echo $subcategory; ?></div>

<div class="col-md-3"></div>
<div class="col-md-6">

<h6>Add photos (5 for free) *<br><i style="font-weight:normal">(Format: .jpg, .gif, .png, .jpeg, Not more than 5MB)</i>
</h6>

<div class="error_result"></div>

<div class="result">
<?php
if (isset($_SESSION["pictures"]) && !empty($_SESSION["pictures"])){ 
foreach($_SESSION["pictures"] as $pic_name => $disp_pic){
echo (file_exists("images/trimmed_images/{$pic_name}") && file_exists("images/properties_images/{$pic_name}"))?$disp_pic:"";
}
}
?>
</div>

<?php echo ($_SERVER['REQUEST_METHOD'] == "POST" && (!isset($_SESSION["pictures"]) or count($_SESSION["pictures"]) == 0))?"<div class='error' style='border:1px solid #900; margin-top:10px;'>":""; ?>
<div class="det_count"<?php echo (isset($_SESSION["pictures"]) && count($_SESSION["pictures"]) >= 5)?" style='display:none;'":""; ?>>
<div class="btn" style="border:1px dashed #ddd; display:table; width:100%;">
<form class="" method="post" action="" id="upload_form" enctype="multipart/form-data">
<div class="btn" style="display:table-cell; width:150px; height:100px; background:#eee; margin:5px;">
<i class="fa fa-picture-o" aria-hidden="true" style="color:#666; font-size:40px;"></i>
</div>
<div style="display:table-cell; padding:10px; vertical-align:middle;">
<input type="file" name="ufile" id="ufile" style="opacity: 0.0; filter: alpha(opacity=0); width:1px; height:1px;">
<label for="ufile" id="pic_label" class="btn form-control" style="background:#009b58; color:#fff;"><i class="fa fa-upload" aria-hidden="true" style="color:#fff; font-size:15px;"></i> Add a photo <i id="add_pics" class="fa fa-spinner fa-pulse fa-3x fa-fw" style="color:#fff; font-size:18px; display:none;"></i></label>
</div>
</form>
</div>
</div>
<?php echo ($_SERVER['REQUEST_METHOD'] == "POST" && (!isset($_SESSION["pictures"]) or count($_SESSION["pictures"]) == 0))?"<div class='error_message' style='background:#900;color:#fff;padding:10px;'><i class='fa fa-exclamation-triangle' aria-hidden='true' style='color:#fff'></i> At least a picture must be uploaded</div></div>":""; ?>

<form class="" method="post" action="">
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
<input type="hidden" name="subcategory_id" value="<?php echo (isset($_REQUEST["subcat"]))?testQty($_REQUEST["subcat"]):""; ?>">
<input type="hidden" name="purpose" value="rent">
<h6>Fill in the details</h6><hr>
<div class="col-md-12" style="margin-bottom:20px; padding-bottom:20px; color:#f00; border-bottom:1px solid #eee;">* fields are required.</div>

<?php
if(isset($_REQUEST["subcat"])){
$subcat = testQty($_REQUEST["subcat"]);
$result = $db->select("subcategories", "WHERE id = '{$subcat}'", "*", "");
if(count_rows($result) == 1){
$row = fetch_data($result);
$fields = $row["fields"];
$fields_array = explode(",",$fields);

foreach($fields_array as $value){
$f_result = $db->select("fields", "WHERE id = '{$value}'", "*", "");
if(count_rows($f_result) == 1){
$f_row = fetch_data($f_result);
$f_id = $f_row["id"];
$caption = $f_row["caption"];
$html_code = $f_row["html_code"];
$required = $f_row["required"];
$alert_text = $f_row["alert_text"];
$format = $f_row["format"];
$submitted_value = "";
$submitted_value = (isset($_POST["$caption"]) && $format == "text")?test_input($_POST["$caption"]):$submitted_value;
$submitted_value = (isset($_POST["$caption"]) && $format == "number")?testQty($_POST["$caption"]):$submitted_value;

echo (isset($_POST["$caption"]) && empty($submitted_value) && $required == 1)?"<div class='error' style='border:1px solid #900; margin-top:10px;'>":"<div class='error_free'>";
$html_code = str_replace("value=''","value='$submitted_value'",$html_code);
$html_code = str_replace("</textarea>","{$submitted_value}</textarea>",$html_code);
$html_code = (isset($_POST["$caption"]) && strpos($html_code,"<option") > 0 && !empty($submitted_value))?str_replace("value='$submitted_value'","value='$submitted_value' selected ",$html_code):$html_code;

$html_code = (isset($_POST["$caption"]) && $caption=="local_government")?str_replace("<option value='" . $_POST["$caption"] . "' selected ></option>","<option value='" . $_POST["$caption"] . "'>" . $_POST["$caption"] . "</option>",$html_code):$html_code;

$html_code = (isset($_POST["$caption"]) && strpos($html_code,'type="checkbox"') > 0 && !empty($submitted_value))?str_replace("value='Yes' /","checked value='Yes' /",$html_code):$html_code;
echo $html_code;
echo (isset($_POST["$caption"]) && empty($submitted_value) && $required == 1)?"<div class='error_message' style='background:#900;color:#fff;padding:10px;'><i class='fa fa-exclamation-triangle' aria-hidden='true' style='color:#fff'></i> {$alert_text}</div></div>":"</div>";
}
}

}
}
?>

<button type="submit" class="btn btn-primary" style="margin-top:10px;">Submit</button>
</form>
</div>
<div class="col-md-3"></div>
</div>
</div>
</section>

<script>
<!--
if (self!=top)
{
top.location.href=self.location.href;
}

var count_images = <?php echo (isset($_SESSION["pictures"]) && !empty($_SESSION["pictures"]))?count($_SESSION["pictures"]):0; ?>;

function delete_file(what, get_id){
document.getElementById(get_id).innerHTML = "<i class='fa fa-spinner fa-pulse fa-3x fa-fw' style='color:#666; font-size:16px;'></i>";

$.post( "process_data.php", { delete_file : "1" , file_name : what }, function(data){
$(".result").html(data);
});
}

$(document).ready(function(){

$("input").focus(function(){
$(".success").hide("fold");
});

$("#state").change(function(){
var state_val = $(this).val();
$("#local_government").html("<option value=''>Loading...</option>");
$.post( "process_data.php", { get_local : "1" , state : state_val }, function(data){
$("#local_government").html(data);
});
});

$(".num").keyup(function(){this.value = this.value.replace(/[^0-9.]/gi, "");}).change(function(){this.value = this.value.replace(/[^0-9.]/gi, "");});

//Uploads Picture
$("#ufile").change(function(){
$(".error_result").html("");
$("#upload_form").submit();
});


$("#upload_form").submit(function(e){
e.preventDefault();  
var formdata = new FormData(this);
$("#add_pics").show();
$("#pic_label").attr({"for":""});

if(count_images >= 5){
alert("Not added! You can only upload 5 images");
}else{
$.ajax({
url: "process_data.php",
type: "POST",
data: formdata,
mimeTypes:"multipart/form-data",
contentType: false,
cache: false,
processData: false,
success: function(data){
var ret_val = data;
ret_val = ret_val.indexOf("success");
if(ret_val > 0){
count_images++;
$(".result").append(data);
$("#add_pics").hide();
$("#pic_label").attr({"for":"ufile"});
if(count_images >= 5){
$(".det_count").hide();
}
}else{
$(".error_result").html(data);
}
},error: function(){
alert("Error occured!");
}
});
}
});

});

//-->
</script>

<?php include_once('includes/footer.php'); ?> 