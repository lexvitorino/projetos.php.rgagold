<?php

class Propriedades extends model {

    public function __construct() {
        parent::__construct();
    }

    public function getData($id_subscriber, $id) {
        $sql = "SELECT p.*, b.name as bairro, c.name as cidade, b.chave as chave_bairro 
                FROM   propriedades p
                LEFT JOIN bairros b on b.id = p.id_bairro
                LEFT JOIN cidades c on c.id = p.id_cidade
                WHERE  p.id_subscriber = $id_subscriber AND
                       p.id = $id";
        
        $sql = $this->db->query($sql);

        $data = array();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
            $data["operacoes"] = explode(',', $data["operacao"]);
            $data["tipoImoveis"] = explode(',', $data["tipo"]);
            $data["opcionais"] = explode(',', $data["opcional"]);
        }
        return $data;
    }

    public function getCount($id_subscriber) {
        $sql = "SELECT COUNT(*) as qtde 
                FROM   propriedades 
                WHERE  id_subscriber = $id_subscriber";
        
        $sql = $this->db->query($sql);
        
        $row = $sql->fetch();
        return $row['qtde'];
    }

    public function getList($id_subscriber, $offset) {
        $data = array();

        if ($offset == -1) {
            $sql = "SELECT u.*, i.name as tipo_imovel
                    FROM   propriedades u
                        LEFT JOIN tipo_imoveis i ON i.id = u.tipo
                    WHERE  u.id_subscriber = $id_subscriber"; 
        } else {
            $sql = "SELECT u.*, i.name as tipo_imovel
                    FROM   propriedades u
                        LEFT JOIN tipo_imoveis i ON i.id = u.tipo
                    WHERE  u.id_subscriber = $id_subscriber
                    LIMIT $offset, 10"; 
        }

        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
        }        

        return $data;
    }
    
    public function searchPropriedades($id_subscriber, $search) {
        $data = array();

        $sql = "SELECT u.*, u.predio as name 
                FROM   propriedades u
                WHERE  u.id_subscriber = $id_subscriber AND
                       u.predio like '%$search%' OR
                       u.id = '$search'
                LIMIT 10"; 

        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
        }        

        return $data;
    }

    public function add($id_subscriber, $id, $id_imobiliaria, $operacoeslist, $tipoImoveislist, $predio, $num_ap, $id_cidade, $id_bairro, $endereco, $descricao_destaque, $destaque_dia, $area_total_terreno, $area_construida, $distancia_mar, $frente_mar, $dormitorio, $suite, $sala, $cozinha, $banheiro, $lavabo, $lavanderia, $dep_empregada, $edicula, $vagas_garagem, $opcionaislist, $moeda, $valor_venda, $valor_entrada, $qtde_parcelas, $valor_parcela, $valor_intermediarias, $valor_condominio, $mostrar_valores, $acomodacoes, $aluguel_mensal, $aluguel_anual, $aluguel_reveillon, $aluguel_carnaval, $aluguel_temporada, $aluguel_pacote, $observacoes, $chave_com, $documento_posse, $planta_aprovada, $escritura_definitiva, $desmembrado, $habitese, $documentacao_imovel, $registro, $matricula, $comarca, $estado, $cadastrado_sob, $prop_nome, $prop_nacionalidade, $prop_cpf, $prop_rg, $prop_dtnascimento, $prop_estadocivil, $prop_conjuge, $prop_endereco, $prop_cidade, $prop_estado, $prop_cep, $prop_residencial, $prop_celular, $prop_comercial, $prop_fax, $prop_email, $prop_indisponivel, $prop_senha) {

        $id_user = $_SESSION['ccUser'];

        $operacoeslist = implode(',', $operacoeslist);
        $tipoImoveislist = implode(',', $tipoImoveislist);
        $opcionaislist = implode(',', $opcionaislist);

        $foto1 = '';
        if (isset($_FILES['foto1']) && !empty($_FILES['foto1']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto1']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto1']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto1 = $destination;
            }
        }

        $foto2 = '';
        if (isset($_FILES['foto2']) && !empty($_FILES['foto2']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto2']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto2']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto2 = $destination;
            }
        }

        $foto3 = '';
        if (isset($_FILES['foto3']) && !empty($_FILES['foto3']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto3']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto3']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto3 = $destination;
            }
        }

        $foto4 = '';
        if (isset($_FILES['foto4']) && !empty($_FILES['foto4']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto4']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto4']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto4 = $destination;
            }
        }

        $foto5 = '';
        if (isset($_FILES['foto5']) && !empty($_FILES['foto5']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto5']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto5']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto5 = $destination;
            }
        }

        $foto6 = '';
        if (isset($_FILES['foto6']) && !empty($_FILES['foto6']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto6']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto6']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto6 = $destination;
            }
        }

        $foto7 = '';
        if (isset($_FILES['foto7']) && !empty($_FILES['foto7']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto7']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto7']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto7 = $destination;
            }
        }

        $foto8 = '';
        if (isset($_FILES['foto8']) && !empty($_FILES['foto8']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto8']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto8']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto8 = $destination;
            }
        }

        $foto9 = '';
        if (isset($_FILES['foto9']) && !empty($_FILES['foto9']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto9']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto9']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto9 = $destination;
            }
        }

        $foto10 = '';
        if (isset($_FILES['foto10']) && !empty($_FILES['foto10']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto10']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto10']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto10 = $destination;
            }
        }

        $foto11 = '';
        if (isset($_FILES['foto11']) && !empty($_FILES['foto11']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto11']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto11']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto11 = $destination;
            }
        }

        $foto12 = '';
        if (isset($_FILES['foto12']) && !empty($_FILES['foto12']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto12']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto12']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto12 = $destination;
            }
        }

        $foto13 = '';
        if (isset($_FILES['foto13']) && !empty($_FILES['foto13']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto13']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto13']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto13 = $destination;
            }
        }

        $foto14 = '';
        if (isset($_FILES['foto14']) && !empty($_FILES['foto14']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto14']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto14']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto14 = $destination;
            }
        }

        $foto15 = '';
        if (isset($_FILES['foto15']) && !empty($_FILES['foto15']['tmp_name'])) {            
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['foto15']['type'], $permitidos)) {
                $destination = md5(time().rand(1, 999)) . '.jpg';
                move_uploaded_file($_FILES['foto15']['tmp_name'], 'assets/specs/images/fotos/' . $destination);
                $foto15 = $destination;
            }
        }

        $fotos = "";
        if (!empty($foto1))
          $fotos = $fotos."foto1 = '$foto1',";
        if (!empty($foto2))
          $fotos = $fotos."foto2 = '$foto2',";
        if (!empty($foto3))
          $fotos = $fotos."foto3 = '$foto3',";
        if (!empty($foto4))
          $fotos = $fotos."foto4 = '$foto4',";
        if (!empty($foto5))
          $fotos = $fotos."foto5 = '$foto5',";
        if (!empty($foto6))
          $fotos = $fotos."foto6 = '$foto6',";
        if (!empty($foto7))
          $fotos = $fotos."foto7 = '$foto7',";
        if (!empty($foto8))
          $fotos = $fotos."foto8 = '$foto8',";
        if (!empty($foto9))
          $fotos = $fotos."foto9 = '$foto9',";
        if (!empty($foto10))
          $fotos = $fotos."foto10 = '$foto10',";
        if (!empty($foto11))
          $fotos = $fotos."foto11 = '$foto11',";
        if (!empty($foto12))
          $fotos = $fotos."foto12 = '$foto12',";
        if (!empty($foto13))
          $fotos = $fotos."foto13 = '$foto13',";
        if (!empty($foto14))
          $fotos = $fotos."foto14 = '$foto14',";
        if (!empty($foto15))
          $fotos = $fotos."foto15 = '$foto15',";
        
        if ($id > 0) {
            $sql = "UPDATE propriedades
                    SET    id_subscriber = $id_subscriber,
                           id_imobiliaria = $id_imobiliaria, 
                           operacao = '$operacoeslist', 
                           tipo = '$tipoImoveislist', 
                           predio = '$predio', 
                           num_ap = '$num_ap', 
                           id_cidade = '$id_cidade', 
                           id_bairro = '$id_bairro', 
                           endereco = '$endereco', 
                           descricao_destaque = '$descricao_destaque',
                           destaque_dia = '$destaque_dia', 
                           area_total_terreno = '$area_total_terreno', 
                           area_construida = '$area_construida', 
                           distancia_mar = '$distancia_mar', 
                           frente_mar = '$frente_mar',
                           
                           dormitorio = '$dormitorio',
                           suite = '$suite',
                           sala = '$sala', 
                           cozinha = '$cozinha',
                           banheiro = '$banheiro',
                           lavabo = '$lavabo',
                           lavanderia = '$lavanderia',
                           dep_empregada = '$dep_empregada',
                           edicula = '$edicula',
                           vagas_garagem = '$vagas_garagem',
                           opcional = '$opcionaislist',

                           moeda = '$moeda',
                           valor_venda = '$valor_venda',
                           valor_entrada = '$valor_entrada',
                           qtde_parcelas = '$qtde_parcelas',
                           valor_parcela = '$valor_parcela',
                           valor_intermediarias = '$valor_intermediarias',
                           valor_condominio = '$valor_condominio',
                           mostrar_valores = '$mostrar_valores',

                           acomodacoes = '$acomodacoes',
                           aluguel_mensal = '$aluguel_mensal',
                           aluguel_anual = '$aluguel_anual',
                           aluguel_reveillon = '$aluguel_reveillon',
                           aluguel_carnaval = '$aluguel_carnaval',
                           aluguel_temporada = '$aluguel_temporada',
                           aluguel_pacote = '$aluguel_pacote',
                           observacoes = '$observacoes',
                           chave_com = '$chave_com',

                           documento_posse = '$documento_posse', 
                           planta_aprovada = '$planta_aprovada', 
                           escritura_definitiva = '$escritura_definitiva', 
                           desmembrado = '$desmembrado', 
                           habitese = '$habitese', 
                           documentacao_imovel = '$documentacao_imovel', 
                           registro = '$registro', 
                           matricula = '$matricula', 
                           comarca = '$comarca',
                           estado = '$estado', 
                           cadastrado_sob = '$cadastrado_sob',".

                           $fotos.

                          "prop_nome = '$prop_nome', 
                           prop_nacionalidade = '$prop_nacionalidade', 
                           prop_cpf = '$prop_cpf', 
                           prop_rg = '$prop_rg', 
                           prop_dtnascimento = '$prop_dtnascimento', 
                           prop_estadocivil = '$prop_estadocivil', 
                           prop_conjuge = '$prop_conjuge', 
                           prop_endereco = '$prop_endereco', 
                           prop_cidade = '$prop_cidade', 
                           prop_estado = '$prop_estado', 
                           prop_cep = '$prop_cep', 
                           prop_residencial = '$prop_residencial', 
                           prop_celular = '$prop_celular', 
                           prop_comercial = '$prop_comercial', 
                           prop_fax = '$prop_fax', 
                           prop_email = '$prop_email', 
                           prop_indisponivel = '$prop_indisponivel', 
                           prop_senha = '$prop_senha',

                           changed_id_user = $id_user,
                           changed_date = Now()
                    WHERE  id_subscriber = $id_subscriber AND
                           id = $id";

        } else {
            $sql = "INSERT INTO propriedades 
                    SET id_subscriber = $id_subscriber,
                        id_imobiliaria = $id_imobiliaria, 
                        operacao = '$operacoeslist', 
                        tipo = '$tipoImoveislist', 
                        predio = '$predio', 
                        num_ap = '$num_ap', 
                        id_cidade = '$id_cidade', 
                        id_bairro = '$id_bairro', 
                        endereco = '$endereco', 
                        descricao_destaque = '$descricao_destaque',
                        destaque_dia = '$destaque_dia', 
                        area_total_terreno = '$area_total_terreno', 
                        area_construida = '$area_construida', 
                        distancia_mar = '$distancia_mar', 
                        frente_mar = '$frente_mar',
                       
                        dormitorio = '$dormitorio',
                        suite = '$suite',
                        sala = '$sala', 
                        cozinha = '$cozinha',
                        banheiro = '$banheiro',
                        lavabo = '$lavabo',
                        lavanderia = '$lavanderia',
                        dep_empregada = '$dep_empregada',
                        edicula = '$edicula',
                        vagas_garagem = '$vagas_garagem',
                        opcional = '$opcionaislist', 

                        moeda = '$moeda',
                        valor_venda = '$valor_venda',
                        valor_entrada = '$valor_entrada',
                        qtde_parcelas = '$qtde_parcelas',
                        valor_parcela = '$valor_parcela',
                        valor_intermediarias = '$valor_intermediarias',
                        valor_condominio = '$valor_condominio',
                        mostrar_valores = '$mostrar_valores',

                        acomodacoes = '$acomodacoes',
                        aluguel_mensal = '$aluguel_mensal',
                        aluguel_anual = '$aluguel_anual',
                        aluguel_reveillon = '$aluguel_reveillon',
                        aluguel_carnaval = '$aluguel_carnaval',
                        aluguel_temporada = '$aluguel_temporada',
                        aluguel_pacote = '$aluguel_pacote',
                        observacoes = '$observacoes',
                        chave_com = '$chave_com',

                        documento_posse = '$documento_posse', 
                        planta_aprovada = '$planta_aprovada', 
                        escritura_definitiva = '$escritura_definitiva', 
                        desmembrado = '$desmembrado', 
                        habitese = '$habitese', 
                        documentacao_imovel = '$documentacao_imovel', 
                        registro = '$registro', 
                        matricula = '$matricula', 
                        comarca = '$comarca',
                        estado = '$estado', 
                        cadastrado_sob = '$cadastrado_sob',".

                        $fotos.

                       "prop_nome = '$prop_nome', 
                        prop_nacionalidade = '$prop_nacionalidade', 
                        prop_cpf = '$prop_cpf', 
                        prop_rg = '$prop_rg', 
                        prop_dtnascimento = '$prop_dtnascimento', 
                        prop_estadocivil = '$prop_estadocivil', 
                        prop_conjuge = '$prop_conjuge', 
                        prop_endereco = '$prop_endereco', 
                        prop_cidade = '$prop_cidade', 
                        prop_estado = '$prop_estado', 
                        prop_cep = '$prop_cep', 
                        prop_residencial = '$prop_residencial', 
                        prop_celular = '$prop_celular', 
                        prop_comercial = '$prop_comercial', 
                        prop_fax = '$prop_fax', 
                        prop_email = '$prop_email', 
                        prop_indisponivel = '$prop_indisponivel', 
                        prop_senha = '$prop_senha',

                        created_id_user = $id_user,
                        created_date = Now()";
        }

        $sql = $this->db->query($sql);
        if ($id == 0) {
            $id = $this->db->lastInsertId();
        }

        return $id; 
    }

    public function delete($id_subscriber, $id) {
        $sql = "DELETE FROM propriedades
                WHERE id_subscriber = $id_subscriber AND
                      id = $id";
        $this->db->query($sql);
    }
    
    public function getPropriedadesForReport($id_subscriber,$id,$id_bairro,$tipo,$destaque_dia,$prop_indisponivel,$vendidos,$avenda,$locacao) {
        $data = array();

        $sql = "SELECT u.*, b.name as bairro
                FROM   propriedades u
                  LEFT JOIN bairros b ON b.id = u.id_bairro
                WHERE ";

        $where = array();
        $where[] = "u.id_subscriber = $id_subscriber"; 

        if(!empty($id)) {
          $where[] = "u.id = '$id'"; 
        }

        if(!empty($id_bairro)) {
          $where[] = "u.id_bairro = '$id_bairro'"; 
        }

        if(!empty($tipo)) {
          $where[] = "u.tipo like '$tipo'"; 
        }

        if(!empty($destaque_dia) && $destaque_dia == 'S') {
          $where[] = "u.destaque_dia = '$destaque_dia'"; 
        }

        if(!empty($prop_indisponivel) && $prop_indisponivel == 'S') {
          $where[] = "u.prop_indisponivel = 'S'"; 
        }

        if(!empty($vendidos) && $vendidos == 'S') {
          $where[] = " u.prop_indisponivel = '$vendidos'"; 
        }

        if(!empty($avenda) && $avenda == 'S') {
          $where[] = "u.valor_venda > 0"; 
        }

        if(!empty($locacao) && $locacao == 'S') {
          $where[] = " (u.aluguel_mensal > 0 OR u.aluguel_anual > 0 OR u.aluguel_reveillon > 0 OR u.aluguel_temporada > 0 OR u.aluguel_carnaval > 0 OR u.aluguel_pacote > 0) "; 
        }

        $sql .= implode(" AND ", $where);

        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
        }        

        return $data;
    }

    public function excluiFoto($id_subscriber, $id, $field) {
        $sql = "UPDATE propriedades SET ".$field." = ''
                WHERE  id_subscriber = $id_subscriber AND
                       id = $id";
        $this->db->query($sql);      
        return 'true';
    }

    public function setPostId($id_subscriber, $id, $post_id) {
        $sql = "UPDATE propriedades 
                SET    post_id = '$post_id'
                WHERE  id_subscriber = $id_subscriber AND
                       id = $id";
        $this->db->query($sql);      
        return 'true';
    }

}
