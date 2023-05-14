<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    require_once "db.php";
    
    // Define variables and initialize with empty values
    $title = $description = $verse = $author = $cdate = $status = "";
    $title_err = $description_err = $verse_err = $author_err = $cdate_err = $status_err = "";
    
    // Validate title
    if (empty(trim($_POST["title"]))) {
        $title_err = "Please enter a title.";
    } else {
        $title = trim($_POST["title"]);
    }
    
    // Validate description
    if (empty(trim($_POST["description"]))) {
        $description_err = "Please enter a description.";
    } else {
        $description = trim($_POST["description"]);
    }
    
    // Validate verse
    if (empty(trim($_POST["verse"]))) {
        $verse_err = "Please enter a verse.";
    } else {
        $verse = trim($_POST["verse"]);
    }
    
    // Validate author
    if (empty(trim($_POST["author"]))) {
        $author_err = "Please enter an author.";
    } else {
        $author = trim($_POST["author"]);
    }
    
    // Validate cdate
    if (empty(trim($_POST["cdate"]))) {
        $cdate_err = "Please enter a date.";
    } else {
        $cdate = trim($_POST["cdate"]);
    }
    
    // Validate status
    if (empty(trim($_POST["status"]))) {
        $status_err = "Please select a status.";
    } else {
        $status = trim($_POST["status"]);
    }
    
    // Check for errors before inserting into database
    if (empty($title_err) && empty($description_err) && empty($verse_err) && empty($author_err) && empty($cdate_err) && empty($status_err)) {
        // Prepare an INSERT statement
        $sql = "INSERT INTO news (title, description, verse, author, cdate, status) VALUES (?, ?, ?, ?, ?, ?)";
        
        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssss", $param_title, $param_description, $param_verse, $param_author, $param_cdate, $param_status);
            
            // Set parameters
            $param_title = $title;
            $param_description = $description;
            $param_verse = $verse;
            $param_author = $author;
            $param_cdate = $cdate;
            $param_status = $status;
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to index page
                header("location: news.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>
