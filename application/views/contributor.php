<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($article)):
    $row = $article;
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
        <div   <!-- sidebar -->
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">Sumber Daya</a></li>
                    <?php
                    if (count($menus) > 0):
                        foreach ($menus as $row) {
                            if ($row->category == 'SD'):
                                ?>        
                                <li><a href="<?php echo site_url() . $row->url?>"><?php echo $row->title ?></i></a></li>
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
                                <li><a href="<?php echo site_url() . $row->url?>"><?php echo $row->title ?></i></a></li>
                                <?php
                            endif;
                        }
                    endif;
                    ?> 
                </ul>
            </div>
            <!-- end sidebar -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Menambah artikel</h1>

                <div class="row placeholders">
                    <div class="col-xs-12 col-sm-10">
                        <?php echo form_open('contributor') ?>
                        <div class="form-horizontal">                            
                            <div class="form-group">
                                <label for="ld_title" class="col-sm-2 control-label">Judul Artikel</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ld_title" class="form-control"  placeholder="Title" value="<?php if (isset($row->ld_title)) echo $row->ld_title ?>">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="id" class="col-sm-2 control-label">Jenis Artikel</label>
                                <div class="col-sm-10">
                                    <?php
                                    if (count($typeBank) > 0):
                                        foreach ($typeBank as $val):
                                            $option[$val->id] = $val->ld_title;
                                        endforeach;

                                        echo form_dropdown('ld_type', $option, '', 'class = form-control');
                                    endif;
                                    ?>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label for="ld_content" class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <textarea rows="8" name="ld_content" class="form-control"  placeholder="Content"><?php if (isset($row->ld_content)) echo $row->ld_content ?></textarea>
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
