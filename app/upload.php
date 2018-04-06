<?php
    // $MessageFile="uploads/messages/newfile.txt";
    $lastSoundUpload="";
    $lastPictureUpload="";
    $soundType="";
    $pictureType="";
    if (!empty($_FILES["SoundFile"])) {
        $myFile = $_FILES["SoundFile"];
    
        if ($myFile["error"] !== UPLOAD_ERR_OK) {
            echo "<p>An error occurred.</p>";
            exit;
        }
    
        // ensure a safe filename
        $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
        $lastSoundUpload="uploads/son/".$name;
        $oSoundFile = "uploads/outputs/SMin".$name;
        $soundType = $myFile["type"];

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
        $lastPictureUpload="uploads/images/".$name;
        $oPicture = "uploads/outputs/IMGout".$name;
        $pictureType = $myFile["type"];

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
    // if (isset($_POST["SecretMessage"])){
    //     $myfile = fopen($MessageFile, "w") or die("Unable to open file!");
    //     $txt = $_POST["SecretMessage"];
    //     fwrite($myfile, $txt);
    //     fclose($myfile);
    // }

    if($_POST["Hide"]=="1"){
        $commandHide = "py.exe .\WavSteg.py -h -s ". $lastSoundUpload ." -f ". $lastPictureUpload." -o ". $oSoundFile ." -n 10";
        $output = passthru($commandHide);
        // $file = $oSoundFile;
        // header("Connection: Keep-Alive");
        // header("Content-Description: File Transfert");
        // header("Content-type: audio/wav");
        // header("Content-disposition: attachment; filename=".basename($file).";");
        // header("Content-Transfer-Encoding: binary");
        // header("Expires: 0");
        // header("Cache-Control: must-revalidate, post-check = 0, pre-check = 0");
        // header("Pragma: public");
        // header("Content-Length: ".filesize($file));
        // flush();
        // readfile($file);
        // flush();
        // exit;
    }else if($_POST["Hide"]=="0"){
        // $filesize = filesize($oPicture);
        $oPicture ="uploads/images/output.jpg";
        $commandRecover ="py.exe .\WavSteg.py -r -s ". $lastSoundUpload ." -o ". $oPicture." -n 10 -b ".$_POST["fileSize"] ;
        $output = passthru($commandRecover);
        // $file = $oPicture;
        // header("Connection: Keep-Alive");
        // header("Content-Description: File Transfert");
        // header("Content-type: image/jpg");
        // header("Content-disposition: attachment; filename=".basename($file).";");
        // header("Content-Transfer-Encoding: binary");
        // header("Expires: 0");
        // header("Cache-Control: must-revalidate, post-check = 0, pre-check = 0");
        // header("Pragma: public");
        // header("Content-Length: ".filesize($file));
        // flush();
        // readfile($file);
        // flush();
        // exit;
    }
?>