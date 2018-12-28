<?php 
	include '../dbconnect.php';
	$id_rekod=$_SESSION['id_staf'];		
	$sql_rekod = "SELECT * FROM rekod_surat WHERE  (trkh_srt like '$bulan%' OR trkh_srt_dtrima like '$bulan%') AND dtrima_bhgian='$id_jab'";								
	$result_rekod = mysql_query($sql_rekod) or die('Query failed. ' . mysql_error());
		
?>

<form name="form1" id="form1" action="" >
<table class="table table-striped table-bordered "  id="approve">
   <thead bgcolor="#CCCCCC">
    <tr style="text-align:center">
      <th width="20" bgcolor="#CCCCCC">Bil</th>
      <th width="45" nowrap="nowrap" bgcolor="#CCCCCC">Tarikh Surat</th>
      <th width="40" nowrap="nowrap">Tarikh Surat Diterima</th>
      <th width="200" nowrap="nowrap">Tajuk Surat</th> 
      <th width="100" nowrap="nowrap">Pengirim Surat</th>
      <th width="100" nowrap="nowrap">Status</th>   
    </tr>
  </thead>
  <tbody>
   <?php 
   $tmpCount = 1; 
   while($row_rekod = mysql_fetch_assoc($result_rekod)) {?>        
    <tr>
      <td><a rel="facebox" href="mak_surat.php?id=<?php echo $row_rekod['id']; ?>"class="btn btn-mini btn-inverse"><?php echo $tmpCount; ?></a></td>
      <td><?php echo date("d-m-Y", strtotime($row_rekod['trkh_srt'])) ?></td>
      <td><?php echo date("d-m-Y", strtotime($row_rekod['trkh_srt_dtrima'])); ?></td>
      <td><?php echo $row_rekod['tjk_srt']; ?></td>
      <td><?php echo $row_rekod['pengirim_srt']; ?></td>
      <td><?php echo $row_rekod['tindakan']; ?></td>
    </tr>     
    <?php $tmpCount ++; }?>    
  </tbody>
</table>
 <font size="3" > <a title="" alt="Print Screen" onclick="window.print();" target="_blank" style="cursor:pointer;"> Cetak</a></font> 
</form>
