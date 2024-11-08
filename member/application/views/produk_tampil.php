<div class="container min-vh-100">
    <h5 class="py-4">Produk Terbaru</h5>
    
    <!-- Filter Kategori -->
    <form method="get" action="<?php echo base_url('produk'); ?>" class="mb-3">
        <select name="kategori" class="form-select" onchange="this.form.submit()">
            <option value="">Semua Kategori</option>
            <?php foreach ($kategori as $kat): ?>
                <option value="<?php echo $kat['id_kategori']; ?>" <?php echo ($kategori_id == $kat['id_kategori']) ? 'selected' : ''; ?>>
                    <?php echo $kat['nama_kategori']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <!-- Daftar Produk -->
    <div class="row">
        <?php foreach ($produk as $value): ?>
            <div class="col-md-4">
                <a href="<?php echo base_url("produk/detail/".$value["id_produk"]) ?>" class="text-decoration-none">
                    <div class="card border-0 shadow-sm">
                        <img src="<?php echo $this->config->item("url_produk").$value['foto_produk'] ?>" alt="<?php echo $value['nama_produk'] ?>" class="card-img-top">
                        <div class="card-body text-center">
                            <h6><?php echo $value['nama_produk'] ?></h6>
                            <p class="lead">Rp <?php echo number_format($value['harga_produk']) ?></p>
                            <p class="text-muted">Kategori: <?php echo $value['nama_kategori'] ?></p>
                            <p>
                                <span class="text-muted">Pengarang: <?php echo $value['pengarang']; ?></span> |
                                <span class="text-muted">Stok: <?php echo $value['stok']; ?></span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
