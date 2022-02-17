<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="shadow">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold">Perbaikan Barang</h3><br>
                        <div class="flash-data" id="flash2" data-flash="<?= $this->session->flashdata('sukses'); ?>"></div>
                        <div class="col-md-4 grid-margin">
                            <a href="<?php echo base_url() ?>perbaikan_barang/tambah" class="btn btn-success btn-md">Tambah Perbaikan Barang</a>
                        </div>
                        <div class="col-md-12 grid-margin">
                            <div class="card mb-12">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <!-- <div class="card-body"> -->
                                        <div class="table-responsive pt-4">
                                            <table id="dtBasicExample" class="table table-bordered" cellspacing="0" width="100%">
                                                <thead style='height:auto' class="thead-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Barang</th>
                                                        <th>Jenis Kerusakan</th>
                                                        <th>Tempat Perbaikan</th>
                                                        <th>Tanggal Diperbaiki</th>
                                                        <th>Tanggal Selesai</th>
                                                        <th>Jumlah</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($data_perbaikan as $dp) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $dp->nama_barang ?></td>
                                                            <td><?php echo $dp->jenis ?></td>
                                                            <td><?php echo $dp->tempat ?></td>
                                                            <td><?php echo $dp->tglperbaikan ?></td>
                                                            <td><?php echo $dp->tglselesai ?></td>
                                                            <td><?php echo $dp->qty ?></td>
                                                            <?php if ($dp->status == '1') { ?>
                                                                <td>
                                                                <button type="button" class="btn btn-outline-danger btn-lg" style="height:40px;" disabled>Diperbaiki</button>
                                                                <hr style="width:50%;text-align:left;margin-left:0">
                                                                <button type="button" class="btn btn-outline-info btn-lg" style="height:40px;">Selesai</button>
                                                                </td>
                                                            <?php } ?>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
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
</div>