<?php

if (!isset($_GET['module'])) {
    include "home.php";
} elseif ($_GET['module'] == "populasaun") {
    include "modul/mod_populasaun/popu.php";
} elseif ($_GET['module'] == "funsionario") {
    include "modul/mod_fun/funsio.php";
} elseif ($_GET['module'] == "popu_mate") {
    include "modul/mod_mate/popu_mate.php";
} elseif ($_GET['module'] == "familia") {
    include "modul/mod_familia/familia.php";
} elseif ($_GET['module'] == "membru") {
    include "modul/mod_membru/membru.php";
}
