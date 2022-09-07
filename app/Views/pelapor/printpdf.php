
<body onLoad="javascript:print()"> 
<style type="text/css">
<!--
.style3 {font-size: 12px}
-->
.style5 {font-size: 24px}
</style>

<div class="panel-heading">
                            <table width="100%">
							<tr>
							<td><div align="center">
							<div align="center">
							<b>PEMERINTAHAN KABUPATEN PESISIR SELATAM<br>DINAS SATUAN POLISI PAMONG PRAJA DAN PEMADAM KEBAKARAN<br>Jl. H. Agus Salim, Kabupaten Pesisir Selatan, Sumatera Barat.</b><br><hr><br>Laporan Kebakaran<br><?= Date('d F Y'); ?></div>
							 </td>
							</tr>
							</table>
</div>
<br>
<table id='theList' border=1 width='100%' class='table table-bordered table-striped' cellspacing="0">
<th scope="col">Nomor</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Handphone</th>
                            <th scope="col">Jenis Kebakaran</th>
                            <th scope="col">Nama Kantor</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
<!-- 				<th>Tanggal Masuk</th>
				<th>Di Beli</th> -->
</tr>

<?php $i= 1; ?>
                            <?php foreach ($pelapor as $row):
                            
                             ?>
<tr>
	<td class='td' align='center'><span class="style3"><?php echo $i; ?></span></td>

    <td align="center"><?= $row->nama_pel; ?></td>
					<td  align="center"><?= $row->nohp_pel; ?></td>
					
					<td align="center"><?= $row->nm_kebakaran; ?></td>
					<td align="center"><?= $row->nama; ?></td>
					<td align="center"><?= $row->data_create; ?></td>
                    <td align="center"><?php if ($row->status_lap=='0') { ?>
                              <span style="color:black;">Proses</span>
                          <?php  }else{ ?>
                            <span style="color:black;">Selesai</span>
                            <?php } ?></td>
</tr>
<?php $i++; ?>
                          <?php endforeach; ?>

</table>
<br>
<br>
<br>

<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
	<td width="63%" bgcolor="#FFFFFF">
		<p align="center"></p><br/>
	</td>
 	<td width="37%" bgcolor="#FFFFFF">
 		<div align="center">Pemadam Kebakaran <?= Date('d F Y'); ?><br/>
		Kepala Dinas SatPolPP dan Pemadam Kebakaran
		<br/><br/>
		<br/><br/>
		(...............................)
		<br/>
		</div>
	</td>
</tr>
</table> 


