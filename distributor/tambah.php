<?php


require '../functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (tambahDistributor($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = '../admin.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = '../admin.php';
			</script>
		";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Halaman Admin</title>
    <style>
        .loader {
            width: 100px;
            position: absolute;
            top: 118px;
            left: 210px;
            z-index: -1;
            display: none;
        }

        @media print {

            .logout,
            .tambah,
            .form-cari,
            .aksi {
                display: none;
            }
        }
    </style>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/script.js"></script>
    <link href="../output.css" rel="stylesheet">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script> -->
</head>

<body>

    <!-- ========== HEADER ========== -->
    <header class="z-50 flex flex-wrap w-full text-sm md:justify-start md:flex-nowrap">
        <nav class="mt-6 relative max-w-[85rem] w-full bg-white border border-gray-200 rounded-[36px] mx-2 py-3 px-4 md:flex md:items-center md:justify-between md:py-0 md:px-6 lg:px-8 xl:mx-auto dark:bg-neutral-800 dark:border-neutral-700" aria-label="Global">
            <div class="flex items-center justify-between">
                <a class="flex-none text-xl font-semibold dark:text-white" href="../index.php" aria-label="Brand">Toko obat</a>
                <div class="md:hidden">
                    <button type="button" class="flex items-center justify-center text-sm font-semibold text-gray-800 border border-gray-200 rounded-full hs-collapse-toggle size-8 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700" data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                        <svg class="flex-shrink-0 hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="flex-shrink-0 hidden hs-collapse-open:block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="navbar-collapse-with-animation" class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow md:block">
                <div class="flex flex-col mt-5 gap-y-4 gap-x-0 md:flex-row md:items-center md:justify-end md:gap-y-0 md:gap-x-7 md:mt-0 md:ps-7">
                    <a class="font-medium text-gray-500 hover:text-gray-400 md:py-6 dark:text-neutral-400 dark:hover:text-neutral-500" href="../index.php">Home</a>
                    <a class="font-medium text-blue-600 md:py-6 dark:text-blue-500" href="../admin.php" aria-current="page">Admin</a>
                    <a class="font-medium text-gray-500 hover:text-gray-400 md:py-6 dark:text-neutral-400 dark:hover:text-neutral-500" href="../pemesanan.php">Pemesanan</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">

        <!-- Card Section -->
        <div class="max-w-2xl px-4 py-10 mx-auto sm:px-6 lg:px-8 lg:py-14">
            <!-- Card -->
            <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-neutral-900">
                <div class="mb-8 text-center">
                    <h2 class="text-2xl font-bold text-gray-800 md:text-3xl dark:text-neutral-200">
                        Distributor
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                        Input data distributor.
                    </p>
                </div>

                <form method="POST" action="">
                    <!-- Section -->
                    <div class="py-6 border-t border-gray-200 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                        <label for="kode" class="inline-block text-sm font-medium dark:text-white">
                            Kode
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="kode" type="text" class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="kode" placeholder="Kode Obat">
                        </div>
                    </div>
                    <!-- End Section -->


                    <!-- Section -->
                    <div class="py-6 border-t border-gray-200 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                        <label for="nama" class="inline-block text-sm font-medium dark:text-white">
                            Nama Distributor
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="nama" type="text" class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="nama" placeholder="Nama Distributor">
                        </div>
                    </div>
                    <!-- End Section -->

                    <!-- Section -->
                    <div class="py-6 border-t border-gray-200 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                        <label for="alamat" class="inline-block text-sm font-medium dark:text-white">
                            Alamat
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="jenis" type="text" class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="alamat" placeholder="Alamat">
                        </div>
                    </div>
                    <!-- End Section -->


                    <!-- Section -->
                    <div class="py-6 border-t border-gray-200 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                        <label for="email" class="inline-block text-sm font-medium dark:text-white">
                            Email
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="email" type="email" class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="email" placeholder="Email">
                        </div>
                    </div>
                    <!-- End Section -->


                    <!-- Section -->
                    <div class="py-6 border-t border-gray-200 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                        <label for="telepon" class="inline-block text-sm font-medium dark:text-white">
                            Telepon
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="telepon" type="text" class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="telepon" placeholder="Telepon">
                        </div>
                    </div>
                    <!-- End Section -->
                    <!-- Section -->
                    <div class="py-6 border-t border-gray-200 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                        <label for="pic" class="inline-block text-sm font-medium dark:text-white">
                            PIC
                        </label>

                        <div class="mt-2 space-y-3">
                            <div class="mt-2 space-y-3">
                                <input id="pic" type="text" class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="pic" placeholder="PIC">
                            </div>
                        </div>
                    </div>
                    <!-- End Section -->
                    <div class="flex justify-end mt-5 gap-x-2">
                        <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                            <a href="../admin.php"> Batal </a>
                        </button>
                        <button name="submit" type="submit" class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Simpan
                        </button>
                    </div>
                </form>


            </div>
            <!-- End Card -->
        </div>
        <!-- End Card Section -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>