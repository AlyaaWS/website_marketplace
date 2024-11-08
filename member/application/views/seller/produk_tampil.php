<style>
.btn.btn-primary {
    background-color: #FFC0CB; 
    border-color: #FFC0CB;
    font-weight: 600;
    color: black;
}
</style>
<div class="container min-vh-100">
<div class="container">
    <h5 class="py-4">Produk Jual<?php echo $this->session->userdata("nama_member") ?></h5>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>No Kategori</th>
                <th>Judul Buku</th>
                <th>Harga</th>
                <th>Pengarang</th>
                <th>Stok</th>
                <th>Foto</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produk as $key => $value): ?>

            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $value['id_kategori'] ?></td>
                <td><?php echo $value['nama_produk'] ?></td>
                <td><?php echo $value['harga_produk'] ?></td>
                <td><?php echo $value['pengarang'] ?></td>
                <td><?php echo $value['stok'] ?></td>
                <td>
                    <img src="<?php echo $this->config->item("url_produk").$value['foto_produk'] ?>" width="200">
                </td>
                <td>
                    <a href="<?php echo base_url("seller/produk/edit/".$value["id_produk"]) ?>" class="btn btn-warning">Edit</a>
                    <a href="<?php echo base_url("seller/produk/hapus/".$value["id_produk"]) ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a href="<?php echo base_url("seller/produk/tambah") ?>" class="btn btn-primary">Tambah</a>
</div>
</div>