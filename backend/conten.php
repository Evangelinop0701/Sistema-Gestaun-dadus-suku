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
} elseif ($_GET['module'] == "estrutura") {
    include "modul/mod_estrutura/estrutura.php";
} elseif ($_GET['module'] == "periodo") {
    include "modul/mod_periodo/periodo.php";
} elseif ($_GET['module'] == "relatorio") {
    include "modul/mod_relatorio/relatorio.php";
} elseif ($_GET['module'] == "users") {
    include "modul/mod_user/user.php";
} elseif ($_GET['module'] == "sugestaun") {
    include "modul/mod_sugestaun/sugestau.php";
} elseif ($_GET['module'] == "informasaun") {
    include "modul/mod_info/info.php";
}
