<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>
    <?php
    session_start();

    // Handle image upload
    if(isset($_POST["submit"])) {
            $target_dir = "../Assets/icons/";
            echo basename($_FILES["fileToUpload"]["name"])."<br>";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            echo $target_file."<br>";
            $_SESSION['imgPath'] = $target_file;
            echo '<script>window.location.href = "rough.php";</script>';
    }

    // Display uploaded image
    if(isset($_SESSION['imgPath'])) {
        echo '<img src="'.$_SESSION['imgPath'].'" alt="Uploaded Image">';
    } else {
        echo '<p>No image uploaded yet.</p>';
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>