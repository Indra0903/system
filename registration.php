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
    <title>Бүртгэл</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2 style="text-align: center;">Бүртгүүлэх<h2>
    <div class="container">
    <?php
        if (isset($_POST["reg"])) {
           $user_name = $_POST["name"];
           $user_email = $_POST["email"];
           $user_password = $_POST["password"];
           $user_passwordRepeat = $_POST["re_password"];
           
           $passwordHash = password_hash($user_password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($user_name) OR empty($user_email) OR empty($user_password) OR empty($user_passwordRepeat)) {
            array_push($errors,"Бүх талбарыг бөглөнө үү");
           }
           if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Имэйл буруу байна!");
           }
           if (strlen($user_password)<8) {
            array_push($errors,"Нууц үг хамгийн багадаа 8 тэмдэгтээс бүрдэх ёстой!");
           }
           if ($user_password!==$user_passwordRepeat) {
            array_push($errors,"Нууц үг таарахгүй байна!");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE user_email = '$user_email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Имэйл бүртгэлтэй байна!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (user_name, user_email, user_password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$user_name, $user_email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Амжилттай бүртгэгдлээ.</div>";
            }else{
                die("Алдаа!!");
            }
           }
          

        }
        ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Нэвтрэх нэр">
            </div>
            <div class="form-group">
                <input type="email" class="form-control"  name="email" placeholder="Мэйл хаяг">
            </div>
            <div class="form-group">
                <input type="password" class="form-control"  name="password" placeholder="Нууц үг">
            </div>
            <div class="form-group">
                <input type="password" class="form-control"  name="re_password" placeholder="Нууц үгээ дахин оруулна уу">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary"  name="reg" value="Бүртгүүлэх">
            </div>
        </form>
        <div>
        <div><p style="font-size: 17px;"><a href="login.php"> Аль хэдийн бүртгэлтэй юу?</a></p></div>
        </div>
    </div>
</body>
</html>