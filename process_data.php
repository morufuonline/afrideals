<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
ini_set('session.gc_maxlifetime', 86400);
session_start();

require_once("classes/DB_class.php");
require_once("includes/functions.php");
require_once("includes/resize_image.php");

$db = new DB();
$db->connect();

// Loads Local Government
if(isset($_POST["get_local"]) && !empty($_POST["state"])){
$state = test_input($_POST["state"]);

$result = $db->select("location", "WHERE state = '{$state}'", "DISTINCT local_government", "ORDER BY state ASC");
if(count_rows($result) > 0){
echo "<option value=''> - - Select a local government - - </option>";
while($row = fetch_data($result)){
$local_government = $row["local_government"];
echo "<option value='{$local_government}'>{$local_government}</option>";
}
}

}

// Loads Sub-Category
if(isset($_POST["get_sub_cat"]) && !empty($_POST["category"])){
$category = test_input($_POST["category"]);
$category_name = in_table("category", "categories", "WHERE id = '$category'", "category");
$result = $db->select("subcategories", "WHERE category = '{$category}'", "DISTINCT id, subcategory", "ORDER BY subcategory ASC");
if(count_rows($result) > 0){
echo '<div class="modal-header" style="background-color: #336699; color:#fff;">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Select a subcategory</h4>
</div>
<div class="modal-body">';
while($row = fetch_data($result)){
$id = $row["id"];
$subcategory = $row["subcategory"];
echo "<p><a href='sell-form.php?subcat={$id}' class='link' style='font-weight: normal; display:block; border-bottom:1px solid #ddd; padding:5px; padding-bottom: 15px;'>{$subcategory}</a></p>";
}
echo "</div>";
}else{
echo "<div class='modal-body'>No subcategories available for {$category_name} category</div>";
}
}

// Upload image
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_FILES["ufile"]["tmp_name"])){

$user_id = $_SESSION["user_id"];

$file_name = $_FILES["ufile"]["name"]; 
$file_temp_name = $_FILES["ufile"]["tmp_name"];
$file_size = $_FILES["ufile"]["size"];
$file_error_message = $_FILES["ufile"]["error"];
$file_name_2_array = explode(".", $file_name);
$file_extension = end($file_name_2_array);

if (!$file_temp_name) {
    echo "<div style='background:#900; color:#fff; font-size:16px; text-align:center; padding:10px; padding-top:15px; padding-bottom:15px; margin:10px; cursor:default;'>ERROR: Please browse for a file before clicking the upload button.</div>";
    exit();
} 
else if($file_size > 5242880) {
    echo "<div style='background:#900; color:#fff; font-size:16px; text-align:center; padding:10px; padding-top:15px; padding-bottom:15px; margin:10px; cursor:default;'>ERROR: Your file was larger than 5 Megabytes in size.</div>";
    unlink($file_temp_name);
    exit();
}
else if (!preg_match("/.(gif|GIF|jpg|JPG|png|PNG|jpeg|JPEG)$/i", $file_name) ) {
     echo "<div style='background:#900; color:#fff; font-size:16px; text-align:center; padding:10px; padding-top:15px; padding-bottom:15px; margin:10px; cursor:default;'>ERROR: Your image was not .gif, .jpg, or .png.</div>";
     unlink($file_temp_name);
     exit();
}
else if ($file_error_message == 1) {
    echo "<div style='background:#900; color:#fff; font-size:16px; text-align:center; padding:10px; padding-top:15px; padding-bottom:15px; margin:10px; cursor:default;'>ERROR: An error occured while processing the file. Try again.</div>";
    exit();
}

$get_time = date("YmdHis");

$file_name = "{$user_id}pic{$get_time}.jpg";
$move_file = move_uploaded_file($file_temp_name, "images/trimmed_images/" . $file_name);
$copy_file = copy("images/trimmed_images/" . $file_name, "images/properties_images/" . $file_name);
if ($move_file != true or $copy_file != true) {
    echo "<div style='background:#900; color:#fff; font-size:16px; text-align:center; padding:10px; padding-top:15px; padding-bottom:15px; margin:10px; cursor:default;'>ERROR: File not uploaded. Try again.</div>";
    unlink($file_temp_name);
    exit();
}

$target_file = "images/trimmed_images/" . $file_name;
$resized_file = $target_file;
image_resize_abs($target_file, $resized_file, $file_extension, 150, 100);

$target_file = "images/properties_images/" . $file_name;
$resized_file = $target_file;
image_resize($target_file, $resized_file, $file_extension, 650, 500);

if (!isset($_SESSION["pictures"])){ 
    $_SESSION["pictures"] = array(); 
}
$rand_no = rand();
$_SESSION["pictures"][$file_name] = "<div id='success' class='btn' style='border:1px dashed #ddd; display:table; width:100%; margin-bottom:10px'>
<div style='display:table-cell;margin:5px; width:150px;'>
<img src='images/trimmed_images/{$file_name}' class='img-rounded' style='max-width:100%; height:auto; min-width:100px;'>
</div>
<div style='display:table-cell; padding:10px; vertical-align:middle;'>
<span onclick='javascript:void(0); delete_file(" . '"' . $file_name . '","a' . $rand_no . '"' . ");' style='color:#999; text-align:left; display:block;'><i class='fa fa-times btn' aria-hidden='true' style='background:#d00; color:#fff; font-size:12px; padding:2px;'></i> Remove image <span id='a{$rand_no}'></span></span>
</div>
</div>";

echo "<div id='success' class='btn' style='border:1px dashed #ddd; display:table; width:100%; margin-bottom:10px'>
<div style='display:table-cell;margin:5px; width:150px;'>
<img src='images/trimmed_images/{$file_name}' class='img-rounded' style='max-width:100%; height:auto; min-width:100px;'>
</div>
<div style='display:table-cell; padding:10px; vertical-align:middle;'>
<span onclick='javascript:void(0); delete_file(" . '"' . $file_name . '","a' . $rand_no . '"' . ");' style='color:#999; text-align:left; display:block;'><i class='fa fa-times btn' aria-hidden='true' style='background:#d00; color:#fff; font-size:12px; padding:2px;'></i> Remove image <span id='a{$rand_no}'></span></span>
</div>
</div>";
}


// Delete images
if(isset($_POST["delete_file"]) && !empty($_POST["file_name"])){
$file_name = $_POST["file_name"];

unlink("images/trimmed_images/{$file_name}");
unlink("images/properties_images/{$file_name}");
unset($_SESSION["pictures"][$file_name]);

if (isset($_SESSION["pictures"]) && !empty($_SESSION["pictures"])){ 
foreach($_SESSION["pictures"] as $pic_name => $disp_pic){
echo (file_exists("images/trimmed_images/{$pic_name}") && file_exists("images/properties_images/{$pic_name}"))?$disp_pic:"";
}
}
?>
<script>
<!--
count_images = <?php echo (isset($_SESSION["pictures"]) && !empty($_SESSION["pictures"]))?count($_SESSION["pictures"]):0; ?>;
if(count_images >= 5){
$(".det_count").hide();
}else{
$(".det_count").show();
}
-->
</script>
<?php
}
?>