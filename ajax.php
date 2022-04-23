<?php		

require_once "config.php";

		
GLOBAL $current_playlist;


$search = $_POST['search'];
$search2 = $_POST['oof'];

/*//$query = "SELECT * FROM music WHERE name LIKE '%$search%' LIMIT 5";
if(isset($_POST['search'])){
    if(empty(trim($_POST["search"]))){
        
    } else{
        $search = $_POST["search"];
    }

}

/*if(isset($_POST['oof'])){
    if(empty(trim($_POST["oof"]))){
        
    } else{
        $search2 = $_POST["oof"];
    }

}*/

$query = "SELECT * FROM music WHERE (name LIKE '%$search%' OR album LIKE '%$search%' OR artist LIKE '%$search%') AND (genre LIKE '%$search2%' OR yearReleased LIKE '%$search2%') LIMIT 5";


foreach ($conn->query($query) as $row) {
    $index = $row['id'];
    
    echo "<form action = 'updateDB.php' method = 'post'>";
        echo "<div class='p_song active_song'>".						
                    "<p id='p_title'>    ".$row["name"]."   </p>".
                    "<p id='p_artist'>    ".$row["artist"]." </p>".
                    "<p id='p_album'>    ".$row["album"]."  </p>".
                    "<p id='p_genre'>   ".$row["genre"]."   </p>".
                    "<p id='p_year'>    ".$row["yearReleased"]."</p>".
                    "<input type = 'hidden' name = 'table' value ='music'/>".
                    "<input type = 'hidden' name = 'index' value ='".$index."'/>".
                    "<button name = 'addBtn".$index."'><i class='bx bxs-plus-circle' ></i></button>".
            "</div>";							
    echo "</form >";    
}


    ?>