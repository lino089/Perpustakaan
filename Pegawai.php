<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Member Management - Perpustakaan</title>
    
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="Style.css">
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <div class="logo-icon">
                    <span class="material-symbols-outlined">local_library</span>
                </div>
                <h1 style="font-size: 1.5rem; font-weight: 800;">Perpustakaan</h1>
            </div>
            <nav>
                <a href="Dashboard.php">Dashboard</a>
                <a href="Anggota.php">Anggota</a>
                <a href="Buku.php">Buku</a>
                <a href="Pegawai.php" class="active">Pegawai</a>
                <a href="Peminjam.php">Peminjam</a>
            </nav>
            <div style="display: flex; gap: 15px; align-items: center;">
                <span class="material-symbols-outlined" style="color: #64748b; cursor: pointer;">notifications</span>
                <div style="width: 40px; height: 40px; border-radius: 50%; background: #e2e8f0; overflow: hidden;">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuC9nlfFXRh0igbh1cB6ni6CSKaJi3CiwAC2XrQA029YM1DhPh2PRBjXqV2eMtUNjPCw7VYzRKwIvx5kj-P5lxM1yhKtq4tPhGDbPq1tGTZR7KSzhqJZ6VLtT40PnnehnzISN3nXqIpcnn7hgco5z6acWdcY-LMo9P-91ci7WmLtt5LgzTU9PUWdfdkZO-bi8uiFMI5oEPGv8f8dsFICqDQ-piOvebxD_7BClBdUbYiGE2OGpujnvi9Bw9mLfDWT0Ebiq0WQjf0O6gkV" style="width:100%; height:100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="page-header">
                <div>
                    <h2 style="font-size: 1.8rem; font-weight: 800;">Manajemen Pegawai</h2>
                    <p style="color: var(--text-muted);">Kelola data seluruh Pegawai perpustakaan</p>
                </div>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <form action="Anggota.php" method="GET">
                        <div class="search-wrapper">
                            <span class="material-symbols-outlined search-icon">search</span>
                            <input name="cari" class="glass-search" placeholder="Cari NIP atau Nama..." type="text" />
                        </div>
                    </form>
                    <button onclick="openModal()" class="btn-primary">
                        <span class="material-symbols-outlined">person_add</span>
                        Tambah Pegawai
                    </button>
                </div>
            </div>

            <div class="card-table">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Gender</th>
                                <th style="text-align: right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $koneksi = mysqli_connect("localhost", "root", "", "perpus_marvellino");
                                if(isset($_GET['cari'])){
                                    $cari = $_GET['cari'];
                                    $sql = "select * from pegawai where
                                            NIP Like '%$cari%' OR
                                            Nama LIke '%$cari%'";
                                } else {
                                    $sql = "SELECT * FROM Pegawai";
                                }
                                $data = mysqli_query($koneksi, $sql);
                                if(mysqli_num_rows($data) == 0){
                                    echo "<tr><td colspan='6' style='text-align:center; padding: 40px;'>Data tidak ditemukan</td></tr>";
                                }
                                while($tampil = mysqli_fetch_array($data)){
                            ?>
                            <tr>
                                <td style="color: var(--primary); font-weight: 600;"><?= $tampil['NIP'] ?></td>
                                <td><span style="font-weight: 700;"><?= $tampil['Nama']?></span></td>
                                <td><?= $tampil['Alamat']?></td>
                                <td><?= $tampil['Gender']?></td>
                                <td>
                                    <div class="action-btns">
                                        <button class="btn-icon edit" onclick="openEditModal('<?=$tampil['NIP']?>', '<?=$tampil['Nama']?>', '<?=$tampil['Alamat']?>', '<?=$tampil['Gender']?>')">
                                            <span class="material-symbols-outlined">edit</span>
                                        </button>
                                        <a href="CRUD_Delete/Delete_Buku.php?id=<?= $tampil['NIP'];?>" onclick="return confirm('Hapus anggota ini?')" class="btn-icon delete">
                                            <span class="material-symbols-outlined">delete</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>© Metzu copyright - Perpustakaan Digital</p>
    </footer>

    <div id="modalTambah" class="modal-overlay">
        <div class="modal-content">
            <div style="display:flex; justify-content:space-between; margin-bottom: 24px;">
                <h3 style="font-size: 1.25rem; font-weight: 800;">Tambah Anggota</h3>
                <span class="material-symbols-outlined" onclick="closeModal()" style="cursor:pointer;">close</span>
            </div>
            <form action="CRUD_TAMBAH/Tambah_Pegawai.php" method="POST">
                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <input type="text" name="gender" class="form-control" required></input>
                </div>
                <div style="display:flex; justify-content: flex-end; gap: 12px; margin-top: 32px;">
                    <button type="button" onclick="closeModal()" style="background:none; border:none; cursor:pointer; font-weight:600; color:#64748b;">Batal</button>
                    <button type="submit" class="btn-add" style="box-shadow:none;">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>


    <div id="modalEditPeminjam" class="modal-overlay">
    <div class="modal-content">
        <h3 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 24px;">Edit Data Buku</h3>
        <form action="CRUD_Edit/Edit_Pegawai.php" method="POST">
            <div class="form-group">
                <label>NIP</label>
                <input type="text" id="edit_nip" name="nip" class="form-control">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" id="edit_nama" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" id="edit_alamat" name="alamat" class="form-control">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input type="text" id="edit_gender" name="gender" class="form-control">
            </div>
            <div style="display:flex; justify-content: flex-end; gap: 12px; margin-top: 32px;">
                <button type="button" onclick="closeEditModal()" style="background:none; border:none; cursor:pointer;">Batal</button>
                <button type="submit" class="btn-primary" style="box-shadow:none;">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

    <script>
        const modal = document.getElementById('modalTambah');
        const modalEdit = document.getElementById('modalEditPeminjam');

        function openModal(){
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
        function openEditModal(nip, nama, alamat, gender){

            document.getElementById('edit_nip').value = nip;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_alamat').value = alamat;
            document.getElementById('edit_gender').value = gender;
            modalEdit.style.display = 'flex';
        }
        function closeEditModal() {
            modalEdit.style.display = 'none';
        }

        window.onclick = function(event){
            if(event.target == modal) closeModal();
            if(event.target == modalEdit) closeEditModal();
        }
    </script>
</body>
</html>