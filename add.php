<html>
    <head>
        <title>
            Add Data
        </title>
    </head>
    <body>
        <?php
        require_once('conn.php');

        function testInput($data){
            $data = trim($data);//Strip whitespace (or other characters) from the beginning and end of a string
            $data = stripslashes($data);//Returns a string with backslashes stripped off
            #$data = ____8____($data);//Prevent XSS attacks.
            return $data;
        }

        if(isset($_POST['submit'])){//Check if form has been submitted
            $name = testInput($_POST['name']);
            $age = testInput($_POST['age']);
            $email = testInput($_POST['email']);
        }

        //Checking Empty Fields

        if(empty($name) || empty($age) || empty($email)){//Check if some fields are required
            echo "<font color='red'> No field should be left empty....</font><br>";
        }
        else{
            $sql = "INSERT INTO users (name, age, email) VALUES ('$name','$age','$email')";

            if($con->query($sql)===TRUE){
                echo 'New Record Has Been Added Successfully...';
                echo "<br><a href='view.php'>View Records</a>";
            }
            else{
                echo 'Error: '. $sql . "<br>" . $mysqli->connect_error;
            }
        }

        ?>
    </body>
</html>
