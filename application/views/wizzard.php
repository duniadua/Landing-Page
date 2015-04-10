<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Setup table</title>
    </head>
    <body>
        <?php
        echo form_open('setup');        
        echo form_submit('submit','Next');
        echo form_close();

        if (isset($log)):
            echo $log;
        endif;
        ?>
    </body>
</html>
