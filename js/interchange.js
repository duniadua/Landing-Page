/**
 * File untuk exchange data member
 * 
 * **/
$(document).ready(function() {

    $("#dfno").change(function() {
        var memberid = $("#dfno").val();

        $.ajax({
            dataType: 'json',
            url: "http://localhost/app.workshop/index.php/ajax_controller/getdetailname/" + memberid,
            type: 'GET',
            success:
                    function(data) {
                        if (data.response == 'true')
                        {
                            $("#fullnm").val(data.fullnm);
                            $("#notlp").val(data.tel_hm);
                            $("#nohp").val(data.tel_hp);
                            $("#email").val(data.email);
                        }
                        else
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

