<?php
session_start();
include('includes/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the number of persons
    $no_of_persons = intval($_POST['No_of_person']);

    // Prepare the SQL statement for inserting visitor data
    $stmt = $conn->prepare("INSERT INTO visitors (name, mobile, email) VALUES (?, ?, ?)");

    // Loop through the submitted person data and insert each one into the database
    for ($i = 0; $i < $no_of_persons; $i++) {
        // Retrieve data from the form
        $name = $_POST['name'][$i];
        $cno = $_POST['cno'][$i];
        $email = $_POST['email'][$i];

        // Bind the parameters and execute the statement
        $stmt->bind_param('sss', $name, $cno, $email);
        $stmt->execute();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    echo "Data saved successfully!";
    // Optionally, redirect to another page or show a confirmation message
    // header('Location: some_page.php');
    // exit();
} else {
    echo "Invalid request method";
}
?>
