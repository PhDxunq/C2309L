<?php
$this->view('admin/layout/header');

$success = Session::get('success');
if(isset($success)) {
    echo '<div class="alert alert-success">'.Session::get('success').'</div>';
    Session::delete('success');
}

$error = Session::get('error');

if(isset($error)) {
    echo '<div class="alert alert-danger">'.Session::get('error').'</div>';
    Session::delete('error');
}

?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <?php $this->view('admin/layout/sidebar') ?>
            </div>
            <div class="col-9">
                <h1>Danh sach danh muc</h1>
                <a href="<?= BASE_URL ?>/admin/category/create" class="btn btn-primary">Them moi</a>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ten</th>
                            <th>NGay tao</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $category) :
                            // convert $category['created_at'] to timestamp
                            $category['created_at'] = date('d-m-Y H:m:s', strtotime($category['created_at']));
                        ?>
                            <tr>
                                <td><?php echo $category['id'] ?></td>
                                <td><?php echo $category['name'] ?></td>
                                <td><?php echo    $category['created_at'] ?></td>
                                <td>
                                    <a href="<?= BASE_URL ?>/admin/category/edit/<?php echo $category['id'] ?>" class="btn btn-primary">Sua</a>
                                    <a  href="<?= BASE_URL ?>/admin/category/delete/<?php echo $category['id'] ?>" class="btn btn-danger btn-delete">Xoa</a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmDelete() {
        return confirm('Ban co muon xoa danh muc nay khong?');
    }

    document.querySelectorAll('.btn-delete').forEach(function(btn) {
        btn.onclick = function(e) {
            e.preventDefault();
            if(confirmDelete()) {
                window.location.href = btn.getAttribute('href');
            }
        }
    });
</script>
<?php
$this->view('admin/layout/footer');
?>