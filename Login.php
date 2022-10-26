<?php
session_start();
    include("connection.php");
    include("function.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something we post
    $stud_name=$_POST['stud_name'];
    $passwords=$_POST['password'];

    if(!empty($stud_name) && !empty($passwords) && !is_numeric($stud_name))
    {
        //read from database
        $query = "select * from login where stud_name = '$stud_name' limit 1";
        $result = mysqli_query($con,$query);
        if($result)
        {
            if($result && mysqli_num_rows($result) >0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $passwords)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }

        echo"Wrong username or password";
    }else
    {
        echo"Please enter some valid information!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
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
            <div style="font-size: 20px; margin: 10px; color: white;">Login</div>
            <input id="text" type="text" name="stud_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button"type="submit" value="Login"><br><br>

            <a href="signup.php">Click to SignUp</a><br><br>
        </form>

    </div>
</body>
</html>
