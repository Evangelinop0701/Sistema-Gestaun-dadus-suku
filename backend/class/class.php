<?php

// session_start();

class database
{
    protected $servername = 'localhost';
    protected $hostname = 'root';
    protected $password = '';
    protected $dbname = 'db_suku';
    protected $conn;

    public function __construct()
    {
        if (!isset($this->conn)) {
            $this->conn = new mysqli($this->servername, $this->hostname, $this->password, $this->dbname) ;
        }

        if(!$this->conn) {
            echo 'Koneksaun Database La Susessu';
        }

        return $this->conn;

    }
}

class user extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function chek_login($username, $password)
    {
        $pass = md5($password);
        $sql = "SELECT * FROM t_users u, t_konselu_suku k, t_populasaun p, t_aldeia a, t_suku s, t_postu po, t_mun m, t_periodo per WHERE u.id_konselo=k.id_konselu AND k.id_populasaun=p.id_populasaun AND p.id_aldeia=a.id_aldeia AND k.id_periodo=per.id_periodo AND a.id_suku=s.id_suku AND s.id_postu=po.id_postu AND po.id_mun=m.id_mun AND u.username='$username' AND u.password='$pass'" ;
        $query = $this->conn->query($sql);
        $result = $query->fetch_assoc();
        $num_rows = mysqli_num_rows($query);

        if ($num_rows > 0) {
            $_SESSION['username'] = true;
            $_SESSION['password'] = true;
            $_SESSION['id_users'] = $result['id_users'];
            $_SESSION['id_konselu'] = $result['id_konselu'];
            $_SESSION['naran_populasaun'] = $result['naran_populasaun'];
            $_SESSION['id_populasaun'] = $result['id_populasaun'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['id_aldeia'] = $result['id_aldeia'];
            $_SESSION['naran_aldeia'] = $result['naran_aldeia'];
            $_SESSION['naran_suku'] = $result['naran_suku'];
            $_SESSION['kargu'] = $result['kargu'];
            $_SESSION['foto'] = $result['foto'];
            $_SESSION['periodo'] = $result['periodo'];



            return true;
        } else {
            return false;
        }
    }
    public function chek_login_super($username, $password)
    {
        $pass = md5($password);
        $sql = "SELECT * FROM t_superadmin WHERE username='$username' AND password='$pass'";
        $query = $this->conn->query($sql);
        $result = $query->fetch_assoc();
        $num_rows = mysqli_num_rows($query);

        if ($num_rows > 0) {
            $_SESSION['username'] = true;
            $_SESSION['password'] = true;
            $_SESSION['id_super'] = $result['id_super'];
            $_SESSION['naran_kompletu'] = $result['naran_kompletu'];
            $_SESSION['level_user'] = $result['level_user'];




            return true;
        } else {
            return false;
        }
    }

    public function get_sessi()
    {
        return $_SESSION['username'] and $_SESSION['password'];
    }

    public function updatepass($id, $user, $password, $pass)
    {

        $sql = "UPDATE t_user SET username = '$user', passwords='$password', pass='$pass' WHERE id_user = '$id'";
        $this->conn->query($sql);

    }

    public function updatesession($username, $last_log, $id_session)
    {

        $sql = "UPDATE t_user SET id_session = '$id_session', last_log='$last_log' WHERE username = '$username'";
        $this->conn->query($sql);

    }
    public function input_user($id_konselu, $username, $password, $pass1)
    {
        $sql = "INSERT INTO t_users VALUES('',$id_konselu,'$username','$password','$pass1')";
        $this->conn->query($sql);
    }
    public function reset_password($password, $pass1, $id)
    {
        $sql = "UPDATE t_users SET password='$password', pass1='$pass1' WHERE id_users='$id'";
        $this->conn->query($sql);
    }
    public function update_users($uname, $password, $pass1, $id)
    {
        $sql = "UPDATE t_users SET username='$uname', password='$password', pass1='$pass1' WHERE id_users='$id'";
        $this->conn->query($sql);
    }



    public function dados_users()
    {
        $sql = "SELECT * FROM t_users u, t_konselu_suku k, t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_periodo per WHERE u.id_konselo=k.id_konselu 
        AND k.id_populasaun=p.id_populasaun AND p.id_aldeia=a.id_aldeia AND a.id_suku= s.id_suku AND k.id_periodo=per.id_periodo";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function select_form_user($id)
    {
        $sql = "SELECT * FROM t_users u, t_konselu_suku k, t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_periodo per WHERE u.id_konselo=k.id_konselu 
        AND k.id_populasaun=p.id_populasaun AND p.id_aldeia=a.id_aldeia AND a.id_suku= s.id_suku AND k.id_periodo=per.id_periodo AND u.id_users='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

}

class CRUD extends database
{
    public function __construct()
    {
        parent::__construct();
    }


    //To read data
    public function read_data($table, $id, $id_value)
    {
        $query = "SELECT * FROM $table";

        if ($id != null) {
            $query .= " WHERE $id='" . $id_value . "'";
        }


        $result = $this->conn->query($query);

        if(!$result) {
            return 'Akontese Erru iha Query!';
        }

        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }


    //To update data
    public function update_data($table, $data, $id, $id_value)
    {
        $query = "UPDATE $table SET ";
        $query .= implode(',', $data);
        $query .= "WHERE $id='" . $id_value . "'";
        $result = $this->conn->query($query);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    //To delete data
    public function delete_data($table, $id, $id_value)
    {
        $query = "DELETE FROM $table WHERE $id='" . $id_value . "'";
        $result = $this->conn->query($query);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    //To insert data
    public function insert_data($table_name, $data)
    {
        $string = "INSERT INTO " . $table_name . "(";
        $string .= implode(",", array_keys($data)) . ') VALUES (';
        $string .= "'" . implode("','", array_values($data)) . "')";

        if(mysqli_query($this->conn, $string)) {
            return true;
        } else {
            echo mysqli_error($this->conn);
        }
    }


    //To get last id
    public function get_last_id($id, $table)
    {
        $query = "SELECT $id FROM $table ORDER BY $id DESC LIMIT 1";
        $result = $this->conn->query($query);
        $data = mysqli_fetch_array($result);

        return $data['id'];
    }


}

class populasaun extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function id_unique($no_elet)
    {

        $sql = "SELECT *  FROM t_populasaun WHERE no_eleitoral='$no_elet'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }
    public function dados_populasaun()
    {

        $sql = "SELECT p.id_populasaun,p.no_eleitoral, p.naran_populasaun,p.sexu,p.data_moris, 
        p.id_aldeia, a.naran_aldeia, p.religiaun, p.s_civil, p.profisaun,p.residensia_atual,p.status,
         s.id_suku,s.naran_suku,pos.id_postu, pos.naran_postu, m.id_mun, m.naran_mun 
         FROM t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_mun m WHERE p.id_aldeia=a.id_aldeia AND 
        a.id_suku=s.id_suku AND s.id_postu=pos.id_postu AND pos.id_mun=m.id_mun AND p.status='Moris'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function dados_populasaun_ativos($status)
    {

        $sql = "SELECT p.id_populasaun,p.no_eleitoral, p.naran_populasaun,p.sexu,p.data_moris, 
        p.id_aldeia, a.naran_aldeia, p.religiaun, p.s_civil, p.profisaun,p.residensia_atual,p.status,
         s.id_suku,s.naran_suku,pos.id_postu, pos.naran_postu, m.id_mun, m.naran_mun 
         FROM t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_mun m WHERE p.id_aldeia=a.id_aldeia AND 
        a.id_suku=s.id_suku AND s.id_postu=pos.id_postu AND pos.id_mun=m.id_mun AND p.status='$status'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function dados_form($id)
    {

        $sql = "SELECT p.id_populasaun,p.no_eleitoral, p.naran_populasaun,p.sexu,p.data_moris, 
        p.id_aldeia, a.naran_aldeia, p.religiaun, p.s_civil, p.profisaun,p.residensia_atual,p.status,
         s.id_suku,s.naran_suku,pos.id_postu, pos.naran_postu, m.id_mun, m.naran_mun 
         FROM t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_mun m WHERE p.id_aldeia=a.id_aldeia AND 
        a.id_suku=s.id_suku AND s.id_postu=pos.id_postu AND pos.id_mun=m.id_mun AND p.status='Moris' AND id_populasaun='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function datallu_dados_popu_status($id, $status)
    {

        $sql = "SELECT p.id_populasaun,p.no_eleitoral, p.naran_populasaun,p.sexu,p.data_moris, 
        p.id_aldeia, a.naran_aldeia, p.religiaun, p.s_civil, p.profisaun,p.residensia_atual,p.status,
         s.id_suku,s.naran_suku,pos.id_postu, pos.naran_postu, m.id_mun, m.naran_mun 
         FROM t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_mun m WHERE p.id_aldeia=a.id_aldeia AND 
        a.id_suku=s.id_suku AND s.id_postu=pos.id_postu AND pos.id_mun=m.id_mun AND p.status='$status' AND id_populasaun='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function detalho_sexu_feto_mane($sexu, $status)
    {

        $sql = "SELECT * FROM t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_mun m WHERE p.id_aldeia=a.id_aldeia AND a.id_suku=s.id_suku AND s.id_postu=pos.id_postu AND pos.id_mun=m.id_mun AND p.status='$status' AND p.sexu='$sexu'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }



    public function popu_ativos($id)
    {
        $sql = "SELECT p.id_populasaun,p.no_eleitoral, p.naran_populasaun,p.sexu,p.data_moris, 
        p.id_aldeia, a.naran_aldeia, p.religiaun, p.s_civil, p.profisaun,p.residensia_atual,p.status,
         s.id_suku,s.naran_suku,pos.id_postu, pos.naran_postu, m.id_mun, m.naran_mun 
         FROM t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_mun m WHERE p.id_aldeia=a.id_aldeia AND 
        a.id_suku=s.id_suku AND s.id_postu=pos.id_postu AND pos.id_mun=m.id_mun AND p.status='Moris' AND a.id_aldeia='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function total_sexu()
    {
        $sql = "SELECT p.sexu, COUNT(*) AS total_sexu FROM t_populasaun p WHERE p.status='Moris' GROUP BY p.sexu;";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function total_aldeia()
    {
        $sql = "SELECT a.naran_aldeia, COUNT(*) AS total_aldeia FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Moris' GROUP BY a.naran_aldeia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }


    public function update_status($id)
    {
        $sql = "UPDATE t_populasaun SET status='Mate' WHERE id_populasaun='$id'";
        $query = $this->conn->query($sql);
    }
    public function update_status_moris($id)
    {
        $sql = "UPDATE t_populasaun SET status='Moris' WHERE id_populasaun='$id'";
        $query = $this->conn->query($sql);
    }


}


class populasaun_mate extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dados_populasaun_mate($id)
    {
        $sql = "SELECT f.id_mate, f.id_populasaun, p.naran_populasaun, p.no_eleitoral,
         p.sexu, p.data_moris,p.id_aldeia, a.naran_aldeia, p.religiaun,p.s_civil, p.profisaun,
          p.residensia_atual, p.status, f.data_mate, f.deskrisaun, s.naran_suku, pos.naran_postu,
           m.naran_mun FROM t_mate f, t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_mun m WHERE 
           f.id_populasaun=p.id_populasaun AND p.id_aldeia=a.id_aldeia AND
         a.id_suku=s.id_suku AND s.id_postu=pos.id_postu AND pos.id_mun=m.id_mun AND p.status='Mate' AND p.id_aldeia='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function popu_mate_info()
    {
        $sql = "SELECT * FROM t_mate f, t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_mun m WHERE 
           f.id_populasaun=p.id_populasaun AND p.id_aldeia=a.id_aldeia AND
         a.id_suku=s.id_suku AND s.id_postu=pos.id_postu AND pos.id_mun=m.id_mun AND p.status='Mate'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function popu_mate_mane_feto($sexu, $status)
    {
        $sql = "SELECT * FROM t_mate f, t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_mun m WHERE 
           f.id_populasaun=p.id_populasaun AND p.id_aldeia=a.id_aldeia AND
         a.id_suku=s.id_suku AND s.id_postu=pos.id_postu AND pos.id_mun=m.id_mun AND p.status='$status' AND p.sexu='$sexu'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function update_mate($id)
    {
        $sql = "SELECT * FROM t_mate m, t_populasaun p WHERE m.id_populasaun=p.id_populasaun AND m.id_mate = '$id'";
        $query = $this->conn->query($sql);

        if($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function detalho_populasaun_mate($id)
    {
        $sql = "SELECT * FROM t_mate f, t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_mun m WHERE 
           f.id_populasaun=p.id_populasaun AND p.id_aldeia=a.id_aldeia AND
         a.id_suku=s.id_suku AND s.id_postu=pos.id_postu AND pos.id_mun=m.id_mun AND p.status='Mate' AND f.id_mate='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function populasaun_mate($id)
    {
        $sql = "SELECT p.id_populasaun,p.no_eleitoral, p.naran_populasaun,p.sexu,p.data_moris, 
        p.id_aldeia, a.naran_aldeia, p.religiaun, p.s_civil, p.profisaun,p.residensia_atual,p.status,
         s.id_suku,s.naran_suku,pos.id_postu, pos.naran_postu, m.id_mun, m.naran_mun 
         FROM t_populasaun p, t_aldeia a, t_suku s, t_postu pos, t_mun m WHERE p.id_aldeia=a.id_aldeia AND 
        a.id_suku=s.id_suku AND s.id_postu=pos.id_postu AND pos.id_mun=m.id_mun AND p.status='Mate' AND a.id_aldeia='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function total_aldeia_mate()
    {
        $sql = "SELECT a.naran_aldeia, COUNT(*) AS total_popu_mate FROM t_mate m, t_populasaun p, t_aldeia a 
         WHERE m.id_populasaun=p.id_populasaun
          AND p.id_aldeia=a.id_aldeia AND p.status='Mate' GROUP BY a.naran_aldeia;";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}


class aldeia extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dados_aldeia()
    {

        $sql = "SELECT * FROM  t_aldeia a, t_suku s, t_postu p, t_mun m
         WHERE a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND p.id_mun=m.id_mun;";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function dados_aldeia_id($id)
    {

        $sql = "SELECT * FROM  t_aldeia a, t_suku s, t_postu p, t_mun m
         WHERE a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND p.id_mun=m.id_mun AND id_aldeia='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}

class familia extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dados_familia_kada_aldeia($id)
    {

        $sql = "SELECT * FROM t_familia f, t_aldeia a, t_suku s, t_postu p, t_mun m
         WHERE f.id_aldeia=a.id_aldeia AND a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND p.id_mun=m.id_mun AND a.id_aldeia='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function all_familia()
    {

        $sql = "SELECT * FROM t_familia f, t_aldeia a, t_suku s, t_postu p, t_mun m
         WHERE f.id_aldeia=a.id_aldeia AND a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND p.id_mun=m.id_mun";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function familia_jeral()
    {

        $sql = "SELECT * FROM t_familia f, t_aldeia a, t_suku s, t_postu p, t_mun m
         WHERE f.id_aldeia=a.id_aldeia AND a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND p.id_mun=m.id_mun";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function total_familia_aldeia($id)
    {
        $sql = "SELECT a.naran_aldeia, COUNT(*) as total FROM t_familia f, t_aldeia a, t_suku s, t_postu p WHERE f.id_aldeia=a.id_aldeia AND 
        a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND a.id_aldeia='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function select_form($id)
    {
        $sql = "SELECT * FROM t_familia f, t_aldeia a, t_suku s, t_postu p, t_mun m
         WHERE f.id_aldeia=a.id_aldeia AND a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND p.id_mun=m.id_mun AND id_familia='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function familia_aldeia($id)
    {
        $sql = "SELECT * FROM t_familia f, t_aldeia a, t_suku s, t_postu p, t_mun m
         WHERE f.id_aldeia=a.id_aldeia AND a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND p.id_mun=m.id_mun AND a.id_aldeia='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}

class membru extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function membru_familia($id)
    {
        $sql = "SELECT * FROM t_membro m, t_familia f, t_aldeia a, t_suku s, t_postu p, t_mun mun
         WHERE m.id_familia=f.id_familia AND f.id_aldeia=a.id_aldeia AND a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND p.id_mun=mun.id_mun AND f.id_familia='$id' ORDER BY m.relasaun_famili ASC";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function select_form($id)
    {
        $sql = "SELECT * FROM t_membro m, t_familia f, t_aldeia a, t_suku s, t_postu p, t_mun mun
         WHERE m.id_familia=f.id_familia AND f.id_aldeia=a.id_aldeia AND a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND p.id_mun=mun.id_mun AND m.id_membro='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function update_obs_sai($id)
    {
        $sql = "UPDATE t_membro SET obs='Sai' WHERE id_membro='$id'";
        $this->conn->query($sql);
    }
    public function knasela_obs($id)
    {
        $sql = "UPDATE t_membro SET obs='' WHERE id_membro='$id'";
        $this->conn->query($sql);
    }
}
class estrutura extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function ficha($id)
    {
        $sql = "SELECT * FROM t_konselu_suku k, t_populasaun popu, t_aldeia a, t_suku s, t_postu p, t_mun m, t_periodo per WHERE k.id_populasaun=popu.id_populasaun AND popu.id_aldeia=a.id_aldeia AND k.id_periodo=per.id_periodo AND a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND per.status_p='Y' AND a.id_aldeia='$id' AND k.kargu !='Delegado' AND k.kargu !='Delegada'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function ficha_chefe($id)
    {
        $sql = "SELECT * FROM t_konselu_suku k, t_populasaun popu, t_aldeia a, t_suku s, t_postu p, t_mun m, t_periodo per WHERE k.id_populasaun=popu.id_populasaun AND popu.id_aldeia=a.id_aldeia AND k.id_periodo=per.id_periodo AND a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND per.status_p='Y' AND k.kargu ='Chefe do Suku'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function estrutura()
    {
        $sql = "SELECT * FROM t_konselu_suku k, t_populasaun popu, t_aldeia a, t_suku s, t_postu p, t_mun m, t_periodo per WHERE k.id_populasaun=popu.id_populasaun AND popu.id_aldeia=a.id_aldeia AND k.id_periodo=per.id_periodo AND a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND popu.status='Moris' AND per.status_p='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function select_form($id)
    {
        $sql = "SELECT * FROM t_konselu_suku k, t_populasaun popu, t_aldeia a, t_suku s, t_postu p, t_mun m, t_periodo per WHERE k.id_populasaun=popu.id_populasaun AND popu.id_aldeia=a.id_aldeia AND k.id_periodo=per.id_periodo AND a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND popu.status='Moris' AND k.id_konselu='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function detalho_periodo($id)
    {
        $sql = "SELECT * FROM t_konselu_suku k, t_populasaun popu, t_aldeia a, t_suku s, t_postu p, t_mun m, t_periodo per WHERE k.id_populasaun=popu.id_populasaun AND popu.id_aldeia=a.id_aldeia AND k.id_periodo=per.id_periodo AND a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND per.id_periodo='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function auto_user($id)
    {
        $sql = "SELECT * FROM t_konselu_suku k, t_populasaun popu, t_aldeia a, t_suku s, t_postu p, t_mun m, t_periodo per WHERE k.id_populasaun=popu.id_populasaun AND popu.id_aldeia=a.id_aldeia AND k.id_periodo=per.id_periodo AND a.id_suku=s.id_suku AND s.id_postu=p.id_postu AND popu.status='Moris' AND popu.id_populasaun='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }



}

class periodo extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function periodo()
    {
        $sql = "SELECT * FROM t_periodo";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function periodo_y()
    {
        $sql = "SELECT * FROM t_periodo WHERE status_p='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function periodo_id($id)
    {
        $sql = "SELECT * FROM t_periodo WHERE id_periodo='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function status_yes($id)
    {
        $y = "UPDATE t_periodo SET status_p='Y' WHERE id_periodo='$id'";
        $this->conn->query($y);
        $n = "UPDATE t_periodo SET status_p='' WHERE id_periodo !='$id'";
        $this->conn->query($n);

    }
}

class home extends database
{
    // Total populasaun moris
    public function total_popu_moris()
    {
        $sql = "SELECT a.naran_aldeia, COUNT(*) as total_moris FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Moris' GROUP BY p.id_aldeia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function total_moris_all()
    {
        $sql = "SELECT COUNT(*) as total_moris FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Moris'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function total_mate_all()
    {
        $sql = "SELECT COUNT(*) as total_mate FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Mate'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    // Total Sexu mane moris
    public function sexu_moris()
    {
        $sql = "SELECT p.sexu, COUNT(*) as total FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Moris' GROUP BY p.sexu";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function sexu_mate()
    {
        $sql = "SELECT p.sexu, COUNT(*) as total FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Mate' GROUP BY p.sexu";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function sexu_moris_aldeia_mane()
    {
        $sql = "SELECT a.naran_aldeia, p.sexu, COUNT(*) as tota_m FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Moris' AND p.sexu='M' GROUP BY a.id_aldeia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function sexu_moris_aldeia_feto()
    {
        $sql = "SELECT a.naran_aldeia, p.sexu, COUNT(*) as tota_f FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Moris' AND p.sexu='F' GROUP BY a.id_aldeia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function all_moris_total_sexu_mane()
    {
        $sql = "SELECT COUNT(*) as all_mane FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Moris' AND p.sexu='M'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function all_moris_total_sexu_feto()
    {
        $sql = "SELECT COUNT(*) as all_feto FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Moris' AND p.sexu='F'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    // Total populasaun mate
    public function total_popu_mate()
    {
        $sql = "SELECT a.naran_aldeia, COUNT(*) as total_mate FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Mate' GROUP BY p.id_aldeia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    // total populasaun mate baseia ba sexu kada aldeia
    public function popu_mate_sexu_mane_total_kada_aldeia()
    {
        $sql = "SELECT a.naran_aldeia, p.sexu, COUNT(*) as tota_m FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Mate' AND p.sexu='M' GROUP BY a.id_aldeia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function popu_mate_sexu_feto_total_kada_aldeia()
    {
        $sql = "SELECT a.naran_aldeia, p.sexu, COUNT(*) as tota_f FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Mate' AND p.sexu='F' GROUP BY a.id_aldeia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function all_mate_total_sexu_feto()
    {
        $sql = "SELECT COUNT(*) as all_feto FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Mate' AND p.sexu='F'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function all_mate_total_sexu_mane()
    {
        $sql = "SELECT COUNT(*) as all_mane FROM t_populasaun p, t_aldeia a WHERE p.id_aldeia=a.id_aldeia AND p.status='Mate' AND p.sexu='M'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }









    public function total_familia_kada_aldeia()
    {
        $sql = "SELECT a.naran_aldeia, COUNT(*) as total_familia FROM t_familia f, t_aldeia a WHERE f.id_aldeia=a.id_aldeia GROUP BY a.id_aldeia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function total_familia()
    {
        $sql = "SELECT COUNT(*) as total_familia FROM t_familia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}


class info extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function info()
    {
        $sql = "SELECT * FROM t_info ORDER BY create_at DESC LIMIT 5";
        $query = $this->conn->query($sql);


        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }
    public function read_more($id)
    {
        $sql = "SELECT * FROM t_info WHERE id_info='$id' ORDER BY create_at DESC";
        $query = $this->conn->query($sql);


        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }
    public function kategoria()
    {
        $sql = "SELECT DISTINCT kategoria, COUNT(kategoria) as ktg FROM t_info GROUP BY kategoria";
        $query = $this->conn->query($sql);


        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }
    public function dt_kategoria($ktg)
    {
        $sql = "SELECT * FROM t_info WHERE kategoria='$ktg' ORDER BY create_at DESC";
        $query = $this->conn->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }
}

class sugere extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function show_dados()
    {
        $sql = "SELECT * FROM t_sugestaun ORDER BY data_sugere DESC";
        $query = $this->conn->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }
}
