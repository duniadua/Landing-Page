<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!-- Bootstrap core JavaScript
   ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>js/holder.js"></script>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: ["advlist autolink lists link image charmap print preview anchor"],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>
<script>
    $(document).ready(function() {

        $("#dfno").change(function() {
            var memberid = $("#dfno").val();

            $.ajax({
                dataType: 'json',
                url: "<?php echo site_url()?>/afiliasi/getMember/" + memberid,
                type: 'GET',
                success:
                        function(data) {
                            if (data.response == 'true')
                            {
                                $("#fullnm").val(data.fullnm);                                
                            }
                            if (data.response == 'false')
                            {
                                alert("Member Not Found !");
                            }
                        },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + ':' + xhr.status);
                }
            });
        });


    });


</script>

</body>
</html>

