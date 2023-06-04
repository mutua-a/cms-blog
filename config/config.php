<?php

    try{

        # $pdo = new PDO('mysql:host=localhost;dbname=teste', 'root', '');
        # database variables; DATABASE --> $host, $name, $user, $password

        $host = "localhost";
        $dbname = "cleanblog";
        $user = "root";
        $pass = "";

        #connection variable
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){

        echo $e->getMessage();
    }

        #check connection
        if ($conn == true){

            # echo "<h1>Connected!</h1>";
        }else{

            echo "<h1>Connection ERROR!!!</h1>";
        }

    ?>