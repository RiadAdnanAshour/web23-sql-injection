<?php

$errors = [];
// فحص إذا تم الضغط على زر الإرسال
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // جلب بيانات النموذج
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $remember_me = isset($_POST['remember-me']);

    if(empty($name)){
        $errors ["name"] = "enter name" ;
        echo 'Enter name. <br>';
    }
    if(empty($email)){
        $errors ["email"] = "enter email" ;
        echo 'Enter email. <br>';
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors ['email'] = "Invalid email format." ;
        echo 'Invalid email format. <br>';
    }
    if(empty($password)){
        $errors ["password"] = "enter password" ;
        echo 'enter password. <br>';
    } elseif(strlen($password) < 6) {
        $errors ['password'] = "Password should be at least 6 characters." ;
        echo 'Password should be at least 6 characters. <br>';
    }

    if (isset($_POST['gender'])) {
        if ($_POST['gender'] == 'male') {
            // echo 'MALE';
        } elseif ($_POST['gender'] == 'female') {
            // echo 'FEMALE';
        }
    }




    if (!empty($_FILES['image'])) {
        if ($_FILES['image']['size'] > 1024 * 1024) {
            $errors['image'] = 'size must be less than 1 MB.';
        }
    }



if(count($errors)==0){
    
    //DB
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbName = "web2";
    
    // $conn = new mysqli($host , $username, $password, $dbName); 

    // if($conn->connect_error){
    //     echo "Error". $conn->connect_error;
    // }else{
    //     echo "Done";
    // }   

    // Create connection
//     $conn = mysqli_connect($host, $username, $password, $dbName);
// // Check connection
// if (!$conn) {
// die("Connection failed: " . mysqli_connect_error());
// }else{
// echo "Connected successfully";

$con = new mysqli($host, $username, $password, $dbName);
if ($con->connect_error) {
    die("Connection Error" . $con->connect_error);
}
// Prepare SQL statement with placeholders
        $stmt = $con->prepare("INSERT INTO users
         (Name, Email, Password, Gender, Img) VALUES (?, ?, ?, ?, ?)");

       //ربط البيانات 
    $stmt->bind_param("sssss", $name, $email, $hashed_password,
     $gender, $_FILES['image']['name']);

     



  // hash the password
$hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = 'INSERT INTO users (Name, Email, Password, Gender, Img) values ("' . $_POST["name"] .
 '","' . $_POST["email"] . '","' . $hashed_password . 
 '","' . $_POST["gender"] . '","' . $_FILES['image']['name'] . '")';
    if ($con->query($sql) === TRUE) {
        echo "New Recored was inserted";
    } else {
        echo "Error" . $con->error;
    }

    if ($stmt->execute()) {
        echo "New Record was inserted";
    } else {
        echo "Error" . $stmt->error;
    }
    
    $stmt->close();
    $con->close();
    

// $con->close();

}

// print_r ($_FILES);

}









?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Sign Up</title>
</head>

<body>
    <h3>Form Sign Up</h3>
    <form action="" method="POST" enctype="multipart/form-data">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>

        <label name="gender" for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male" checkdate>Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br><br>

        <label for="remember-me">Remember Me:</label>
        <input type="checkbox" id="remember-me" name="remember-me"><br><br>

        <label for="image">Image Upload:</label>
        <input type="file" id="image" name="image" accept="image/*"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>