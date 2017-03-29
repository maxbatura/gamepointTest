$('document').ready(function(){
    $("#payments tbody").hide('fast');
    $('#fetch').click(function(){
        $("#payments tbody").hide('slow');
        $.ajax({
            url: "assignment_3.php",
            dataType : "json",
            success: function( result ) {
                $("#payments tbody tr").remove();
                $.each(result, function(){
                    c = this.status == 'authorised' ? 'success' : 'warning';
                    $("#payments tbody").append('<tr>' +
                        '<td>'+this.firstname+'</td>' +
                        '<td>'+this.lastname+'</td>' +
                        '<td>'+this.id+'</td>' +
                        '<td>'+this.totalPrice+'</td>' +
                        '<td class="'+c+'">'+this.status+'</td>' +
                        '<td>'+this.methodname+'</td>' +
                        '<td>'+this.productname+'</td>' +
                        '</tr>');
                });
                $("#payments tbody").show('slow');
            }
        });
    });
});