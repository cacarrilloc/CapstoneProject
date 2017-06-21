<?php
	include 'template_prepend.php';

    $firstName=$_POST['adminFirstName'];
  	$lastName=$_POST['adminLastName'];
    $email=$_POST['adminEmail'];
  	$password=$_POST['adminPassword'];

    $mysqli=new mysqli($dbHost,$dbUserName,$dbPassword,$dbName);

    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

  	$mysqli->query("INSERT INTO admins(first_name, last_name, email, password)
                  VALUES('$firstName','$lastName', '$email','$password')");
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
        <a href="index.php"><button class = "btn-second" style="color:white;">SIGN OUT</button></a>
        <?php
            if(isset($_POST["adminEmail"])) {
                $query = <<<stmt
                SELECT first_name, last_name, email, password FROM admins WHERE email =?;
stmt;
                $p1 = $_POST["adminEmail"];
                if (($my_stmt = $dbConnection->prepare($query))) {
                    $my_stmt->bind_param('s', $p1);
                    $my_stmt->execute();
                    $result = $my_stmt->get_result();
                    $i = 0;
                    $colHeaders = array();
                    $colData = array();
                    while($row = mysqli_fetch_assoc($result)) {
                        if($i == 0) {
                            foreach($row as $colHeader => $val) {
                                $colHeaders[] = $colHeader;
                            }
                        }
                        $colData[] = $row;
                        $i++;
                    }
                    echo '<p><h3>Your ADMIN account has been successfully created!!</p>';
                    echo '<h2 class="page-header" style="color:yellow;">Personal Data Entered</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
            
                            <tbody>';
                                foreach($colData as $r) {
                                    echo "<tr>";
                                    foreach($colHeaders as $colHeader) {
                                        echo "<td>" . $r[$colHeader] . "</td>";
                                    }
                                    echo "</tr>";
                                }
                                echo '</tbody></table></div>';
                                $my_stmt->close();
                }
            }
?>
    </br></br>
    <form method="POST" action="admin_console.php">
        <input type="submit" class="btn btn-default" style="width:580px" value="GO TO ADMIN CONSOLE" id="mainPage"></input>
    </form>
    </div>/br></br></br></br>
</div>

<?php
	include 'template_append.php';
?>







