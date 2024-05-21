<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Бүртгэл</title>
    <style>
        .btn-logout {
            position: absolute;
            top: 5%;
            right: 5%;
            background-color: #2D3436;
        }
        .btn-search {
            position: absolute;
            top: 5%;
            right: 10%;
        }
        .btn-list {
            position: absolute;
            top: 5%;
            right: 18%;
        }
        .container{
       
        margin:0 auto; 
        padding:40px;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }
    </style>
</head>
<body>
<a href="logout.php" class="btn btn-secondary btn-logout">Гарах</a>

<a href="search.php" class="btn btn-secondary btn-search">Систем хайх</a>


<a href="list.php" class="btn btn-secondary btn-list">Жагсаалтаар харах</a>


<h1 style="text-align: center;">Системийн бүртгэл</h1>
    <div class="container">


    <?php
    $conn = mysqli_connect("localhost", "root", "", "registration");
    if (!$conn) {
        die("Алдаа гарлаа");
    }
    
    
    if (isset($_POST["send"])) {
        
        $errors = array();

        if (empty($_POST["sys_name"]) || empty($_POST["sys_type"]) || empty($_POST["sys_cost"]) || empty($_POST["sys_desc"]) || empty($_POST["sys_rel"]) || empty($_POST["sys_dev"]) || empty($_POST["sys_date"]) || empty($_POST["sys_use"])) {
            array_push($errors,"Бүх талбарыг бөглөнө үү");
        } else {
            $sys_name = $_POST["sys_name"];
            $sys_type = $_POST["sys_type"];
            $sys_cost = $_POST["sys_cost"];
            $sys_desc = $_POST["sys_desc"];
            $sys_rel = $_POST["sys_rel"];
            $sys_dev = $_POST["sys_dev"];
            $sys_date = $_POST["sys_date"];
            $sys_use = $_POST["sys_use"];            
            $sql = "INSERT INTO systems (sys_name, sys_type, sys_cost, sys_desc, sys_rel, sys_dev, sys_date, sys_use) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"ssssssss",$sys_name, $sys_type, $sys_cost, $sys_desc,  $sys_rel, $sys_dev, $sys_date, $sys_use); 
                mysqli_stmt_execute($stmt);   
                echo "<div class='alert alert-success'>Амжилттай бүртгэгдлээ.</div>";
            } else {
                die("Алдаа!!");
            }
        }
    }

    ?>
       
        <form action="index.php" method="post">

            <div class="form-group">
                <input type="text" class="form-control" name="sys_name" placeholder="Системийн нэр">
            </div>


            <div class="form-group">
                <select name="sys_type"  class="form-control">
                <option value="" disabled selected hidden>Системийн төрөл</option>
                <option value="Card">Карт</option>
                <option value="Core">Коре</option>
                <option value="Inner">Дотоод</option>
                <option value="Digital">Дижитал</option>
                </select>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="sys_cost" pattern="^\₮\d{1,3}(,\d{3})*(\.\d+)?₮" data-type="currency"  placeholder="Системийн үнэлгээ ₮₮₮">
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" name="sys_desc" placeholder="Системийн тайлбар">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="sys_rel" placeholder="Холбоотой системүүд">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="sys_dev" placeholder="Хөгжүүлэгч">
            </div>

            <div class="form-group">
                <input type="text" placeholder="Хугацаа" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="sys_date" >
            </div>

            <div class="form-group">
                Ашиглагдаж байгаа эсэх: <br>
                <label for="1">
                <input type="radio"  class="form-control" name="sys_use" value="Yes" id="1">
                Тийм</label>
                
                <label for="2">
                <input type="radio"  class="form-control" name="sys_use" value="No" id="2">
                 Үгүй </label>
            </div>
            

            <div class="form-group">
                <input class="btn btn-secondary" type="submit" name="send" value="Бүртгэх">
            </div>
        </form>

    </div>
</body>
</html>