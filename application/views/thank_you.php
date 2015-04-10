<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        if (count($domainparam) > 0):
            $rowParam = $domainparam;
        endif;

        if (isset($row->ld_theme)):
            $css = $row->ld_theme;
        else:
            $css = "rahasia-style.css";
        endif;
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Terima Kasih</title>
        <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>css/bootstrap2.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/<?php echo $css ?>" rel="stylesheet">
        <link href="<?php echo base_url(); ?>font-awesome-4.2.0/css/font-awesome.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
    </head>
    <body>        
        <div class="container">
            <header>
                <nav class="container">
                    <a href="<?php echo site_url() ?>" class="surreal-logo surreal-logo-dark"><?php if (isset($rowParam->owner)) echo $rowParam->owner; ?></a>
                    <a href="<?php echo site_url('rahasia/aboutus'); ?>" class="surreal-logo surreal-logo-dark">About Us</a>
                    <a href="#" class="mobile-menu-toggle"><i class="fa fa-bars"></i></a>        
                </nav>
            </header>            
        </div>            
        <div class="thanks">
            <section class="marketing-author">
                <div class="col-xs-12 col-md-12">                      
                    <div class="col-xs-12 col-md-12">
                        <div class="panel panel-default">
                            <h1 class="text-center">Terima Kasih</h1>
                            <h2 class="text-center">Anda Telah Mendaftarkan alamat email anda</h2>
                            <h2 class="text-center">Sebuah e-mail konfirmasi telah menunggu anda</h2>                              
                            
                        </div>
                    </div>
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