<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "uas");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = $koneksi->query("SELECT * FROM user WHERE email = '$email' AND password = '$password'");
    $data = $result->fetch_assoc();
    
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if ($data == null) {
            echo "email tidak terdaftar";
            exit;
        }
        if ($_POST['password'] != $data['password']) {
            echo "password salah";
            exit;
        }
        if ($_POST['email'] == $data['email'] && $_POST['password'] == $data['password']) {
            if (isset($_POST['remember'])) {
                setcookie('remember', 'true', time() + 20);
            

            $_SESSION['login'] = true;
            header("Location: index.php");
            exit; 
            }   
        }
    }
    // if ($result->num_rows > 0) {
    //     $_SESSION["loggedin"] = true;
    //     $_SESSION["email"] = $email;

    //     // Set cookie untuk mengingat email pengguna selama 30 hari
    //     setcookie("user_email", $email, time() + (30 * 24 * 60 * 60), "/"); // 30 hari
    //     header("Location: index.php");
    //     exit;
    // } else {
    //     $error = "Email atau password salah!";
    // }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Login</h2>
        <form method="POST" action="">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>