<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>isi data</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <div class="logout">
        <button>
        <a href="./../login/Login.php">Logout</a>
        </button>
        </div>
        <div class="form-container">
            <form action="index.php" method="post">
                <table >
                    <tr>
                        <td>
                            <h1>Biodata</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="nama" id="" placeholder="nama">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="usia" id="" placeholder="usia">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="alamat" id="" placeholder="alamat">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <select name="agama" id="agama">
                                <option value="" disabled="disabled" selected="selected">agama</option>
                                <option value="islam"> islam</option>
                                <option value="khatolik">khatolik</option>
                                <option value="protestan">protestan</option>
                                <option value="budha">budha</option>
                                <option value="hindu">hindu</option>
                                <option value="konghucu">konghucu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <select name="gender" id="gender">
                                <option value="" disabled="disabled" selected="selected">jenis kelamin</option>
                                <option value="pria">pria</option>
                                <option value="wanita">wanita</option>
                            </select>
                        </td>
                    </tr>
                   <tr>
                    <td>
                    <h4>Pendidikan & presetasi</h4>
                    </td>
                   </tr>
                    <tr>
                        <td>
                            <select name="pendidikan" id="pendidikan">
                                <option value="" disabled="disabled" selected="selected">pendidikan akhir</option>
                                <option value="sma">sma</option>
                                <option value="smp">smp</option>
                                <option value="sd">sd</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="text" name="prestasi" id="" placeholder="prestasi">
                        </td>
                    </tr>
                    <div class="btn">
                    <tr>
                        <td>
                            <button type="submit" id="submit" name="kirim"> submit </button>
                            <?php
                            if(isset ($_POST["kirim"]) ){
                                echo "<script>
                                    alert('berhasil di masukan ke tabel')
                                    </script>";
                            }
                            ?>
                            <button>
                                <a href="./../tabel/tabel.php">Lihat tabel</a>
                            </button>
                        </td>
                    </tr>
                    </div>
                </form>
            </table>
        </div>
<?php
error_reporting(0);
$kon = mysqli_connect('localhost', 'root', '', 'kelompok');

$nama = $_POST['nama'];
$usia = $_POST['usia'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$gender = $_POST['gender'];
$pendidikan = $_POST['pendidikan'];
$prestasi = $_POST['prestasi'];

$sqlInput = "INSERT INTO data(nama,usia,alamat,agama,jenis_kelamin,pendidikan_akhir,prestasi) VALUES('$nama', '$usia', '$alamat', '$agama', '$gender', '$pendidikan', '$prestasi')";

if(!empty($nama)){
    $insert = mysqli_query($kon, $sqlInput);
}
?>
    </body>
</html>
