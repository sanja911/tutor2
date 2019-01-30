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
                <h1>Kelas</h1>
            </div>
            <div class="span6 text-right">
                <a href="tambah.php" style="margin-top:15px" class="btn btn-primary">Tambah Kelas</a>
            </div>
        </div>
        <table class="table">
            <?php
            include 'koneksi.php';
            $result = mysql_query("SELECT * FROM kelas ORDER BY id_kelas DESC");
            while ($row = mysql_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['nama_kelas'] ?>
                        <!--tabel detail-->
                        <table class="table" style="margin-left: 50px">
                            <?php
                            $id_kelas = $row['id_kelas'];
                            $result2 = mysql_query("SELECT * FROM anggota WHERE id_kelas_fk = '$id_kelas' ORDER BY id_anggota DESC");
                            while ($row2 = mysql_fetch_assoc($result2)) {
                                ?>
                                <tr>
                                    <td><?php echo $row2['nama_anggota'] ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
