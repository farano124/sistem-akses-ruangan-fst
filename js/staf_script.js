document.addEventListener("DOMContentLoaded", function () {
    // Load daftar ruangan staf
    fetch('backend/get_staf_ruangan.php')
        .then(response => response.json())
        .then(data => {
            const ruanganTable = document.getElementById("ruangan-table");
            data.forEach(ruangan => {
                const row = `<tr>
                                <td>${ruangan.nama_ruangan}</td>
                                <td>${ruangan.jenis_ruangan}</td>
                                <td>${ruangan.kapasitas}</td>
                            </tr>`;
                ruanganTable.innerHTML += row;
            });
        });

    // Load jadwal ruangan staf
    fetch('backend/get_staf_jadwal.php')
        .then(response => response.json())
        .then(data => {
            const jadwalTable = document.getElementById("jadwal-table");
            data.forEach(jadwal => {
                const row = `<tr>
                                <td>${jadwal.nama_ruangan}</td>
                                <td>${jadwal.hari}</td>
                                <td>${jadwal.jam}</td>
                            </tr>`;
                jadwalTable.innerHTML += row;
            });
        });

    // Load notifikasi staf
    fetch('backend/get_staf_notifikasi.php')
        .then(response => response.json())
        .then(data => {
            const notifikasiList = document.getElementById("notifikasi-list");
            data.forEach(notifikasi => {
                const item = `<li>${notifikasi.pesan} - <strong>${notifikasi.tanggal}</strong></li>`;
                notifikasiList.innerHTML += item;
            });
        });
});
