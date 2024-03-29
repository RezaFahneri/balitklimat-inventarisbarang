<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="shadow">
                    <div class="card-header py-3">
                        <a style="font-size:40px; color:#000000" href="<?php echo base_url() ?>perbaikan_barang"><i class="mdi mdi-keyboard-backspace"></i></a>
                        <h3 class="m-0 font-weight-bold">Tambah Perbaikan Barang</h3><br>
                        <div class="flash-data" id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
                        <div class="col-md-12 grid-margin">
                            <div class="card shadow mb-12">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <form method="post" action="<?php echo base_url('perbaikan_barang/tambah_aksi') ?>" enctype="multipart/form-data"></br>
                                            <div class="form-group">
                                                <label>Nama Barang </label></br>
                                                <select name="id_barang" id="id_barang" class="js-example-basic-single form-control" required>
                                                    <option value="">--Pilih Nama Barang--</option>
                                                    <?php
                                                    foreach ($barang as $row) { ?>
                                                        <option value="<?php echo $row->id_barang; ?>"><?php echo $row->nama_barang; ?></option>';
                                                        }
                                                    <?php } ?>
                                                </select>
                                                <a style="font-size: 12px;">Jika barang tidak ada, silahkan cek data barang</a><a style="font-size: 12px;" href="<?php echo base_url(); ?>stok_barang"> disini.</a>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kerusakan</label>
                                                <input type="text" name="jenis" class="form-control" required>
                                                <?php echo form_error('jenis', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat Perbaikan </label>
                                                <input type="text" name="tempat" class="form-control">
                                                <?php echo form_error('tempat', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Diperbaiki</label>
                                                <input type="date" name="tglperbaikan" class="form-control">
                                                <?php echo form_error('tglperbaikan', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Selesai</label>
                                                <input type="date" name="tglselesai" class="form-control">
                                                <?php echo form_error('tglselesai', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah </label>
                                                <input value="<?= set_value('qty'); ?>" name="qty" id="qty" type="number" class="form-control">
                                                <?php echo form_error('qty', '<div class="text-small text-danger"></div>') ?>
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
                                            <a class="btn btn-light" href="<?php echo base_url(); ?>perbaikan_barang">Cancel</a>
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
