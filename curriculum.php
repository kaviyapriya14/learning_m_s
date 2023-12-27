<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
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
            padding: 1em;
            background-color: #ddd;
            text-align: center;
        }

        h1::before {
            content: '\1F393';
            margin-right: 10px;
            font-size: 1.5em;
        }

        h1 {
            display: inline-block;
            margin: 0;
        }

        h2 {
            color: #333;
            margin-left: 0;
            font-size: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
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

        input[type="text"],
        select {
            width: 40%;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 10px;
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

        footer {
            margin-top: auto;
            text-align: left;
            padding: 10px;
            background-color: #ddd;
            width: 100%;
            position: fixed;
            bottom: 0;
        }

        #heading {
            font-size: 35px;
            font-family: "font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif";
        }

        #description {
            margin-top: 2px;
            font-size: 15px;
        }

        div {
            margin-left: 20px;
        }

        #exit {
            text-align: right;
            margin-left: 75%;
        }

        #exit a {
            text-decoration: none;
            color: red;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1 id="udemy">Udemy</h1>
    
        <div id="exit">
            <a href="teach_on_udemy_dashboard.php">Exit</a>
        </div>
    </header>
    <form action="section.php" method="post">
        <div>
            <h2>Section Details</h2>

            <label for="sectionTitle">Section Title:</label>
            <input type="text" id="sectionTitle" name="sectionTitle" required>


            <button type="submit">Continue</button>
        </div>
    </form>

    
</body>
</html>
