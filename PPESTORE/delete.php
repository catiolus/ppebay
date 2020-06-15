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
            <a href = "post.html" >Post</a>
            <a href="support.html">Support</a>
            <a href="about.html">About</a>
            <a class = "active" href = "delete.html"> Delete</a>
        </div>
    </div>

    <?php
        echo "hello there";
        $pw = $_POST['password'];
        deletepost($pw);
        echo $pw;

        function deletepost($pw){
            $host    = "localhost";
            $user    = "root";
            $pass    = "Iatwbofm21!";
            $db_name = "posts";

            // Create connection
            $conn = new mysqli($host, $user, $pass, $db_name);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            // sql to delete a record
            $sql = "DELETE FROM submissions WHERE password='$pw'";

            if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            } else {
            echo "Error deleting record: " . $conn->error;
            }

            $conn->close();
        }
    ?>
    <h3 class = "results"> Your post has been removed and you should not see it on the front page! </h3>
</body>
</html>