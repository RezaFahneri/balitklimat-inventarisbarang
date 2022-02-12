<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="shadow">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold">Pinjam Barang</h3><br>
                        <div class="col-md-12 grid-margin">
                            <div class="card shadow mb-12">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <form method="post" action="<?php echo base_url('pinjam_barang/pinjam_aksi') ?>" enctype="multipart/form-data"></br>
                                            <div class="form-group">
                                                <label>Nama Barang </label></br>
                                                <select name="id_barang" id="id_barang" class="form-control" required>
                                                    <option value="">--Pilih Nama Barang--</option>
                                                    <?php
                                                    if($barang . 'jumlah_barang' > 0);
                                                     foreach ($barang as $row) { ?>
                                                        <option value="<?php echo $row->id_barang; ?>"><?php echo $row->nama_barang; ?></option>';
                                                        }
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Peminjam</label>
                                                <input type="text" name="peminjam" class="form-control" required>
                                                <?php echo form_error('peminjam', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Pinjam</label>
                                                <input type="date" name="tglpinjam" class="form-control">
                                                <?php echo form_error('tglpinjam', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Selesai</label>
                                                <input type="date" name="tglselesai" class="form-control">
                                                <?php echo form_error('tglselesai', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah </label>
                                                <input type="number" name="qty" class="form-control">
                                                <?php echo form_error('qty', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Kegiatan </label>
                                                <input type="text" name="kegiatan" class="form-control">
                                                <?php echo form_error('kegiatan', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Lokasi </label>
                                                <input type="text" name="lokasi" class="form-control">
                                                <?php echo form_error('lokasi', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="status" class="form-control" value="1" readonly>
                                                <?php echo form_error('status', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label>Status </label>
                                                <input type="text" name="status" class="form-control">
                                                <?php echo form_error('status', '<div class="text-small text-danger"></div>') ?>
                                            </div> -->
                                            <input type="submit" class="btn btn-success" name="submit" value="Simpan">&nbsp &nbsp
                                            <a class="btn btn-light" href="<?php echo base_url(); ?>pinjam_barang">Cancel</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>