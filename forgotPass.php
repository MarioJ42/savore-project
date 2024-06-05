<?php
session_start();
$dbh = require_once('connection.php');


if(isset($_POST['btnResetPassword'])){

    $emailnya = $_POST['emailbaru'];
    $_SESSION['emailbaru'] = $emailnya;
    
    $newPassword = $_POST['pw1'];
    $confirmPassword = $_POST['pwconfirm'];
    
    if($newPassword === $confirmPassword){
        // $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
        $query = "UPDATE pelanggan SET password = :password WHERE email = :email";
        $stmt = $dbh->prepare($query);
        $stmt->execute([
            ':password' => $newPassword,
            ':email' => $emailnya,
        ]);
        
        header('location: login.php');
        exit();
    } else {

        echo "<script>alert('Password baru dan konfirmasi password tidak sesuai.');</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome Icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />

    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <title>Forgot Password</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        color: #333;
    }

    .card {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 30px 40px;
        width: 100%;
        max-width: 400px;
        border: 1px solid #ddd;
    }

    .lock-icon {
        font-size: 3rem;
        color: #007bff;
    }

    h2 {
        font-size: 1.5rem;
        margin-top: 10px;
        text-transform: uppercase;
        color: #007bff;
    }

    p {
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
    }

    .passInput {
        margin-top: 15px;
        width: 100%;
        background: transparent;
        border: 1px solid #ccc;
        font-size: 15px;
        color: #333;
        padding: 10px;
        border-radius: 4px;
        outline: none;
    }

    .passInput::placeholder {
        color: #aaa;
    }

    button {
        margin-top: 15px;
        width: 100%;
        background-color: #007bff;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        text-transform: uppercase;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <div class="card">
        <p class="lock-icon"><i class="fas fa-lock"></i></p>
        <h2>Forgot Password</h2>
        <p>You can reset your password here</p>
        <form action="" method="post">
            <input type="text" class="passInput" name="emailbaru" placeholder="Email address" required>
            <input type="password" class="passInput" name="pw1" placeholder="New Password" required>
            <input type="password" class="passInput" name="pwconfirm" placeholder="Confirm Password" required>
            <button type="submit" name="btnResetPassword">Reset</button>
        </form>
    </div>
</body>

</html>
