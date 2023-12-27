<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teaching Experience</title>
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
        <p id="steps">Step 1 of 3</p>
        <div id="exit">
        <a href="teach_on_udemy_dashboard.php">Exit</a></div>
    </header>
<div>
    <h2 id="heading">Share your knowledge</h1>
    <p id="description">Udemy courses are video-based experiences that give students the chance to learn actionable skills.Whether<br>you have experience teaching,or it's your first time,we'll help you package your knowledge into an online course<br>that Improves student lives.</p>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "db_lms";
        
        $conn = new mysqli($servername, $username, $password, $database);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to retrieve the first question and its options
        $questionQuery = "SELECT * FROM questions WHERE status = 'active' LIMIT 1";
        $questionResult = $conn->query($questionQuery);

        if ($questionResult->num_rows > 0) {
            $questionData = $questionResult->fetch_assoc();
            $questionId = $questionData['id'];
            $questionTitle = $questionData['question_title'];

            // Query to retrieve options for the first question
            $optionsQuery = "SELECT * FROM answers WHERE question_id = $questionId AND status = 'active'";
            $optionsResult = $conn->query($optionsQuery);
        }
    ?>
   
    <h2><?php echo $questionTitle; ?></h2>

    <form action="save-result.php" method="post" onsubmit="return validateForm()">
        <?php
            if ($optionsResult->num_rows > 0) {
                while ($option = $optionsResult->fetch_assoc()) {
                    $optionId = $option['id'];
                    $optionTitle = $option['answer_title'];
        ?>
        
                    <label>
                        <input type="radio" name="selected_option" value="<?php echo $optionId; ?>">
                        <?php echo $optionTitle; ?>
                    </label>
        <?php
                }
            }
        ?>
        
        
        </div>
        <!-- Move the submit button to the footer -->
        <footer>
        <input type="hidden" name="prev_step" value="teaching_experience">

        <button type="submit">Continue</button>
        </footer>
    </form>
    <script src="teach_exp.js"></script>
</body>
</html>