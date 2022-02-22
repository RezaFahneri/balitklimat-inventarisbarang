<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="shadow">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold">Tambah Penggunaan Mobil</h3><br>
                        <div class="flash-data" id="flash" data-flash="<?= $this->session->flashdata('pesan');?>"></div>
                        <div class="col-md-12 grid-margin">
                            <div class="card shadow mb-12">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <form method="post" action="<?php echo base_url('penggunaan_mobil/tambah_aksi') ?>" enctype="multipart/form-data"></br>
                                            <div class="form-group">
                                                <label>Nama Pegawai </label></br>
                                                <select name="nip" id="nip" class="form-control" required>
                                                    <option value="">--Pilih Nama Pegawai--</option>
                                                    <?php
                                                    foreach ($pegawai as $row) { ?>                                   
                                                        <option value="<?php echo $row->nip; ?>"><?php echo $row->nama_pegawai; ?></option>';
                                                        }
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>No Polisi </label></br>
                                                <select name="id_kendaraan" id="id_kendaraan" class="form-control" required>
                                                    <option value="">--Pilih No Polisi--</option>
                                                    <?php
                                                    foreach ($kendaraan as $row) { ?>                                   
                                                        <option value="<?php echo $row->id_kendaraan; ?>"><?php echo $row->no_polisi; ?></option>';
                                                        }
                                                    <?php } ?>
                                                </select>
                                                <a style="font-size: 12px;">Jika No Polisi tidak ada, silahkan cek data kendaraan</a><a style="font-size: 12px;" href="<?php echo base_url(); ?>kendaraan"> disini.</a>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Pemakaian</label>
                                                <input type="date" name="tgl_pemakaian" class="form-control" required>
                                                <?php echo form_error('tgl_pemakaian', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Lama Pemakaian (Jam)</label>
                                                <input name="lama_pemakaian" id="lama_pemakaian" type="number" class="form-control" required>
                                                <?php echo form_error('lama_pemakaian', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Perjalanan </label>
                                                <select name="perjalanan" id="perjalanan" class="form-control" required>
                                                    <option value="">--Pilih Perjalanan--</option>
                                                    <option value="Dalam Kota">Dalam Kota</option>
                                                    <option value="Luar Kota">Luar Kota</option>
                                                </select>
                                                <?php echo form_error('perjalanan', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="status_penggunaan" class="form-control" value="1" readonly>
                                                <?php echo form_error('status_penggunaan', '<div class="text-small text-danger"></div>') ?>
                                            </div>
                                            <input type="submit" class="btn btn-success" name="submit" value="Simpan">&nbsp &nbsp
                                            <a class="btn btn-light" href="<?php echo base_url(); ?>penggunaan_mobil">Cancel</a>
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

<script>
        <head>
        <?php foreach($head as $headItem): ?> 
        <?php echo $headItem."\n"; ?>
        <?php endforeach; ?>
        </head>
</script>