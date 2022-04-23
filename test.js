function fill(Value) {
    //Assigning value to "search" div in "search.php" file.
    //$('#search').val(Value);
    //$('#oof').val(Value);
    //Hiding "display" div in "search.php" file.
    //$('#display').hide();
 }
 $(document).ready(function() {
    //On pressing a key on "Search box" in "search.php" file. This function will be called.
    $("#search").keyup(function() {
        //Assigning search box value to javascript variable named as "name".
        var name = $('#search').val();
        var name2 = $('#oof').val();
        //Validating, if "name" is empty.
       
            //AJAX is called.
            $.ajax({
                //AJAX type is "Post".
                type: "POST",
                //Data will be sent to "ajax.php".
                url: "ajax.php",
                //Data, that will be sent to "ajax.php".
                data: {
                    //Assigning value of "name" into "search" variable.
                    search: name,
                    oof: name2 
                },
                //If result found, this funtion will be called.
                success: function(html) {
                    //Assigning result to "display" div in "search.php" file.
                    $("#display").html(html).show();
                }
            });
        
    });
    $("#oof").keyup(function() {
        //Assigning search box value to javascript variable named as "name".
        var name = $('#search').val();
        var name2 = $('#oof').val();
        //Validating, if "name" is empty.
       
            //AJAX is called.
            $.ajax({
                //AJAX type is "Post".
                type: "POST",
                //Data will be sent to "ajax.php".
                url: "ajax.php",
                //Data, that will be sent to "ajax.php".
                data: {
                    //Assigning value of "name" into "search" variable.
                    search: name,
                    oof: name2 
                },
                //If result found, this funtion will be called.
                success: function(html) {
                    //Assigning result to "display" div in "search.php" file.
                    $("#display").html(html).show();
                }
            });
        
    });
 });