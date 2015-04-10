<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//if(count($param) > 0):
//    $row = $param;
//endif;

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
                        foreach ($menus as $row) {
                            if ($row->category == 'SD'):
                                ?>        
                                <li><a href="<?php echo site_url() . $row->url ?>"><?php echo $row->title ?></i></a></li>
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
                        foreach ($menus as $row) {
                            if ($row->category == 'PA'):
                                ?>        
                                <li><a href="<?php echo site_url() . $row->url ?>"><?php echo $row->title ?></i></a></li>
                                <?php
                            endif;
                        }
                    endif;
                    ?> 
                </ul>
            </div>
            <!-- end sidebar -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header"><?php echo $page_title?></h1>

                <div class="row placeholders">
                    <div class="col-xs-12 col-sm-8">
                        <?php echo form_open('landing/set_default') ?>
                        <div class="form-horizontal">                                                                                                                
                            <div class="form-group">
                                <label for="id" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <?php
                                    if(count($defVal) > 0):
                                        $row = $defVal;
                                    endif;
                                    
                                    if(count($list_landing) > 0):                                        
                                        foreach ($list_landing as $val):
                                            $option[$val->id] = $val->ld_title;                                            
                                        endforeach;                                                                                
                                        
                                        echo form_dropdown('id', $option, $row->id,'class = form-control' );                                        
                                    endif;                                    
                                    ?>
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
