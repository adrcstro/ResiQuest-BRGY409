// residenttable.js
$(document).ready(function() {
    var pathToTable = '../Backend/AdminTables/residenttable.php';
    
    $.ajax({
        url: pathToTable,
        type: 'POST',
        data: {page: 1},
        success: function(response) {
            $('#Allresidenttbl').html(response);
        },
        error: function() {
            alert('Error loading data');
        }
    });
    
    $(document).on('click', '.pagination-btn', function() {
        var page = $(this).data('page');
        $.ajax({
            url: pathToTable,
            type: 'POST',
            data: {page: page},
            success: function(response) {
                $('#Allresidenttbl').html(response);
            },
            error: function() {
                alert('Error loading data');
            }
        });
    });
});
