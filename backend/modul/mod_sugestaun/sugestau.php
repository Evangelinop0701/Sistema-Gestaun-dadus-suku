<?php

switch ($_GET['act']) {
    case 'read':?>
<br>
<?php $data = $sugere->show_dados();
        foreach ($data as $row) {?>
<div class="container my-2">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><i><?=$row['data_sugere']; ?></i></strong> <?= $row['sugestaun']; ?>
        <button type="button" class="close btn btn-sm btn-danger py-0" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times; Delete</span>
        </button>
    </div>
</div>
<?php } ?>
<?php break; ?>
<?php } ?>