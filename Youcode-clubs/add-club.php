<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/icon" href="assets/images/YC Clubs.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/responsive.css">
    <link rel="shortcut icon" type="image/icon" href="images/YC Clubs.png"/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    
    <title>YCclubs</title>
</head>
<body>
<div style="display: flex;  justify-content:center ; margin-top:0px">
    <div class="container">
        <h1>Club</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input placeholder="Logo" type="file" name="logo" required/>
            <input placeholder="Name"   name="name" required/>
            <select name="categorie" >
                <option>
                    Categorie
                </option>
                <option value="Art">
                    Art
                </option>
                <option value="Sport">
                    Sport
                </option>
                <option value="Robotic">
                    Robotic
                </option>
                <option value="Envirement">
                    Envirement
                </option>
                <option value="Social">
                    Social
                </option>
            </select>
            <input placeholder="Discription" style="height: 50px;" name="disc" required/>
            <br>
            <button type="submit" name='submit'>Done</button>
        </form>
        <a href="Admin.php">Go back</a>
    </div>
</div>
<?php 
if(isset($_POST['submit'])){
include 'connection.php';
$name = $_POST['name'];
$image_name = $_FILES['logo']['name'];
$image_tmp = $_FILES['logo']['tmp_name'];
$image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
$image_str_lower = strtolower($image_extension);
$new_image_name = uniqid("IMG-", true).'.'.$image_str_lower;
$image_upload_path = './upload/'.$new_image_name;
move_uploaded_file($image_tmp, $image_upload_path);
$disc = $_POST['disc'];
$today = date("Y/m/d");
$categorie = $_POST['categorie'];
$sql = "INSERT INTO club (nom, logo, discription,Categorie, date)
VALUES ('$name','$new_image_name', '$disc','$categorie','$today')";
if ($conn->query($sql) === TRUE) {
 header('location: admin.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
</body>
</html>