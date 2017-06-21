<?php
	include 'template_prepend.php';
?>

<script>
    function validation() {
        var email = document.forms["login"]["email"].value;
        var password = document.forms["login"]["password"].value;

        if(email == null || email == ""){
            alert("Please enter your email");
            return false;
        }
        else if(password == null || password == ""){
            alert("Please enter your Password");
            return false;
        }
    }
</script>

<div class="giveMePadding">
    <div class="giveMePadding">
        </br></br>
        <button class = "btn-second" onclick="myFunction()">HELP</button>
        <script>
        function myFunction() {
            alert("HOW TO USE THE APPLICATION: \nIf you are existing user or administrator please use EXISTING USER or EXISTING ADMIN buttons. If you are new to the application you would need first to create an accout by using NEW USER button. Upon using this button you will be redirected to a page where you can create your new acount and start using application features such as uploading NASA images and sharing them with your friends via email or Facebook.");
        }
        </script>
        <a href="index.php"><button class = "btn-second" style="color:white;">HOME</button></a>
        <div class="row">
            <h1 class="page-header"><strong>LOG INTO YOUR USER ACCOUNT</strong></h1>
            <h3>Enter your credentials to have access to your account.</h3>
        </div>
        <div class="row addNew">
            <form method="POST" form name="login" onsubmit="return validation()" action="verify_userLogin.php">
			  <fieldset class="form-group">
				<label for="userEmail"> Enter your email Address: </label>
                <input type="text" class="form-control" name="userEmail" id="userEmail"></fieldset>
              <fieldset class="form-group">
				<label for="password"> Enter your Password: </label>
				<input type="password" class="form-control" name="password" id="password_login"></fieldset>
			  <input type="submit" style="width:370px" class="btn btn-default"  value="LOG IN" id="loginButton"></input>
            </form>
        </div>
    </div></br></br></br></br>
</div>

<?php
	include 'template_append.php';
?>
