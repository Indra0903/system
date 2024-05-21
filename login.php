<div?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нэвтрэх</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h2 style="text-align: center;">Тавтай морилно уу<h2>
    <div class="container">
    <?php
        if (isset($_POST["login"])) {
            $user_name = $_POST["name"];
            $user_password = $_POST["password"];
             require_once "database.php";
             $sql = "SELECT * FROM users WHERE user_name = '$user_name'";
             $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
             $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($user_password, $user["user_password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Нууц үг буруу байна</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Нэвтрэх нэр таарахгүй байна</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Нэвтрэх нэр">
            </div>
            <div class="form-group">
                <input type="password" class="form-control"  name="password" placeholder="Нууц үг">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary"  name="login" value="Нэвтрэх">
            </div>
        </form>
        <div><p style="font-size: 17px;"><a href="registration.php">Шинээр бүртгүүлэх</a></p></div>
    </div>
</body>
</html>