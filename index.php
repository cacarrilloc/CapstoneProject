<?php
    include 'template_prepend.php';
?>

<div class="giveMePadding">
    <div class="giveMePadding">
        </br></br>
        <button class  = "btn-second" onclick="myFunction()">ABOUT</button>
        <script>
            function myFunction() {
                alert("ABOUT THE APPLICATION:\nNASA offers access to its database of images such as the pictures taken by the Mars Rover and other pictures of the universe taken by its powerful cameras. These pics just look AMAZING! This application allows you to download these amazing pictures so you can use them to change your desktop or Facebook background on a weekly basis! We want more people to be aware of what is out there and share this cosmic beauty! So please choose one of the options below to navigate to your personal space headquarters.");
            }
        </script>

        <button class =  "btn-second" onclick="myFunction2()">HELP</button>
        <script>
            function myFunction2() {
                alert("HOW TO USE THE APPLICATION: \nIf you are existing user or administrator please use EXISTING USER or EXISTING ADMIN buttons. If you are new to the application you would need first to create an accout by using NEW USER button. Upon using this button you will be redirected to a page where you can create your new acount and start using application features such as uploading NASA images and sharing them with your friends via email or Facebook.");
            }
        </script>

        <div class="row">
			<h1 class="page-header"><strong>WELCOME TO NASA SPACE EXPLORER</br>
			<h4><button class = "btn btn-default" onclick = "window.open('https://mars.nasa.gov/mer/mission/spacecraft_rover_eyes.html', '_blank')"><strong> Powered By NASA Rovers </strong></button><!--Powered by</br><a style=color:red;" href="https://mars.nasa.gov/mer/mission/spacecraft_rover_eyes.html" target="_blank">https://mars.nasa.gov/mer/mission/spacecraft_rover_eyes.html</a>--></h4></strong></h1></br>
		</div>
    </div></br>
	
    <div class="giveMePadding">
        <div class="row addNew">
            <form method="POST" action="user_login.php">
                <input type="submit" class="btn btn-default" value="EXISTING USER" id="existUser"></input>
            </form>
			</div> </br>
		
        
        <div class = "row addNew"> 
            <form method="POST" action="admin_login.php">
                <input type="submit" class="btn btn-default" value= "EXISTING ADMIN" id="existAdmin"></input>
            </form>
			</div> </br>
        
        <div class = "row addNew"> 
            <form method="POST" action="user_signUp.php">
                <input type="submit" class="btn btn-default" value="NEW USER" id="newUser"></input>
            </form>
        </div>
    </div> </br></br></br></br>
</div>

<?php
	include 'template_append.php';
?>


