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

</style>
<body>
    <div class="container mt-5">
        <div class="card profile-card">
            <div class="card-body">
                <h3 class="card-title text-center">Profile</h3>
                <form>
                    <div class="form-group">
                        <label for="namaPelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="namaPelanggan" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="emailPelanggan">Email</label>
                        <input type="email" class="form-control" id="emailPelanggan" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <label for="telpPelanggan">Telepon</label>
                        <input type="tel" class="form-control" id="telpPelanggan" placeholder="Masukkan Nomor Telepon">
                    </div>
                    <div class="form-group">
                        <label for="passwordPelanggan">Password</label>
                        <input type="password" class="form-control" id="passwordPelanggan" placeholder="Masukkan Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                    <button type="button" class="btn btn-danger btn-block" onclick="window.location.href='login.php'">Delete Profile</button>
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
