<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        if (count($domainparam) > 0):
            $rowParam = $domainparam;
        endif;

        if (count($landing) > 0):
            $row = $landing;
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
        <title><?php echo $row->ld_title ?></title>
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
                    <a href="<?php echo site_url(); ?>" class="surreal-logo surreal-logo-dark"><?php if (isset($rowParam->owner)) echo $rowParam->owner; ?></a>
                    <a href="<?php echo site_url('rahasia/about_us'); ?>" class="surreal-logo surreal-logo-dark">About Us</a>
                    <a href="#" class="mobile-menu-toggle"><i class="fa fa-bars"></i></a>        
                </nav>
            </header>
            <section class="teaser">                        
                <img class="img-responsive" src="<?php echo base_url(); ?>images/<?php echo $row->ld_image ?>">     
            </section>
        </div>    
        <div class="container">
            <section class="marketing-author">
                <div class="col-xs-12 col-md-12">                      
                    <h1 class="text-center"><?php if (isset($row->ld_title)) echo $row->ld_title; ?></h1>
                    <h3 class="text-center"><?php if (isset($row->ld_content)) echo $row->ld_content; ?></h3>
                </div>
            </section>  
        </div>
        <section class="marketing-email">
            <!--                form here-->
            <?php
            $hiddenField = array(
                'ld_type' => $row->ld_type,
                'uid' => random_string('alnum', 10),
                'replyto' => $rowParam->email,
            );

            echo form_open('rahasia', '', $hiddenField);
            ?>
            <div class="input-group input-group-lg col-md-8 col-md-push-2">
                <span class="input-group-addon">Nama</span>
                <input type="text" name="nama" class="form-control" placeholder="Isikan dengan nama anda" autofocus required>            
            </div>         
            <br>
            <div class="input-group input-group-lg col-md-8 col-md-push-2">            
                <span class="input-group-addon">E-mail</span>
                <input type="text" name="email" class="form-control" placeholder="Alamat E-mail" required>            
            </div>
            <br>
            <div class="input-group input-group-lg col-md-8 col-md-push-2">
                <input id='next' name="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="Next"/>
            </div>
            <!--                end here-->
            <?php echo form_close(); ?>
            <?php echo validation_errors(); ?>
        </section>          
        <footer>
            <p class="text-center">Rahasia Sukses.com - 2014</p>      
        </footer>        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>        
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>        
    </body>
</html>