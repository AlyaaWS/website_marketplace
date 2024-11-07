<div class="container">
    <h5>Edit Artikel</h5>

    <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
            <label>Judul Artikel</label>
            <input type="text" name="judul_artikel" class="form-control" value="<?php echo set_value("judul_artikel", $artikel['judul_artikel']); ?>">

            <span class="small text-danger">
                <?php echo form_error("judul_artikel") ?>
            </span>
        </div>
    <div class="mb-3">
            <label>isi artikel</label>
            <input type="text" id="editorku" name="isi_artikel" class="form-control" value="">
            <textarea class="form-control" name="isi_artikel"><?php echo set_value("caption_artikel",$artikel['caption_artikel']) ?> </textarea>
            <span class="text-danger small">
                <?php echo form_error("caption_artikel") ?>
            </span>
        </div>
        <div class="mb-3">
            <label>Foto Lama</label><hr>
            <img src="<?php echo $this->config->item("url_artikel").$artikel["foto_artikel"] ?>" width="300">
        </div>
        <div class="mb-3">
            <label>Ganti Foto artikel</label>
            <input type="file" name="foto_artikel" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>