<?php

    if (!empty($_FILES["SoundFile"])) {
        $myFile = $_FILES["SoundFile"];
    
        if ($myFile["error"] !== UPLOAD_ERR_OK) {
            echo "<p>An error occurred.</p>";
            exit;
        }
    
        // ensure a safe filename
        $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
    
        // don't overwrite an existing file
        $i = 0;
        $parts = pathinfo($name);
        while (file_exists("uploads/son/" . $name)) {
            $i++;
            $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
        }
    
        // preserve file from temporary directory
        $success = move_uploaded_file($myFile["tmp_name"],"uploads/son/" . $name);
        if (!$success) { 
            echo "<p>Unable to save file.</p>";
            exit;
        }
    
        // set proper permissions on the new file
        // chmod("uploads/son/" . $name, 0644);
    }
    if (!empty($_FILES["PictureFile"])) {
        $myFile = $_FILES["PictureFile"];
    
        if ($myFile["error"] !== UPLOAD_ERR_OK) {
            echo "<p>An error occurred.</p>";
            exit;
        }
    
        // ensure a safe filename
        $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
    
        // don't overwrite an existing file
        $i = 0;
        $parts = pathinfo($name);
        while (file_exists("uploads/images/" . $name)) {
            $i++;
            $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
        }
    
        // preserve file from temporary directory
        $success = move_uploaded_file($myFile["tmp_name"],"uploads/images/" . $name);
        if (!$success) { 
            echo "<p>Unable to save file.</p>";
            exit;
        }
    
        // set proper permissions on the new file
        // chmod("uploads/image/" . $name, 0644);
    }

?>