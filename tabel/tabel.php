<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabel data</title>
        <link rel="stylesheet" href="tabel.css">
        <link rel="stylesheet" href="./../fontawesome-free-6.2.0-web/./css/./all.css"/>
    </head>
    <body>
<?php

$koneksi = mysqli_connect('localhost','root','','kelompok');

function tampilkan($tampilkan){
   global $koneksi;
   $hasil = mysqli_query ($koneksi,$tampilkan);
   $rows = [];
   while($row = mysqli_fetch_assoc($hasil)){
       $rows[] = $row; 
   }
   return $rows;
}
?>
<?php
$users = tampilkan('SELECT * FROM data');
?>

        <form action="" method="post">
            <h1>Tabel data</h1>
            <button class="btn-back">
                <a href="./../index/index.php"> kembali </a>
            </button>
            <table border="2" cellspacing="0" cellpadding="10">
                <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Usia</th>
                    <th>Alamat</th>
                    <th>Agama</th>
                    <th>Gender</th>
                    <th>Pendidikan</th>
                    <th>Prestasi</th>
                    <th>Edit & Hapus</th>
                </tr>
                <?php $id = 1; ?>
                <!-- masukin variabel nya bang -->
                <?php foreach($users as $user) :?>
                <?php error_reporting(E_ALL ^E_WARNING)?>
                <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $user['nama'];?></td>
                    <td><?php echo $user['usia']." tahun ";?></td>
                    <td><?php echo $user['alamat'];?></td>
                    <td><?php echo $user['agama'];?></td>
                    <td><?php echo $user['jenis_kelamin'];?></td>
                    <td><?php echo $user['pendidikan_akhir'];?></td>
                    <td><?php echo $user['prestasi'];?></td>
                    <td>
                        <button type="submit" name="delete" onclick="return confirm('Konfirmasi');" value="<?php echo $user['id'];?>">
                        <i class="fa-solid fa-trash-can"></i>
                        Delete item
                        </button>
                        <button type="submit" name="edit" id="edit">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <a href="edit.php"> Edit</a>
                        </button>
                    </td>
                </tr>
                <?php $id++ ?>
                <?php endforeach; ?>
            </table>
        </form>
    <?php
    error_reporting(0);
    $delete = $_POST['delete'];
    $delete = (int)$delete;

    $sql = "SELECT nama FROM data WHERE id = $delete";
    $result = mysqli_query($koneksi, $sql);

    if(!empty($delete)){
        $stmt = $koneksi->prepare("DELETE FROM data WHERE id = $delete");
        $stmt->execute();
        echo "<br><br><br>";
        while ($row = mysqli_fetch_assoc($result))
        {
            header("Refresh:0");
        }
    }

    ?>
    </body>
</html>
