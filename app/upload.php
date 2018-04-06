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

    //methode permetant l'execution d'un script python avec des arguments/parametres
    $myfile = fopen("uploads/messages/newfile.txt", "w") or die("Unable to open file!");
    $txt = "John Doe\n";
    fwrite($myfile, $txt);
    $txt = "Jane Doe\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    $soundfile = "uploads/son/bird.wav";
    $soundfileover40k = "uploads/son/bubbling1.wav";
    $osoundfile = "uploads/son/newfile2.wav";

    $message = "uploads/messages/newfile.txt";
    $omessage = "uploads/messages/newfile2.txt";

    $picture = "uploads/images/pew.jpg";
    
    // $commandHide = "py.exe .\WavSteg.py -h -s ". $soundfile ." -f ". $message." -o ". $osoundfile ." -n 1";
    // $output = passthru($commandHide);

    $commandHide = "py.exe .\WavSteg.py -h -s ". $soundfileover40k ." -f ". $picture." -o ". $osoundfile ." -n 10";
    $output = passthru($commandHide);

    $filesize = filesize($message);
    $commandRecover ="py.exe .\WavSteg.py -r -s ". $osoundfile ." -o ". $omessage." -n 1 -b ". $filesize;
    $output = passthru($commandRecover);

    $file = $osoundfile;
    header("Connection: Keep-Alive");
    header("Content-Description: File Transfert");
    header("Content-type: audio/wav");
    header("Content-disposition: attachment; filename=".basename($file).";");
    header("Content-Transfer-Encoding: binary");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check = 0, pre-check = 0");
    header("Pragma: public");
    header("Content-Length: ".filesize($file));
    flush();
    readfile($file);
    exit;
?>