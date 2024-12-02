document.getElementById('loginForm').addEventListener('submit', function(event) {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username === '' || password === '') {
        event.preventDefault();
        document.getElementById('error-message').innerText = 'Semua kolom harus diisi!';
    }
});
document.addEventListener("DOMContentLoaded", function () {
    // Load data pengguna
    fetch('backend/get_users.php')
        .then(response => response.json())
        .then(data => {
            const userTable = document.getElementById("user-table");
            data.forEach(user => {
                const row = `<tr>
                                <td>${user.id_pengguna}</td>
                                <td>${user.nama}</td>
                                <td>${user.email}</td>
                                <td>${user.peran}</td>
                            </tr>`;
                userTable.innerHTML += row;
            });
        });

    // Load log aktivitas
    fetch('backend/get_logs.php')
        .then(response => response.json())
        .then(data => {
            const logTable = document.getElementById("log-table");
            data.forEach(log => {
                const row = `<tr>
                                <td>${log.id_log}</td>
                                <td>${log.nama}</td>
                                <td>${log.tindakan}</td>
                                <td>${log.status}</td>
                                <td>${log.waktu}</td>
                            </tr>`;
                logTable.innerHTML += row;
            });
        });

    // Kirim notifikasi
    document.getElementById("notification-form").addEventListener("submit", function (e) {
        e.preventDefault();
        const userId = document.getElementById("user-id").value;
        const message = document.getElementById("message").value;

        fetch('backend/send_notification.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ user_id: userId, message: message })
        })
            .then(response => response.text())
            .then(data => alert(data))
            .catch(error => console.error('Error:', error));
    });
});
