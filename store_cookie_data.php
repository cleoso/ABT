<?php
if(isset($_COOKIE['user_interaction'])) {
  // Retrieve the cookie value
  $user_interaction = $_COOKIE['user_interaction'];

  // Connect to your MySQL database (assuming you have set up MySQL in XAMPP)
  $servername = "localhost";
  $username = "your_username";
  $password = "your_password";
  $dbname = "your_database_name";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare the SQL statement to insert the cookie data into the database
  $sql = "INSERT INTO user_interactions (interaction_time) VALUES ('$user_interaction')";

  // Execute the SQL statement
  if ($conn->query($sql) === TRUE) {
    echo "User interaction data stored successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
