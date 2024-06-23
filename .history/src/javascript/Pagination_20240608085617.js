
    document.addEventListener("DOMContentLoaded", function() {
        const paginationLinks = document.querySelectorAll('.pagination-link');
        paginationLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const page = this.getAttribute('data-page');
                fetchTableData(page);
            });
        });

        function fetchTableData(page) {
            fetch(`../Backend/AdminTables/residenttable.php?page=${page}`)
                .then(response => response.text())
                .then(data => {
                    document.querySelector('.table-container').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error fetching table data:', error);
                });
        }
    });

