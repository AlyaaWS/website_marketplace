<style>
.btn.btn-primary {
    background-color: #FFC0CB; 
    border-color: #FFC0CB;
    font-weight: 600;
    color: black;
}
</style>
<div class="container">
    <h5>Tambah Produk</h5>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Kategori</label>
            <select class="form-control form-select" name="id_kategori">
                <option value="">Pilih</option>
                <?php foreach ($kategori as $key => $value): ?>

                <option value="<?php echo $value['id_kategori'] ?>">
                <?php echo $value['nama_kategori'] ?>
                </option>
                <?php endforeach ?>
        </select>
        </div>
        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="nama_produk" class="form-control">
        </div>
        <div class="mb-3">
            <label>Pengarang</label>
            <input type="text" name="pengarang" class="form-control">
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga_produk" class="form-control">
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control">
        </div>
        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto_produk" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi_produk"></textarea>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>