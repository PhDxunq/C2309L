<?php
$this->view('admin/layout/header');

?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <?php $this->view('admin/layout/sidebar') ?>
            </div>
            <div class="col-9">
                <h1>TCap nhat danh muc</h1>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Ten danh muc</label>
                        <input value="<?= $data['name'] ?>" type="text" class="form-control" id="name" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary">cap nhat</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$this->view('admin/layout/footer');
?>