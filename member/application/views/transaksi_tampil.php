<style>
.btn.btn-info {
    background-color: #FFC0CB; 
    border-color: #FFC0CB;
    font-weight: 600;
    color: black;
}
</style>
<div class="container min-vh-100">
    <div class="container">
    <h5 class="py-4">Data Transaksi Beli <?php echo $this->session->userdata("nama_member") ?></h5>
    <table class="table table-bordered" id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $key => $value): ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo date('d M Y H:i', strtotime($value['tanggal_transaksi'])) ?></td>
                <td><?php echo number_format($value['total_transaksi']) ?></td>
                <td>
                    <span class="badge bg-dark">
                        <?php echo $value['status_transaksi'] ?>
                    </span>
                    <h6>Resi: <?php echo $value['resi_ekspedisi'] ?></h6>
                </td>
                <td>
                    <a href="<?php echo base_url("transaksi/detail/".$value["id_transaksi"]) ?>" class="btn btn-info">Detail</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</div>