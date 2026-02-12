<?php
    $uploadDir = "uploads/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir);
    }
    if (isset($_POST['upload'])) {
        $fileName = $_FILES['file']['name'];
        $tmpName  = $_FILES['file']['tmp_name'];
        $target   = $uploadDir . $fileName;

        if (move_uploaded_file($tmpName, $target)) {
            $msg = "File uploaded successfully!";
        } else {
            $msg = "File upload failed!";
        }
    }
    if (isset($_GET['delete'])) {
        $file = $uploadDir . $_GET['delete'];
        if (file_exists($file)) {
            unlink($file);
        }
    }
    if (isset($_GET['download'])) {
        $file = $uploadDir . $_GET['download'];
        if (file_exists($file)) {
            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename=" . basename($file));
            header("Content-Length: " . filesize($file));
            readfile($file);
            exit;
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Mini File Manager</title>
    </head>
    <body>

        <h2>Mini File Manager</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file" required>
            <button type="submit" name="upload">Upload</button>
        </form>

        <?php if (isset($msg)) echo "<p>$msg</p>"; ?>

        <hr>

        <h3>Uploaded Files</h3>

        <table border="1" cellpadding="8">
        <tr>
            <th>File Name</th>
            <th>Size (KB)</th>
            <th>Last Modified</th>
            <th>Actions</th>
        </tr>

        <?php
        $files = scandir($uploadDir);

        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                $filePath = $uploadDir . $file;
                echo "<tr>";
                echo "<td>$file</td>";
                echo "<td>" . round(filesize($filePath)/1024, 2) . "</td>";
                echo "<td>" . date("d-m-Y H:i:s", filemtime($filePath)) . "</td>";
                echo "<td>
                        <a href='?download=$file'>Download</a> |
                        <a href='?delete=$file' onclick=\"return confirm('Delete this file?')\">Delete</a>
                    </td>";
                echo "</tr>";
            }
        }
        ?>

        </table>

    </body>
</html>
