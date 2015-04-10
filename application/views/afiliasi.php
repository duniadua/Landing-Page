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
                <h1 class="page-header">Menambah Afiliasi</h1>

                <div class="row placeholders">
                    <div class="col-xs-12 col-sm-10">

                        <?php
                        $hiddenField = array(
                            'short_url' => random_string('alnum', 10)
                        );

                        echo form_open('afiliasi', '', $hiddenField);
                        ?>
                        <div class="form-horizontal">                            
                            <div class="form-group">
                                <label for="dfno" class="col-sm-2 control-label">Distributor</label>
                                <div class="col-sm-10">
                                    <input id="dfno" type="text" name="dfno" class="form-control"  placeholder="Distributor Code" value="">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-10">
                                    <input id="fullnm" type="text" name="nama" class="form-control"  placeholder="nama" value="">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="pinbb" class="col-sm-2 control-label">Pin BB</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pinbb" class="form-control"  placeholder="pinbb" value="">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="fb" class="col-sm-2 control-label">FaceBook</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fb" class="form-control"  placeholder="fb" value="">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="twitter" class="col-sm-2 control-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input type="text" name="twitter" class="form-control"  placeholder="twitter" value="">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" class="form-control"  placeholder="phone" value="">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input id="email" type="text" name="email" class="form-control"  placeholder="email" value="">
                                </div>
                            </div> 
                            <div class="form-group">
                                <input name="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="Save"/>
                            </div>
                        </div>
                        <?php
                        echo form_close();

                        if (isset($mssg)):
                            echo $mssg;
                        else:
                            echo 'no mssg';
                        endif;
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>                                
                                        <th>Distributor Code</th>
                                        <th>Nama</th>
                                        <th>Pin BB</th>
                                        <th>Email</th>                                
                                        <th>Short Url</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($afiliasiList) > 0):
                                        $i = 1;
                                        foreach ($afiliasiList as $rowAdd):
                                            $no = $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $rowAdd->dfno ?></td>
                                                <td><?php echo $rowAdd->nama ?></td>
                                                <td><?php echo $rowAdd->pinbb ?></td>                                        
                                                <td><?php echo $rowAdd->email ?></td>
                                                <td><?php echo $rowAdd->short_url ?></td>
                                                <td><?php echo anchor('afiliasi/delete/' . $rowAdd->id, 'Delete'); ?></td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>               
                                </tbody>
                            </table> 
                            <div class="pager pull-right"><?php if(isset($halaman)) echo $halaman ?></div>
                        </div>
                    </div>                                                                                
                </div>
            </div>
        </div>
