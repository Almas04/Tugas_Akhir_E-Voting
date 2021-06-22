<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kandidat</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-kandidat" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No Urut</th>
						<th>NPM Ketua</th>
						<th>Nama Ketua</th>
						<th>Angkatan Ketua</th>
						<th>NPM Wakil</th>
						<th>Nama Wakil</th>
						<th>Angkatan Wakil</th>
						<th>Foto Kandidat</th>
						<th>Visi</th>
						<th>Misi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_calon");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td>
							<?php echo $data['id_calon']; ?>
						</td>
						<td>
							<?php echo $data['npm_calon']; ?>
						</td>
						<td>
							<?php echo $data['nama_calon']; ?>
						</td>
						<td>
							<?php echo $data['angkatan_calon']; ?>
						</td>
						<td>
							<?php echo $data['npm_wakil']; ?>
						</td>
						<td>
							<?php echo $data['nama_wakil']; ?>
						</td>
						<td>
							<?php echo $data['angkatan_wakil']; ?>
						</td>
						<td align="center">
							<img src="foto/<?php echo $data['foto_calon']; ?>" width="150px" />
						</td>
						<td>
							<?php echo $data['visi_calon']; ?>
						</td>
						<td>
							<?php echo $data['misi_calon']; ?>
						</td>
						<td>
							<a href="?page=edit-kandidat&kode=<?php echo $data['id_calon']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-kandidat&kode=<?php echo $data['id_calon']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->