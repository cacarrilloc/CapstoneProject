<?php
	include 'template_prepend.php';
?>
<div class="giveMePadding">
    <div class="giveMePadding">
        </br></br>
        <button class = "btn-second" onclick="myFunction()">HELP</button>
        <script>
            function myFunction() {
                alert("HOW TO USE THE APPLICATION: \nIf you are existing user or administrator please use EXISTING USER or EXISTING ADMIN buttons. If you are new to the application you would need first to create an accout by using NEW USER button. Upon using this button you will be redirected to a page where you can create your new acount and start using application features such as uploading NASA images and sharing them with your friends via email or Facebook.");
            }
        </script>
        <a href="index.php"><button class = "btn-second"style="color:white;">HOME</button></a>
        <div class="row">
			<h1 class="page-header"><strong>CREATE USER ACCOUNT</strong></h1>
			<h3>Thank you for being interested in creating a new account!</h3>
            <h4>Please fill up all the fields with your personal information. Then click "SUBMIT".</h4>
		</div>
        <div class="row addNew">
            <form method="POST" action="add_user.php">
                <fieldset class="form-group">
                    <label for="userFirstName"> First Name: </label>
                    <input type="text" class="form-control" name="userFirstName" id="userFirstName"></fieldset>
                <fieldset class="form-group">
                    <label for="userLastName"> Last Name: </label>
                    <input type="text" class="form-control" name="userLastName" id="userLastName"></fieldset>
                <fieldset class="form-group">
                    <label for="userEmail"> Email Address: </label>
                    <input type="text" class="form-control" name="userEmail" id="userEmail"></fieldset>
                <fieldset class="form-group">
                    <label for="userPassword"> Create Password: </label>
                    <input type="password" class="form-control" name="userPassword" id="userPassword"></fieldset>
                <fieldset class="form-group">
                    <label for="userCity">City: </label>
                    <input type="text" class="form-control" name="userCity" id="userCity"></fieldset>
                <fieldset class="form-group">
                    <label for="userState">State: </label>
                    <input type="text" class="form-control" name="userState" id="userState"></fieldset>
                <fieldset class="form-group">
                    <label for="userCountry"> Country: </label>
                    <input type="text" class="form-control" name="userCountry" id="userCountry"></fieldset></br></br>
                <input type="submit" class="btn btn-default" style="width:370px" value="SUBMIT" id="addUserButton"></input>
            </form>
        </div></br>
    </div></br></br></br></br>
</div>

<?php
	include 'template_append.php';
?>
