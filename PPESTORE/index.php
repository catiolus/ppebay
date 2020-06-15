<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPEbay</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap">
</head>
<body>
    <?php
        function selectindex($id, $col){
            $host    = "localhost";
            $user    = "root";
            $pass    = "Iatwbofm21!";
            $db_name = "posts";

            //create connection
            $connection = mysqli_connect($host, $user, $pass, $db_name);

            //test if connection failed
            if(mysqli_connect_errno()){
                die("connection failed: "
                    . mysqli_connect_error()
                    . " (" . mysqli_connect_errno()
                    . ")");
            }
            //et results from database
            $result = mysqli_query($connection,"SELECT * FROM submissions WHERE id = '$id'");
            $all_property = array();  //declare an array for saving property

            //showing property
            echo '<table class="data-table">
                    <tr class="data-heading">';  //initialize table tag
            while ($property = mysqli_fetch_field($result)) {
                //echo '<td>' . $property->name . '</td>';  //get field name for header
                array_push($all_property, $property->name);  //save those to array
            }
            echo '</tr>'; //end tr tag

            //showing all data
            while ($row = mysqli_fetch_array($result)) {
                //echo "<tr>";
                $item = $all_property[$col];
                //echo '<td>' . $row[$item] . '</td>'; //get items using property value
                return  $row[$item] ;
            }
        }
        function maxid(){
            $host    = "localhost";
            $user    = "root";
            $pass    = "Iatwbofm21!";
            $db_name = "posts";

            //create connection
            $connection = mysqli_connect($host, $user, $pass, $db_name);

            //test if connection failed
            if(mysqli_connect_errno()){
                die("connection failed: "
                    . mysqli_connect_error()
                    . " (" . mysqli_connect_errno()
                    . ")");
            }
            //et results from database
            $indexes = mysqli_query($connection,"SELECT MAX(id) AS MAXID FROM submissions");
            $row = mysqli_fetch_array($indexes);
            return $row['MAXID'];

        }
        function recPrice($id){
            $host    = "localhost";
            $user    = "root";
            $pass    = "Iatwbofm21!";
            $db_name = "posts";

            //create connection
            $connection = mysqli_connect($host, $user, $pass, $db_name);

            //test if connection failed
            if(mysqli_connect_errno()){
                die("connection failed: "
                    . mysqli_connect_error()
                    . " (" . mysqli_connect_errno()
                    . ")");
            }
            $equipment = selectIndex($id,3);//Rishi put this in
            $quantity = selectIndex($id,4);//Rishi put this in
            $recommendedPrice = 0;

            if($equipment == "masks"){ //put the id for masks 
                $recommendedPrice = 0.40 * $quantity;

            } 
            
            else if($equipment == "gloves"){ //put the id for gloves 
                $recommendedPrice = 0.20 * $quantity;

            }

            else if($equipment == "hand sanitizer"){ //put the id for Hand Sanitizer 
                $recommendedPrice = 2.5* $quantity;

            }

            else if($equipment == "gowns"){ //put the id for gowns 
                $recommendedPrice = 4.0 * $quantity;

            } 
            return $recommendedPrice; 
        }
  
    ?>

    
    <div class="topnav">
        <img style = "margin-left: 0.6%;" src= "favicon.png" height = "50px", witdh = '50px'></img>
        <div style = "margin-left:-2%">
            <a style = "margin-left:37%" class ="active" href="index.php">Home</a>
            <a href="post.html">Post</a>
            <a href="support.html">Support</a>
            <a href="about.html">About</a>
            <a href = "delete.html"> Delete</a>
        </div>
    </div>

    <img src = "ppd.jpg" class = "banner">
    <div class="above_panel_text">       
        <h2>Welcome to PPEbay!</h2><br>
            Your one-stop-shop for all things<br>
            personal safety related<br>
            provided by others - used by you      
    </div>  
    
    <div>
        <?php
            $n = 1;
            $maxId = maxid();
            while (selectIndex($n,1) == '' and $n < $maxId){
                $n = $n + 1;
            }
            $name = selectIndex($n,1);
            $lname = selectIndex($n,2);
            $equip = selectIndex($n,3);
            $amount = selectIndex($n,4);
            $price = selectIndex($n,5);
            $info = selectIndex($n,6);
            $contact = selectIndex($n,7);
            $file = selectIndex($n,8);
            $recprice = recPrice($n);
            $n = $n+1
        ?>
        <div class = "posting">
            <img src="uploads/<?php echo $file;?>" alt="Avatar" style=" margin-left: 2.5%; margin-top: 5%;width:85%; height:40%;">
            <div class = "name" ><h1><?php echo $name;?> <?php echo $lname;?></h1></div>
            <div class = "name"> <?php echo $equip;?></div>
            <div class = "name"><?php echo $amount;?> units</div>
            <div class = "name">For <?php echo $price;?> dollars</div>
            <div class = "name"><h4>Some information</h4><?php echo $info;?></div>
            <div class = "name"><h4>You can contact them at :</h4><?php echo $contact;?></div>
            <div class = "name"><h4>A reccomended price : </h4><?php echo $recprice;?> dollars</div>
            <div class = "name">^ is a general price ^</div>
        </div>      
    </div>
    <div class = "p2">
        <?php
            $maxId = maxid();
             
            while (selectIndex($n,1) == '' and $n < $maxId){
                $n = $n + 1;
            }
             
            $name = selectIndex($n,1);
            $lname = selectIndex($n,2);
            $equip = selectIndex($n,3);
            $amount = selectIndex($n,4);
            $price = selectIndex($n,5);
            $info = selectIndex($n,6);
            $contact = selectIndex($n,7);
            $file = selectIndex($n,8);
            $recprice = recPrice($n);
            $n = $n+1
        ?>
        <div class = "posting2">
        <img src="uploads/<?php echo $file;?>" alt="Avatar" style=" margin-left: 2.5%; margin-top: 5%;width:85%; height:40%;">
            <div class = "name" ><h1><?php echo $name;?> <?php echo $lname;?></h1></div>
            <div class = "name"> <?php echo $equip;?></div>
            <div class = "name"><?php echo $amount;?> units</div>
            <div class = "name">For <?php echo $price;?> dollars</div>
            <div class = "name"><h4>Some information</h4><?php echo $info;?></div>
            <div class = "name"><h4>You can contact them at :</h4><?php echo $contact;?></div>
            <div class = "name"><h4>A reccomended price : </h4><?php echo $recprice;?> dollars</div>
            <div class = "name">^ is a general price ^</div>
        </div>      
    </div>
    <div class = "p2">
        <?php
             
            while (selectIndex($n,1) == '' and $n < $maxId){
                $n = $n + 1;
            }
             
 
            $name = selectIndex($n,1);
            $lname = selectIndex($n,2);
            $equip = selectIndex($n,3);
            $amount = selectIndex($n,4);
            $price = selectIndex($n,5);
            $info = selectIndex($n,6);
            $contact = selectIndex($n,7);
            $file = selectIndex($n,8);
            $recprice = recPrice($n);
            $n = $n+1
        ?>
        <div class = "posting3">
        <img src="uploads/<?php echo $file;?>" alt="Avatar" style=" margin-left: 2.5%; margin-top: 5%;width:85%; height:40%;">
            <div class = "name" ><h1><?php echo $name;?> <?php echo $lname;?></h1></div>
            <div class = "name"> <?php echo $equip;?></div>
            <div class = "name"><?php echo $amount;?> units</div>
            <div class = "name">For <?php echo $price;?> dollars</div>
            <div class = "name"><h4>Some information</h4><?php echo $info;?></div>
            <div class = "name"><h4>You can contact them at :</h4><?php echo $contact;?></div>
            <div class = "name"><h4>A reccomended price : </h4><?php echo $recprice;?> dollars</div>
            <div class = "name">^ is a general price ^</div>
        </div>      
    </div>

    <!--- row2 --->

    <div>
        <?php
            $maxId = maxid();
            while (selectIndex($n,1) == '' and $n < $maxId){
                $n = $n + 1;
            }
             
 
            $name = selectIndex($n,1);
            $lname = selectIndex($n,2);
            $equip = selectIndex($n,3);
            $amount = selectIndex($n,4);
            $price = selectIndex($n,5);
            $info = selectIndex($n,6);
            $contact = selectIndex($n,7);
            $file = selectIndex($n,8);
            $recprice = recPrice($n);
            $n = $n+1
        ?>
        <div class = "posting">
            <img src="uploads/<?php echo $file;?>" alt="Avatar" style=" margin-left: 2.5%; margin-top: 5%;width:85%; height:40%;">
            <div class = "name" ><h1><?php echo $name;?> <?php echo $lname;?></h1></div>
            <div class = "name"> <?php echo $equip;?></div>
            <div class = "name"><?php echo $amount;?> units</div>
            <div class = "name">For <?php echo $price;?> dollars</div>
            <div class = "name"><h4>Some information</h4><?php echo $info;?></div>
            <div class = "name"><h4>You can contact them at :</h4><?php echo $contact;?></div>
            <div class = "name"><h4>A reccomended price : </h4><?php echo $recprice;?> dollars</div>
            <div class = "name">^ is a general price ^</div>
        </div>      
    </div>
    <div class = "p2">
        <?php
            $maxId = maxid();
            while (selectIndex($n,1) == '' and $n < $maxId){
                $n = $n + 1;
            }
             
 
            $name = selectIndex($n,1);
            $lname = selectIndex($n,2);
            $equip = selectIndex($n,3);
            $amount = selectIndex($n,4);
            $price = selectIndex($n,5);
            $info = selectIndex($n,6);
            $contact = selectIndex($n,7);
            $file = selectIndex($n,8);
            $recprice = recPrice($n);
            $n = $n+1
        ?>
        <div class = "posting2">
            <img src="uploads/<?php echo $file;?>" alt="Avatar" style=" margin-left: 2.5%; margin-top: 5%;width:85%; height:40%;">
            <div class = "name" ><h1><?php echo $name;?> <?php echo $lname;?></h1></div>
            <div class = "name"> <?php echo $equip;?></div>
            <div class = "name"><?php echo $amount;?> units</div>
            <div class = "name">For <?php echo $price;?> dollars</div>
            <div class = "name"><h4>Some information</h4><?php echo $info;?></div>
            <div class = "name"><h4>You can contact them at :</h4><?php echo $contact;?></div>
            <div class = "name"><h4>A reccomended price : </h4><?php echo $recprice;?> dollars</div>
            <div class = "name">^ is a general price ^</div>
        </div>      
    </div>
    <div class = "p2">
        <?php
            $maxId = maxid();
            while (selectIndex($n,1) == '' and $n < $maxId){
                $n = $n + 1;
            }
             
            $name = selectIndex($n,1);
            $lname = selectIndex($n,2);
            $equip = selectIndex($n,3);
            $amount = selectIndex($n,4);
            $price = selectIndex($n,5);
            $info = selectIndex($n,6);
            $contact = selectIndex($n,7);
            $file = selectIndex($n,8);
            $recprice = recPrice($n);
            $n = $n+1
        ?>
        <div class = "posting3">
            <img src="uploads/<?php echo $file;?>" alt="Avatar" style=" margin-left: 2.5%; margin-top: 5%;width:85%; height:40%;">
            <div class = "name" ><h1><?php echo $name;?> <?php echo $lname;?></h1></div>
            <div class = "name"> <?php echo $equip;?></div>
            <div class = "name"><?php echo $amount;?> units</div>
            <div class = "name">For <?php echo $price;?> dollars</div>
            <div class = "name"><h4>Some information</h4><?php echo $info;?></div>
            <div class = "name"><h4>You can contact them at :</h4><?php echo $contact;?></div>
            <div class = "name"><h4>A reccomended price : </h4><?php echo $recprice;?> dollars</div>
            <div class = "name">^ is a general price ^</div>
        </div>      
    </div>
    
</body>
</html>