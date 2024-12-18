document.addEventListener('DOMContentLoaded', () => {
    fetchMatches();
});

function fetchMatches() {
    fetch('fetch_matches.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#upcoming-matches tbody');
            data.matches.forEach(match => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${match.match_no}</td>
                    <td>${match.team_a}</td>
                    <td>${match.team_b}</td>
                    <td>${match.date_time}</td>
                `;
                tableBody.appendChild(row);
            });
        });
}
