<?php 

    require "../includes/header.php";
    require ("../config/config.php");

    # check submit (Login) button
    if(isset($_POST['submit'])){

        if($_POST['email'] == '' OR $_POST['password'] == '')
        {
            # error msg
            echo "<script>alert('ERROR: Invalid User Logs!')</script>";

        }else{
            # take the data
            $email = $_POST['email'];
            $password = $_POST['password'];

            # execute query / and,then Fetch
            $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
            $login->execute();
            $row = $login->FETCH(PDO::FETCH_ASSOC);

            # do rowCount
            if($login->rowCount() > 0){

                # password verify function
                if(password_verify($password, $row['password'])){
                    # success
                    echo "Logged In!";

                    #header('location: ../index.php');
                }
            }

        }
    }
    
    # function and, redirect to index page
    



?>

               <form method="POST" action="login.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>New member? Create an Account<a href="register.php"> Register</a></p>
                    

                   
                  </div>
                </form>

<?php require "../includes/footer.php"; ?>