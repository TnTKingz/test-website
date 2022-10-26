<?php
session_start();
    include("connection.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something we post
        $stud_name=$_POST['stud_name'];
        $matrix_num = $_POST['matrix_num'];
        $passwords=$_POST['password'];

        if ( !empty($stud_name) &&!empty($matrix_num)&& !empty($password) && !is_numeric($stud_name))
        {
            //save to database
            $user_id = random_num(20);
            $query = "Insert into student (user_id,stud_name,matrix_num,password) values ('$user_id','$stud_name','$matrix_num','$passwords')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }else
        {
            echo"Please enter some valid information!";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>SignUp Page</title>
</head>
<body>

    <style type="text/css">
        #text{
            height: 25px;
            border-radius:5px;
            padding:4px;
            border: solid thhin #aaa;
            width: 100%;
        }

    #button{
        padding:10px;
        width: 100px;
        color: white;
        background-color: Lightblue;
        border: none;
    }

        #box{
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
    </style>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color: white;">SignUp</div>
            <label for="stud_name" style="font-size: 15px; margin: 10px; color: white;">FULL NAME:</label><br>
            <input id="text" type="text" name="stud_name"><br><br>
            <label for="matrix_num" style="font-size: 15px; margin: 10px; color: white;">MATRIX NUMBER:</label><br>
            <input id="text" type="text" name="matrix_num"><br><br>
            <label for="password" style="font-size: 15px; margin: 10px; color: white;">PASSWORD:</label><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button"type="submit" value="SignUp"><br><br>

            <a href="Login.php">Click to Login</a><br><br>
        </form>

    </div>
</body>
</html>