<?= $this->extend('components/layout') ?>
<?= $this->section('content') ?>
<?php
if(session()->getFlashData('success')){
?> 
<div class="alert alert-info alert-dismissible fade show" role="alert">
	<?= session()->getFlashData('success') ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>
<?php
if(session()->getFlashData('failed')){
?> 
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<?= session()->getFlashData('failed') ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
Tambah Data
</button>
<!-- Table with stripped rows -->
<table class="table datatable">
<thead>
	<tr>
	<th scope="col">#</th>
	<th scope="col">Tanggal</th>
	<th scope="col">Username</th>
	<th scope="col">Total Harga</th>
	<th scope="col">Ongkir</th>
	<th scope="col">Status</th>
	<th scope="col"></th> 
	</tr>
</thead>
<tbody>
	<?php foreach($transaksi_list as $index=>$transaksi): ?>
	<tr>
	<th scope="row"><?= $index+1?></th>
	<td><?= $transaksi['created_date'] ?></td> 
	<td><?= $transaksi['username'] ?></td> 
	<td><?= $transaksi['total_harga'] ?></td> 
	<td><?= $transaksi['ongkir'] ?></td> 
	<td>
		<?php
		if ($transaksi['status'] == 0) {
			echo "Diproses";
		} else if ($transaksi['status'] == 1) {
			echo "Dikirim";
		} else if ($transaksi['status'] == 2) {
			echo "Selesai";
		} else {
			echo "Kesalahan";
		}
		?>
	</td>
	<td>
		<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $transaksi['id'] ?>">
			Ubah
		</button>
		<a href="<?= base_url('produk/delete/'.$transaksi['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')">
			Hapus
		</a>
	</td>
	</tr>
	<!-- Edit Modal Begin -->
	<div class="modal fade" id="editModal-<?= $transaksi['id'] ?>" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Data</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('transaksi/commit/'.$transaksi['id']) ?>" method="post" enctype="multipart/form-data">
			<?= csrf_field(); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="name">Username</label>
					<input type="text" name="username" class="form-control" id="nama" value="<?= $transaksi['username'] ?>" placeholder="Nama Barang" required>
				</div>
				<div class="form-group">
					<label for="name">Total Harga</label>
					<input type="text" name="total_harga" class="form-control" id="harga" value="<?= $transaksi['total_harga'] ?>" placeholder="Harga Barang" required>
				</div>
				<div class="form-group">
					<label for="name">Ongkir</label>
					<input type="text" name="ongkir" class="form-control" id="jumlah" value="<?= $transaksi['ongkir'] ?>" placeholder="Jumlah Barang" required>
				</div>
				<div class="form-group">
					<label for="name">Status</label>
					<!-- <input type="text" name="status" class="form-control" id="keterangan" value="<?= $transaksi['status'] ?>" placeholder="Keterangan Barang" required> -->
					<select name="status" id="status">
						<option value="0" <?= $transaksi['status'] == 0 ? "selected" : "" ?>>Diproses</option>
						<option value="1" <?= $transaksi['status'] == 1 ? "selected" : "" ?>>Dikirim</option>
						<option value="2" <?= $transaksi['status'] == 2 ? "selected" : "" ?>>Selesai</option>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal End -->
	<?php endforeach ?>   
</tbody>
</table>
<!-- End Table with stripped rows -->
<!-- Add Modal Begin -->
<div class="modal fade" id="addModal" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Tambah Data</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<form action="<?= base_url('produk') ?>" method="post" enctype="multipart/form-data">
		<?= csrf_field(); ?>
		<div class="modal-body">
			<div class="form-group">
				<label for="name">Nama</label>
				<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Barang" required>
			</div>
			<div class="form-group">
				<label for="name">Harga</label>
				<input type="text" name="harga" class="form-control" id="harga" placeholder="Harga Barang" required>
			</div>
			<div class="form-group">
				<label for="name">Jumlah</label>
				<input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah Barang" required>
			</div>
			<div class="form-group">
				<label for="name">Keterangan</label>
				<input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan Barang" required>
			</div>
			<div class="form-group">
				<label for="name">Foto</label>
				<input type="file" class="form-control" id="foto" name="foto">
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
		</form>
		</div>
	</div>
</div>
<!-- Add Modal End -->
<?= $this->endSection() ?>