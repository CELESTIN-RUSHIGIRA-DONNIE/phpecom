<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "phpecom";

    //creation de connexion a la base de donnees
    $con = mysqli_connect($host, $username, $password, $database);

    //tester la connexion
    if(!$con)
    {
        die("Connection Failed: ". mysqli_connect_error());
    }
    else{
        //echo "Connect successfully";
    }

?>