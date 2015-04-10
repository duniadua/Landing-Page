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
        <title>About Us</title>
        <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>css/bootstrap2.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/<?php echo $css ?>" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/fwa/css/font-awesome.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
    </head>
    <body>        
        <div class="container">
            <header>
                <nav class="container">
                    <a href="<?php echo site_url(); ?>" class="surreal-logo surreal-logo-dark"><?php if (isset($rowParam->owner)) echo $rowParam->owner; ?></a>
                    <a href="<?php echo site_url('rahasia/aboutus'); ?>" class="surreal-logo surreal-logo-dark">About Us</a>
                    <a href="#" class="mobile-menu-toggle"><i class="fa fa-bars"></i></a>        
                </nav>
            </header>
            <div class="thanks">
                <div class="panel panel-default">                    
                    <div class="col-xs-12 col-md-4">
                        <img class="img-responsive" src="<?php echo base_url(); ?>images/contact_us.jpg">
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <h2 class="page-header"><i class="fa fa-bullhorn"></i> About Us - <?php if(isset($rowParam->name)) echo $rowParam->name; ?></h2>
                        <address>
                            <strong>Pemilik <?php if(isset($rowParam->owner)) echo $rowParam->owner; ?></strong><br>
                            <i class="fa fa-twitter"></i> <?php if(isset($rowParam->twitter)) echo $rowParam->twitter; ?><br>
                            <i class="fa fa-facebook"></i> <?php if(isset($rowParam->fb)) echo $rowParam->fb; ?><br>
                            <i class="fa fa-envelope-o"></i> <?php if(isset($rowParam->email)) echo $rowParam->email; ?><br>
                            <abbr title="Phone"><i class="fa fa-phone"></i> Phone :</abbr> <?php if(isset($rowParam->phone)) echo $rowParam->phone; ?><br>
                            <abbr title="Phone"><i class="fa fa-mobile-phone"></i> PIN BB:</abbr> <?php if(isset($rowParam->pinbb)) echo $rowParam->pinbb; ?><br>
                        </address>
                        <p>Disclimer:</p>
                        <p>Website ini tidak akan menyebarkan alamat email kepada pihak lain, ect..</p>
                    </div>
                </div>
            </div>                        
        </div>                   
        <footer>
            <p class="text-center">Rahasia Sukses.com - 2014</p>      
        </footer>        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>        
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>        
    </body>
</html>