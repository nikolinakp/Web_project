document.addEventListener('DOMContentLoaded', function() {
    fetch('php/history.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'SUCCESS') {
                const tableBody = document.getElementById('dataTable').querySelector('tbody');
                data.data.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `<td>${row.user_id}</td><td>${row.filename}</td><td>${row.created_at}</td>`;
                    tableBody.appendChild(tr);
                });
            } else {
                alert('Грешка при извличане на данни: ' + data.message);
            }
        })
        .catch(error => console.error('Грешка:', error));
});