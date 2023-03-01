<?php
include("./db.php");
include("../include/home.php");
$b = new database();





?>



<h2>motrobike</h2>
<div class="mb-2">
    <a href="/create.php" class="btn btn-success">create motorbikes</a>
</div>
<a href="index.php?sort=time" class="btn btn-primary">sort by time</a>
<a href="index.php?sort=price" class="btn btn-primary">sort by price</a>


<?php

$b->selectcolor("motor_bikes", "*");
$result = $b->sql;

?>
<ul class="list-group">
    <h3>filter by color:</h3>
    <?php while ($colors = mysqli_fetch_assoc($result)) { ?>
        <li class="list-group-item">
            <a href="?color=<?php echo $colors['color'] ?>" class="btn btn-secondary"><?php echo $colors['color'] ?></a>
        </li>
    <?php } ?>

</ul>



<div class="container-fluid">
    <div class="row">


        <?php
        if (isset($_GET['sort'])) {

            $type = $_GET['sort'];
            if ($type = "time") {
                $b->sorttime("motor_bikes", "*",);
                $result = $b->sql;
            } elseif ($type = "price") {
                $b->sortprice("motor_bikes", "*",);
                $result = $b->sql;
            }
        } elseif (isset($_GET['color'])) {
            $color = $_GET['color'];
            $b->selectcolor("motor_bikes", "*", "color='$color'");
            $result = $b->sql;
        } else {
            $b->select("motor_bikes", "*");
            $result = $b->sql;
        }



        ?>
        <?php while ($motorbike = mysqli_fetch_assoc($result)) { ?>
            <div class="card col-sm-3">
                <img class="card-img-top" style="width:200px;height:200px;" src="../images/<?php echo $motorbike['image'] ?>" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $motorbike['model'] ?></h3>
                    <a href="show.php?motorbike=<?php echo $motorbike['id'] ?>" class="btn btn-primary">Go detail</a>
                </div>
            </div>
        <?php } ?>








    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>