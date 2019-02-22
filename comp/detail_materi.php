<?php
  include "koneksi.php";
	$id=$_GET['id'];
  $modal=mysql_query("SELECT * FROM materi WHERE id_materi='$id'");
	while($r=mysql_fetch_array($modal)){
?>
<?php
$sql = "select * from ambil_mapel where id_mapel='$r[id_mapel]'";
$hasil = mysql_query($sql);
$data  = mysql_fetch_array($hasil);
?>
<div class="modal-dialog">
    <div class="modal-content abt-w3l">
							<div class="modal-header">
								<button type="button" class="close clo1" data-dismiss="modal">&times;</button>
									<form>
                  <div class="row">
			                <div class="panel panel-default">
					                <div class="panel-heading">
                    
                    Materi <?php echo $data['mapel'];?> Kelas <?php echo $r['id_kelas'];?>
                     </div>
                   </div>
                  <div class="panel-body">
                   <label><?php echo $r['judul'];?></label>
                   <div> <?php echo $r['materi'];?> </div> 
                   </div>
                   <div class="panel-footer">
                   <div>File Anda : <a href="../comp/dok/<?php echo $r['file']?>"</a><?php echo $r['file']?></div> 
                   </div>
                   </form>

			</div>
						</div>
					</div>

             <?php } ?>


            </div>


        </div>
    </div>
