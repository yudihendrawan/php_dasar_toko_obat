<?php 


require '../functions.php';

$id = $_GET["id"];

if( hapusDistributor($id) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
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

?>