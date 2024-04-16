<?php
$this->view('layout/header');
?>

<div class="container">
    <div class="row">
        <?php
        foreach ($data as $product) :
            // dd($product);
        ?>
        <div class="col-6">
            <div class="card">
                <img src="<?php echo $product['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title
                    "><?php echo $product['name'] ?></h5>
                    <p class="card-text"><?php echo $product['description'] ?></p>
                    <a href="<?= BASE_URL ?>/product/<?php echo $product['id'] ?>" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</div>
<?php
$this->view('layout/footer');
