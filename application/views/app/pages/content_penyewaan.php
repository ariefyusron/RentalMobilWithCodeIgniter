<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Penyewaan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<?= $notif ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Penyewaan
                <div class="pull-right">
                    <div class="btn-group">
                        <a href="#print" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Print</a>
                        <!-- Modal -->
                        <div class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Tambah Penyewaan</h4>
                                    </div>
                                    <form action="<?= base_url('app/print') ?>" method="post" target="_blank">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="waktu">Waktu</label>
                                                <select name="waktu" id="waktu" class="form-control" required>
                                                    <option value="<?= date('Y-m-d') ?>">Hari ini</option>
                                                    <option value="<?= date('Y-m') ?>">Bulan ini</option>
                                                    <option value="<?php $bln=date('m')-1;echo date('Y')."-".$bln ?>">Bilan kemarin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Cetak</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>
                    <div class="btn-group">
                        <a href="#tambah" data-toggle="modal" class="btn btn-primary btn-xs">Tambah</a>
                        <!-- Modal -->
                        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Tambah Penyewaan</h4>
                                    </div>
                                    <?= form_open('app/addpenyewa') ?>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nik">Nik</label>
                                                <input type="text" placeholder="Nik" name="nik" class="form-control"required>
                                            </div>
                                            <div class="form-group">
                                                <label for="namamobil">Nama</label>
                                                <input type="text" id="namamobil" placeholder="Nama Penyewa" class="form-control" name="nama" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="hp">No. Hp</label>
                                                <input type="text" id="hp" name="hp" placeholder="No. Hp" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="merk">Mobil</label>
                                                <select name="mobil" id="merk" class="form-control" required>
                                                    <option value="">--Pilih--</option>
                                                    <?php foreach ($datamobil as $key): ?>
                                                        <option value="<?= $key['id'] ?>"><?= $key['nama'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Jumlah hari</label>
                                                <input type="text" placeholder="Jumlah Hari" id="harga" class="form-control" name="hari" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal Pinjam</label>
                                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jam">Waktu Pinjam</label>
                                                <input type="time" id="jam" name="jam" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Mobil</th>
                            <th>Waktu Pemesanan</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                            <th>Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach ($datapenyewa as $key): ?>
                            <tr>
                                <td><?= $key['id_penyewa'] ?></td>
                                <td><?= $key['nik'] ?></td>
                                <td><?= $key['nama_penyewa'] ?></td>
                                <td><?= $key['nama_mobil'] ?></td>
                                <td><?= $key['waktu_pemesanan'] ?></td>
                                <td>
                                    <?php 
                                        if ($key['status']=='Memesan') {
                                            echo '<p class="text-danger">'.$key['status'].'</p>';
                                        } elseif ($key['status']=='Pinjam') {
                                            echo '<p class="text-warning">'.$key['status'].'</p>';
                                        } else{
                                            echo '<p class="text-success">'.$key['status'].'</p>';
                                        }
                                    ?>
                                </td>
                                <td class="text-center"><a href="#<?= $key['id_penyewa'] ?>" data-toggle="modal" class="fa fa-pencil" title="Edit"></a></td>
                                <td class="text-center"><a href="<?= base_url() ?>app/hapuspenyewa/<?= $key['id_penyewa'] ?>" class="fa fa-trash" title="Hapus" onclick="return confirm('Anda Yakin?');"></a></td>
                                <td class="text-center"><a href="" class="fa fa-print" title="Print"></a></td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="<?= $key['id_penyewa'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Status</h4>
                                        </div>
                                        <?= form_open('app/editpenyewa') ?>
                                            <div class="modal-body">
                                                <input type="text" name="id" value="<?= $key['id_penyewa'] ?>" hidden>
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="Memesan" <?php if($key['status']=='Memesan'){echo "selected";} ?>>Memesan</option>
                                                        <option value="Pinjam" <?php if($key['status']=='Pinjam'){echo "selected";} ?>>Pinjam</option>
                                                        <option value="Selesai" <?php if($key['status']=='Selesai'){echo "selected";} ?>>Selesai</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin?');">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        <?php endforeach ?>

                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-8 -->
</div>
<!-- /.row -->