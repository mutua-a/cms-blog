<?php

    # database variables; DATABASE --> $host, $name, $user, $password
    $host = "localhost";
    $dbname = "cleanblog";
    $user = "root";
    $pass = "";

    #connection variable
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    #check connection
    if ($conn == true){

        echo "<h1>Connected!</h1>";
    }else{

        echo "<h1>Connection ERROR!!!</h1>";
    }

    ?>