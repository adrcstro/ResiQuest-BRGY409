// pagination_script.js
function loadData(page) {
    $.ajax({
        url: 'residenttable.php?page=' + page,
        type: 'GET',
        success: function(response) {
            $('#pagination').html(response);
        }
    });
}
