<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPEbay Post</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap">
</head>
<body>
    <div class="topnav">
        <img style = "margin-left: 0.6%;" src= "favicon.png" height = "50px", witdh = '50px'></img>
        <div style = "margin-left:-2%">
            <a style = "margin-left:40%" href="index.php">Home</a>
            <a class = "active" href = "post.html" >Post</a>
            <a href="support.html">Support</a>
            <a href="about.html">About</a>
            <a  href = "delete.html"> Delete</a>
        </div>
    </div> 
    <?php
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $equipment =$_POST['equipment'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];
        $info = $_POST['info'];
        $contact = $_POST['contact'];
        $files = $_POST['files'];
        $pw = $_POST['password'];

        $servername = "localhost";
        $username = "root";
        $password = "Iatwbofm21!";
        $dbname = "posts";

        print_r($files);
            if(isset($_FILES["files"])){ 
                //&& $_FILES["files"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["files"]["name"];
                $filetype = $_FILES["files"]["type"];
                $filesize = $_FILES["files"]["size"];
            
                #echo "  check this";
                #echo $filename;
                // Verify file extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
            
                // Verify file size - 5MB maximum
                $maxsize = 100 * 1024 * 1024;
                if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
            
                // Verify MYME type of the file
                if(in_array($filetype, $allowed)){
                    // Check whether file exists before uploading it
                    if(file_exists("upload/" . $filename)){
                        echo $filename . " is already exists.";
                    } else{
                        move_uploaded_file($_FILES["files"]["tmp_name"], "uploads/" . $filename);
                        #echo "Your file was uploaded successfully.";
                    } 
            } else{
                echo "Error: There was a problem uploading your file. Please try again."; 
            }
        } else{
           echo "check that";
           echo $_SERVER["REQUEST_METHOD"];
            echo "Error: " . $_FILES["photo"]["error"];
        }
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

         
        $sql = "INSERT INTO submissions (fname, lname, equipment, amount, price, info, contact, filename, password)
        VALUES ('$fname', '$lname', '$equipment', '$amount', '$price', '$info', '$contact', '$filename', '$pw')";

        if ($conn->query($sql) === TRUE) {
            #echo "New record created successfully";
        } else {
            #echo "Error: " . $sql . "<br>" . $conn->error;
        }

        
        $conn->close();
    ?>
    <h3 class = "results"> Your post has been submitted and you should see it on the front page! </h3>
</body>
</html>
