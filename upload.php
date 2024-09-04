<?php
if (isset($_POST['upload'])) {
    $club= $_POST['clubname'];
    $venue= $_POST['venue'];
    $price= $_POST['price'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded."."<br>";

            // Save the file path in the database
            $conn = new mysqli("localhost", "root", "", "vicsports");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO availablejerseys(clubname,venue,price,image_path) VALUES ('$club','$venue',$price,'$target_file')";
            if ($conn->query($sql) === TRUE) {
                echo "<script> alert('Information saved!'); window.location.href='upload.html'; </script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your record.";
        }
    }
}
?>
