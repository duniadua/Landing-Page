<!DOCTYPE HTML>
<html>
    <head>
        <?php
        if (count($domainparam) > 0):
            $rowParam = $domainparam;
        endif;
        if (isset($row->ld_theme)):
            $css = $row->ld_theme;
        else:
            $css = "style.css";
        endif;
        ?>
        <title>Terima Kasih</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="Dapatkan Ebok Gratis dengan mengisi nama anda" />
        <meta name="keywords" content="kesehatan,survey,hadiah,gratis,ebook,tips,artikel,bau mulut,atasi bau mulut," />
        <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
        <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/skel.min.js"></script>
        <script src="<?php echo base_url(); ?>js/init.js"></script>

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/skel.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style-wide.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
    </head>
    <body>

        <!-- Header -->
        <div id="header">
            <span class="logo icon fa fa-thumbs-up"></span>
            <h1>Terima Kasih</h1>
            <p>
                Anda Telah Mendaftarkan Alamat Email Anda
                <br />
                Sebuah E-mail Konfirmasi Telah Menunggu Anda</p>
            <br><br>
            <div class="container 75%">
                <ul class="icons">
                    <li><a href="<?php if (isset($rowParam->twitter)) echo site_url($rowParam->twitter); ?>" class="icon fa-twitter"><span class="label">Twitter</span></a > <?php if (isset($rowParam->twitter)) echo $rowParam->twitter; ?></li>
                    <li><a href="<?php if (isset($rowParam->fb)) echo site_url($rowParam->fb); ?>" class="icon fa-facebook"><span class="label">Facebook</span></a> <?php if (isset($rowParam->fb)) echo $rowParam->fb; ?></li>
                    <li><a href="#" class="icon fa-envelope-o"><span class="label">E-mail</span></a> <?php if (isset($rowParam->email)) echo $rowParam->email; ?></li>
                    <li><a href="#" class="icon fa-phone"><span class="label">Github</span></a> <?php if (isset($rowParam->phone)) echo $rowParam->phone; ?></li>
                    <li><a href="#" class="icon fa-whatsapp"><span class="label">Dribbble</span></a> <?php if (isset($rowParam->phone)) echo $rowParam->phone; ?></li>
                </ul>

                <ul class="copyright">
                    <li>&copy; All rights reserved - @2015 </li>
                </ul>
            </div>
        </div>
    </body>
</html>
</body>
</html>