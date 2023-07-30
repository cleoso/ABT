<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    $conn = new mysqli('localhost', 'chester', '', 'abt_tech');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and retrieve form data
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']); // corrected field name
    $phone = mysqli_real_escape_string($conn, $_POST['phone']); // corrected field name
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $resume = mysqli_real_escape_string($conn, $_POST['resume']); // assuming you have a form field for resume
    $employer = mysqli_real_escape_string($conn, $_POST['employer']); 
    $role = mysqli_real_escape_string($conn, $_POST['role']); 


    // Insert data into the database
    $sql = "INSERT INTO abt_website_application (first_name, middle_name, last_name, email_add, phone_number, dob, resume, employer, role)
            VALUES ('$first_name', '$middle_name', '$last_name', '$email', '$phone', '$dob', '$resume', '$employer', '$role')"; // updated column names

    if ($conn->query($sql) === true) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
    // Redirect back to the form page after successful submission
header('Location: abttech_job_app.html'); // Replace with your actual form page URL
exit(); // Make sure to use exit() after the header() function to prevent further execution of the PHP script
}
?>
