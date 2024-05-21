<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Жагсаалт</title>
</head>
<style>
        .container{
       
        margin:0 auto; 
        padding:40px;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }
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
        .btn-new {
            position: absolute;
            top: 5%;
            right: 18%;
        }
    </style>

<body style="padding:100px;">

<a href="logout.php" class="btn btn-secondary btn-logout">Гарах</a>

<a href="search.php" class="btn btn-secondary btn-search">Систем хайх</a>

<a href="index.php" class="btn btn-secondary btn-new">Систем нэмэх</a>



 <h2 style="text-align: center;">Бүртгэгдсэн системүүд</h2> 
 <div class="container">
<table class="table table-bordered">
 <thead>
        <tr>
            <th style="width: 13rem;">Системийн Дугаар</th>
            <th style="width: 13rem;">Системийн Нэр</th>
            <th style="width: 13rem;">Системийн төрөл </th>
            <th style="width: 13rem;">Системийн үнэлгээ</th>
            <th style="width: 13rem;">Системийн тайлбар</th>
            <th style="width: 13rem;">Холбоотой системүүд</th>
            <th style="width: 13rem;">Хөгжүүлэгч</th>
            <th style="width: 13rem;">Хугацаа</th>
            <th style="width: 13rem;">Ашиглагдаж байгаа эсэх</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $conn = mysqli_connect("localhost", "root", "", "registration");
        if (!$conn) {
            die("Алдаа гарлаа");
        }

        $sql = "SELECT * FROM systems";
        $result = $conn->query($sql);

        if (!$result) {
            die("Хүчингүй жагсаалт" . $conn->error);
        }
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["sys_id"] . "</td>
            <td>" . $row["sys_name"] . "</td>
            <td>" . $row["sys_type"] . "</td>
            <td>" . $row["sys_cost"] . "</td>
            <td>" . $row["sys_desc"] . "</td>
            <td>" . $row["sys_rel"] . "</td>
            <td>" . $row["sys_dev"] . "</td>
            <td>" . $row["sys_date"] . "</td>
            <td>" . $row["sys_use"] . "</td>

        </tr>";

        }
$conn->close();
        ?>
    </tbody>

</table>
</div>  
</body>
</html>


