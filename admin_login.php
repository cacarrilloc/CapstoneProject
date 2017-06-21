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
        <button class  ="btn-second" onclick="myFunction()">HELP</button>
        <script>
        function myFunction() {
            alert("INSTRUCTIONS TO LOG INTO THE SYSTEM:\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.");
        }
        </script>
        <a href="index.php"><button class = "btn-second" style="color:white;">HOME</button></a>

        <div class="row">
			<h1 class="page-header"><strong>LOG INTO ADMIN CONSOLE</strong></h1>
			<h3>Enter your credentials to have access to your account.</h3>
		</div>
        <div class="row addNew">
            <form method="POST" form name="login" onsubmit="return validation()" action="verify_adminLogin.php">
                <fieldset class="form-group">
                    <label for="adminEmail"> Enter your email Address: </label>
                    <input type="text" class="form-control" name="adminEmail" id="adminEmail"></fieldset>
                <fieldset class="form-group">
                    <label for="password"> Enter your Password: </label>
                    <input type="password" class="form-control" name="password" id="password_login"></fieldset></br></br>
                <input type="submit" class="btn btn-default" style="width:370px" value="LOG IN" id="loginButton"></input>
            </form>
        </div></br></br>
    </div></br></br>
</div>


<?php
	include 'template_append.php';
?>
