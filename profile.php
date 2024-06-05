<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<style>
    body {
        background-color: #f8f9fa;
    }
    .profile-card {
        max-width: 500px;
        margin: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        background-color: #fff;
    }
    .card-title {
        margin-bottom: 20px;
    }
    .form-group label {
        font-weight: bold;
    }
    .btn-block {
        margin-top: 20px;
    }
    .btn-danger {
        margin-top: 10px;
    }
    .back-button {
        position: absolute;
        top: 20px;
        left: 20px;
    }
</style>
<body>
    <div class="container mt-5">
        <a href="index.php" class="btn btn-secondary back-button">Back</a>
        <div class="card profile-card">
            <div class="card-body">
                <h3 class="card-title text-center">Profile</h3>
                <form method="POST" action="controller.php">
    <input type="hidden" name="action" value="updateProfile">
    <div class="form-group">
        <label for="namaPelanggan">Nama Pelanggan</label>
        <input type="text" class="form-control" id="namaPelanggan" name="nama" value="<?php echo htmlspecialchars($user['nama_pelanggan']); ?>" placeholder="Masukkan Nama" required>
    </div>
    <div class="form-group">
        <label for="emailPelanggan">Email</label>
        <input type="email" class="form-control" id="emailPelanggan" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" placeholder="Masukkan Email" required>
    </div>
    <div class="form-group">
        <label for="telpPelanggan">Telepon</label>
        <input type="tel" class="form-control" id="telpPelanggan" name="telp" value="<?php echo htmlspecialchars($user['telp']); ?>" placeholder="Masukkan Nomor Telepon" required>
    </div>
    <div class="form-group">
        <label for="passwordPelanggan">Password</label>
        <input type="text" class="form-control" id="passwordPelanggan" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" placeholder="Masukkan Password" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
</form>
    <form method="POST" action="controller.php" class="mt-2">
        <input type="hidden" name="action" value="deleteProfile">
        <button type="submit" class="btn btn-danger btn-block">Delete Profile</button>
    <!-- <button type="button" class="btn btn-danger btn-block" onclick="window.location.href='login.php'">Delete Profile</button> -->
</form>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
