document.addEventListener("DOMContentLoaded", function () {
    // Load hak akses dosen
    fetch('backend/get_dosen_hak_akses.php')
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

    // Load jadwal mengajar dosen
    fetch('backend/get_dosen_jadwal.php')
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

    // Load notifikasi dosen
    fetch('backend/get_dosen_notifikasi.php')
        .then(response => response.json())
        .then(data => {
            const notifikasiList = document.getElementById("notifikasi-list");
            data.forEach(notifikasi => {
                const item = `<li>${notifikasi.pesan} - <strong>${notifikasi.tanggal}</strong></li>`;
                notifikasiList.innerHTML += item;
            });
        });
});
