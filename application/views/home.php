<!DOCTYPE HTML>
<html>
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
            $css = "style.css";
        endif;
        ?>
        <title>E-Book Gratis</title>
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
            <a href="#start"><span class="logo icon fa-hand-o-down"></span></a>
            <h1>Hi Apa Kabar?</h1>
            <p>Kami hadir untuk memberikan informasi seputar kesehatan untuk Anda, <a href="#">are you ready?</a>
                <br />
                Kali ini kami akan membahas topik mengenai <a href="#start">BAU MULUT</a>.</p>
        </div>

        <!-- Main -->
        <div id="main">
            <header class="major container 75%">
                <a name="start"></a>
                <h2>BAU MULUT BIKIN BANGKRUT?
                    <br />
                    kok bisa sih? yuk cari tau
                    <br />
                    bagaimana bau mulut mempengaruhi kegiatan Anda sehari-hari </h2>                
            </header>

            <div class="box alt container">
                <section class="feature left">
                    <a href="#" class="image icon"><img src="<?php echo base_url(); ?>images/pic01.jpg" alt="" /></a>
                    <div class="content">
                        <h3>Kesan Pertama</h3>
                        <p>Dalam pergaulan, kita mengenal istilah 'kesan pertama'. Bayangkan Anda berada pada sebuah rapat dan sedang presentasi sebuah projek besar. Penampilan rapi dari rambut sampai kaki. Tak ketinggalan pantalon dan kemeja licin berdasi</p>
                    </div>
                </section>
                <section class="feature right">
                    <a href="#" class="image icon"><img src="<?php echo base_url(); ?>images/pic02.jpg" alt="" /></a>
                    <div class="content">
                        <h3>Bau Mulut Merusak Semua</h3>
                        <p> Saat giliran tampil di depan dan buka suara, sebagian orang tampak mengernyit, sebagian lagi perlahan mengalihkan wajahnya ke arah lain. Apa sebabnya? Bau tak sedap menguar dari mulut Anda. Oh, nooo...!</p>
                    </div>
                </section>
                <section class="feature left">
                    <a href="#" class="image icon"><img src="<?php echo base_url(); ?>images/pic03.jpg" alt="" /></a>
                    <div class="content">
                        <h3>Tidak Hanya Orang Dewasa</h3>
                        <p>Kejadian ini tidak ditemukan pada orang dewasa saja lho. Anak-anak, remaja, bahkan lansia juga mengalaminya. Dalam dunia medis pun ada penjelasan ilmiah mengenai hal ini. Jika tidak ditangani segera, bau mulut bisa bikin kantung Anda bolong karena ini adalah indikasi adanya penyakit serius di dalam tubuh. Anda tentu tak ingin ini terjadi bukan?</p>
                    </div>
                </section>
            </div>				

            <footer class="major container 75%">                
                <h3>Anda Tak Perlu Khawatir, Kami Punya Solusinya</h3>
                <img src="<?php echo base_url(); ?>images/gift.jpg" alt="" />
                <p>Kami memberikan Ebook gratis tentang cara singkat menghilangkan bau mulut, untuk mendapatkan ebook tersebut Anda harus mengisi Nama dan alamat email Anda dibawah</p>
                <ul class="actions">
                    <li><a href="#setuju" class="button">Saya Bersedia</a></li>
                </ul>
            </footer>

        </div>

        <!-- Footer -->
        <div id="footer">
            <a name="setuju"></a>
            <div class="container 75%">

                <header class="major last">
                    <h2>Masukkan Nama & Alamat Email Anda</h2>
                </header>

                <p>Kami menjamin data diri yang Anda masukkan tidak akan disebar luasakan dan kami selalu jaga kerahasaiaanya</p>
                <?php
                $hiddenField = array(
                    'ld_type' => $row->ld_type,
                    'uid' => random_string('alnum', 10),
                    'replyto' => $rowParam->email,
                );

                echo form_open('home', '', $hiddenField);
                ?>
                <div class="row">
                    <div class="6u 12u(mobilep)">
                        <input type="text" name="nama" placeholder="Name" required/>
                    </div>
                    <div class="6u 12u(mobilep)">
                        <input type="email" name="email" placeholder="Email" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="12u">
                        <ul class="actions">
                            <li><input type="submit" value="I'M Ready" name="submit" id="next"/></li>
                        </ul>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <?php echo validation_errors(); ?>

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
        <!-- Footer end-->
    </body>
</html>