<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Хайлт</title>
    <style>
        .btn-logout {
            position: absolute;
            top: 5%;
            right: 5%;
        }
        .container{
       
        margin:0 auto; 
        padding:40px;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }
        .btn-new {
            position: absolute;
            top: 5%;
            right: 20%;
        }
        .btn-list {
            position: absolute;
            top: 5%;
            right: 10%;
        }
    </style>
</head>

<body style="padding:100px;">

<a href="logout.php" class="btn btn-secondary btn-logout">Гарах</a>

<a href="list.php" class="btn btn-secondary btn-list">Жагсаалтаар харах</a>

<a href="index.php" class="btn btn-secondary btn-new">Систем нэмэх</a>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>Хайлт хийх </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Хайх утга">
                                        <button type="submit" class="btn btn-secondary">Хайх</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered" style="width: 15rem;">
                            <thead>
                                <tr>
                                    <th >Системийн Дугаар</th>
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
                                die("Алаа гарлаа");
                            }

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM systems WHERE CONCAT(sys_name, sys_type, sys_cost, sys_desc, sys_rel, sys_dev, sys_date, sys_use) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['sys_id']; ?></td>
                                                    <td><?= $items['sys_name']; ?></td>
                                                    <td><?= $items['sys_type']; ?></td>
                                                    <td><?= $items['sys_cost']; ?></td>
                                                    <td><?= $items['sys_desc']; ?></td>
                                                    <td><?= $items['sys_rel']; ?></td>
                                                    <td><?= $items['sys_dev']; ?></td>
                                                    <td><?= $items['sys_date']; ?></td>
                                                    <td><?= $items['sys_use']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">Илэрц олдсонгүй</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>