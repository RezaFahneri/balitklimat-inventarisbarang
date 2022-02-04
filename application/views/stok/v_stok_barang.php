<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="shadow">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold">Data Stok Barang</h3><br>
                        <div class="col-md-4 grid-margin">
                            <a href="<?php echo base_url() ?>stok_barang/tambah" class="btn btn-success btn-md"><i class="ti ti-plus">&nbsp;</i>Tambah Stok Barang</a>
                        </div>
                        <div class="col-md-12 grid-margin">
                            <div class="card mb-12">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <!-- <div class="card-body"> -->
                                        <div class="table-responsive pt-4 ">
                                            <table id="dt-multi-checkbox" class="table" cellspacing="0" width="100%">
                                                <thead style='height:auto' class="thead-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode</th>
                                                        <th>Gambar</th>
                                                        <th>Nama Barang</th>
                                                        <th>Jenis Barang</th>
                                                        <th>Satuan Barang</th>
                                                        <th>Jumlah Barang</th>
                                                        <th>Kondisi Barang</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($data_stok as $dp) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $dp->kode ?></td>
                                                            <td>
                                                                <img class="zoomable img-lg" src="<?php echo base_url() . 'assets/images/upload/' . $dp->gambar ?>">
                                                            <td><?php echo $dp->nama_barang ?></td>
                                                            <td><?php echo $dp->jenis_barang ?></td>
                                                            <td><?php echo $dp->satuan_barang ?></td>
                                                            <td><?php echo $dp->jumlah_barang ?></td>
                                                            <td><?php echo $dp->kondisi_barang ?></td>
                                                            <td><?php echo $dp->keterangan ?></td>
                                                            <td>
                                                                <!-- <a class="btn btn-sm btn-info" href="<?php echo base_url('data_stok/detail/' . $dp->id) ?>"><i class="ti ti-info-circle"></i></a> -->
                                                                <a style="height:23px" type="button" class="btn btn btn-success" href="<?php echo base_url('stok_barang/edit/' . $dp->id_barang) ?>"><i class="ti ti-pencil"></i></a>
                                                                <a style="height:23px" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-sm btn-danger" href="<?php echo site_url('stok_barang/hapus/' . $dp->id_barang) ?>"><i class="ti ti-trash"></i></a>
                                                            </td>
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