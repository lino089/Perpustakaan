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
    <link rel="stylesheet" href="../Style/StyleTable.css">
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
                <a href="Buku.php" class="active">Buku</a>
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
                    <h2 style="font-size: 1.8rem; font-weight: 800;">Manajemen Buku</h2>
                    <p style="color: var(--text-muted);">Kelola data seluruh Buku perpustakaan</p>
                </div>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <form action="Buku.php" method="GET">
                        <div class="search-wrapper">
                            <span class="material-symbols-outlined search-icon">search</span>
                            <input name="cari" class="glass-search" placeholder="Cari Buku atau ISBN..." type="text" />
                        </div>
                    </form>
                </div>
            </div>

            <div class="card-table">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>ISBN</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Penebit</th>
                                <th>Tahun Terbit</th>
                                <th>Genre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $koneksi = mysqli_connect("localhost", "root", "", "perpus_marvellino");
                                if(isset($_GET['cari'])){
                                    $cari = $_GET['cari'];
                                    $sql = "select * from buku where
                                            Judul Like '%$cari%' OR
                                            ISBN LIke '%$cari%'";
                                } else {
                                    $sql = "SELECT * FROM buku";
                                }
                                $data = mysqli_query($koneksi, $sql);
                                if(mysqli_num_rows($data) == 0){
                                    echo "<tr><td colspan='6' style='text-align:center; padding: 40px;'>Data tidak ditemukan</td></tr>";
                                }
                                while($tampil = mysqli_fetch_array($data)){
                            ?>
                            <tr>
                                <td style="color: var(--primary); font-weight: 600;"><?= $tampil['ISBN'] ?></td>
                                <td><span style="font-weight: 700;"><?= $tampil['Judul']?></span></td>
                                <td><?= $tampil['Pengarang']?></td>
                                <td><?= $tampil['Penerbit']?></td>
                                <td><?= $tampil['Tahun']?></td>
                                <td><?= $tampil['Genre']?></td>
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
            <form action="CRUD_TAMBAH/Tambah_Buku.php" method="POST">
                <div class="form-group">
                    <label>ISBN</label>
                    <input type="text" name="isbn" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Pengarang</label>
                    <input type="text" name="pengarang" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Penebit</label>
                    <textarea name="penerbit" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Tahun Terbit</label>
                    <input type="text" name="tahun" class="form-control">
                </div>
                <div class="form-group">
                    <label>Genre</label>
                    <input type="text" name="genre" class="form-control">
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
        <form action="CRUD_Edit/Edit_Buku.php" method="POST">
            <input type="hidden" id="edit_isbn_lama" name="isbn_lama">

            <div class="form-group">
                <label>ISBN</label>
                <input type="text" id="edit_isbn" name="isbn" class="form-control">
            </div>
            <div class="form-group">
                <label>Judul</label>
                <input type="text" id="edit_judul" name="judul" class="form-control">
            </div>
            <div class="form-group">
                <label>Pengarang</label>
                <input type="text" id="edit_pengarang" name="pengarang" class="form-control">
            </div>
            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" id="edit_penerbit" name="penerbit" class="form-control">
            </div>
            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="text" id="edit_tahun_terbit" name="tahun" class="form-control">
            </div>
            <div class="form-group">
                <label>Genre</label>
                <input type="text" id="edit_genre" name="genre" class="form-control">
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
        function openEditModal(isbn, judul, pengarang, genre, penerbit, tahun){

            document.getElementById('edit_isbn_lama').value = isbn;
            document.getElementById('edit_isbn').value = isbn;
            document.getElementById('edit_judul').value = judul;
            document.getElementById('edit_pengarang').value = pengarang;
            document.getElementById('edit_genre').value = genre;
            document.getElementById('edit_penerbit').value = penerbit;
            document.getElementById('edit_tahun_terbit').value = tahun;
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