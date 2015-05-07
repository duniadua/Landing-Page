<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        if (count($domainparam) > 0):
            $rowParam = $domainparam;
        endif;       
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php if (isset($rowParam->name)) echo $rowParam->name; ?></title>
        <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>css/bootstrap2.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/rahasia-style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>font-awesome-4.2.0/css/font-awesome.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
    </head>
    <body>
        <div class="container">
            <header>
                <nav class="container">
                    <a href="/" class="surreal-logo surreal-logo-dark"><?php if (isset($rowParam->owner)) echo $rowParam->owner; ?></a>
                    <a href="#" class="mobile-menu-toggle"><i class="fa fa-bars"></i></a>        
                </nav>
            </header>
            <section class="teaser">                                        
            </section>
        </div>    
        <div class="container">
            <section class="marketing-author bg-pale">
                <div class="col-xs-12 col-md-12">                      
                    <h3 class="text-center">Terima Kasih Anda Telah <?php echo $pesan?></h3>                    
                </div>
            </section>  
        </div>             
        <footer>
            <p class="text-center">Rahasia Sukses.com - 2014</p>      
        </footer>        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>        
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>        
    </body>
</html>