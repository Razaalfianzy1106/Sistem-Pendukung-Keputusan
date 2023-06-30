
<h1>Nilai Matriks</h1>
<ul class="nav nav-tabs">
  
  <li class="active" ><a href="index.php?a=kriteria&k=kriteria">Isi Nilai Matriks</a></li>
  
  
  
</ul>
<div class="box-header">
    <h3 class="box-title">Tambah Nilai Matriks</h3>
</div>


<form method="POST" action="">
<div class="form-group">
							<label class="control-label col-lg-2">Id Alternatif</label>
							<div class="col-lg-4">
								<select name="id_alt" class="form-control">
								<?php
								include ("konfig/koneksi.php");
								$s=mysqli_query($k21,"select * from alternatif");
								while($d=mysqli_fetch_assoc($s)){
								?>
								
									<option value="<?php echo $d['id_alternatif'] ?>"><?php echo $d['id_alternatif']." | ".$d['nm_alternatif'] ?></option>
								<?php
								}
								?>
								</select>
							
								
							</div>
							
						</div>
						<br />
<hr />

<div class="form-group">
								<?php
								$i=1;
								$alt=mysqli_query($k21,"select * from kriteria");
						//hitung jml kriteria		
						$jml_krit=mysqli_num_rows($alt);		
								
								while($dalt=mysqli_fetch_assoc($alt)){
								?>
						
	<table   align="left">
		<tr>
		<td width="200" >
							<label ><?php echo $dalt['nama_kriteria']; ?></label>
							<input type="hidden" name="id_krite<?php echo $i; ?>" value="<?php echo $dalt['id_kriteria']; ?>" />
		</td>					
							<div class="col-md-8">
		<td width="80">					
							<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin1']; ?>" /><?php echo $dalt['poin1']; ?>
		</td>
		<td width="80">					
							<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin2']; ?>"/><?php echo $dalt['poin2']; ?>
		</td>
		<td width="80">					
							<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin3']; ?>"/><?php echo $dalt['poin3']; ?>
		</td>
		<td width="80">					
							<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin4']; ?>"/><?php echo $dalt['poin4']; ?>
		</td>	
		<td width="80">					
							<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin5']; ?>"/><?php echo $dalt['poin5']; ?>
		</td>
		</tr>	
								
								<?php
								$i++;
								}
								?>
		<tr>
		<td colspan=5 align="center">
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
		</td>
		</tr>
</table>		

							</div>
							
						</div>
						
						
</form>						
<?php
$b=mysqli_query($k21,"select * from kriteria");
$c=mysqli_fetch_assoc($b);



if(isset($_POST['simpan'])){
 
$o=1;

//cek id alternatif
$id_alt=$_POST['id_alt'];
$cek=mysqli_query($k21,"select * from alternatif where id_alternatif='$id_alt'");
$cek_l=mysqli_num_rows($cek);
if($cek_l>0){
	$del=mysqli_query($k21,"delete from nilai_matrik where id_alternatif='$id_alt'");
}

for($n=1;$n<=$jml_krit;$n++){
	$id_k=$_POST['id_krite'.$o];
	 $nilai_k=$_POST['nilai'.$o];
	
	
	$m=mysqli_query($k21,"insert into nilai_matrik (id_alternatif,id_kriteria,nilai) values('$_POST[id_alt]','$id_k','$nilai_k')");
	
    if($m){
       // echo "OK <br>";
    }
    
	$o++;
}

}
?>			

			