<fieldset>
	<legend>Data Mobil</legend>

	<div style="margin-bottom: 15px;" align="right">
		<form action="" method="post">
			<input type="text" name="inputan_pencarian" placeholeder="Masukan merk" style="width: 200px; padding: 5px;" />
			<input type="submit" name="cari_mobil" value="Cari" style="padding: 3px;" />	
		</form>
	</div>

	<table width="100%" border ="1" style="border-collapse:collapse;">
		<tr style="background-color: #fc0;">
			<th>Kode Mobil</th>
			<th>Merk</th>
			<th>Type</th>
			<th>Warna</th>
			<th>Harga</th>
			<th>Gambar</th>
			<th>Opsi</th>
		</tr>
		<?php
		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_mobil = @$_POST['cari_mobil'];
		if ($cari_mobil) {
			if ($inputan_pencarian |= "") {
				$sql = mysql_query("select * from tb_mobil where merk like '%$inputan_pencarian%' or type like '%$inputan_pencarian%'") or die (mysql_error());
			} else {
				$sql = mysql_query("select * from tb_mobil") or die (mysql_error());
			}		
		} else {
			$sql = mysql_query("select * from tb_mobil") or die (mysql_error());
		}

		$cek = mysql_num_rows($sql);
		if($cek < 1){
			?>
			<tr>
				<tr colspan="7" align="center" style="padding: 10px;">Data tidak ditemukan</tr>
			</tr>
			<?php
		} else {

			while($data = mysql_fetch_array($sql)){
			?>
				<tr>
					<td><?php echo $data['kode_mobil']; ?></td>
					<td><?php echo $data['merk']; ?></td>
					<td><?php echo $data['type']; ?></td>
					<td><?php echo $data['warna']; ?></td>
					<td><?php echo $data['harga']; ?></td>
					<td align="center"><img src="img/<?php echo $data['gambar']; ?> " width = "120px" /></td>
					<td align="center">
						<a href="?page=mobil&action=edit&kdmobil=<?php echo $data['kode_mobil']; ?>"><button>Edit</button></a>
						<a onclick="return confirm('yakin ingin menghapus')"  href="?page=mobil&action=hapus&kdmobil=<?php echo $data['kode_mobil']; ?>"><button>Hapus</button></a>
					</td>
				</tr>
			<?php
		    }
		}
	    ?>
	</table>
</fieldset>