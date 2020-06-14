
<!DOCTYPE html>
<html lang="en">
<head>

<!-- META TAGS -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
<meta name="author" content="SmartBox">

<!-- TITLE -->
<title>RivieraGold | Admin</title>

<!-- FAVICON -->
<link rel="shortcut icon" href="<?php echo BASE_URL; ?>/assets/theme/images/favicon.png">

<!-- STYLESHEETS -->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/theme/plugins/morris/morris.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/theme/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/theme/css/core.css" type="text/css" />
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/theme/css/components.css" type="text/css" />
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/theme/css/icons.css" type="text/css" />
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/theme/css/pages.css" type="text/css" />
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/theme/css/responsive.css" type="text/css" />
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/specs/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/specs/css/reports.css" type="text/css" />

<script src="<?php echo BASE_URL; ?>/assets/specs/js/jquery-3.1.0.min.js"></script>
<!-- MODERNIZER -->
<script src="<?php echo BASE_URL; ?>/assets/theme/js/modernizr.min.js"></script>
<script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>';</script>
<script src="<?php echo BASE_URL; ?>/assets/specs/js/script.js"></script>

</head>

<body class="fixed-left deshboard-first close-it">
<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <a href="javascript:void(0)" class="logo d-logo hidden-xs hidden-sm"></a> 
            <a href="javascript:void(0)" class="logo d-logo hidden visible-xs visible-sm">
                <img src="<?php echo BASE_URL; ?>/assets/theme/images/logo.jpg" alt="RivieraGold" class="img-responsive hidden-xs" height="0">
            </a> 
            <!-- Image Logo here --> 
        </div>
        
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="top-fix-navbar">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left waves-effect waves-light">
                        <i class="fa fa-outdent"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>
                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="dropdown top-menu-item-xs">
                            <a href="<?php echo BASE_URL.'/login/logout'; ?>" class="profile waves-light"><span class="user-name">Sair</span>
                            <span class="caret"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->
    
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li class="menu-title">Navegação</li>
                    <li style="<?php echo ($_SESSION['has_dashboard']==1)?'display: block':'display: none'; ?>"><a class="waves-effect" href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    <li style="<?php echo ($_SESSION['has_permissions']==1)?'display: block':'display: none'; ?>"><a href="<?php echo BASE_URL; ?>/permissions"><i class="fa fa-tasks"></i><span>Permissões</span></a></li>
                    <li style="<?php echo ($_SESSION['has_users']==1)?'display: block':'display: none'; ?>"><a href="<?php echo BASE_URL; ?>/users"><i class="fa fa-user"></i><span>Usuários</span></a></li>
                    <li class="text-muted menu-title">Cadastros</li>
                    <li style="<?php echo ($_SESSION['has_cidades']==1)?'display: block':'display: none'; ?>"><a href="<?php echo BASE_URL; ?>/cidades"><i class="fa fa-table"></i><span>Cidades</span></a></li>
                    <li style="<?php echo ($_SESSION['has_bairros']==1)?'display: block':'display: none'; ?>"><a href="<?php echo BASE_URL; ?>/bairros"><i class="fa fa-table"></i><span>Bairros</span></a></li>
                    <li style="<?php echo ($_SESSION['has_operacoes']==1)?'display: block':'display: none'; ?>"><a href="<?php echo BASE_URL; ?>/operacoes"><i class="fa fa-table"></i><span>Operações</span></a></li>
                    <li style="<?php echo ($_SESSION['has_tipo_imoveis']==1)?'display: block':'display: none'; ?>"><a href="<?php echo BASE_URL; ?>/tipoImoveis"><i class="fa fa-table"></i><span>Tipo de Imóveis</span></a></li>
                    <li style="<?php echo ($_SESSION['has_opcionais']==1)?'display: block':'display: none'; ?>"><a href="<?php echo BASE_URL; ?>/opcionais"><i class="fa fa-table"></i><span>Opicionais</span></a></li>
                    <li style="<?php echo ($_SESSION['has_imobiliarias']==1)?'display: block':'display: none'; ?>"><a href="<?php echo BASE_URL; ?>/imobiliarias"><i class="fa fa-table"></i><span>Imobiliarias</span></a></li>
                    <li style="<?php echo ($_SESSION['has_videos']==1)?'display: block':'display: none'; ?>"><a href="<?php echo BASE_URL; ?>/videos"><i class="fa fa-table"></i><span>Videos</span></a></li>
                    <li style="<?php echo ($_SESSION['has_propriedades']==1)?'display: block':'display: none'; ?>"><a href="<?php echo BASE_URL; ?>/propriedades"><i class="fa fa-file"></i><span>Propriedades</span></a></li>
                    <li class="text-muted menu-title">Relatórios</li>
                    <li style="<?php echo ($_SESSION['has_reports']==1)?'display: block':'display: none'; ?>"><a href="<?php echo BASE_URL; ?>/reports"><span>Relatórios</span></a></li>
                     
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    
    <div class="content-page ">
        <div class="content">
            <?php $this->loadViewInTamplate($viewName, $viewData); ?>
        </div>
        <footer class="footer text-right">
            &copy; 2017. Todos os direitos reservados.
        </footer>
    </div>
</div>
<!-- END wrapper -->
    
<!-- Page Loader --> 
<div class="page-loader">
    <a href="#"><img src="<?php echo BASE_URL; ?>/assets/theme/images/m-logo.png" class="img-responsive center-block" alt=""/></a>
    <span class="text-uppercase">Aguardando...</span>
</div>

<!-- SmartBox Js files --> 
<script>
       var resizefunc = [];
</script> 
    
<script src="<?php echo BASE_URL; ?>/assets/theme/js/jquery.min.js"></script> 
<script src="<?php echo BASE_URL; ?>/assets/theme/js/bootstrap.min.js"></script> 
<script src="<?php echo BASE_URL; ?>/assets/theme/js/pace.min.js"></script> 
<script src="<?php echo BASE_URL; ?>/assets/theme/js/loader.js"></script> 
<script src="<?php echo BASE_URL; ?>/assets/theme/js/detect.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/theme/js/fastclick.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/theme/js/waves.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/theme/js/wow.min.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/theme/js/jquery.slimscroll.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/theme/js/jquery.nicescroll.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/theme/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/theme/pages/jquery.todo.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/theme/plugins/moment/moment.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/theme/plugins/morris/morris.min.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/theme/plugins/raphael/raphael-min.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/theme/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/theme/pages/jquery.charts-sparkline.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/theme/js/jquery.app.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/theme/js/cb-chart.js"></script>

</body>
</html>