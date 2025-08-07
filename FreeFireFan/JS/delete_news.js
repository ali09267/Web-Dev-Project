document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const newsId = this.dataset.id;
        const card = this.closest('.col-12');

        if (confirm("Are you sure you want to delete this news item js?")) {
            fetch('delete_news.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'id=' + newsId
            })
            .then(res => res.text())
            .then(response => {
                console.log(response);
                if (response === 'success') {
                    card.remove(); // remove the card from UI
                } else {
                    alert("Error deleting news.");
                }
            })
            .catch(err => console.error(err));
        }
    });
});

