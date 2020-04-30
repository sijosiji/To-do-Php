<?php
  session_start(); 
  if ( !isset( $_SESSION['hobbies'] ) )
  { 
    $_SESSION['hobbies'] = array();
  }
  $_SESSION['hobbies'] = array_values( $_SESSION['hobbies'] );
  $message = 'Welcome to the Login Page, Please Sign In Now.';
  if ( isset( $_POST ) && !empty( $_POST ) ) // Making sure SOMETHING was submitted.
  {
    $submittedUsername = $_POST['username'];
    $submittedPassword = $_POST['password'];
    // Expected username and password (hardcoded.)
    $username = 'sijo';
    $password = 'jacob';
    // Successful login...
    if ( ( $username === $submittedUsername ) && ( $password === $submittedPassword ) )
    {
      $message = 'Hi, ' . $username . ', Have a good day!';
      array_push( $_SESSION['hobbies'], $_POST['hobbies'] );
    }
    // Unsuccessful login...
    else
    {
      $message = 'Please try again, your username and/or password were incorrect!';
    }
  }
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Form Handling</title>
</head>
<body>
  <h1>PHP Form Handling</h1>
  <?php include './includes/navigation.php'; ?>
  <h2>Sign In Form</h2>
  <p>
    <?php echo $message; // Output our "sign-in" related message. ?>
  </p>
  <form action="./form.php" method="POST"><?php ?>
    <label for="username">
      Username:
      <input type="text" name="username" id="username">
    </label>
    <label for="password">
      Password:
      <input type="password" name="password" id="password">
    </label>
    <label for="hobbies">
      Add an hobby:
      <input type="text" name="hobbies" id="hobbies">
    </label>
    <input type="submit" value="Sign In">
  </form>
  <?php if ( !empty( $_SESSION['hobbies'] ) ) : ?>
    <h2>My hobbies:</h2>
    <ul>
      <?php foreach ( $_SESSION['hobbies'] as $hobbies ) : ?>
        <li>
          <?php echo $hobbies; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</body>
</html>