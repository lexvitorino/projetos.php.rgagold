<?php
class Operacoes extends model {

    public function __construct() {
        parent::__construct();
    }

    public function getData($id_subscriber, $id) {
        $sql = "SELECT * 
                FROM   operacoes 
                WHERE  id_subscriber = $id_subscriber AND
                       id = $id";
        $sql = $this->db->query($sql);
        $data = array();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
        }
        return $data;
    }

    public function getDataList($id_subscriber, $ids) {
        $ids = empty($ids)?'0':$ids;

        $sql = "SELECT * 
                FROM   operacoes 
                WHERE  id_subscriber = $id_subscriber AND
                       id in ($ids)
                LIMIT 1";
        
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
        }        

        return $data;
    }

    public function getCount($id_subscriber) {
        $sql = "SELECT COUNT(*) as qtde 
                FROM   operacoes 
                WHERE  id_subscriber = $id_subscriber";
        
        $sql = $this->db->query($sql);
        
        $row = $sql->fetch();
        return $row['qtde'];
    }

    public function getList($id_subscriber, $offset) {
        $data = array();

        if ($offset == -1) {
            $sql = "SELECT u.*
                    FROM   operacoes u
                    WHERE  u.id_subscriber = $id_subscriber"; 
        } else {
            $sql = "SELECT u.*
                    FROM   operacoes u
                    WHERE  u.id_subscriber = $id_subscriber
                    LIMIT $offset, 10"; 
        }

        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
        }        

        return $data;
    }

    public function add($id_subscriber, $id, $name, $chave) {
        $sql = "SELECT COUNT(*) as qtde 
                FROM   operacoes 
                WHERE  id_subscriber = $id_subscriber AND
                       name = '$name' AND
                       id <> $id";
        $sql = $this->db->query($sql);

        $row = $sql->fetch();
        if ($row['qtde'] == '0') {  
            $id_user = $_SESSION['ccUser'];
            
            if ($id > 0) {
                $sql = "UPDATE operacoes
                        SET    name = '$name',
                               changed_id_user = $id_user,
                               changed_date = Now(),
                               chave = '$chave'
                        WHERE  id_subscriber = $id_subscriber AND
                               id = $id";

            } else {
                $sql = "INSERT INTO operacoes 
                        SET id_subscriber = $id_subscriber,
                            name = '$name',
                            created_id_user = $id_user,
                            created_date = Now(),
                            chave = '$chave'";
            }

            $sql = $this->db->query($sql);
            if ($id == 0) {
                $id = $this->db->lastInsertId();
            }

            return $id; 
        } else {

            return 0;
        }
    }

    public function delete($id_subscriber, $id) {
        $sql = "DELETE FROM operacoes
                WHERE id_subscriber = $id_subscriber AND
                      id = $id";
        $this->db->query($sql);
    }
    
    public function setChave($id_subscriber, $id, $chave) {
        $sql = "UPDATE operacoes
                SET    chave = $chave
                WHERE  id_subscriber = $id_subscriber AND
                       id = $id";
        $this->db->query($sql);
    }

}
