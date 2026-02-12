<?php 
   

    function fileReadWriteDemo() {
        $file = "demo.txt";

        file_put_contents($file, "Hello PHP File Handling\n");

        $content = file_get_contents($file);
        echo "<h3>File Content:</h3>";
        echo nl2br($content);

        $fp = fopen($file, "a");
        fwrite($fp, "Appended Line\n");
        fclose($fp);
    }

    function fileInfoDemo() {
        $file = "demo.txt";

        echo "<h3>File Information</h3>";
        echo "Exists: " . (file_exists($file) ? "Yes" : "No") . "<br>";
        echo "Size: " . filesize($file) . " bytes<br>";
        echo "Type: " . filetype($file) . "<br>";
        echo "Last Access: " . date("d-m-Y H:i:s", fileatime($file)) . "<br>";
        echo "Last Modified: " . date("d-m-Y H:i:s", filemtime($file)) . "<br>";
        echo "Permissions: " . substr(sprintf('%o', fileperms($file)), -4) . "<br>";
    }


    function fileFolderManagementDemo() {
        copy("demo.txt", "copy.txt");
        rename("copy.txt", "renamed.txt");
        unlink("renamed.txt");

        if (!is_dir("testFolder")) {
            mkdir("testFolder");
        }

        if (is_dir("testFolder")) {
            rmdir("testFolder");
        }

        echo "<h3>File & Folder Management Done</h3>";
    }


    function directoryHandlingDemo() {
        echo "<h3>Directory Listing (uploads)</h3>";

        if (!is_dir("uploads")) {
            mkdir("uploads");
        }

        $files = scandir("uploads");
        foreach ($files as $f) {
            echo $f . "<br>";
        }

        echo "<br>Current Directory: " . getcwd() . "<br>";
    }

    function fileLockingDemo() {
        $fp = fopen("lock.txt", "w");

        if (flock($fp, LOCK_EX)) {
            fwrite($fp, "File locked and written safely");
            flock($fp, LOCK_UN);
            echo "<h3>File Locking Successful</h3>";
        }

        fclose($fp);
    }


    fileReadWriteDemo();
    fileInfoDemo();
    fileFolderManagementDemo();
    directoryHandlingDemo();
    fileLockingDemo();

        
?>