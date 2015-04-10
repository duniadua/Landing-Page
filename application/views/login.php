<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img alt="Brand" src="<?php echo base_url().'images/logo20x20.jpg' ?>">
                </a>
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
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">Login Contributor</a></li>                   
                </ul>
            </div>
            <!-- end sidebar -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Login Contributor</h1>

                <div class="row placeholders">
                    <div class="col-xs-12 col-sm-10">
                        <?php if(isset($mssg)) echo $mssg;?>
                        <?php echo form_open('contributor/login') ?>
                        <div class="form-horizontal">                            
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" required class="form-control"  placeholder="username" value="<?php if (isset($row->username)) echo $row->username ?>">
                                </div>
                            </div>                               
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" required class="form-control"  placeholder="password" value="<?php if (isset($row->password)) echo $row->password ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="Login"/>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>                    
                </div>

            </div>
        </div>
    </div>
