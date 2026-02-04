<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Library Dashboard</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
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
    <style>
        /* Custom scrollbar for webkit (Chrome, Safari) */
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
                    <a class="px-5 py-2.5 text-sm font-semibold text-primary bg-primary/5 rounded-full transition-all duration-300" href="Dashboard.php">
                        Dashboard
                    </a>
                    <a class="px-5 py-2.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary hover:bg-slate-50 dark:hover:bg-slate-800 rounded-full transition-all duration-300" href="Anggota.php">
                        Anggota
                    </a>
                    <a class="px-5 py-2.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary hover:bg-slate-50 dark:hover:bg-slate-800 rounded-full transition-all duration-300" href="Buku.php">
                        Buku
                    </a>
                    <a class="px-5 py-2.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary hover:bg-slate-50 dark:hover:bg-slate-800 rounded-full transition-all duration-300" href="Pegawai.php">
                        Pegawai
                    </a>
                    <a class="px-5 py-2.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary hover:bg-slate-50 dark:hover:bg-slate-800 rounded-full transition-all duration-300" href="Peminjam.php">
                        Peminjam
                    </a>
                </nav>
                <div class="flex items-center gap-4">
                    <form action="../Login/logout.php" method="POST">
                    <button onclick="return confirm('yakin?')" type="submit" class="w-full sm:w-auto px-6 py-3 bg-primary hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg shadow-primary/20 flex items-center justify-center gap-2 transition-all duration-300 transform hover:-translate-y-0.5" >
                    <span>Log out</span>
                    </button>
                    </form>
                    <button class="flex items-center justify-center size-10 rounded-full text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <div class="size-10 rounded-full bg-slate-200 overflow-hidden ring-2 ring-transparent hover:ring-primary cursor-pointer transition-all duration-300 relative group">
                        <img alt="Profile picture of the current user" class="w-full h-full object-cover" data-alt="Close up portrait of a young woman" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC9nlfFXRh0igbh1cB6ni6CSKaJi3CiwAC2XrQA029YM1DhPh2PRBjXqV2eMtUNjPCw7VYzRKwIvx5kj-P5lxM1yhKtq4tPhGDbPq1tGTZR7KSzhqJZ6VLtT40PnnehnzISN3nXqIpcnn7hgco5z6acWdcY-LMo9P-91ci7WmLtt5LgzTU9PUWdfdkZO-bi8uiFMI5oEPGv8f8dsFICqDQ-piOvebxD_7BClBdUbYiGE2OGpujnvi9Bw9mLfDWT0Ebiq0WQjf0O6gkV" />
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow flex flex-col items-center justify-center p-6 lg:p-12 relative overflow-hidden">
        <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] bg-primary/5 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-[-20%] right-[-10%] w-[50%] h-[50%] bg-blue-400/5 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="w-full max-w-5xl animate-fade-in-up">
            <div class="group relative overflow-hidden rounded-2xl shadow-2xl bg-white dark:bg-[#1e2330]">
                <div class="absolute inset-0 z-0">
                    <div class="w-full h-full bg-cover bg-center transform group-hover:scale-105 transition-transform duration-700 ease-out" data-alt="A grand library interior with high shelves filled with books and warm lighting" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCyxabrKo_IKq-MbghrbuReLom_Gi3Yk9cpgTMLpvbK6g68umzotvo3bhZt51j8KwYvOa3KThX7nCVBKfg7uL4ieaPtLrVhhI2X1K4lAvDFwbTzTKSgW_6vP_KOiTsXvGplNYDUaSZ8lUO072zlJhzgZCue_2Pg3hD7Qz5-F2i3J2ZwLjEsSQbuGyx-gURoJ-i3j_zh-WLoJwf77kO0f56ULuVfRGimg5ZBMn_lhii6tbg1u-o81hP4JCTejz31qFk7BYfrzV5wtQp3');"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-black/30"></div>
                </div>
                <div class="relative z-10 p-10 md:p-16 lg:p-24 flex flex-col items-center justify-center text-center min-h-[500px]">
                  
                    <h2 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white leading-tight tracking-tight mb-8 drop-shadow-lg max-w-4xl">
                        "Gunakan AI sebagai asistenmu, Bukan malah memperbudakmu"
                    </h2>
                    <div class="flex items-center gap-4">
                        <div class="h-[1px] w-12 bg-primary"></div>
                        <p class="text-lg md:text-xl text-slate-200 font-medium tracking-wide">
                            Mizu
                        </p>
                        <div class="h-[1px] w-12 bg-primary"></div>
                    </div>
                    <div class="mt-12 flex gap-4">
                        <button class="px-8 py-3 bg-primary hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-primary/50 transition-all duration-300 transform hover:-translate-y-1">
                            Explore Catalog
                        </button>
                        <button class="px-8 py-3 bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/20 font-semibold rounded-lg transition-all duration-300">
                            View Dashboard
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="bg-white dark:bg-[#1e2330] p-6 rounded-xl shadow-sm border border-slate-100 dark:border-slate-800 flex items-center gap-4 hover:border-primary/30 transition-colors">
                    <div class="size-12 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined">menu_book</span>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Total Books</p>
                        <p class="text-2xl font-bold text-slate-900 dark:text-white">12,450</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-[#1e2330] p-6 rounded-xl shadow-sm border border-slate-100 dark:border-slate-800 flex items-center gap-4 hover:border-primary/30 transition-colors">
                    <div class="size-12 rounded-lg bg-green-50 dark:bg-green-900/20 flex items-center justify-center text-green-600">
                        <span class="material-symbols-outlined">people</span>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Active Members</p>
                        <p class="text-2xl font-bold text-slate-900 dark:text-white">842</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-[#1e2330] p-6 rounded-xl shadow-sm border border-slate-100 dark:border-slate-800 flex items-center gap-4 hover:border-primary/30 transition-colors">
                    <div class="size-12 rounded-lg bg-orange-50 dark:bg-orange-900/20 flex items-center justify-center text-orange-600">
                        <span class="material-symbols-outlined">pending_actions</span>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Due Returns</p>
                        <p class="text-2xl font-bold text-slate-900 dark:text-white">24</p>
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

   
</body>
</html>