<?php 


# echo "<script>alert('Incorrect credentials!')</script>";
# echo "<script>location.href='./index.php'</script>";
  
  require "../includes/header.php"; 
  require "../config/config.php";

  # Register button clicked
  if (isset($_POST['submit'])) {

    #take user input, validate, filter and store to db
    if($_POST['email'] == '' OR $_POST['username'] == '' OR $_POST['password'] == ''){
      echo "<script>alert('ERROR: Please fill in all Fields!')</script>";

    }else{

      # Query to take input and store
      $email = $_POST['email'];
      $username = $_POST['username'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      $insert = $conn->prepare("INSERT INTO users(email, username, password) 
      VALUES(:email, :username, :password)");

      # Fetch -> Handlers (email, uname, pass) -> Assign them to their Variables
      $insert->execute([
        ':email' => $email,
        ':username' => $username,
        ':password' => $password
      ]);

      # Redirect ->  user to Login after registration == Success
      header('location: ./login.php');
      
    }


    #echo "<script>alert('Submit Btn Clicked!')</script>";
  }



?>

            <form method="POST" action="register.php">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="" name="username" id="form2Example1" class="form-control" placeholder="Username" />
               
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                
              </div>



              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Register</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Already a member? <a href="login.php">Login</a></p>
                

               
              </div>
            </form>

<?php require "../includes/footer.php"; ?>