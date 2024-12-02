document.addEventListener("DOMContentLoaded", function () {
    // Load hak akses mahasiswa
    fetch('backend/get_mahasiswa_hak_akses.php')
        .then(response => response.json())
        .then(data => {
            const hakAksesTable = document.getElementById("hak-akses-table");
            data.forEach(hak => {
                const row = `<tr>
                                <td>${hak.nama_ruangan}</td>
                                <td>${hak.jenis_ruangan}</td>
                                <td>${hak.waktu_berakhir}</td>
                            </tr>`;
                hakAksesTable.innerHTML += row;
            });
        });

    // Load jadwal ruangan mahasiswa
    fetch('backend/get_mahasiswa_jadwal.php')
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

    // Load notifikasi mahasiswa
    fetch('backend/get_mahasiswa_notifikasi.php')
        .then(response => response.json())
        .then(data => {
            const notifikasiList = document.getElementById("notifikasi-list");
            data.forEach(notifikasi => {
                const item = `<li>${notifikasi.pesan} - <strong>${notifikasi.tanggal}</strong></li>`;
                notifikasiList.innerHTML += item;
            });
        });
});
