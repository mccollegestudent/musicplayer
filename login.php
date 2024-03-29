<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to musicPlayer page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: musicPlayer.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 $last_lat = 7;
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $last_lat = (double)$_POST['lat'];
    $last_long = (double)$_POST['long'];
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            $query = "SELECT * FROM users WHERE username = '$username'";
                            
                            foreach ($conn->query($query) as $result) {
                                $_SESSION["last_song"] = $result['last_song'];
                                $_SESSION["last_playlist"] = $result['last_playlist'];
                                
                            }
                            $temp = $_SESSION["last_playlist"];

                            $query = "SELECT * FROM playlist WHERE User = '$username' AND Playlist_Id = '$temp'";
                            foreach ($conn->query($query) as $result) {
                                $_SESSION["Playlist_Name"] = $result['Playlist_Name'];
                            }

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            //getLocation();

                            $sql = "UPDATE users SET last_position_lat = '$last_lat' WHERE username = '$username'";
                            $conn->query($sql);
                            
                            $sql = "UPDATE users SET last_position_long = '$last_long' WHERE username = '$username'";
                            $conn->query($sql);
                  
                            $query = "SELECT * FROM users WHERE username = '$username'";
                            foreach ($conn->query($query) as $result) {
                                $isNew = $result['isNew'];
                            }

                            if($isNew){
                                header("location: newUserPlaylist.php");
                                exit();
                            }


                            // Redirect user to music player page
                            header("location: musicPlayer.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 


<!DOCTYPE html>
<html lang="en">
<style>
.center-screen {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  min-height: 100vh;
}

</style>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body style="background-color:rgb(33,32,28); text-align:center; color:white;" class = "center-screen">
    <div style = "font-size:4vw;">Music Streaming App!</div>



    <p></p>
    <p></p>
    <p></p>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <input id= "long" type="hidden" placeholder="0" name="long" value="7">
            <input id = "lat" type="hidden" placeholder="0" name="lat" value="7">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>

    </div>

    
    <script>
        var x = document.getElementById("long");
        var y = document.getElementById("lat")
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "0";
                y.innerHTML = "0";
            }
        

        function showPosition(position) {
        x.value = position.coords.latitude;
        y.value = position.coords.longitude;
        }



    </script>
    

</body>
</html>





