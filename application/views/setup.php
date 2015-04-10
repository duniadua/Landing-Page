<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (count($param) > 0):
    $row = $param;
endif;
?>
<body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Landing Page Creator</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo site_url() . "/landing" ?>">Dashboard</a></li>                    
                    <li><a href="<?php echo site_url() . "/landing/set_default" ?>">Mengset <i>Landing Page</i></a></li>
                    <li><a href="<?php echo site_url() . "/contributor/logout" ?>">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">Sumber Daya</a></li>
                    <?php
                    if (count($menus) > 0):
                        foreach ($menus as $rowJ) {
                            if ($rowJ->category == 'SD'):
                                ?>        
                                <li><a href="<?php echo site_url() . $rowJ->url?>"><?php echo $rowJ->title ?></i></a></li>
                                <?php
                            endif;
                        }
                    endif;
                    ?>                    
                </ul>         
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">Parameter</a></li>
                    <?php
                    if (count($menus) > 0):
                        foreach ($menus as $rowJ) {
                            if ($rowJ->category == 'PA'):
                                ?>        
                                <li><a href="<?php echo site_url() . $rowJ->url?>"><?php echo $rowJ->title ?></i></a></li>
                                <?php
                            endif;
                        }
                    endif;
                    ?> 
                </ul>
            </div>
            <!-- end sidebar -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Setup Landing Parameter</h1>

                <div class="row placeholders">
                    <div class="col-xs-12 col-sm-8">
                        <?php echo form_open('landing/setup') ?>
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="nama" class="col-sm-2 control-label">Website Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control"  placeholder="Nama" value="<?php echo $row->name ?>">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="owner" class="col-sm-2 control-label">owner</label>
                                <div class="col-sm-10">
                                    <input type="text" name="owner" class="form-control"  placeholder="Owner" value="<?php echo $row->owner ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fb" class="col-sm-2 control-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fb" class="form-control"  placeholder="fb" value="<?php echo $row->fb ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="twitter" class="col-sm-2 control-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input type="text" name="twitter" class="form-control"  placeholder="twitter" value="<?php echo $row->twitter ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" class="form-control"  placeholder="phone" value="<?php echo $row->phone ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pinbb" class="col-sm-2 control-label">pinbb</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pinbb" class="form-control"  placeholder="pinbb" value="<?php echo $row->pinbb ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="greet" class="col-sm-2 control-label">Greet</label>
                                <div class="col-sm-10">
                                    <textarea rows="4" name="greet" class="form-control"  placeholder="greet"><?php echo $row->greet ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $row->email ?>">
                                </div>
                            </div>

                            <h3 class="sub-header form-group text-left">Setting e-mail</h3>
                            <div class="alert alert-warning" role="alert">Setting e-mail jangan dirubah jika anda tidak paham untuk setting email atau tanyakan ke provider domain anda</div>
                            <div class="form-group">
                                <label for="mailist_email" class="col-sm-2 control-label">Mailist Account</label>
                                <div class="col-sm-10">
                                    <input type="email" name="mailist_email" class="form-control" placeholder="Mailist e-mail" value="<?php echo $row->mailist_email ?>">
                                </div>
                            </div> 
                            <div class="form-group has-warning">
                                <label for="smtp_host" class="col-sm-2 control-label">smtp_host</label>
                                <div class="col-sm-10">
                                    <input type="text" name="smtp_host" class="form-control col-sm-2"  placeholder="smtp_host" value="<?php echo $row->smtp_host ?>">
                                </div>
                            </div> 
                            <div class="form-group has-warning">
                                <label for="smtp_pwd" class="col-sm-2 control-label">smtp_pwd</label>
                                <div class="col-sm-10">
                                    <input type="password" name="smtp_pwd" class="form-control"  placeholder="smtp_pwd" value="<?php echo $row->smtp_pwd ?>">
                                </div>
                            </div>
                            <div class="form-group has-warning">
                                <label for="smtp_port" class="col-sm-2 control-label">smtp_port</label>
                                <div class="col-sm-10">
                                    <input type="text" name="smtp_port" class="form-control"  placeholder="smtp_port" value="<?php echo $row->smtp_port ?>">
                                </div>
                            </div>  
                            <div class="form-group has-warning">
                                <label for="privatekey" class="col-sm-2 control-label">privatekey</label>
                                <div class="col-sm-10">
                                    <input type="text" name="privatekey" class="form-control"  placeholder="privatekey" value="<?php echo $row->privatekey ?>">
                                </div>
                            </div> 
                            <div class="form-group">
                                <input name="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="Save"/>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>                    
                </div>

            </div>
        </div>
    </div>
