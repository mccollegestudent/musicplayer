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
          $delete = "DELETE FROM playlist_contents WHERE Playlist_Id = $current_playlist AND Song_Id = $index";
          $stmt = $conn->prepare($delete);
          $stmt->execute();
          echo "attempted to delete";
        }


        if(isset($_POST['updatePlaylist'.$index]) &&(!empty($index))){
          $sql = "UPDATE users SET last_playlist = '$index' WHERE username = '$current_user'";
          $conn->query($sql);

          $_SESSION["last_playlist"] = $index;

          $query = "SELECT * FROM playlist WHERE User = '$current_user' AND Playlist_Id = '$index'";
          foreach ($conn->query($query) as $result) {
            $_SESSION["Playlist_Name"] = $result['Playlist_Name'];
          }
          echo $_SESSION["Playlist_Name"];
          //echo $_SESSION["last_playlist"];
        }

        if(isset($_POST['addBtn'.$index]) &&(!empty($index))){
          $insert = "INSERT INTO `playlist_contents` (`Playlist_Id`, `Song_Id`) VALUES ('$current_playlist', '$index')";
          $stmt = $conn->prepare($insert);
          $stmt->execute();
          echo "attempted to insert";
        }



      
      if ($table == 'music')
        header("Location: musicPlayer.php");;
      exit();
      

    ?>
  </body>
</html>
