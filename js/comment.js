/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function insertComment() {
    var host = 'http://' + document.location.hostname;
    var pathUrl = '/index.php/apiController/comment';

    $('#comment').click(function() {
        var sereData = $('#Komentar').serialize();
        var name = $('#name').val().length;
        var bl_comment = $('#bl_comment').val().length;

        if (name > 0 && bl_comment > 0) {
            $.ajax({
                type: "POST",
                url: host + pathUrl,
                data: sereData,
                success: function(result) {
                    alert('Status komentar Anda adalah ' + result.isTrue + ' disimpan !!');
                    closeComment();
                }
            });
        }else{
            alert('Komentar tidak boleh kosong');
        }

        return false;
    });
        
}

function closeComment() {
    $('#Komentar').fadeOut('slow');
}

$(document).ready(function() {
    insertComment();
});