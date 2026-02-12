<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h2>File Uploads and downloads</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="myfile" required><br><br>
            <button type="submit" name="upload">Upload</button>

        </form>
        <?php
        $uploadDir="uploads/";
        if(isset($_POST['upload'])){
            $fileName=$_FILES['myfile']['name'];
            $tmpName=$_FILES['myfile']['tmp_name'];
            $target=$uploadDir.$fileName;
            if(move_uploaded_file($tmpName,$target)){
                echo "<p style='color:green;'>Upload successfull!</p>";
                echo "<a href='?download=$fileName'>Download</a>";
            }
            else{
                echo "<p style='color:red;'>Upload failed!</p>";
            }
        }
        if (isset($_GET['download'])){
            $file=$uploadDir.$_GET['download'];
            if (file_exists($file)){
                header('content-type:application/octet-stream');
                header('content-disposition:attachment;filename='.basename($file));
                header('content-length:'.filesize($file));
                readfile($file);
                exit;
            }
        }
        ?>
       </body>
</html>