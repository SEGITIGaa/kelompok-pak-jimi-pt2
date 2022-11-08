<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>isi data</title>
        <link rel="stylesheet" href="./../index/index.php">
    </head>
    <body>
        <?php
        error_reporting(0);
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
        $users = tampilkan('SELECT * FROM data');
        foreach($users as $user) :
            $user['id'];
            $user['nama'];
            $user['usia'];
            $user['alamat'];
            $user['agama'];
            $user['jenis_kelamin'];
            $user['pendidikan_akhir'];
            $user['prestasi'];
            endforeach;

        ?>
        <div class="form-container">
            <form action="./edit.php" method="post">
                <table >
                    <tr>
                        <td>
                            <h1>Edit Biodata</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="namaEd" id="" placeholder="nama" value="<?php echo $user['nama']?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="usiaEd" id="" placeholder="usia" value="<?php echo $user['usia']?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="alamatEd" id="" placeholder="alamat" value="<?php echo $user['alamat']?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <select name="agamaEd" id="agama" required>
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
                        <select name="genderEd" id="gender" required>
                                <option value="" disabled="disabled" selected="selected" required>jenis kelamin</option>
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
                            <select name="pendidikanEd" id="pendidikan" required>
                                <option value="" disabled="disabled" selected="selected">pendidikan akhir</option>
                                <option value="sma">sma</option>
                                <option value="smp">smp</option>
                                <option value="sd">sd</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="text" name="prestasiEd" id="" placeholder="prestasi" value="<?php echo $user['prestasi']?>" required>
                        </td>
                    </tr>
                    <div class="btn">
                    <tr>
                        <td>
                            <button type="submit" id="submit" onclick="return confirm('Konfirmasi');"> Simpan </button>
                            <button>
                                <a href="./../tabel.php">Lihat tabel</a>
                            </button>
                        </td>
                    </tr>
                    </div>
                </form>
            </table>
        </div>
<?php
error_reporting(0);

$namaEd = $_POST['namaEd'];
$usiaEd = $_POST['usiaEd'];
$alamatEd = $_POST['alamatEd'];
$agamaEd = $_POST['agamaEd'];
$genderEd = $_POST['genderEd'];
$pendidikanEd = $_POST['pendidikanEd'];
$prestasiEd = $_POST['prestasiEd'];
$id = $user['id'];

$sqlEdit = "UPDATE data SET nama = '$namaEd', usia = '$usiaEd', alamat = '$alamatEd', agama = '$agamaEd', jenis_kelamin = '$genderEd', pendidikan_akhir = '$pendidikanEd', prestasi = '$prestasiEd' WHERE id='$id'";

if(!empty($namaEd)){
    $insert = mysqli_query($koneksi, $sqlEdit);
}
?>
    </body>
</html>