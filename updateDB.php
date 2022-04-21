<?php
	require_once "config.php";
  session_start();
?>

<html>
  <body>
    <?php

        $current_playlist = $_SESSION["last_playlist"];
        $current_user = $_SESSION["username"];

        $index = $_POST["index"];
        $table = $_POST['table'];

        //echo "name ".$index."<br>";;
        //echo "table ".$table."<br>";

        $stmt = NULL;
      
        if(isset($_POST['deleteBtn'.$index]) &&(!empty($index))){
            $delete = "DELETE FROM $table WHERE id = '$index'";
            $stmt = $conn->prepare($delete);
          // $stmt->execute();
        }


        if(isset($_POST['updatePlaylist'.$index]) &&(!empty($index))){
          $sql = "UPDATE user SET last_playlist = '$index' WHERE username = '$current_user'";
          $conn->query($sql);

          $_SESSION["last_playlist"] = $index;
          echo $_SESSION["last_playlist"];
      }



      
      if ($table == 'music')
        header("Location: musicPlayer.php");;
      exit();
      

    ?>
  </body>
</html>
