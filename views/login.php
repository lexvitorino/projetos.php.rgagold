<html lang="en">
    <head>
        <!-- META TAGS -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="SmartBox">
        
        <!-- TITLE -->
        <title><?php echo $viewData['subscriber_name'] ?> | Login</title>
        
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

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- MODERNIZER -->
        <script src="<?php echo BASE_URL; ?>/assets/theme/js/modernizr.min.js"></script>
    </head>
    <body>
        <body class="loreg-page close-it">
        <!-- Begin page -->
        <div id="logreg-wrapper" class="text-center"> 
            <div class="container">
                <p class="lead">Bem vindo de volta</p>
                <p>Por favor entre com seu login</p>
            
                <form method="POST">
                    <div class="form-group">
                        <input type="text" name="login" placeholder="Login" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control" id="pwd">
                    </div>
                    <button type="submit" class="btn btn-success btn-md">Login</button>

                    <?php if(isset($error) && !empty($error)): ?>
                        <div class="alert_danger">
                            <?php echo $error; ?>;
                        </di>
                    <?php endif; ?>                    
                </form>
                
                <p class="copy">&copy; 2017. A&J<span>Solution</span></p>
            </div>
        </div>
        <!-- END wrapper --> 

        <!-- Page Loader --> 
        <div class="page-loader">
            <a href="#"><img src="<?php echo BASE_URL; ?>/assets/theme/images/logo-2.png" class="img-responsive center-block" alt=""/></a>
            <span class="text-uppercase">Loading...</span>
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
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
        <script src="<?php echo BASE_URL; ?>/assets/theme/js/jquery.app.js"></script> 
        <script src="<?php echo BASE_URL; ?>/assets/theme/js/cb-chart.js"></script>         
    </body>
</html>