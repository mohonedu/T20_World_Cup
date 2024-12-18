document.addEventListener('DOMContentLoaded', () => {
    fetchMatches();
});

function fetchMatches() {
    fetch('fetch_matches.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('table tbody');
            data.matches.forEach(match => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${match.match_no}</td>
                    <td>${match.team_a}</td>
                    <td>${match.team_b}</td>
                    <td>${match.date_time}</td>
                    <td>
                        <button onclick="location.href='edit_match.php?id=${match.id}'">Edit</button>
                        <button onclick="deleteMatch(${match.id})">Delete</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        });
}

function deleteMatch(id) {
    if (confirm('Are you sure you want to delete this match?')) {
        fetch(`delete_match.php?id=${id}`, { method: 'POST' })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    location.reload();
                } else {
                    alert('Failed to delete match.');
                }
            });
    }
}
