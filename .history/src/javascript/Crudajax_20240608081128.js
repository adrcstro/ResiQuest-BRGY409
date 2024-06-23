document.addEventListener("DOMContentLoaded", function () {
    const paginationLinks = document.querySelectorAll('.pagination-link');

    paginationLinks.forEach(link => {
        link.addEventListener('click', function () {
            const page = this.getAttribute('data-page');
            fetch(`index.php?page=${page}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('table-container').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
