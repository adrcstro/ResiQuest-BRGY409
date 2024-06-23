// residenttable.js
function loadTablepagination(page) {
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
    loadTablepagination(1);
    
    $(document).on('click', '.pagination-btn', function() {
        var page = $(this).data('page');
        loadTablepagination(page);
    });
});
