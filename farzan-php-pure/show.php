<?php
include("./include/home.php");
include("./include/database.php");

if (isset($_GET['motorbike'])) {
    $motorbike_id = $_GET['motorbike'];

    $motorbike = $db->prepare('SELECT * FROM motor_bikes WHERE id = :id');
    $motorbike->execute(['id' => $motorbike_id]);
    $motorbike = $motorbike->fetch();
}
?>





<?php
if ($motorbike) {
?>


    <div class="card col-sm-3">
        <img class="card-img-top" style="width:400px;height:400px;" src="./images/<?php echo $motorbike['image'] ?>" alt="Card image cap">
        <div class="card-body">
            <h3 class="card-title">model:<?php echo $motorbike['model'] ?></h3>
            <h3 class="card-title">color:<?php echo $motorbike['color'] ?></h3>
            <h3 class="card-title">price:<?php echo $motorbike['price'] ?></h3>
            <h3 class="card-title">weight:<?php echo $motorbike['weight'] ?></h3>

        </div>
    </div>



<?php
} else {
?>
    <div class="alert alert-danger" role="alert">
        not found motorbike
    </div>
<?php
}
?>