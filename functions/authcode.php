<?php
session_start();
include('../config/dbcon.php');
include('myfunction.php');


if(isset($_POST['signUp']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $conpassword = mysqli_real_escape_string($con, $_POST['conpassword']);
 
    //Tester si lee mail est deja prit
    $check_email_query = "SELECT email FROM users WHERE email = '$email' ";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    
    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        $_SESSION['message'] ="Email already registered";
        header('location: ../register.php');
    }
    else
    {
        if($password == $conpassword)
        {
            //Insertion des donnees dans la base
            $insert_query = "INSERT INTO users(name,email,phone,password) VALUES('$name','$email', '$phone','$password')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run)
            {
                $_SESSION['message'] = "Registered Successfully";
                header('location: ../login.php');
            }
            else
            {
                $_SESSION['message'] = "Registered failled";
                header('location: ../register.php');   
            }
        }
        else
        {
            $_SESSION['message'] ="Password do not mutch";
            header('location: ../register.php');
        }
    }
}
else if(isset($_POST['signIn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
        $_SESSION['auth'] = true;
        $userdata = mysqli_fetch_array($login_query_run);
        
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail
        ];
        $_SESSION['role_as'] = $role_as;
        if($role_as == 1)
        {
            $_SESSION['message'] = "Welcom to the dashboard";
            header('location: ../admin/index.php');
        }
        else
        {
            $_SESSION['message'] = "Logged In Successfully";
            header('location: ../index.php');
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid Credentials";
        header('location: ../login.php');
    }
}

?>