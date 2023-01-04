<?php

if ($product->image == "") {
    $product->image = "blank-photo-icon.jpg";
}

?>

<div class="col">
    <div class="card h-100 shadow custom-card">
        <img src="<?= $BASE_URL ?>img/products/<?= $product->image ?>" class="card-img-top w-100 custom-bg" alt="">
        <div class="card-body">
            <h4 class="card-title"><?= $product->product_name ?></h4>
            <p class="card-text"><?= $product->description ?></p>
            <a href="#" class="custom-user">
                <i class="fas fa-user"></i>
                <span><?= $userData->name ?></span>
            </a>
        </div>
        <div class="card-footer custom-footer">
            <div class="float-start">
                <h4 class="custom-highlight"><?= $product->price ?></h4>
            </div>
            <div class="float-end">
                <button class="btn btn-primary rounded-3 custom-btn"><i class="fas fa-shopping-cart"></i> Ver</button>
            </div>
        </div>
    </div>
</div>