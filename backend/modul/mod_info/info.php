<?php

switch ($_GET['act']) {
    case 'read':?>
<div class="container p-4">
    <div class="col-lg-12">
        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Informasaun</li>
        </ol>
    </div>
    <div class="row">

        <div class="col-md-12 my-0">
            <div class="card border-0 my-0 py-0">
                <div class="card-body py-0 my-0">
                    <a href="" class="btn btn-md btn-outline-success rounded-1"><i class="fa fa-newspaper"></i>
                        Informasaun
                        Foun</a>
                    <a href="" class="btn btn-md btn-outline-danger rounded-1"><i class="fa fa-eye"></i>
                        Hare iha Tabela
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <?php $data = $info->info();
        foreach ($data as $row) {?>

            <div class="card border-0">
                <div class="card-body">
                    <h3 class="card-title text-decoration-underline"><?= $row['konteudu']; ?></h3>
                    <h5 class="card-subtitle mb-2 text-muted"><?=$row['kategoria'] ?> | Publika
                        <?= date('Y-M. d H:i:s', strtotime($row['create_at'])); ?></h5>
                    <p class="card-text"><?= substr($row['content'], 0, 200) ?>...<a
                            href="read-more-<?=$row['id_info']?>.html">Lee Kontinua</a>
                    </p>
                    <a href="#" class="card-link">Hadia Informasaun</a>
                    <a href="#" class="card-link">Hamoos</a>
                </div>
            </div>
            <hr>

            <?php } ?>
        </div>
        <div class="col-4">
            <div class="card border-0" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item display-6 text-center">
                        Kategoria
                    </li>
                    <?php
                        $ina = $info->kategoria();

        foreach ($ina as $key) { ?>

                    <li class="list-group-item text-center"><a href="kategoria-<?= $key['kategoria']; ?>.html"
                            class="text-decoration-none">
                            <h4><?= $key['kategoria']; ?>-<i>(<?= $key['ktg']; ?>)</i>
                        </a></h5>
                    </li>

                    <?php } ?>
                </ul>

            </div>
        </div>
    </div>
</div>
</div>
<?php break;
    case 'read_more':?>
<div class=" container p-4">
    <div class="col-lg-12">
        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="informasaun.html">Informasaun</a></li>
            <li class="breadcrumb-item active">Detallu Informasaun</li>
        </ol>
        <div class="row">

            <?php $data = $info->read_more($_GET['id']); ?>
            <div class="col-md-8">
                <div class="card border-0">
                    <div class="card-body">
                        <h3 class="card-title text-decoration-underline">
                            <?= $data[0]['konteudu']; ?></h3>
                        <h5 class="card-subtitle mb-2 text-muted"><?=$data[0]['kategoria'] ?> |
                            Publika
                            <?= date('Y-M. d H:i:s', strtotime($data[0]['create_at'])); ?></h5>
                        <p class="card-text">
                            <?=$data[0]['content'] ?>
                        </p>
                        <a href="#" class="card-link">Hadia Informasaun</a>
                        <!-- <a href="#" class="card-link">Hamoos</a> -->
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-4">
                <div class="card border-0" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item display-6 text-center">
                            Kategoria
                        </li>
                        <?php
                        $ina = $info->kategoria();

        foreach ($ina as $key) { ?>

                        <li class="list-group-item text-center"><a href="kategoria-<?= $key['kategoria']; ?>.html"
                                class="text-decoration-none">
                                <h4><?= $key['kategoria']; ?>-<i>(<?= $key['ktg']; ?>)</i>
                            </a></h5>
                        </li>

                        <?php } ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

<?php break;
    case 'kategoira_info':?>
<div class="container p-4">
    <div class="col-lg-12">
        <ol class="breadcrumb rounded-1 px-2 py-1">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="informasaun.html">Informasaun</a></li>
            <li class="breadcrumb-item active">Kategoria</li>
        </ol>
        <div class="row">
            <div class="col-md-8">
                <?php $ktg = $info->dt_kategoria($_GET['ktg']);
        foreach ($ktg as $row) {?>

                <div class="card border-0">
                    <div class="card-body">
                        <h3 class="card-title text-decoration-underline"><?= $row['konteudu']; ?></h3>
                        <h5 class="card-subtitle mb-2 text-muted"><?=$row['kategoria'] ?> | Publika
                            <?= date('Y-M. d H:i:s', strtotime($row['create_at'])); ?></h5>
                        <p class="card-text"><?= substr($row['content'], 0, 200) ?>...<a
                                href="read-more-<?=$row['id_info']?>.html">Lee Kontinua</a>
                        </p>
                        <a href="#" class="card-link">Hadia Informasaun</a>
                    </div>
                </div>
                <hr>

                <?php } ?>
            </div>
            <div class="col-4">
                <div class="card border-0" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item display-6 text-center">
                            Kategoria
                        </li>
                        <?php
                        $ina = $info->kategoria();

        foreach ($ina as $key) { ?>

                        <li class="list-group-item text-center"><a href="kategoria-<?= $key['kategoria']; ?>.html"
                                class="text-decoration-none <?php if ($key['kategoria'] == $_GET['ktg']) {
                                    echo "disabled text-secondary";
                                } else {
                                    echo "";
                                } ?>">
                                <h4><?= $key['kategoria']; ?>-<i>(<?= $key['ktg']; ?>)</i>
                            </a></h5>
                        </li>

                        <?php } ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
<?php break; ?>
<?php } ?>