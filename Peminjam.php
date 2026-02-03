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
                <a href="Pegawai.php">Pegawai</a>
                <a href="Peminjam.php" class="active">Peminjam</a>
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
                    <h2 style="font-size: 1.8rem; font-weight: 800;">Manajemen Peminjam</h2>
                    <p style="color: var(--text-muted);">Kelola data seluruh Peminjam perpustakaan</p>
                </div>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <form action="Anggota.php" method="GET">
                        <div class="search-wrapper">
                            <span class="material-symbols-outlined search-icon">search</span>
                            <input name="cari" class="glass-search" placeholder="Cari ID Peminjam..." type="text" />
                        </div>
                    </form>
                    <button onclick="openModal()" class="btn-primary">
                        <span class="material-symbols-outlined">person_add</span>
                        Tambah Peminjam
                    </button>
                </div>
            </div>

            <div class="card-table">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>ID Peminjam</th>
                                <th>ID Anggota</th>
                                <th>ISBN</th>
                                <th>Tgl Pinjam</th>
                                <th>Tgl Kembali</th>
                                <th style="text-align: right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $koneksi = mysqli_connect("localhost", "root", "", "perpus_marvellino");
                                if(isset($_GET['cari'])){
                                    $cari = $_GET['cari'];
                                    $sql = "select * from peminjam where
                                            ID_Peminjam Like '%$cari%' OR
                                            ID_Anggota Like '%$cari%' OR
                                            ISBN Like '%$cari%'";
                                } else {
                                    $sql = "SELECT * FROM peminjam";
                                }
                                $data = mysqli_query($koneksi, $sql);
                                if(mysqli_num_rows($data) == 0){
                                    echo "<tr><td colspan='6' style='text-align:center; padding: 40px;'>Data tidak ditemukan</td></tr>";
                                }
                                while($tampil = mysqli_fetch_array($data)){
                            ?>
                            <tr>
                                <td style="color: var(--primary); font-weight: 600;"><?= $tampil['ID_Peminjam'] ?></td>
                                <td><span style="font-weight: 700;"><?= $tampil['ID_Anggota']?></span></td>
                                <td><span style="font-weight: 700;"><?= $tampil['ISBN']?></span></td>
                                <td><?= $tampil['Tgl_Peminjaman']?></td>
                                <td><?= $tampil['Tgl_Pengembalian']?></td>
                                <td>
                                    <div class="action-btns">
                                        <button class="btn-icon edit" onclick="openEditModal('<?=$tampil['ID_Peminjam']?>', '<?=$tampil['ID_Anggota']?>', '<?=$tampil['ISBN']?>', '<?=$tampil['Tgl_Peminjaman']?>', '<?=$tampil['Tgl_Pengembalian']?>')">
                                            <span class="material-symbols-outlined">edit</span>
                                        </button>
                                        <a href="CRUD_Delete/Delete_Peminjam.php?id=<?= $tampil['ID_Peminjam'];?>" onclick="return confirm('Hapus anggota ini?')" class="btn-icon delete">
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

<div id="modalPeminjam" class="modal-overlay">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="text-xl font-bold text-slate-900">Tambah Peminjam Baru</h3>
            <button onclick="closeModalPeminjam()" style="background:none; border:none; cursor:pointer; color:#94a3b8;">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        
        <form action="CRUD_TAMBAH/Tambah_Peminjam.php" method="POST" style="display: flex; flex-direction: column; gap: 1rem;">
            <div class="form-group">
                <label class="label-custom">ID PEMINJAM</label>
                <input type="text" name="id_peminjam" class="input-custom" placeholder="Masukkan ID...">
            </div>

            <div class="form-group">
                <label class="label-custom">Pilih Anggota</label>
                <select name="id_anggota" class="js-example-basic-single input-custom" style="width: 100%;">
                    <option value="">-- Cari Nama atau ID Anggota --</option>
                    <?php
                        $query_anggota = mysqli_query($koneksi, "SELECT ID_Anggota, Nama FROM anggota");
                        while($row = mysqli_fetch_array($query_anggota)){
                            echo "<option value='".$row['ID_Anggota']."'>".$row['ID_Anggota']." - ".$row['Nama']."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label class="label-custom">Pilih Buku (ISBN)</label>
                <select name="isbn" class="js-example-basic-single input-custom" style="width: 100%;">
                    <option value="">-- Cari Judul atau ISBN --</option>
                    <?php
                        $query_buku = mysqli_query($koneksi, "SELECT ISBN, Judul FROM buku");
                        while($row = mysqli_fetch_array($query_buku)){
                            echo "<option value='".$row['ISBN']."'>".$row['ISBN']." - ".$row['Judul']."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="grid-2">
                <div>
                    <label class="label-custom">Tgl Pinjam</label>
                    <input type="date" name="tgl_pinjam" class="input-custom">
                </div>
                <div>
                    <label class="label-custom">Tgl Kembali</label>
                    <input type="date" name="tgl_kembali" class="input-custom">
                </div>
            </div>

            <div class="flex-end-gap">
                <button type="button" onclick="closeModalPeminjam()" class="btn-batal">Batal</button>
                <button type="submit" class="btn-simpan">Simpan Data</button>
            </div>
        </form>
    </div>
</div>


<div id="modalEditPeminjam" class="modal-overlay">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Edit Data Peminjam</h3>
            <button onclick="closeEditModal()" style="background:none; border:none; cursor:pointer; color:#94a3b8;">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        
        <form action="CRUD_Edit/Edit_Peminjam.php" method="POST" style="display: flex; flex-direction: column; gap: 1rem;">
            <input type="hidden" id="edit_id_peminjam" name="id_peminjam">

            <div class="form-group">
                <label class="label-custom">Pilih Anggota</label>
                <select name="id_anggota" id="edit_id_anggota" class="input-custom">
                    </select>
            </div>

            <div class="form-group">
                <label class="label-custom">Pilih Buku (ISBN)</label>
                <select name="isbn" id="edit_isbn" class="input-custom">
                    </select>
            </div>

            <div class="grid-2">
                <div>
                    <label class="label-custom">Tgl Pinjam</label>
                    <input type="date" id="edit_tgl_pinjam" name="tgl_pinjam" class="input-custom">
                </div>
                <div>
                    <label class="label-custom">Tgl Kembali</label>
                    <input type="date" id="edit_tgl_kembali" name="tgl_kembali" class="input-custom">
                </div>
            </div>
            
            <div class="flex-end-gap">
                <button type="button" onclick="closeEditModal()" class="btn-batal">Batal</button>
                <button type="submit" class="btn-simpan">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

    <script>
        const modal = document.getElementById('modalPeminjam');
        const modalEdit = document.getElementById('modalEditPeminjam');

        function openModal(){
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
        function openEditModal(id, anggota, isbn, tgl_p, tgl_k){

            document.getElementById('edit_id_peminjam').value = id;
            document.getElementById('edit_id_anggota').value = anggota;
            document.getElementById('edit_isbn').value = isbn;
            document.getElementById('edit_tgl_pinjam').value = tgl_p;
            document.getElementById('edit_tgl_kembali').value = tgl_k;
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