<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);

class propriedadesController extends controller {
    
    public function __construct() {
        parent::__construct();

        $users = new Users();
        if ($users->isLogged() == false) {
            header("Location: ".BASE_URL."/login");
        }
    }

    public function index() {
        $data = array();

        $users = new Users();
        $users->setLoggedUser();
        $subscriber = new Subscribers($users->getSubscriber());

        $data['subscriber_name'] = $subscriber->getName();
        $data['user_name'] = $users->getName();
        $data["has_propriedades_add"] = $users->hasPermission('propriedades_add');
        $data["has_propriedades_edit"] = $users->hasPermission('propriedades_edit');

        if ($users->hasPermission('propriedades')) {
            $offiset = 0; 
            
            $data['pagina'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['pagina'] = intval($_GET['p']);
                if ($data['pagina'] == '0') {
                    $data['pagina'] = 1;
                }
            }

            $offiset = (10 * ($data['pagina']-1));

            $propriedades = new Propriedades();
            $data["propriedades_list"] = $propriedades->getList($users->getSubscriber(), $offiset);

            $data["propriedades_count"] = $propriedades->getCount($users->getSubscriber());
            $data["paginas_count"] = ceil( $data["propriedades_count"] / 10 );

            $this->loadTamplate('propriedades', $data);
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

    public function add() {
        $data = array();

        $users = new Users();
        $users->setLoggedUser();
        $subscriber = new Subscribers($users->getSubscriber());

        $data['subscriber_name'] = $subscriber->getName();
        $data['user_name'] = $users->getName();

        if ($users->hasPermission('propriedades') && $users->hasPermission('propriedades_add')) {
            $imobiliarias = new Imobiliarias();
            $data["imobiliarias_list"] = $imobiliarias->getList($users->getSubscriber(), -1);
            $operacoes = new Operacoes();
            $data["operacoes_list"] = $operacoes->getList($users->getSubscriber(), -1);
            $tipoImoveis = new TipoImoveis();
            $data["tipoImoveis_list"] = $tipoImoveis->getList($users->getSubscriber(), -1);
            $cidades = new Cidades();
            $data["cidades_list"] = $cidades->getList($users->getSubscriber(), -1);
            $bairros = new Bairros();
            $data["bairros_list"] = $bairros->getList($users->getSubscriber(), -1);
            $opcionais = new Opcionais();
            $data["opcionais_list"] = $opcionais->getList($users->getSubscriber(), -1);

            if (isset($_POST['id_imobiliaria'])) {
                $id_imobiliaria = addslashes($_POST['id_imobiliaria']);
                if (isset($_POST['operacoes'])) {
                    $operacoeslist = $_POST['operacoes'];
                } else {
                    $operacoeslist = [];
                }
                if (isset($_POST['tipoImoveis'])) {
                    $tipoImoveislist = $_POST['tipoImoveis'];
                } else {
                    $tipoImoveislist = [];
                }
                $predio = addslashes($_POST['predio']);
                $num_ap = addslashes($_POST['num_ap']);
                $id_cidade = addslashes($_POST['id_cidade']);
                $id_bairro = addslashes($_POST['id_bairro']);
                $endereco = addslashes($_POST['endereco']);
                $descricao_destaque = addslashes($_POST['descricao_destaque']);
                $destaque_dia = 'N';
                if (isset($_POST['destaque_dia'])) {
                    $destaque_dia = addslashes($_POST['destaque_dia']);
                }
                $area_total_terreno = addslashes($_POST['area_total_terreno']);
                $area_construida = addslashes($_POST['area_construida']);
                $distancia_mar = addslashes($_POST['distancia_mar']);
                $frente_mar = 'N';
                if (isset($_POST['frente_mar'])) {
                    $frente_mar = addslashes($_POST['frente_mar']);
                }

                $dormitorio = addslashes($_POST['dormitorio']);
                $suite = addslashes($_POST['suite']);
                $sala = addslashes($_POST['sala']);
                $cozinha = addslashes($_POST['cozinha']);
                $banheiro = addslashes($_POST['banheiro']);
                $lavabo = addslashes($_POST['lavabo']);
                $lavanderia = addslashes($_POST['lavanderia']);
                $dep_empregada = addslashes($_POST['dep_empregada']);
                $edicula = addslashes($_POST['edicula']);
                $vagas_garagem = addslashes($_POST['vagas_garagem']);   
                if (isset($_POST['opcionais'])) {
                    $opcionaislist = $_POST['opcionais'];
                } else {
                    $opcionaislist = [];
                }

                $moeda = addslashes($_POST['moeda']);
                $valor_venda = addslashes($_POST['valor_venda']);
                $valor_entrada = addslashes($_POST['valor_entrada']);
                $qtde_parcelas = addslashes($_POST['qtde_parcelas']);
                $valor_parcela = addslashes($_POST['valor_parcela']);
                $valor_intermediarias = addslashes($_POST['valor_intermediarias']);
                $valor_condominio = addslashes($_POST['valor_condominio']);
                $mostrar_valores = 'N';
                if (isset($_POST['mostrar_valores'])) {
                    $mostrar_valores = addslashes($_POST['mostrar_valores']);
                }

                $acomodacoes = addslashes($_POST['acomodacoes']);
                $aluguel_mensal = addslashes($_POST['aluguel_mensal']);
                $aluguel_anual = addslashes($_POST['aluguel_anual']);
                $aluguel_reveillon = addslashes($_POST['aluguel_reveillon']);
                $aluguel_carnaval = addslashes($_POST['aluguel_carnaval']);
                $aluguel_temporada = addslashes($_POST['aluguel_temporada']);
                $aluguel_pacote = addslashes($_POST['aluguel_pacote']);
                $observacoes = addslashes($_POST['observacoes']);
                $chave_com = addslashes($_POST['chave_com']);

                $documento_posse = 'N';
                if (isset($_POST['documento_posse'])) {
                    $documento_posse = addslashes($_POST['documento_posse']);
                }
                $planta_aprovada = 'N';
                if (isset($_POST['planta_aprovada'])) {
                    $planta_aprovada = addslashes($_POST['planta_aprovada']);
                }
                $escritura_definitiva = 'N';
                if (isset($_POST['escritura_definitiva'])) {
                    $escritura_definitiva = addslashes($_POST['escritura_definitiva']);
                }
                $desmembrado = 'N';
                if (isset($_POST['desmembrado'])) {
                    $desmembrado = addslashes($_POST['desmembrado']);
                }
                $habitese = 'N';
                if (isset($_POST['habitese'])) {
                    $habitese = addslashes($_POST['habitese']);
                }
                $documentacao_imovel = addslashes($_POST['documentacao_imovel']);
                $registro = addslashes($_POST['registro']);
                $matricula = addslashes($_POST['matricula']);
                $comarca = addslashes($_POST['comarca']);
                $estado = addslashes($_POST['estado']);
                $cadastrado_sob = addslashes($_POST['cadastrado_sob']);

                $prop_nome = addslashes($_POST['prop_nome']);
                $prop_nacionalidade = addslashes($_POST['prop_nacionalidade']);
                $prop_cpf = addslashes($_POST['prop_cpf']);
                $prop_rg = addslashes($_POST['prop_rg']);
                $prop_dtnascimento = addslashes($_POST['prop_dtnascimento']);
                $prop_estadocivil = addslashes($_POST['prop_estadocivil']);
                $prop_conjuge = addslashes($_POST['prop_conjuge']);
                $prop_endereco = addslashes($_POST['prop_endereco']);
                $prop_cidade = addslashes($_POST['prop_cidade']);
                $prop_estado = addslashes($_POST['prop_estado']);
                $prop_cep = addslashes($_POST['prop_cep']);
                $prop_residencial = addslashes($_POST['prop_residencial']);
                $prop_celular = addslashes($_POST['prop_celular']);
                $prop_comercial = addslashes($_POST['prop_comercial']);
                $prop_fax = addslashes($_POST['prop_fax']);
                $prop_email = addslashes($_POST['prop_email']);
                $prop_indisponivel = 'N';
                if (isset($_POST['prop_indisponivel'])) {
                    $prop_indisponivel = addslashes($_POST['prop_indisponivel']);
                }
                $prop_senha = 'N';
                if (isset($_POST['prop_senha'])) {
                    $prop_senha = addslashes($_POST['prop_senha']);
                }

                $propriedades = new Propriedades();
                $id = $propriedades->add($users->getSubscriber(), 0, $id_imobiliaria, $operacoeslist, $tipoImoveislist, $predio, $num_ap, $id_cidade, $id_bairro, $endereco, $descricao_destaque, $destaque_dia, $area_total_terreno, $area_construida, $distancia_mar, $frente_mar, $dormitorio, $suite, $sala, $cozinha, $banheiro, $lavabo, $lavanderia, $dep_empregada, $edicula, $vagas_garagem, $opcionaislist, $moeda, $valor_venda, $valor_entrada, $qtde_parcelas, $valor_parcela, $valor_intermediarias, $valor_condominio, $mostrar_valores, $acomodacoes, $aluguel_mensal, $aluguel_anual, $aluguel_reveillon, $aluguel_carnaval, $aluguel_temporada, $aluguel_pacote, $observacoes, $chave_com, $documento_posse, $planta_aprovada, $escritura_definitiva, $desmembrado, $habitese, $documentacao_imovel, $registro, $matricula, $comarca, $estado, $cadastrado_sob, $prop_nome, $prop_nacionalidade, $prop_cpf, $prop_rg, $prop_dtnascimento, $prop_estadocivil, $prop_conjuge, $prop_endereco, $prop_cidade, $prop_estado, $prop_cep, $prop_residencial, $prop_celular, $prop_comercial, $prop_fax, $prop_email, $prop_indisponivel, $prop_senha);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/propriedades");
                }
            }

            $this->loadTamplate('/propriedades/propriedades_add', $data);
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

    public function edit($id) {
        $data = array();

        $users = new Users();
        $users->setLoggedUser();
        $subscriber = new Subscribers($users->getSubscriber());

        $data['subscriber_name'] = $subscriber->getName();
        $data['user_name'] = $users->getName();

        if ($users->hasPermission('propriedades') && $users->hasPermission('propriedades_edit')) {
            $propriedades = new Propriedades();
            $data['data'] = $propriedades->getData($users->getSubscriber(), $id);
            $imobiliarias = new Imobiliarias();
            $data["imobiliarias_list"] = $imobiliarias->getList($users->getSubscriber(), -1);
            $operacoes = new Operacoes();
            $data["operacoes_list"] = $operacoes->getList($users->getSubscriber(), -1);
            $tipoImoveis = new TipoImoveis();
            $data["tipoImoveis_list"] = $tipoImoveis->getList($users->getSubscriber(), -1);
            $cidades = new Cidades();
            $data["cidades_list"] = $cidades->getList($users->getSubscriber(), -1);
            $bairros = new Bairros();
            $data["bairros_list"] = $bairros->getList($users->getSubscriber(), -1);
            $opcionais = new Opcionais();
            $data["opcionais_list"] = $opcionais->getList($users->getSubscriber(), -1);            

            if (isset($_POST['id_imobiliaria'])) {
                $id_imobiliaria = addslashes($_POST['id_imobiliaria']);
                if (isset($_POST['operacoes'])) {
                    $operacoeslist = $_POST['operacoes'];
                } else {
                    $operacoeslist = [];
                }
                if (isset($_POST['tipoImoveis'])) {
                    $tipoImoveislist = $_POST['tipoImoveis'];
                } else {
                    $tipoImoveislist = [];
                }
                $predio = addslashes($_POST['predio']);
                $num_ap = addslashes($_POST['num_ap']);
                $id_cidade = addslashes($_POST['id_cidade']);
                $id_bairro = addslashes($_POST['id_bairro']);
                $endereco = addslashes($_POST['endereco']);
                $descricao_destaque = addslashes($_POST['descricao_destaque']);
                $destaque_dia = 'N';
                if (isset($_POST['destaque_dia'])) {
                    $destaque_dia = addslashes($_POST['destaque_dia']);
                }
                $area_total_terreno = addslashes($_POST['area_total_terreno']);
                $area_construida = addslashes($_POST['area_construida']);
                $distancia_mar = addslashes($_POST['distancia_mar']);
                $frente_mar = 'N';
                if (isset($_POST['frente_mar'])) {
                    $frente_mar = addslashes($_POST['frente_mar']);
                }

                $dormitorio = addslashes($_POST['dormitorio']);
                $suite = addslashes($_POST['suite']);
                $sala = addslashes($_POST['sala']);
                $cozinha = addslashes($_POST['cozinha']);
                $banheiro = addslashes($_POST['banheiro']);
                $lavabo = addslashes($_POST['lavabo']);
                $lavandeira = addslashes($_POST['lavandeira']);
                $dep_empregada = addslashes($_POST['dep_empregada']);
                $edicula = addslashes($_POST['edicula']);
                $vagas_garagem = addslashes($_POST['vagas_garagem']);   
                if (isset($_POST['opcionais'])) {
                    $opcionaislist = $_POST['opcionais'];
                } else {
                    $opcionaislist = [];
                }

                $moeda = addslashes($_POST['moeda']);
                $valor_venda = addslashes($_POST['valor_venda']);
                $valor_entrada = addslashes($_POST['valor_entrada']);
                $qtde_parcelas = addslashes($_POST['qtde_parcelas']);
                $valor_parcela = addslashes($_POST['valor_parcela']);
                $valor_intermediarias = addslashes($_POST['valor_intermediarias']);
                $valor_condominio = addslashes($_POST['valor_condominio']);
                $mostrar_valores = 'N';
                if (isset($_POST['mostrar_valores'])) {
                    $mostrar_valores = addslashes($_POST['mostrar_valores']);
                }

                $acomodacoes = addslashes($_POST['acomodacoes']);
                $aluguel_mensal = addslashes($_POST['aluguel_mensal']);
                $aluguel_anual = addslashes($_POST['aluguel_anual']);
                $aluguel_reveillon = addslashes($_POST['aluguel_reveillon']);
                $aluguel_carnaval = addslashes($_POST['aluguel_carnaval']);
                $aluguel_temporada = addslashes($_POST['aluguel_temporada']);
                $aluguel_pacote = addslashes($_POST['aluguel_pacote']);
                $observacoes = addslashes($_POST['observacoes']);
                $chave_com = addslashes($_POST['chave_com']);

                $documento_posse = 'N';
                if (isset($_POST['documento_posse'])) {
                    $documento_posse = addslashes($_POST['documento_posse']);
                }
                $planta_aprovada = 'N';
                if (isset($_POST['planta_aprovada'])) {
                    $planta_aprovada = addslashes($_POST['planta_aprovada']);
                }
                $escritura_definitiva = 'N';
                if (isset($_POST['escritura_definitiva'])) {
                    $escritura_definitiva = addslashes($_POST['escritura_definitiva']);
                }
                $desmembrado = 'N';
                if (isset($_POST['desmembrado'])) {
                    $desmembrado = addslashes($_POST['desmembrado']);
                }
                $habitese = 'N';
                if (isset($_POST['habitese'])) {
                    $habitese = addslashes($_POST['habitese']);
                }
                $documentacao_imovel = addslashes($_POST['documentacao_imovel']);
                $registro = addslashes($_POST['registro']);
                $matricula = addslashes($_POST['matricula']);
                $comarca = addslashes($_POST['comarca']);
                $estado = addslashes($_POST['estado']);
                $cadastrado_sob = addslashes($_POST['cadastrado_sob']);

                $prop_nome = addslashes($_POST['prop_nome']);
                $prop_nacionalidade = addslashes($_POST['prop_nacionalidade']);
                $prop_cpf = addslashes($_POST['prop_cpf']);
                $prop_rg = addslashes($_POST['prop_rg']);
                $prop_dtnascimento = addslashes($_POST['prop_dtnascimento']);
                $prop_estadocivil = addslashes($_POST['prop_estadocivil']);
                $prop_conjuge = addslashes($_POST['prop_conjuge']);
                $prop_endereco = addslashes($_POST['prop_endereco']);
                $prop_cidade = addslashes($_POST['prop_cidade']);
                $prop_estado = addslashes($_POST['prop_estado']);
                $prop_cep = addslashes($_POST['prop_cep']);
                $prop_residencial = addslashes($_POST['prop_residencial']);
                $prop_celular = addslashes($_POST['prop_celular']);
                $prop_comercial = addslashes($_POST['prop_comercial']);
                $prop_fax = addslashes($_POST['prop_fax']);
                $prop_email = addslashes($_POST['prop_email']);
                $prop_indisponivel = 'N';
                if (isset($_POST['prop_indisponivel'])) {
                    $prop_indisponivel = addslashes($_POST['prop_indisponivel']);
                }
                $prop_senha = 'N';
                if (isset($_POST['prop_senha'])) {
                    $prop_senha = addslashes($_POST['prop_senha']);
                }

                $propriedades = new Propriedades();
                $id = $propriedades->add($users->getSubscriber(), $id, $id_imobiliaria, $operacoeslist, $tipoImoveislist, $predio, $num_ap, $id_cidade, $id_bairro, $endereco, $descricao_destaque, $destaque_dia, $area_total_terreno, $area_construida, $distancia_mar, $frente_mar, $dormitorio, $suite, $sala, $cozinha, $banheiro, $lavabo, $lavandeira, $dep_empregada, $edicula, $vagas_garagem, $opcionaislist, $moeda, $valor_venda, $valor_entrada, $qtde_parcelas, $valor_parcela, $valor_intermediarias, $valor_condominio, $mostrar_valores, $acomodacoes, $aluguel_mensal, $aluguel_anual, $aluguel_reveillon, $aluguel_carnaval, $aluguel_temporada, $aluguel_pacote, $observacoes, $chave_com, $documento_posse, $planta_aprovada, $escritura_definitiva, $desmembrado, $habitese, $documentacao_imovel, $registro, $matricula, $comarca, $estado, $cadastrado_sob, $prop_nome, $prop_nacionalidade, $prop_cpf, $prop_rg, $prop_dtnascimento, $prop_estadocivil, $prop_conjuge, $prop_endereco, $prop_cidade, $prop_estado, $prop_cep, $prop_residencial, $prop_celular, $prop_comercial, $prop_fax, $prop_email, $prop_indisponivel, $prop_senha);
                if ($id > 0) {
                    header("Location: ".BASE_URL."/propriedades");
                }
            }

            $this->loadTamplate('/propriedades/propriedades_edit', $data);
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

    public function delete($id) {
        $data = array();

        $users = new Users();
        $users->setLoggedUser();
        $subscriber = new Subscribers($users->getSubscriber());

        $data['subscriber_name'] = $subscriber->getName();
        $data['user_name'] = $users->getName();

        if ($users->hasPermission('propriedades') && $users->hasPermission('propriedades_delete')) {
            $propriedades = new Propriedades();
            $propriedades->delete($users->getSubscriber(), $id);

            header("Location: ".BASE_URL."/propriedades");
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

    public function sinc($id) {
        $data = array();

        $users = new Users();
        $users->setLoggedUser();
        $subscriber = new Subscribers($users->getSubscriber());

        $data['subscriber_name'] = $subscriber->getName();
        $data['user_name'] = $users->getName();

        if ($users->hasPermission('propriedades') && $users->hasPermission('propriedades_sinc')) {
            $sincWp = new SincWp();
            $sincWp->sincnow($users->getSubscriber(), $id);

            header("Location: ".BASE_URL."/propriedades");
        } else {
            $this->loadTamplate('nopermission', $data);
        }
    }

    
}
