// residenttable.js
function loadTable(page) {
    $.ajax({
        url: '../Backend/AdminTables/residenttable.php',
        type: 'POST',
        data: {page: page},
        success: function(response) {
            $('#Allresidenttbl').html(response);
        },
        error: function() {
            alert('Error loading data');
        }
    });
}

$(document).ready(function() {
    loadTable(1);
    
    $(document).on('click', '.pagination-btn', function() {
        var page = $(this).data('page');
        loadTable(page);
    });
});
