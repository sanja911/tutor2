<?php
//isi default
$kelas = '';
$nama = array();

//error
$error_kelas = '';
$error_nama = '';

//jika form disumbit
if (isset($_POST['submit'])) {
    $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
    $nama = isset($_POST['nama_input']) ? $_POST['nama_input'] : array();
    
//    nama kelas tidak boleh kosong
    if ($kelas == '') {
        $error_kelas = 'nama kelas tidak boleh kosong';
    }

//    nama harus diisi
    $nama_kosong = 0;
    foreach ($nama as $key => $n) {
        if ($n == '') {
            $nama_kosong++;
        }
    }
    if ($nama == array() OR $nama_kosong > 0) {
        $error_nama = 'nama anggota tidak boleh kosong';
    }
    
//    jika validasi lolos, masukkan ke database
    if ($error_kelas == '' && $error_nama == '') {
        include 'koneksi.php';
//        masukkan nama kelas ke tabel kelas
        mysql_query("INSERT INTO kelas (nama_kelas) VALUES ('$kelas')");
        
//        masukkan nama anggota kelas
//        note : ini bukan cara yg bagus buat menangkap id, seharusnya ada kode kelas sehingga tidak ada peluang salah ambil id
//               dalam contoh ini saya gunakan id agar lebih mudah saja 
        $result = mysql_query("SELECT MAX(id_kelas) as id_terakhir FROM kelas");
        $row = mysql_fetch_assoc($result);
        $id_kelas_fk = $row['id_terakhir'];
        
//        masukkan nama anggota
        foreach ($nama as $key => $n) {
            mysql_query("INSERT INTO anggota (id_kelas_fk,nama_anggota) VALUES ('$id_kelas_fk','$n')");
        }
        
//        redirect ke tabel kelas
        echo '<script>window.location="index.php"</script>';
    }
    
    
}
?>
<!doctype html>
<html>
    <head>
        <title>Dinamis Form Example - harviacode.com</title>
        <link rel="stylesheet" href="bootstrap.min.css"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row-fluid">
            <div class="span6">
                <form action="tambah.php" method="post">
                    <label>Nama Kelas <span style="color: red"><?php echo $error_kelas ?></span></label>
                    <input type="text" name="kelas" value="<?php echo $kelas; ?>" />
                    <label>Anggota <span style="color: red"><?php echo $error_nama ?></span> <a onclick="additem();
                            return false">Tambah</a></label>
                    <table class="table table-condensed">
                        <!--elemet sebagai target append-->
                        <tbody id="itemlist">
                            <?php
                            /* DISINI SEDIKIT TRICKY
                             * ini untuk menampilkan isian yang telah diinputkan sebelumnya
                            tanpa ini inputan yang udah diinput akan hilang karena DOM hanya dimodifikasi
                            sebelum form disubmit, saat disubmit DOM akan kembali ke awal, oleh karena itu
                            kita perlu 'menangkap' inputan pada nama dan membuat baris tabel berdasarkan
                            inputan yang tadi disubmit */
                            $i = 0;
                            foreach ($nama as $key => $j) {
                                ?>
                                <tr id="<?php echo $key . 'tr' ?>"> 
                                    <td><input name="nama_input[<?php echo $key ?>]" class="input-block-level" value="<?php echo $j ?>" /></td>
                                    <td width="50px"><?php echo '<a onclick="busek(' . $key . '); return false;" id="' . $key . '">hapus</a>' ?></td>
                                </tr>
                                <?php
                                $i = $key;
                            }
                            ?>
                        </tbody>
                    </table>
                    <button name="submit" class="btn btn-small btn-primary">Simpan</button>
                </form>        
            </div>
        </div>
        <script>
            var i = "<?php echo $i + 1; ?>";
            function additem() {
//                menentukan target append
                var itemlist = document.getElementById('itemlist');

//                membuat element
                var row = document.createElement('tr');
                var nama = document.createElement('td');
                var aksi = document.createElement('td');
                aksi.setAttribute('width', '50px');

//                meng append element
                itemlist.appendChild(row);
                row.appendChild(nama);
                row.appendChild(aksi);

//                membuat element input
                var nama_input = document.createElement('input');
                nama_input.setAttribute('name', 'nama_input[' + i + ']');
                nama_input.setAttribute('class', 'input-block-level');

                var hapus = document.createElement('span');

//                meng append element input
                nama.appendChild(nama_input);
                aksi.appendChild(hapus);

                hapus.innerHTML = '<a>hapus</a>';
//                membuat aksi delete element
                hapus.onclick = function () {
                    row.parentNode.removeChild(row);
                };

                i++;
            }

            function busek(id) {
                var ele = id + 'tr';
                var elem = document.getElementById(ele);
                return elem.parentNode.removeChild(elem);
            }
            ;
        </script>
    </body>
</html>