$(document).ready(function() {
    var table = $('#example4').DataTable({
        columnDefs: [{
            orderable: false,
            targets: [1,2,3,4]
        }]
    });     
    $('button').click( function() {
        var data = table.$('input, select').serialize();
        alert(
            "The following data would have been submitted to the server: \n\n"+
            data.substr( 0, 120 )+'...'
        );
        return false;
    } );
} );