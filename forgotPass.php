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

    <title>Forgot Password </title>
</head>

<style>
    
    * {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    }

body {
    background-color: #ffaa33; 
    background-image:
    radial-gradient(at 61% 4%, hsla(25, 91%, 61%, 1) 0px, transparent 50%),
    radial-gradient(at 75% 66%, hsla(15, 91%, 79%, 1) 0px, transparent 50%), 
    radial-gradient(at 98% 88%, hsla(50, 87%, 78%, 1) 0px, transparent 50%),
    radial-gradient(at 23% 16%, hsla(40, 96%, 77%, 1) 0px, transparent 50%), 
    radial-gradient(at 95% 65%, hsla(30, 91%, 75%, 1) 0px, transparent 50%), 
    radial-gradient(at 10% 79%, hsla(45, 96%, 69%, 1) 0px, transparent 50%), 
    radial-gradient(at 85% 58%, hsla(60, 81%, 68%, 1) 0px, transparent 50%);
    background-repeat: no-repeat;
    color: white;

    display: flex;
    align-items: center;
    justify-content: center;
    padding: 15rem 0;
}

.card {
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgba(0, 0, 0, 0.75);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.125);
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 30px 40px;
}

.lock-icon {
    font-size: 3rem;
}

h2 {
    font-size: 1.5rem;
    margin-top: 10px;
    text-transform: uppercase;
}

p {
    font-size: 12px;
}

.passInput {
    margin-top: 15px;
    width: 80%;
    background: transparent;
    border: none;
    border-bottom: 2px solid deepskyblue;
    font-size: 15px;
    color: white;
    outline: none;
}

button {
    margin-top: 15px;
    width: 80%;
    background-color: deepskyblue;
    color: white;
    padding: 10px;
    text-transform: uppercase;
}
</style>

<body>
    <div class="card">
        <p class="lock-icon"><i> Forgot Password</i></p>
        <h2>You can reset your Password here</h2>
        <form action="" method="post">
            <input type="text" class="passInput"  name="emailbaru" placeholder="Email address" >
            <input type="text" class="passInput" name="pw1"  placeholder="New Password">
            <input type="text" class="passInput" name="pwconfirm"  placeholder="Confirm Password">
            <button type="submit" name="btnResetPassword">Reset</button>
        </form>
    </div>
</body>

</html>