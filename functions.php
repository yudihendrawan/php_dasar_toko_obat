<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "toko_obat");


function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function tambahObat($data)
{
  global $conn;

  $kode = htmlspecialchars($data["kode"]);
  $nama = htmlspecialchars($data["nama"]);
  $jenis = htmlspecialchars($data["jenis"]);
  $harga = htmlspecialchars($data["harga"]);
  $stok = htmlspecialchars($data["stok"]);
  $distributor = htmlspecialchars($data["distributor"]);



  $query = "INSERT INTO t_obat
				VALUES
			  ('', '$kode', '$nama', '$jenis', '$harga', '$stok', '$distributor')
			";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function hapusObat($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM t_obat WHERE id = $id");
  return mysqli_affected_rows($conn);
}


function ubahObat($data)
{
  global $conn;

  $id = $data["id"];
  $kode = htmlspecialchars($data["kode"]);
  $nama = htmlspecialchars($data["nama"]);
  $jenis = htmlspecialchars($data["jenis"]);
  $harga = htmlspecialchars($data["harga"]);
  $stok = htmlspecialchars($data["stok"]);
  $distributor = htmlspecialchars($data["distributor"]);


  $query = "UPDATE t_obat SET
				kode = '$kode',
				nama = '$nama',
				jenis = '$jenis',
				harga = '$harga',
				stok = '$stok',
				id_distributor = '$distributor'
			  WHERE id = $id
			";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function cariObat($keyword)
{
  $query = "
  SELECT t_obat.*, t_distributor.nama AS nama_distributor
  FROM t_obat
  JOIN t_distributor ON t_obat.id_distributor = t_distributor.id
  WHERE
      t_obat.kode LIKE '%$keyword%' OR
      t_obat.nama LIKE '%$keyword%' OR
      t_obat.jenis LIKE '%$keyword%' OR
      t_obat.harga LIKE '%$keyword%' OR
      t_obat.stok LIKE '%$keyword%' OR
      t_obat.id_distributor LIKE '%$keyword%'
";

  return query($query);
}



function tambahDistributor($data)
{
  global $conn;

  $kode = htmlspecialchars($data["kode"]);
  $nama = htmlspecialchars($data["nama"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $email = htmlspecialchars($data["email"]);
  $telepon = htmlspecialchars($data["telepon"]);
  $pic = htmlspecialchars($data["pic"]);



  $query = "INSERT INTO t_distributor
				VALUES
			  ('', '$kode', '$nama', '$alamat', '$email', '$telepon', '$pic')
			";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


// distributor

function hapusDistributor($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM t_distributor WHERE id = $id");
  return mysqli_affected_rows($conn);
}



function ubahDistributor($data)
{
  global $conn;


  $id = $data["id"];
  $kode = htmlspecialchars($data["kode"]);
  $nama = htmlspecialchars($data["nama"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $email = htmlspecialchars($data["email"]);
  $telepon = htmlspecialchars($data["telepon"]);
  $pic = htmlspecialchars($data["pic"]);



  $query = "UPDATE t_distributor SET
				kode = '$kode',
				nama = '$nama',
				alamat = '$alamat',
				email = '$email',
				telepon = '$telepon',
				pic = '$pic'
			  WHERE id = $id
			";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}



function cariDistributor($keyword)
{
  $query = "SELECT * FROM t_distributor
				WHERE
			  kode LIKE '%$keyword%' OR
			  nama LIKE '%$keyword%' OR
			  alamat LIKE '%$keyword%' OR
			  email LIKE '%$keyword%' OR
			  telepon LIKE '%$keyword%' OR
			  pic LIKE '%$keyword%'
			";
  return query($query);
}
