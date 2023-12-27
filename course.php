<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_lms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Function to retrieve category ID by category name
function getCategoryId($conn, $categoryName) {
    $sql = "SELECT id FROM categories WHERE category_name = '$categoryName'";
    $result = $conn->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
        return $row['id'];
    }

    return null; // Return null if category not found
}
/*
// Insert Courses 1
$categoryName = 'Finance & Accounting';
$categoryID = getCategoryId($conn, $categoryName);

if ($categoryID !== null) {
    $insertCourses = "INSERT INTO course(course_title, category_id)
                      VALUES
                      ('Accounting & Bookkeeping', $categoryID),
                      ('Compliance', $categoryID),
                      ('Cryptocurrency & Blockchain', $categoryID),
                      ('Economics', $categoryID),
                      ('Finance', $categoryID),
                      ('Finance cert & Exam prep', $categoryID),
                      ('Financial modeling & Analysis', $categoryID),
                      ('Investing & Trading', $categoryID),
                      ('Money Management Tools', $categoryID),
                      ('Taxes', $categoryID)";

    if ($conn->multi_query($insertCourses) === TRUE) {
        echo "Courses inserted successfully!";
    } else {
        echo "Error inserting courses: " . $conn->error . "<br>";
    }
} else {
    echo "Category not found: $categoryName";
}



//course 2
$categoryName = 'IT & Software';
$categoryID = getCategoryId($conn, $categoryName);

if ($categoryID !== null) {
    $insertCourses = "INSERT INTO course(course_title, category_id)
                      VALUES
                      ('IT certifications', $categoryID),
                      ('Network & security', $categoryID),
                      ('Hardware', $categoryID),
                      ('Operating systems & servers', $categoryID),
                      ('Other IT & software', $categoryID)";

    if ($conn->multi_query($insertCourses) === TRUE) {
        echo "Courses 2 inserted successfully!";
    } else {
        echo "Error inserting courses: " . $conn->error . "<br>";
    }
} else {
    echo "Category not found: $categoryName";
}


$categoryName = 'Office Productivity';
$categoryID = getCategoryId($conn, $categoryName);

if ($categoryID !== null) {
    $insertCourses = "INSERT INTO course(course_title, category_id)
                      VALUES
                      ('Microsoft', $categoryID),
                      ('Apple', $categoryID),
                      ('Google', $categoryID),
                      ('Sap', $categoryID),
                      ('Oracle', $categoryID),
                      ('Other office productivity',$categoryID)";

    if ($conn->multi_query($insertCourses) === TRUE) {
        echo "Courses 3 inserted successfully!";
    } else {
        echo "Error inserting courses: " . $conn->error . "<br>";
    }
} else {
    echo "Category not found: $categoryName";
}

$categoryName = 'Personal development';
$categoryID = getCategoryId($conn, $categoryName);

if ($categoryID !== null) {
    $insertCourses = "INSERT INTO course(course_title, category_id)
                      VALUES
                      ('Personal Transformation', $categoryID),
                      ('Personal productivity', $categoryID),
                      ('Leadership', $categoryID),
                      ('Career Development', $categoryID),
                      ('Parenting & Relationships', $categoryID),
                      ('Happiness',$categoryID),
                      ('Esoteric practices',$categoryID),
                      ('Religion & Spirituality',$categoryID),
                      ('Personal Brand Building',$categoryID),
                      ('Creativity',$categoryID),
                      ('Influence',$categoryID)";
    if ($conn->multi_query($insertCourses) === TRUE) {
        echo "Courses 4 inserted successfully!";
    } else {
        echo "Error inserting courses: " . $conn->error . "<br>";
    }
} else {
    echo "Category not found: $categoryName";
}


$categoryName = 'Design';
$categoryID = getCategoryId($conn, $categoryName);

if ($categoryID !== null) {
    $insertCourses = "INSERT INTO course(course_title, category_id)
                      VALUES
                      ('Web Design', $categoryID),
                      ('Graphic Design & Illutration', $categoryID),
                      ('Design Tools', $categoryID),
                      ('User Experience Design', $categoryID),
                      ('Game Design', $categoryID),
                      ('3D & Animation',$categoryID),
                      ('Fashion Design',$categoryID),
                      ('Architectural Design',$categoryID),
                      ('Interior Design',$categoryID),
                      ('Other Design',$categoryID)";
    if ($conn->multi_query($insertCourses) === TRUE) {
        echo "Courses 5 inserted successfully!";
    } else {
        echo "Error inserting courses: " . $conn->error . "<br>";
    }
} else {
    echo "Category not found: $categoryName";
}
$categoryName = 'Marketing';
$categoryID = getCategoryId($conn, $categoryName);

if ($categoryID !== null) {
    $insertCourses = "INSERT INTO course(course_title, category_id)
                      VALUES
                      ('Digital Marketing', $categoryID),
                      ('Search Engine OPtimization', $categoryID),
                      ('Social Media Marketing', $categoryID),
                      ('Branding', $categoryID),
                      ('Marketing Fundamentals', $categoryID),
                      ('Marketing Analytices & Automation',$categoryID),
                      ('Public Relations',$categoryID),
                      ('Content Marketing',$categoryID),
                      ('Growth Hacking',$categoryID),
                      ('Product Marketing',$categoryID)";
    if ($conn->multi_query($insertCourses) === TRUE) {
        echo "Courses 6 inserted successfully!";
    } else {
        echo "Error inserting courses: " . $conn->error . "<br>";
    }
} else {
    echo "Category not found: $categoryName";
}

$categoryName = 'Life style';
$categoryID = getCategoryId($conn, $categoryName);

if ($categoryID !== null) {
    $insertCourses = "INSERT INTO course(course_title, category_id)
                      VALUES
                      ('Arts & crafts', $categoryID),
                      ('Beauty & Makeup', $categoryID),
                      ('Esoteric Practice', $categoryID),
                      ('Food & Beverage', $categoryID),
                      ('Gaming', $categoryID),
                      ('Home improvement & Gardening', $categoryID),
                      ('Pet care & Training', $categoryID),
                      ('Travel', $categoryID)";

    if ($conn->multi_query($insertCourses) === TRUE) {
        echo "Courses 7 inserted successfully!";
    } else {
        echo "Error inserting courses: " . $conn->error . "<br>";
    }
} else {
    echo "Category not found: $categoryName";
}


$categoryName = 'Photography & Video';
$categoryID = getCategoryId($conn, $categoryName);

if ($categoryID !== null) {
    $insertCourses = "INSERT INTO course(course_title, category_id)
                      VALUES
                      ('Digital Photography', $categoryID),
                      ('Photography', $categoryID),
                      ('Portrait Photography', $categoryID),
                      ('Photography Tools', $categoryID),
                      ('Commercial Photography', $categoryID),
                      ('Video Design', $categoryID)";

    if ($conn->multi_query($insertCourses) === TRUE) {
        echo "Courses 8 inserted successfully!";
    } else {
        echo "Error inserting courses: " . $conn->error . "<br>";
    }
} else {
    echo "Category not found: $categoryName";
}


$conn->autocommit(TRUE);

$categoryName = 'Health & Fitness';
$categoryID = getCategoryId($conn, $categoryName);

if ($categoryID !== null) {
    $insertCourses = "INSERT INTO course(course_title, category_id)
                      VALUES
                      ('Fitness', $categoryID),
                      ('General Health', $categoryID),
                      ('Nutrition & Diet', $categoryID),
                      ('Yoga', $categoryID),
                      ('Mental Health', $categoryID),
                      ('Dance', $categoryID),
                      ('Meditation',$categoryID)";

    if ($conn->multi_query($insertCourses) === TRUE) {
        echo "Courses 9 inserted successfully!";
    } else {
        echo "Error inserting courses: " . $conn->error . "<br>";
    }
} else {
    echo "Category not found: $categoryName";
}

$categoryName = 'Music';
$categoryID = getCategoryId($conn, $categoryName);

if ($categoryID !== null) {
    $insertCourses = "INSERT INTO course(course_title, category_id)
                      VALUES
                      ('Instruments', $categoryID),
                      ('Music Production', $categoryID),
                      ('Music Fundamentals', $categoryID),
                      ('Vocal', $categoryID),
                      ('Music Techniques', $categoryID),
                      ('Music software', $categoryID)";

    if ($conn->multi_query($insertCourses) === TRUE) {
        echo "Courses 10 inserted successfully!";
    } else {
        echo "Error inserting courses: " . $conn->error . "<br>";
    }
} else {
    echo "Category not found: $categoryName";
}
*/
$categoryName = 'Teaching and Academics';
$categoryID = getCategoryId($conn, $categoryName);

if ($categoryID !== null) {
    $insertCourses = "INSERT INTO course(course_title, category_id)
                      VALUES
                      ('Engineering', $categoryID),
                      ('Humanities', $categoryID),
                      ('Math', $categoryID),
                      ('Science', $categoryID),
                      ('Online education', $categoryID),
                      ('Social science', $categoryID),
                      ('Language Learning',$categoryID)";

    if ($conn->multi_query($insertCourses) === TRUE) {
        echo "Courses 11 inserted successfully!";
    } else {
        echo "Error inserting courses: " . $conn->error . "<br>";
    }
} else {
    echo "Category not found: $categoryName";
}

// Close connection
$conn->close();
?>
