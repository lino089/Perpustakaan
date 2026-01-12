<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Member Management - Perpustakaan</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0d46f2",
                        "background-light": "#f5f6f8",
                        "background-dark": "#101422",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background-color: #94a3b8;
        }
        .glass-search {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .dark .glass-search {
            background: rgba(30, 35, 48, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-white antialiased min-h-screen flex flex-col">
    <header class="sticky top-0 z-50 w-full bg-white dark:bg-[#1e2330] border-b border-slate-100 dark:border-slate-800 shadow-sm transition-colors duration-300">
        <div class="max-w-[1920px] mx-auto px-6 lg:px-12">
            <div class="flex h-20 items-center justify-between">
                <div class="flex items-center gap-3 group cursor-pointer">
                    <div class="size-10 bg-primary/10 rounded-lg flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined text-2xl">local_library</span>
                    </div>
                    <h1 class="text-xl lg:text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Perpustakaan</h1>
                </div>
                <nav class="hidden md:flex items-center gap-1">
                    <a class="px-5 py-2.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary hover:bg-slate-50 dark:hover:bg-slate-800 rounded-full transition-all duration-300" href="Dashboard.php">
                        Dashboard
                    </a>
                    <a class="px-5 py-2.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary hover:bg-slate-50 dark:hover:bg-slate-800 rounded-full transition-all duration-300" href="Anggota.php">
                        Anggota
                    </a>
                    <a class="px-5 py-2.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary hover:bg-slate-50 dark:hover:bg-slate-800 rounded-full transition-all duration-300" href="Buku.php">
                        Buku
                    </a>
                    <a class="px-5 py-2.5 text-sm font-semibold text-primary bg-primary/5 rounded-full transition-all duration-300" href="Pegawai.php">
                        Pegawai
                    </a>
                    <a class="px-5 py-2.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary hover:bg-slate-50 dark:hover:bg-slate-800 rounded-full transition-all duration-300" href="Peminjam.php">
                        Peminjam
                    </a>
                </nav>
                <div class="flex items-center gap-4">
                    <button class="flex items-center justify-center size-10 rounded-full text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <div class="size-10 rounded-full bg-slate-200 overflow-hidden ring-2 ring-transparent hover:ring-primary cursor-pointer transition-all duration-300 relative group">
                        <img alt="Profile picture" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC9nlfFXRh0igbh1cB6ni6CSKaJi3CiwAC2XrQA029YM1DhPh2PRBjXqV2eMtUNjPCw7VYzRKwIvx5kj-P5lxM1yhKtq4tPhGDbPq1tGTZR7KSzhqJZ6VLtT40PnnehnzISN3nXqIpcnn7hgco5z6acWdcY-LMo9P-91ci7WmLtt5LgzTU9PUWdfdkZO-bi8uiFMI5oEPGv8f8dsFICqDQ-piOvebxD_7BClBdUbYiGE2OGpujnvi9Bw9mLfDWT0Ebiq0WQjf0O6gkV" />
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow p-6 lg:p-12 relative overflow-hidden">
        <div class="absolute top-[-10%] left-[-5%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-[40%] h-[40%] bg-blue-400/5 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="max-w-[1600px] mx-auto relative z-10">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900 dark:text-white">Manajemen Pegawai</h2>
                    <p class="text-slate-500 dark:text-slate-400 mt-1">Kelola data seluruh Pegawai perpustakaan</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 items-center">
                <form action="Pegawai.php" method="GET" class="flex flex-col sm:flex-row gap-4 items-center">
                    <div class="relative w-full sm:w-80">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                        <input name="cari" class="glass-search w-full pl-12 pr-4 py-3 rounded-xl border-none ring-1 ring-slate-200 dark:ring-slate-700 focus:ring-2 focus:ring-primary transition-all outline-none text-slate-700 dark:text-slate-200" placeholder="Cari NIP atau NAMA..." type="text" />
                    </div>
                    <button type="submit" class="hidden"></button>
                </form>
                <button onclick="openModal()" class="w-full sm:w-auto px-6 py-3 bg-primary hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg shadow-primary/20 flex items-center justify-center gap-2 transition-all duration-300 transform hover:-translate-y-0.5">
                        <span class="material-symbols-outlined text-xl">person_add</span>
                        <span>Tambah Pegawai Baru</span>
                </button>
                </div>
            </div>

            <div class="bg-white dark:bg-[#1e2330] rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-800 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 dark:bg-slate-800/50 border-b border-slate-100 dark:border-slate-800">
                                <th class="px-8 py-5 text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">NIP</th>
                                <th class="px-8 py-5 text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Nama</th>
                                <th class="px-8 py-5 text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Alamat</th>
                                <th class="px-8 py-5 text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Gender</th>
                                <th class="px-8 py-5 text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-right">Aksi</th>
                            </tr>
                        </thead>
                        <?php
                            $koneksi = mysqli_connect("localhost", "root", "", "perpus_marvellino");
                            
                            if(isset($_GET['cari'])){
                                $cari = $_GET['cari'];

                                $sql = "select * from pegawai where
                                        NIP Like '%$cari%' OR
                                        Nama Like '%$cari%'";
                            } else{
                                $sql = "select * from pegawai";
                            }

                            $data = mysqli_query($koneksi, $sql);

                            if (mysqli_num_rows($data) == 0){
                                echo "<tr><td colspan='7' class'text-cennter py-10 text-slate-500'>Data tidak ditemukan</tr>";
                            }

                            while($tampil = mysqli_fetch_array($data)){
                        ?>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            <tr class="group hover:bg-slate-50/80 dark:hover:bg-slate-800/30 transition-colors duration-150">
                                <td class="px-8 py-5 text-sm font-medium text-primary"><?= $tampil['NIP'] ?></td>
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <span class="font-semibold text-slate-900 dark:text-white"><?= $tampil['Nama']?></span>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-sm text-slate-600 dark:text-slate-300"><?= $tampil['Alamat']?></td>
                                <td class="px-8 py-5 text-sm text-slate-600 dark:text-slate-300"><?= $tampil['Gender']?></td>
                                <td class="px-8 py-5 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button onclick="openEditModal('<?=$tampil['NIP']?>','<?=$tampil['Nama']?>','<?=$tampil['Alamat']?>','<?=$tampil['Gender']?>')"
                                            class="p-2 text-slate-400 hover:text-primary hover:bg-primary/5 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <a href="CRUD_Delete/Delete_Pegawai.php?id=<?= $tampil['NIP']?>"
                                            onclick="return confirm('Apakah Anda yakin akan menghapus pegawai ini?')"
                                            class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="px-8 py-6 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                    <p class="text-sm text-slate-500 dark:text-slate-400">Showing <span class="font-semibold text-slate-900 dark:text-white">1</span> to <span class="font-semibold text-slate-900 dark:text-white">4</span> of <span class="font-semibold text-slate-900 dark:text-white">124</span> members</p>
                    <div class="flex gap-2">
                        <button class="p-2 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 disabled:opacity-50 transition-colors" disabled="">
                            <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                        </button>
                        <button class="px-4 py-2 rounded-lg bg-primary text-white text-sm font-semibold">1</button>
                        <button class="px-4 py-2 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 text-sm font-medium text-slate-600 dark:text-slate-400 transition-colors">2</button>
                        <button class="px-4 py-2 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 text-sm font-medium text-slate-600 dark:text-slate-400 transition-colors">3</button>
                        <button class="p-2 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-[#111318] text-white py-8 border-t border-[#1f232e]">
        <div class="max-w-[1920px] mx-auto px-6 lg:px-12 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-2 opacity-80 hover:opacity-100 transition-opacity">
                <span class="material-symbols-outlined text-primary text-xl">local_library</span>
                <span class="text-lg font-bold tracking-tight">Perpustakaan</span>
            </div>
            <div class="flex items-center gap-6">
                <a class="text-slate-400 hover:text-white text-sm transition-colors" href="#">Privacy Policy</a>
                <a class="text-slate-400 hover:text-white text-sm transition-colors" href="#">Terms of Service</a>
                <a class="text-slate-400 hover:text-white text-sm transition-colors" href="#">Help Center</a>
            </div>
            <p class="text-slate-500 text-sm font-light tracking-wide">
                © Metzu copyright
            </p>
        </div>
    </footer>

        <!-- POP UP TAMBAH PEGAWAI -->
    <div id="modalTambah" class="fixed inset-0 z-[60] hidden overflow-y-auto">
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity"></div>

    <div class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-md transform overflow-hidden rounded-2xl bg-white dark:bg-[#1e2330] p-8 shadow-2xl transition-all animate-fade-in-up">
            
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white">Tambah Anggota Baru</h3>
                <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form action="CRUD_TAMBAH\Tambah_Pegawai.php" method="POST" class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">NIP</label>
                    <input type="text" placeholder="Masukan NIP" name="nip" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-transparent focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all dark:text-white">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Nama Lengkap</label>
                    <input type="text" placeholder="Masukkan nama lengkap.." name="nama" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-transparent focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all dark:text-white">
                </div>
                

                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Alamat</label>
                    <textarea rows="3" placeholder="Masukkan alamat lengkap..." name="alamat"  class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-transparent focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all dark:text-white resize-none"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Gender</label>
                    <input type="text" placeholder="Masukan Gender" name="gender" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-transparent focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all dark:text-white">
                </div>

                <div class="flex items-center justify-end gap-4 mt-8">
                    <button type="button" onclick="closeModal()" class="px-6 py-2.5 text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-primary hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-0.5">
                        Simpan Anggota
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <div id="modalEditPeminjam" class="fixed inset-0 z-[60] hidden bg-slate-900/60 backdrop-blur-sm px-4 flex items-center justify-center">
    <div class="relative w-full max-w-lg transform overflow-hidden rounded-2xl bg-white dark:bg-[#1e2330] p-8 shadow-2xl">
        <h3 class="text-xl font-bold mb-6 text-slate-900 dark:text-white">Edit Data Peminjam</h3>
        
        <form action="CRUD_Edit/Edit_Pegawai.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-semibold mb-2">NIP</label>
                <input type="text" id="edit_nip" name="nip" readonly class="w-full px-4 py-3 rounded-xl bg-slate-100 dark:bg-slate-800 border-none outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Nama</label>
                <input type="text" id="edit_nama" name="nama" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-transparent">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-2">Alamat</label>
                    <input type="text" id="edit_alamat" name="alamat" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-transparent">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Gender</label>
                    <input type="text" id="edit_gender" name="gender" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-transparent">
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-8">
                <button type="button" onclick="closeEditModal()" class="px-6 py-2.5 text-sm font-medium text-slate-500">Batal</button>
                <button type="submit" class="px-8 py-2.5 bg-primary hover:bg-blue-700 text-white text-sm font-bold rounded-xl">Simpan Perubahan</button>
            </div>
        </form>
    </div>
    </div>
    <script>
        const modal = document.getElementById('modalTambah');
        function openModal(){
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        window.onclick = function(event){
            if(event.target == modal){
                closeModal();
            }
        }
        function openEditModal(nip, nama, alamat, gender){
            document.getElementById('edit_nip').value = nip;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_alamat').value = alamat;
            document.getElementById('edit_gender').value = gender;

            // Tampilkan modal
            const modal = document.getElementById('modalEditPeminjam');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeEditModal() {
            const modal = document.getElementById('modalEditPeminjam');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
</body>
</html>