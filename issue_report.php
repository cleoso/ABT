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
    $issue_report = mysqli_real_escape_string($conn, $_POST['issue_report']);


    // Insert data into the database
    $sql = "INSERT INTO issue_report (issue_report)
            VALUES ('$issue_report')";

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
