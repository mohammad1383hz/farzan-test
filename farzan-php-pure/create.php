<?php

include("./include/database.php");

include("./include/home.php");
if (isset($_POST['create'])) {
  if (trim($_POST['model']) != "" && trim($_POST['color']) != "" && trim($_POST['price']) != "" && trim($_POST['weight']) != "") {

    $model = $_POST['model'];

    $color = $_POST['color'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $time = date("Y-m-d h:i:sa");

    $fileName = $_FILES['image']['name'];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $name_image = strtotime("now") . '.' . $ext;
    // $image=$name_image.'.'.$ext;
    $tmp_name = $_FILES['image']['tmp_name'];
    if (move_uploaded_file($tmp_name, "images/$name_image")) {
      echo "Upload Success";
    } else {
      echo "Upload Error";
    }

    $post_insert = $db->prepare("INSERT INTO motor_bikes (model, color, price, weight, image,created_at) VALUES (:model , :color , :price, :weight, :image,:time)");
    $post_insert->execute(['model' => $model, 'color' => $color, 'price' => $price, 'weight' => $weight, 'image' => $name_image, 'time' => $time]);
    header("Location:index.php");
    exit();
  } else {
    header("Location:new_post.php?err_msg= تمام فیلد ها الزامی هست");
    exit();
  }
}
?>



<!-- <h2 style="cetner">motorbikes</h2> -->
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">craete motor</p>
                <?php
                if (isset($_GET['err_msg'])) {
                ?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['err_msg'] ?>
                  </div>
                <?php
                }
                ?>

                <form class="mx-1 mx-md-4" method="POST" enctype="multipart/form-data">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="model" />
                      <label class="form-label" for="form3Example1c">model</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="color" />
                      <label class="form-label" for="form3Example1c">color</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="integer" id="form3Example1c" class="form-control" name="weight" />
                      <label class="form-label" for="form3Example1c">weight</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="integer" id="form3Example1c" class="form-control" name="price" />
                      <label class="form-label" for="form3Example1c">price</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="file" id="form3Example1c" class="form-control" name="image" />
                      <label class="form-label" for="form3Example1c">image</label>
                    </div>
                  </div>


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="create" class="btn btn-primary btn-lg">Create motorbike</button>
                  </div>

                </form>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>