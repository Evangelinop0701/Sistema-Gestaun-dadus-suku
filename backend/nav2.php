<?php if (@$_SESSION['kargu'] == "Chefe do Suku") {?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="index.html"><i class="fa-brands fa-medium"></i> Sistema Gestao
            dados
            Suku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.html"><i class="fa fa-home"></i> baranda</a></li>
                <li class="nav-item"><a class="nav-link" href="estrutura.html"><i class="fa-solid fa-list-check"></i>
                        estrutura suku</a></li>

                <li class="nav-item"><a class="nav-link" href="sugestaun.html"><i class="fa fa-bell"></i>
                        sugestaun</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-database"></i> Dados</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="populasaun.html"><i class="fa-solid fa-people-group"></i>
                                populasaun</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="mate-kada-aldeia.html"><i class="fa-solid fa-church"></i>
                                mate</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="familia.html"><i class="fa-solid fa-people-roof"></i>
                                familia</a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="relatorio.html"><i class="fa-solid fa-chart-simple"></i>
                        relatorio</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i>
                        <?=@$_SESSION['kargu'] ?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="detalho-estrutura-<?=@$_SESSION['id_konselu']; ?>.html"><i
                                    class="fa-regular fa-user"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="update-users-<?=@$_SESSION['id_users']?>.html"><i
                                    class="fa-solid fa-unlock-keyhole"></i> Edit
                                password</a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>
                                Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php } elseif (@$_SESSION['kargu'] == "Chefe Aldeia") { ?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="index.html"><i class="fa-brands fa-medium"></i> Sistema Gestao
            dados
            Suku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.html"><i class="fa fa-home"></i> baranda</a></li>
                <li class="nav-item"><a class="nav-link" href="estrutura.html"><i class="fa-solid fa-list-check"></i>
                        estrutura suku</a></li>
                <li class="nav-item"><a class="nav-link" href="sugestaun.html"><i class="fa fa-bell"></i>
                        sugestaun</a></li>
                <li class="nav-item"><a class="nav-link" href="familia.html"><i class="fa-solid fa-people-roof"></i>
                        dados familia</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-database"></i> Dados</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="dados-populasaun-<?=$_SESSION['id_aldeia']?>.html"><i
                                    class="fa-solid fa-people-group"></i>
                                populasaun</a></li>
                        <li><a class="dropdown-item" href="populasaun-mate-<?=$_SESSION['id_aldeia']?>.html"><i
                                    class="fa-solid fa-church"></i>
                                mate</a></li>

                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="relatorio-aldeia.html"><i
                            class="fa-solid fa-chart-simple"></i>
                        relatorio</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="?module=dep"><i class="fa fa-bell"></i>
                        Avizu<sup class="bg-danger p-1 py-1 py-0 m-1 rounded-circle fw-bold">3</sup></a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i>
                        <?=$_SESSION['kargu'] ?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="detalho-estrutura-<?=@$_SESSION['id_konselu']; ?>.html"><i
                                    class="fa-regular fa-user"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="update-users-<?=@$_SESSION['id_users']?>.html"><i
                                    class="fa-solid fa-unlock-keyhole"></i> Edit
                                password</a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>
                                Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php } elseif (@$_SESSION['kargu'] == "Sekretaria") { ?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="index.html"><i class="fa-brands fa-medium"></i> Sistema Gestao
            dados
            Suku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.html"><i class="fa fa-home"></i> baranda</a></li>
                <li class="nav-item"><a class="nav-link" href="estrutura.html"><i class="fa-solid fa-list-check"></i>
                        estrutura suku</a></li>
                <li class="nav-item"><a class="nav-link" href="sugestaun.html"><i class="fa fa-bell"></i>
                        sugestaun</a></li>
                <li class="nav-item"><a class="nav-link" href="periodo.html"><i class="fa fa-tasks-alt"></i>
                        periodo</a></li>
                <li class="nav-item"><a class="nav-link" href="familia.html"><i class="fa-solid fa-people-roof"></i>
                        dados familia</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-database"></i> Dados</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="populasaun.html"><i class="fa-solid fa-people-group"></i>
                                populasaun</a></li>
                        <li><a class="dropdown-item" href="mate-kada-aldeia.html"><i class="fa-solid fa-church"></i>
                                mate</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-location-crosshairs"></i>
                                Munisipiu</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-location-crosshairs"></i> Postu</a>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-location-crosshairs"></i> Suku</a>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-location-crosshairs"></i> aldeia</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="relatorio.html"><i class="fa-solid fa-chart-simple"></i>
                        relatorio</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="?module=dep"><i class="fa fa-bell"></i>
                        Avizu</a></li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i>
                        <?=$_SESSION['kargu'] ?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="detalho-estrutura-<?=@$_SESSION['id_konselu']; ?>.html"><i
                                    class="fa-regular fa-user"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="update-users-<?=@$_SESSION['id_users']?>.html"><i
                                    class="fa-solid fa-unlock-keyhole"></i> Edit
                                password</a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>
                                Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php } elseif ($_SESSION['level_user'] == "superadmin") {?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="index.html"><i class="fa-brands fa-medium"></i> Sistema Gestao
            dados
            Suku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.html"><i class="fa fa-home"></i> baranda</a></li>
                <li class="nav-item"><a class="nav-link" href="estrutura.html"><i class="fa-solid fa-list-check"></i>
                        estrutura suku</a></li>
                <li class="nav-item"><a class="nav-link" href="sugestaun.html"><i class="fa fa-bell"></i>
                        sugestaun</a></li>
                <li class="nav-item"><a class="nav-link" href="periodo.html"><i class="fa fa-tasks-alt"></i>
                        periodo</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-database"></i> Dados</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="populasaun.html"><i class="fa-solid fa-people-group"></i>
                                populasaun</a></li>
                        <li><a class="dropdown-item" href="mate-kada-aldeia.html"><i class="fa-solid fa-church"></i>
                                mate</a></li>
                        <li><a class="dropdown-item" href="familia.html"><i class="fa-solid fa-people-roof"></i>
                                familia</a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-location-crosshairs"></i>
                                Munisipiu</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-location-crosshairs"></i> Postu</a>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-location-crosshairs"></i> Suku</a>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-location-crosshairs"></i> aldeia</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="relatorio.html"><i class="fa-solid fa-chart-simple"></i>
                        relatorio</a></li>
                <li class="nav-item"><a class="nav-link" href="users.html"><i class="fa fa-bell"></i>
                        users</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i>
                        <?=$_SESSION['level_user'] ?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fa-regular fa-user"></i>
                                Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-unlock-keyhole"></i> Edit
                                password</a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>
                                Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php } else {
    header('location: 401.php');
} ?>