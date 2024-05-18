<?php


require 'functions.php';
// $data_obat = query("SELECT * FROM t_obat");
$data_obat = query("SELECT t_obat.*, t_distributor.nama AS nama_distributor FROM t_obat JOIN t_distributor ON t_obat.id_distributor = t_distributor.id");

// // tombol cari ditekan
// if( isset($_POST["cari"]) ) {
// 	$mahasiswa = cari($_POST["keyword"]);
// }


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
	<link href="./output.css" rel="stylesheet">
	<!-- <script src="https://cdn.tailwindcss.com"></script> -->
	<!-- <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script> -->
</head>

<body>

	<!-- ========== HEADER ========== -->
	<header class="z-50 flex flex-wrap w-full text-sm md:justify-start md:flex-nowrap">
		<nav class="mt-6 relative max-w-[85rem] w-full bg-white border border-gray-200 rounded-[36px] mx-2 py-3 px-4 md:flex md:items-center md:justify-between md:py-0 md:px-6 lg:px-8 xl:mx-auto dark:bg-neutral-800 dark:border-neutral-700" aria-label="Global">
			<div class="flex items-center justify-between">
				<a class="flex-none text-xl font-semibold dark:text-white" href="index.php" aria-label="Brand">Toko obat</a>
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
					<a class="font-medium text-blue-600 md:py-6 dark:text-blue-500" href="index.php" aria-current="page">Home</a>
					<a class="font-medium text-gray-500 hover:text-gray-400 md:py-6 dark:text-neutral-400 dark:hover:text-neutral-500" href="admin.php">Admin</a>
					<a class="font-medium text-gray-500 hover:text-gray-400 md:py-6 dark:text-neutral-400 dark:hover:text-neutral-500" href="pemesanan.php">Pemesanan</a>
				</div>
			</div>
		</nav>
	</header>
	<!-- ========== END HEADER ========== -->

	<!-- ========== MAIN CONTENT ========== -->
	<main id="content">

		<div class=" max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-2">
			<h1 class="text-3xl font-bold">Halaman Home</h1>
			
			<hr class="my-4 border-gray-800 dark:border-white">
			
		</div>
		<div class="max-w-[85rem] mx-auto pb-10 px-4 sm:px-6 lg:px-8 ">
			<h2 class="mb-3 text-2xl font-bold">Tabel Obat</h2>
			<div class="flex flex-col">

				<div class="-m-1.5 overflow-x-auto">
					<div class="p-1.5 min-w-full inline-block align-middle">
						<div class="overflow-hidden border rounded-lg shadow dark:border-neutral-700 dark:shadow-gray-900">
							<table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
								<thead class="bg-gray-50 dark:bg-neutral-700">
									<tr>
										<th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-400">No</th>
										<th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-400">Kode</th>
										<th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-400">Nama</th>
										<th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-400">Jenis</th>
										<th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-400">Harga</th>
										<th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-400">Stok</th>
										<th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-400">Distributor</th>
									</tr>
								</thead>
								<tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
									<?php $i = 1; ?>
									<?php foreach ($data_obat as $row) : ?>
										<tr>
											<td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-neutral-200"><?= $i; ?></td>
											<td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200"><?= $row["kode"]; ?></td>
											<td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200"><?= $row["nama"]; ?></td>
											<td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200"><?= $row["jenis"]; ?></td>
											<td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200"><?= $row["harga"]; ?></td>
											<td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200"><?= $row["stok"]; ?></td>
											<td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200"><?= $row["nama_distributor"]; ?></td>

										</tr>
										<?php $i++; ?>
									<?php endforeach; ?>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- ========== END MAIN CONTENT ========== -->

	<script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>