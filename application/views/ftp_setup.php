<?php
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
                <h1 class="page-header"><?php echo $page_title ?></h1>

                <div class="row placeholders">
                    <div class="col-xs-12 col-sm-8">
                        <?php echo form_open('landing/ftp_setup') ?>
                        <div class="form-horizontal">                                                                                    
                            <div class="alert alert-warning" role="alert">Setting ftp jangan dirubah jika anda tidak mengerti</div>
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" class="form-control" placeholder="Mailist e-mail" value="<?php echo $row->username ?>">
                                </div>
                            </div> 
                            <div class="form-group has-warning">
                                <label for="ftp_host" class="col-sm-2 control-label">ftp_host</label>
                                <div class="col-sm-10">
                                    <input type="text" name="host" class="form-control col-sm-2"  placeholder="host" value="<?php echo $row->host ?>">
                                </div>
                            </div> 
                            <div class="form-group has-warning">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control"  placeholder="password" value="<?php echo $row->password ?>">
                                </div>
                            </div>
                            <div class="form-group has-warning">
                                <label for="port" class="col-sm-2 control-label">Port</label>
                                <div class="col-sm-10">
                                    <input type="text" name="port" class="form-control"  placeholder="port" value="<?php echo $row->port ?>">
                                </div>
                            </div>  
                            <div class="form-group has-warning">
                                <label for="lastsync" class="col-sm-2 control-label">lastsync</label>
                                <div class="col-sm-10">
                                    <input type="text" name="lastsync" class="form-control"  disabled placeholder="lastsync" value="<?php echo $row->lastsync ?>">
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
