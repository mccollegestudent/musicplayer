<?php
	require_once "config.php";
?>

<html>
  <body>
    <?php
        $index = $_POST["index"];
        $table = $_POST['table'];

        echo "name ".$index."<br>";;
        echo "table ".$table."<br>";

        $stmt = NULL;
      
        if(isset($_POST['deleteBtn'.$index]) &&(!empty($index))){
            $delete = "DELETE FROM $table WHERE id = '$index'";
            $stmt = $conn->prepare($delete);
          // $stmt->execute();
        }

      if ($table == 'music')
        header("Location: musicPlayer.php");;
      exit();
 
    ?>
  </body>
</html>
