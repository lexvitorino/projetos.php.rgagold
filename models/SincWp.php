<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);

class SincWp extends model {

    private $wp_prefix = "";
    private $wp_autor = 0;
    private $wp_url = "";

    private $novo = false; 

    public function __construct() {
        parent::__construct();
    }

    public function sincnow($id_subscriber, $id_propriedade) {
        
        /* Crrega os dados da propriedade */
        $propriedades = new Propriedades();
        $propriedade = $propriedades->getData($id_subscriber, $id_propriedade);
        
        /* Cria as variaveis em relação a propriedade */
        $post_id = $propriedade['post_id'];
        $id = $propriedade['id'];
        $predio = $propriedade['predio'];
        $valor = ($propriedade['valor_venda']>0)?$propriedade['valor_venda']:$propriedade['aluguel_mensal'];
        $textoValor = ($propriedade['valor_venda']>0)?'Venda':'Locação';
        $dormitorio = $propriedade['dormitorio'];
        $banheiro = $propriedade['banheiro'];
        $vagas_garagem = $propriedade['vagas_garagem'];
        $endereco = $propriedade['endereco'].", ".$propriedade['num_ap']." - ".$propriedade['bairro']." - ".$propriedade['cidade'];
        $area_total_terreno = $propriedade['area_total_terreno'];
        $foto1 = $propriedade['foto1'];
        $foto2 = $propriedade['foto2'];
        $foto3 = $propriedade['foto3'];
        $foto4 = $propriedade['foto4'];
        $foto5 = $propriedade['foto5'];
        $foto6 = $propriedade['foto6'];
        $foto7 = $propriedade['foto7'];
        $foto8 = $propriedade['foto8'];
        $foto9 = $propriedade['foto9'];
        $foto10 = $propriedade['foto10'];
        $foto11 = $propriedade['foto11'];
        $foto12 = $propriedade['foto12'];
        $foto13 = $propriedade['foto13'];
        $foto14 = $propriedade['foto14'];
        $foto15 = $propriedade['foto15'];
        $descricao_destaque = $propriedade['descricao_destaque']; 
        $destaque_dia = $propriedade['destaque_dia']; 
        $chaveBairro = $propriedade['chave_bairro']; 
        $opcional = $propriedade['opcional'];
        $tipo = $propriedade['tipo'];
        $operacao = $propriedade['operacao'];

        $opcionais = new Opcionais();
        $opcionais = $opcionais->getDataList($id_subscriber, $opcional);

        $tiposList = new TipoImoveis();
        $tiposList = $tiposList->getDataList($id_subscriber, $tipo);
        $chaveTipoImovel = $tiposList['chave'];

        $operacaoesList = new Operacoes();
        $operacaoesList = $operacaoesList->getDataList($id_subscriber, $operacao);
        $chaveOperacao = $operacaoesList['chave'];

        /* Carrega as configurações em relação a estrutura wordpress */
        $this->wp_prefix = $this->wpconfig['wp_prefix'];
        $this->wp_autor = $this->wpconfig['wp_autor'];
        $this->wp_url = $this->wpconfig['wp_url'];

        /* Cria ou atualiza o cabeçalho dos imóveis */
        $post_id = $this->setPosts($post_id, $predio, $descricao_destaque, false);
        $propriedades->setPostId($id_subscriber, $id_propriedade, $post_id); 

        /* Cria ou atualiza os dados do imóvel */
        $this->setPostmeta($post_id, 'REAL_HOMES_property_price', $valor);
        $this->setPostmeta($post_id, 'REAL_HOMES_property_price_postfix', $textoValor);
        $this->setPostmeta($post_id, 'REAL_HOMES_property_size', $area_total_terreno);
        $this->setPostmeta($post_id, 'REAL_HOMES_property_size_postfix', 'M2');
        $this->setPostmeta($post_id, 'REAL_HOMES_property_bedrooms', $dormitorio);
        $this->setPostmeta($post_id, 'REAL_HOMES_property_bathrooms', $banheiro);
        $this->setPostmeta($post_id, 'REAL_HOMES_property_garage', $vagas_garagem);
        $this->setPostmeta($post_id, 'REAL_HOMES_property_address', $endereco);
        $this->setPostmeta($post_id, 'REAL_HOMES_property_id', $id);
        $this->setPostmeta($post_id, 'REAL_HOMES_agent_display_option', 'none');
        $this->setPostmeta($post_id, 'REAL_HOMES_featured', ($destaque_dia=="S")?1:0);
        
        /* Envia as caracteristicas do imóvel */
        $this->setRelationships($post_id, $opcionais, 'property-feature');
        $this->setRelationships($post_id, $chaveBairro, 'property-city');
        $this->setRelationships($post_id, $chaveTipoImovel, 'property-type');
        $this->setRelationships($post_id, $chaveOperacao, 'property-status');

        /* Envia as fotos cadastradas na propriedade no wordpress */
        if ($this->novo) {
            $this->setPostmeta_Image($post_id, $foto1, true);
            $this->setPostmeta_Image($post_id, $foto2);
            $this->setPostmeta_Image($post_id, $foto3);
            $this->setPostmeta_Image($post_id, $foto4);
            $this->setPostmeta_Image($post_id, $foto5);
            $this->setPostmeta_Image($post_id, $foto6);
            $this->setPostmeta_Image($post_id, $foto7);
            $this->setPostmeta_Image($post_id, $foto8);
            $this->setPostmeta_Image($post_id, $foto9);
            $this->setPostmeta_Image($post_id, $foto10);
            $this->setPostmeta_Image($post_id, $foto11);
            $this->setPostmeta_Image($post_id, $foto12);
            $this->setPostmeta_Image($post_id, $foto13);
            $this->setPostmeta_Image($post_id, $foto14);
            $this->setPostmeta_Image($post_id, $foto15);
        }
    }

    public function setPosts($post_id, $post_title, $post_content, $isImage = false) {

        if ($isImage) {

            $sql = "INSERT INTO $this->wp_prefix"."posts"."    
                    SET post_author = ".$this->wp_autor.",
                        post_date = Now(), 
                        post_date_gmt = Now(), 
                        post_title = '$post_title',
                        post_status = 'inherit', 
                        comment_status = 'open', 
                        ping_status = 'closed', 
                        post_name = '$post_title', 
                        post_modified = NOW(),
                        post_modified_gmt = NOW(), 
                        post_type = 'attachment',
                        post_mime_type = 'image/jpeg',
                        comment_count = 0"; 
        } else {

            $this->novo = true;

            /* Valida se ainda existe o post cadastrado no wordpress */
            if ($post_id > 0) {
                $sql = "SELECT COUNT(*) as qtde 
                        FROM   $this->wp_prefix"."posts"."
                        WHERE  ID = $post_id";
                
                $sql = $this->wpdb->query($sql);
                $row = $sql->fetch();

                $this->novo = $row['qtde'] == 0;
                if ($this->novo) {
                    $post_id = 0;
                }
            }
        

            if (!$this->novo) {
                $sql = "UPDATE $this->wp_prefix"."posts"."    
                        SET post_author = ".$this->wp_autor.",
                            post_date = Now(), 
                            post_date_gmt = Now(), 
                            post_content = '$post_content',
                            post_title = '$post_title',
                            post_status = 'publish', 
                            comment_status = 'open', 
                            ping_status = 'close', 
                            post_modified = NOW(), 
                            post_type = 'property'
                        WHERE ID = $post_id";  
            } else {

                $sql = "INSERT INTO $this->wp_prefix"."posts"."    
                        SET post_author = ".$this->wp_autor.",
                            post_date = Now(), 
                            post_date_gmt = Now(), 
                            post_content = '$post_content',
                            post_title = '$post_title',
                            post_status = 'publish', 
                            comment_status = 'open', 
                            ping_status = 'close', 
                            post_modified = NOW(), 
                            post_type = 'property'";                            
            }
        }

        $sql = $this->wpdb->query($sql);
        
        if ($this->novo || $post_id == -1)
            $post_id = $this->wpdb->lastInsertId();

        if ($post_id > 0) {
            $sql = "UPDATE $this->wp_prefix"."posts"."
                    SET guid = '".$this->wp_url.$post_id."'
                    WHERE ID = ".$post_id; 
            $this->wpdb->query($sql);
        }

        return $post_id;
    }    

    public function setPostmeta($post_id, $campo, $valor, $onlykey = true) {

        $sql = "SELECT meta_id FROM ".$this->wp_prefix."postmeta"."
                WHERE post_id = $post_id
                AND   meta_key = '$campo'";

        if (!$onlykey) {
            $sql .= " AND meta_value = '$valor'";
        }       

        $this->debug($sql);        

        $sql = $this->wpdb->query($sql);
        $sql = $sql->fetch();

        $meta_id = $sql['meta_id'];
            
        if (isset($meta_id) && !empty($meta_id) && $meta_id > 0) {
            $sql = "UPDATE ".$this->wp_prefix."postmeta"."    
                    SET   meta_value = '$valor'
                    WHERE meta_id = $meta_id";

            $this->debug($sql);        


            $this->wpdb->query($sql);
        } else {
            $sql = "INSERT INTO ".$this->wp_prefix."postmeta"."    
                    SET post_id = $post_id,
                        meta_key = '$campo', 
                        meta_value = '$valor'";

            $this->debug($sql);        


            $this->wpdb->query($sql);
            $meta_id = $this->wpdb->lastInsertId();
        }

        return $meta_id;
    }

    public function setPostmeta_Image($post_id, $foto, $destacada = false) {
        
        $ano = date('Y');
        $mes = date('m');

        if (!empty($foto)) {
            
            /* Pega o nome da imagem*/
            $filename = explode(".", $foto)[0];

            /* Pega o tipo da imagem*/
            $filetype = explode(".", $foto)[1];

            /* Monta o campinho completo da imagem */
            $imageposfix = $ano."/".$mes."/".$filename.".".$filetype;

            /* Monta o nome das imagens a ser copiadas */
            $imageposfix150 = $ano."/".$mes."/".$filename."-150x150.".$filetype;
            $imageposfix300 = $ano."/".$mes."/".$filename."-300x169.".$filetype;
            $imageposfix1024 = $ano."/".$mes."/".$filename."-1024x577.".$filetype;
            $imageposfix850 = $ano."/".$mes."/".$filename."-850x570.".$filetype;
            $imageposfix600 = $ano."/".$mes."/".$filename."-660x600.".$filetype;
            $imageposfix220 = $ano."/".$mes."/".$filename."-220x220.".$filetype;

            /* Copia as imagens do sistema para o wordpress */
            copy("assets/specs/images/fotos/".$foto, "../wp-content/uploads/".$imageposfix);
            copy("assets/specs/images/fotos/".$foto, "../wp-content/uploads/".$imageposfix150);
            copy("assets/specs/images/fotos/".$foto, "../wp-content/uploads/".$imageposfix300);
            copy("assets/specs/images/fotos/".$foto, "../wp-content/uploads/".$imageposfix220);
            copy("assets/specs/images/fotos/".$foto, "../wp-content/uploads/".$imageposfix600);
            copy("assets/specs/images/fotos/".$foto, "../wp-content/uploads/".$imageposfix850);
            copy("assets/specs/images/fotos/".$foto, "../wp-content/uploads/".$imageposfix1024);            
            
            /* Cria o post com o nome da foto para aparecer na galeria */
            $post_id_image = $this->setPosts(-1, $filename, '', true);

            /* Relaciona da imagem criada com o post do imóvel */
            $this->setPostmeta($post_id, 'REAL_HOMES_property_images', $post_id_image, false);    

            /* Relaciona o post com a imagem principal enviada */
            $this->setPostmeta($post_id_image, '_wp_attached_file', $ano."/".$mes."/".$foto);

            /* Relaciona o post com as imagens geradas através do css */
            $this->setPostmeta($post_id_image, '_wp_attachment_metadata', "a:5:{s:5:".chr(34)."width".chr(34).";i:1920;s:6:".chr(34)."height".chr(34).";i:1082;s:4:".chr(34)."file".chr(34).";s:44:".chr(34).$imageposfix.chr(34).";s:5:".chr(34)."sizes".chr(34).";a:7:{s:9:".chr(34)."thumbnail".chr(34).";a:4:{s:4:".chr(34)."file".chr(34).";s:44:".chr(34).$filename."-150x150.".$filetype.chr(34).";s:5:".chr(34)."width".chr(34).";i:150;s:6:".chr(34)."height".chr(34).";i:150;s:9:".chr(34)."mime-type".chr(34).";s:10:".chr(34)."image/jpeg".chr(34).";}s:6:".chr(34)."medium".chr(34).";a:4:{s:4:".chr(34)."file".chr(34).";s:44:".chr(34).$filename."-300x169.".$filetype.chr(34).";s:5:".chr(34)."width".chr(34).";i:300;s:6:".chr(34)."height".chr(34).";i:169;s:9:".chr(34)."mime-type".chr(34).";s:10:".chr(34)."image/jpeg".chr(34).";}s:12:".chr(34)."medium_large".chr(34).";a:4:{s:4:".chr(34)."file".chr(34).";s:44:".chr(34).$filename."-768x433.".$filetype.chr(34).";s:5:".chr(34)."width".chr(34).";i:768;s:6:".chr(34)."height".chr(34).";i:433;s:9:".chr(34)."mime-type".chr(34).";s:10:".chr(34)."image/jpeg".chr(34).";}s:5:".chr(34)."large".chr(34).";a:4:{s:4:".chr(34)."file".chr(34).";s:45:".chr(34).$filename."-1024x577.".$filetype.chr(34).";s:5:".chr(34)."width".chr(34).";i:1024;s:6:".chr(34)."height".chr(34).";i:577;s:9:".chr(34)."mime-type".chr(34).";s:10:".chr(34)."image/jpeg".chr(34).";}s:14:".chr(34)."post-thumbnail".chr(34).";a:4:{s:4:".chr(34)."file".chr(34).";s:44:".chr(34).$filename."-850x570.".$filetype.chr(34).";s:5:".chr(34)."width".chr(34).";i:850;s:6:".chr(34)."height".chr(34).";i:570;s:9:".chr(34)."mime-type".chr(34).";s:10:".chr(34)."image/jpeg".chr(34).";}s:22:".chr(34)."inspiry-grid-thumbnail".chr(34).";a:4:{s:4:".chr(34)."file".chr(34).";s:44:".chr(34).$filename."-660x600.".$filetype.chr(34).";s:5:".chr(34)."width".chr(34).";i:660;s:6:".chr(34)."height".chr(34).";i:600;s:9:".chr(34)."mime-type".chr(34).";s:10:".chr(34)."image/jpeg".chr(34).";}s:23:".chr(34)."inspiry-agent-thumbnail".chr(34).";a:4:{s:4:".chr(34)."file".chr(34).";s:44:".chr(34).$filename."-220x220.".$filetype.chr(34).";s:5:".chr(34)."width".chr(34).";i:220;s:6:".chr(34)."height".chr(34).";i:220;s:9:".chr(34)."mime-type".chr(34).";s:10:".chr(34)."image/jpeg".chr(34).";}}s:10:".chr(34)."image_meta".chr(34).";a:12:{s:8:".chr(34)."aperture".chr(34).";s:4:".chr(34)."2.25".chr(34).";s:6:".chr(34)."credit".chr(34).";s:0:".chr(34)."".chr(34).";s:6:".chr(34)."camera".chr(34).";s:6:".chr(34)."XT1097".chr(34).";s:7:".chr(34)."caption".chr(34).";s:0:".chr(34)."".chr(34).";s:17:".chr(34)."created_timestamp".chr(34).";s:10:".chr(34)."1039348800".chr(34).";s:9:".chr(34)."copyright".chr(34).";s:0:".chr(34)."".chr(34).";s:12:".chr(34)."focal_length".chr(34).";s:5:".chr(34)."4.235".chr(34).";s:3:".chr(34)."iso".chr(34).";s:3:".chr(34)."250".chr(34).";s:13:".chr(34)."shutter_speed".chr(34).";s:7:".chr(34)."0.03333".chr(34).";s:5:".chr(34)."title".chr(34).";s:0:".chr(34)."".chr(34).";s:11:".chr(34)."orientation".chr(34).";s:1:".chr(34)."1".chr(34).";s:8:".chr(34)."keywords".chr(34).";a:0:{}}}");               
            
            if ($destacada) {

                /* Seta a imagem como destaca */
                $this->setPostmeta($post_id, '_thumbnail_id', $post_id_image);
            }
        }
    }
           
    /* Gera umarquivo de log dentro da pasta app/assets/logs/(dia) */        
    public function debug($data) {
        $hoje = date("Y_m_d");
        $arquivo = fopen("assets/logs/log_tarefa.".$hoje.".txt", "ab");

        $hora = date("H:i:s T");
        fwrite($arquivo, "[$hora] : " . $data . "\r\n");
        fclose($arquivo);
    }

    public function sincCaracteristicas($chave) {

        if (!is_int($chave)) {

            $this->wp_prefix = $this->wpconfig['wp_prefix'];

            $sql = "SELECT term_id FROM ".$this->wp_prefix."terms"."
                    WHERE slug = '$chave'";

            $sql = $this->wpdb->query($sql);
            if ($sql->rowCount() > 0) {

                $sql = $sql->fetch();
                return $sql['term_id'];
            } else {

                return 0;
            }
        }

        return 0;
    }

    public function setRelationships($post_id, $valor, $taxonomy) {

        if (!empty($valor)) {
            $sql = "DELETE FROM $this->wp_prefix"."term_relationships"."    
                    WHERE object_id = $post_id
                    AND   term_taxonomy_id in (SELECT term_taxonomy_id FROM $this->wp_prefix"."term_taxonomy WHERE taxonomy = '$taxonomy')"; 

            $sql = $this->wpdb->query($sql);        

            if (is_array($valor)) {
                
                foreach ($valor as $value) {
                    
                    $chave = intval($value['chave']);
                    if (is_int($chave) && $chave>0) {
                        
                        $sql = "INSERT INTO $this->wp_prefix"."term_relationships"."    
                                SET object_id = $post_id,
                                    term_taxonomy_id = $chave, 
                                    term_order = 0"; 

                        $sql = $this->wpdb->query($sql);
                    }
                }
            } else {

                $sql = "INSERT INTO $this->wp_prefix"."term_relationships"."    
                        SET object_id = $post_id,
                            term_taxonomy_id = $valor, 
                            term_order = 0"; 

                $sql = $this->wpdb->query($sql);
            }
        }

    }  

}
