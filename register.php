<?php include_once('includes/header.php'); ?> 

<?php
if(isset($_SESSION["login"])){
redirect("{$directory}users/");
}
if(isset($_SESSION["admin_login"])){
redirect("{$directory}deal2016/");
}

$shuffled_data = str_shuffle("AbCdEfGhIjKlMnOpQrStUvWxYz123456789{}()");

$name = $email = $password = $conf_password = $check_user = $msg = "";
$name = ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["name"]))?test_input($_POST["name"]):$name;
$email = ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["email"]))?test_input($_POST["email"]):$email;
$password = ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["password"]))?test_input($_POST["password"]):$password;
$conf_password = ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["conf_password"]))?test_input($_POST["conf_password"]):$conf_password;
$check_user = ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["check_user"]))?test_input($_POST["check_user"]):$check_user;

// Login
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["login"]) && !empty($email) && !empty($password)){
$password = sha1($password);

$result = $db->select("users", "Where email = '{$email}' AND password = '{$password}'", "*", "");

if(count_rows($result) == 1){

$row = fetch_data($result);
$_SESSION["email"] = $email;
$_SESSION["name"] = $row["name"];
$_SESSION["user_id"] = $row["user_id"];
$_SESSION["login"] = 1;
$date_time = date("Y-m-d H:i:s");

$db->query("UPDATE users SET logged_in = '1', date_time = '{$date_time}' WHERE email = '{$email}' AND password = '{$password}'");

redirect("{$directory}users/");

}else{
$msg = "<div class='not_success'>Incorrect Username/Password</div>";
}

}

if(isset($_REQUEST["a"]) && isset($_REQUEST["b"])){
$a = "";
$a = test_input(urldecode($_REQUEST["a"]));
$fid = $db->query("UPDATE users SET active = '1' WHERE email = '{$a}'");
if($fid){
$msg = "<div class='success'>Your account was successfully activated. Kindly log in.</div>";
}
}


// Sign up
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION["spam_checker"]) && isset($_POST["signup"]) && !empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password) && $password == $conf_password && $check_user == $_SESSION["spam_checker"]){

$email = strtolower($email);
$password = sha1($password);

$result = $db->select("users", "Where email = '{$email}'", "*", "");

if(count_rows($result) < 1){

$to = "{$email}";
$subject = "Account Activation";
$message = "
<html>
<head>
<title>Account Activation</title>
</head>
<body>
<p><img src='{$directory}images/logo.png'><br><br>Dear {$name},<br><br>Thank you for signing up for an account on afrideals.com.<br><br>Kindly activate your account by clickng on this link: <a href='{$directory}register.php?a=" . urlencode($email) . "&b={$shuffled_text}'>Activate</a><br><br>OR<br><br>Copy this link and paste it on your address bar: {$directory}register.php?a=" . urlencode($email) . "&b={$shuffled_text}<br><br>If you didn't sign up for this account, or you are having trouble with your account, please contact us at contact@afrideals.com and we will be happy to help you.<br><br><br><br>Regards,<br><br>Afrideals Team,<br><br><a href='{$directory}'>afrideals.com</a>.</p>
</body>
</html>
";
$message = wordwrap($message,70);

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Afrideals <noreply@afrideals.com>" . "\r\n";

mail($to,$subject,$message,$headers);

$data_array = array(
"name" => "'$name'",
"email" => "'$email'",
"password" => "'$password'",
"date" => "'" . date("Y-m-d") . "'"
);
$act = $db->insert($data_array, "users");

if($act){
	
$user_id = "UID" . str_pad(in_table("id", "users", "WHERE email = '$email'", "id"),7,"0",STR_PAD_LEFT);
$db->query("UPDATE users SET user_id = '$user_id' WHERE email = '{$email}'");

$_SESSION["success"] = "<div class='success'>Account successfully created. Kindly check your email box to activate your account. You may also proceed to log in.</div>";
redirect("register.php");
}else{
$_SESSION["notSuccess"] = "<div class='not_success'>Error occured.</div>";
}

}else{
$_SESSION["notSuccess"] = "<div class='not_success'>Email already exists. Log in instead.</div>";
}

}


if(isset($_POST["signup"])){
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["email"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
message("Not submitted! Invalid  email format.");
}else if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["password"]) && $_POST["password"] != $_POST["conf_password"]){
message("Not submitted! Passwords do not match.");
}else if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["check_user"]) && $_POST["check_user"] != $_SESSION["spam_checker"]){
message("Not submitted! Incorrect check code.");
}
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
	#input input{
		margin:20px auto;
	}
	
.success{
background:#099;
color:#fff;
font-size:16px;
text-align:center;
padding:10px;
padding-top:15px;
padding-bottom:15px;
margin:10px;
cursor:default;
}
.success *, .success *:active, .success *:hover{
text-decoration:none;
color:#fff;
font-size:16px;
cursor:pointer;
}
.success a:hover{
text-decoration:underline;
}
.not_success{
background:#b00;
color:#fff;
font-size:16px;
text-align:center;
padding:10px;
padding-top:15px;
padding-bottom:15px;
margin:10px;
}
</style>
<section id="section">
<div class="container">

<div class="container well" id="categories" style="">

<?php
echo (isset($msg))?$msg:"";
if(isset($_SESSION["msg"])){
echo $_SESSION["msg"];
unset($_SESSION["msg"]);
}
if(isset($_SESSION["success"]) && !isset($_POST["email"])){
echo $_SESSION["success"];
unset($_SESSION["success"]);
}
if(isset($_SESSION["notSuccess"])){
echo $_SESSION["notSuccess"];
unset($_SESSION["notSuccess"]);
}
?>

<div class="container">
 <div class="col-md-12">
  <ul class="nav nav-tabs text-right">
    <li class="active"><a data-toggle="tab" href="#home">Log In</a></li>
    <li><a data-toggle="tab" href="#menu1">Register</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <div class="col-md-6" style="border-right:3px solid #f7f7f7;">
      <h5>Manage all your ads in one place-for free!</h5>
      <p><img src="icons/form1.png"> View, edit and delete your ads.</p>
      <p><img src="icons/form2.png"> Save your contact details to save time when posting new ads.</p>
      <p><img src="icons/form3.png"> Keep track of your favorite ads</p>
      <p>Don't have an account yet? <a href="register.php">Sign Up now!</a></p>
     </div>
     <div class="col-md-6">
     <h5>Log in!</h5>
     	<form class="col-md-12" id="login_form" method="post" action="">
     		<input type="text" name="email" class="input-sm" placeholder="Email" value="<?php echo (isset($_POST["login"]) && isset($_POST["email"]))?$_POST["email"]:""; ?>" required><br>

     		<input type="password" name="password" class="input-sm" placeholder="Password" required><br>

     		<button class="btn btn-success" name="login">Log in</button><br><br>
     		<p><a href="#">Forgot password?</a></p>
     	</form>
     </div>
    </div>
    <div id="menu1" class="tab-pane fade">
       <div class="col-md-6" style="border-right:3px solid #f7f7f7;">
      <h5>Manage all your ads in one place-for free!</h5>
      <p><img src="icons/form1.png"> View, edit and delete your ads.</p>
      <p><img src="icons/form2.png"> Save your contact details to save time when posting new ads.</p>
      <p><img src="icons/form3.png"> Keep track of your favorite ads</p>
      <p>Do you already have an account? <a href="register.php">Log in here</a></p>
     </div>
     <div class="col-md-6">
     <h5>Register!</h5>
     	<form class="col-md-12" id="register_form" runat="server" autocomplete="off" method="post" action="">
     		<input type="text" name="name" class="input-sm" placeholder="Name" value="<?php echo (isset($_POST["signup"]) && isset($_POST["name"]))?$_POST["name"]:""; ?>" required><br>

     		<input type="text" name="email" class="input-sm" placeholder="Email" value="<?php echo (isset($_POST["signup"]) && isset($_POST["email"]))?$_POST["email"]:""; ?>"  required><br>

     		<input type="password" name="password" class="input-sm" placeholder="Password" value="<?php echo (isset($_POST["signup"]) && isset($_POST["password"]))?$_POST["password"]:""; ?>"  required><br>

     		<input type="password" name="conf_password" class="input-sm" placeholder="Confirm password" value="<?php echo (isset($_POST["signup"]) && isset($_POST["conf_password"]))?$_POST["conf_password"]:""; ?>"  required><br>
            Type confirmation code below: <?php $_SESSION["spam_checker"] = rand(1000,9999); echo $_SESSION["spam_checker"]; ?><br>
            <input type="text" name="check_user" class="input-sm" placeholder="Confimation code goes here..." required><br>
     		<button class="btn btn-success" name="signup">Sign Up</button><br><br>
     		<p style="text-align:left;">By signing up for an account you agree to <br>
     		our<a href="#">Terms and Conditions</a></p>
     	</form>
     </div>
    </div>
  </div>
</div>
</div>

</div>
	
</div>
</section>
<?php include_once('includes/footer.php'); ?> 