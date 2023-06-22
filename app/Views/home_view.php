<?= $this->extend('components/layout') ?>
<?= $this->section('content') ?> 
<div class="row">
	<?php foreach($produks as $index=>$produk): ?> 
	<div class="col-lg-6">
		<div class="card">
			<div class="card-body">
				<img src="<?= "public/img/".$produk['foto'] ?>" alt="..." width="300px">
				<h5 class="card-title"><?= $produk['nama'] ?><br><?= $produk['harga'] ?></h5>
			</div>
		</div> 
	</div>
	<?php endforeach ?> 
</div>
<?= $this->endSection() ?>