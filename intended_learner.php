<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_lms";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user_id from the session
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
} else {
    echo "Error: User not logged in";
    exit;
}

// Fetch all three questions from the database
$questionQuery = "SELECT * FROM questions WHERE status = 'active' ORDER BY id LIMIT 3 OFFSET 10";
$questionResult = $conn->query($questionQuery);

if ($questionResult->num_rows > 0) {
    // Store question data in an array
    $questions = $questionResult->fetch_all(MYSQLI_ASSOC);
} else {
    echo "No active questions found.";
    exit;
}

// Check if the form is submitted and the save button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save"])) {
    // Retrieve user input from the form
    $user_inputs = array();

    for ($i = 0; $i < 3; $i++) {
        $input_name = "user_input_" . ($i + 12);
        $user_inputs[$i] = $_POST[$input_name];
    }

    // Process each question individually
    foreach ($questions as $key => $questionData) {
        $questionId = $questionData['id'];
        $user_input = $user_inputs[$key];

        // Insert into intended_learner table
        $insertIntendedLearner = "INSERT INTO intended_learner (user_id, question_id, user_input, created_at, updated_at)
            VALUES ('$user_id', '$questionId', '$user_input', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

        if ($conn->query($insertIntendedLearner) !== TRUE) {
            echo "Error inserting intended learner data: " . $conn->error . "<br>";
        } 
    }
    header("Location: curriculum.php");
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intended Learner</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0; /* Add this line to remove default body margin */
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: left;
            justify-content: center;
           
            
        
        }

        header {
            display: flex;
            align-items: center;
            padding:1em;
            background-color: #ddd;
            text-align:center;
            
        
        }

        h1::before {
            content: '\1F393';
            margin-right: 10px;
            font-size: 1.5em;
        }

        h1 {
            display: inline-block;
            margin: 0; /* Add this line to remove margin */
        }

        h2 {
            color: #333;
            margin-left: 0;
            font-size:20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        label {
            display: block;
            margin-bottom: 10px;
            border: 1px solid #333;
            border-radius: 0;
            padding: 10px;
            width: 40%;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        button {
            background-color: grey;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 0px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        #steps {
            margin-top: 35px;
            margin-left: 30px;
        }

        footer {
            margin-top: auto;
            text-align: left;
            padding: 10px;
            background-color: #ddd;
            width: 100%;
            position:fixed;
            bottom:0;
        }
        #heading{
            font-size:35px;
            font-family:"font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif";
        }
        #description{
            margin-top:2px;
            font-size:15px;
        }
        div{
            margin-left:20px;
        }
        #exit{
            text-align:right;
            margin-left:75%;
        }
        #exit a{
            text-decoration:none;
            color:red;
            font-size:20px;
        }
    </style>
</head>
<body>
<header>
        <h1 id="udemy">Udemy</h1>
        <p id="steps"></p>
        <div id="exit">
        <a href="teach_on_udemy_dashboard.php">Exit</a></div>
    </header>
    <h2>Intended Learner</h2>

        <form action="" method="post">
            <?php foreach ($questions as $key => $questionData): ?>
                <h3><?php echo $questionData['question_title']; ?></h3>
                
                <textarea id="user_input_<?php echo ($key + 12); ?>" name="user_input_<?php echo ($key + 12); ?>" rows="4" cols="50" required></textarea><br>
            <?php endforeach; ?>
            <footer>
            <button type="submit" name="save">Save</button>
            </footer>
        </form>



</body>
</html>
