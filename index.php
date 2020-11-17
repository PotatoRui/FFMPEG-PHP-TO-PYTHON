<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form enctype="multipart/form-data" action="#" method="post">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" name="submit" value="Upload Image">
    </form>
</body>

</html>
<?php
if (isset($_POST["submit"])) {
    $tempFile = $_FILES["fileToUpload"]["tmp_name"];
    $extension = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
    $newDirectory = "uploads/potato/" . time() . "." . $extension;
    $newDirectorywithoutext = "uploads/potato/" . time();

    move_uploaded_file($tempFile, $newDirectory);

    echo 'please wait';

    echo shell_exec("python potato.py $newDirectory $newDirectorywithoutext");

    echo 'done';
}
