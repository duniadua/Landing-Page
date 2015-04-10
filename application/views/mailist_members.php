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
                <h2 class="sub-header">Aktivasi Registered Member</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>E-mail</th>
                                <th>Register Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($addressbook) > 0):
                                $i = 1;
                                foreach ($addressbook as $rowAdd):
                                    $no = $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $rowAdd->name ?></td>
                                        <td><?php echo $rowAdd->email ?></td>
                                        <td><?php echo date('D-m-Y H:i:s', strtotime($rowAdd->subscribedt)) ?></td>
                                        <?php
                                        if ($rowAdd->act == 0):
                                            $status = "New";
                                        elseif ($rowAdd->act == 1):
                                            $status = "subscribe";
                                        else:
                                            $status = "unsubscribe";
                                        endif;
                                        ?>
                                        <td><?php echo $status ?></td>
                                        <td><?php echo anchor('mailist_members/approve/' . $rowAdd->uid, 'Approve'); ?></td>
                                    </tr>
                                    <?php
                                endforeach;
                            endif;
                            ?>               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
