<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db = "db_lms";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $categoryId = $_POST['categoryId'];
    $sectionTitle = $_POST['sectionTitle'];

    // Retrieve the course title from the session variable
    $courseTitle = isset($_SESSION['courseTitle']) ? $_SESSION['courseTitle'] : "";

    // Assuming you have a valid course ID in the session
    $courseId = isset($_SESSION['courseId']) ? $_SESSION['courseId'] : null;

    // Insert into the section table
    $sectionDescription = '';  // You can modify this if you want to capture section description as well
    $orderNumber = 1;  // You can modify this based on your logic for order number

    $sqlInsertSection = "INSERT INTO section (course_id, section_title, section_description, order_number) VALUES (?, ?, ?, ?)";
    $stmtSection = $conn->prepare($sqlInsertSection);
    $stmtSection->bind_param('issi', $courseId, $sectionTitle, $sectionDescription, $orderNumber);

    if ($stmtSection->execute()) {
        // Store the section ID in the session
        $_SESSION['sectionId'] = $conn->insert_id;

        header("Location: lectures.php");
        exit;
    } else {
        echo "Error creating section: " . $stmtSection->error;
    }
} else {
    echo "Invalid request method";
}

$conn->close();
?>
