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

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $lectureTitle = $_POST['lectureTitle'];
    $lectureDescription = $_POST['lectureDescription'];

    // Check if a file has been successfully uploaded
    if ($_FILES["video"]["error"] == UPLOAD_ERR_OK) {
        $target_dir = "/home/bsetec/Desktop/uploads/";
        $target_file = $target_dir . basename($_FILES["video"]["name"]);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
            $videoUrl = $target_file;

            $duration = $_POST['duration'];

            // Retrieve the section ID from the session variable
            $sectionId = isset($_SESSION['sectionId']) ? $_SESSION['sectionId'] : "";

            // Insert into the lectures table
            $sqlInsertLecture = "INSERT INTO lectures (section_id, lecture_title, lecture_description, video_url, duration) VALUES (?, ?, ?, ?, ?)";
            $stmtLecture = $conn->prepare($sqlInsertLecture);
            $stmtLecture->bind_param('issss', $sectionId, $lectureTitle, $lectureDescription, $videoUrl, $duration);

            if ($stmtLecture->execute()) {
                echo "Inserted successfully";
            } else {
                echo "Error creating lecture: " . $stmtLecture->error;
            }
        } else {
            // Display specific error message
            echo "Error moving file to target directory. Debug: " . error_get_last()['message'];
            exit;
        }
    } else {
        // Print the specific error message
        echo "File upload error: " . $_FILES["video"]["error"];
        exit;
    }
} else {
    echo "Invalid request method";
}

$conn->close();
?>
