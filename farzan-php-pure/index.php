<?php
include("./include/database.php");
include("./include/home.php");


if (isset($_GET['sort'])) {
    if ($_GET['sort'] == "time") {
        $query = "SELECT * FROM motor_bikes ORDER BY created_at";
    } elseif ($_GET['sort'] == "price") {
        $query = "SELECT * FROM motor_bikes ORDER BY price";
    }
} elseif (isset($_GET['color'])) {
    $color = $_GET['color'];
    // echo $color;
    $query = "SELECT * FROM motor_bikes WHERE color ='$color'";
} else {
    $query = "SELECT * FROM motor_bikes";
}
$colorquery = "SELECT DISTINCT color FROM motor_bikes";
$colors = $db->query($colorquery);

$motorbikes = $db->query($query);


?>


<h2>motrobike</h2>
<div class="mb-2">
    <a href="create.php" class="btn btn-success">create motorbikes</a>
</div>
<a href="index.php?sort=time" class="btn btn-primary">sort by time</a>
<a href="index.php?sort=price" class="btn btn-primary">sort by price</a>



<ul class="list-group">
    <h3>filter by color:</h3>
    <?php
    if ($colors->rowCount() > 0) {
        foreach ($colors  as $color) {
    ?>

            <li class="list-group-item">
                <a href="?color=<?php echo $color['color'] ?>" class="btn btn-secondary"><?php echo $color['color'] ?></a>
            </li>
    <?php
        }
    }
    ?>

</ul>



<div class="container-fluid">
    <div class="row">
        <?php
        if ($motorbikes->rowCount() > 0) {
            foreach ($motorbikes as $motorbike) {
        ?>

                <div class="card col-sm-3">
                    <img class="card-img-top" style="width:200px;height:200px;" src="./images/<?php echo $motorbike['image'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $motorbike['model'] ?></h3>
                        <a href="show.php?motorbike=<?php echo $motorbike['id'] ?>" class="btn btn-primary">Go detail</a>
                    </div>
                </div>
        <?php
            }
        }
        ?>

    </div>
</div>