<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Mobil</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<?= $notif ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Mobil
                <div class="pull-right">
                    <div class="btn-group">
                        <a href="#tambah" class="btn btn-primary btn-xs" data-toggle="modal">Tambah</a>
                        <!-- Modal -->
                        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Tambah Mobil Baru</h4>
                                    </div>
                                    <?= form_open('app/addmobil') ?>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="namamobil">Nama Mobil</label>
                                                <input type="text" id="namamobil" placeholder="Nama Mobil" class="form-control" name="nama" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="merk">Merk</label>
                                                <input type="text" placeholder="Merk Mobil" id="merk" class="form-control" name="merk" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Harga Sewa</label>
                                                <input type="text" placeholder="Harga Sewa" id="harga" class="form-control" name="harga" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">Jumlah</label>
                                                <input type="text" placeholder="Jumlah" id="jumlah" name="jumlah" class="form-control" required>
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
                            <th>Nama Mobil</th>
                            <th>Merk Mobil</th>
                            <th>Harga Sewa</th>
                            <th>Jumlah</th>
                            <th>Tersedia</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach ($datamobil as $key): ?>
                            <tr>
                                <td><?= $key['nama'] ?></td>
                                <td><?= $key['merk'] ?></td>
                                <td><?= $key['harga'] ?></td>
                                <td><?= $key['jumlah'] ?></td>
                                <td>
                                    <?php 
                                        $mobil = $this->model_app->mobil_disewa($key['id']);
                                        echo $key['jumlah']-$mobil['banyak'];
                                    ?>
                                </td>
                                <td class="text-center"><a href="#<?= $key['id'] ?>" data-toggle="modal" class="fa fa-pencil" title="Edit"></a></td>
                                <td class="text-center"><a href="<?= base_url() ?>app/hapusmobil/<?= $key['id'] ?>" class="fa fa-trash" title="Hapus" onclick="return confirm('Anda yakin?');"></a></td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Mobil Baru</h4>
                                        </div>
                                        <?= form_open('app/editmobil') ?>
                                            <div class="modal-body">
                                                <input type="text" name="id" value="<?= $key['id'] ?>" hidden>
                                                <div class="form-group">
                                                    <label for="namamobil">Nama Mobil</label>
                                                    <input type="text" id="namamobil" placeholder="Nama Mobil" class="form-control" value="<?= $key['nama'] ?>" name="nama">
                                                </div>
                                                <div class="form-group">
                                                    <label for="merk">Merk</label>
                                                    <input type="text" placeholder="Merk Mobil" id="merk" class="form-control" value="<?= $key['merk'] ?>" name="merk">
                                                </div>
                                                <div class="form-group">
                                                    <label for="harga">Harga Sewa</label>
                                                    <input type="text" placeholder="Harga Sewa" id="harga" class="form-control" name="harga" value="<?= $key['harga'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah</label>
                                                    <input type="text" placeholder="Jumlah" id="jumlah" name="jumlah" class="form-control" value="<?= $key['jumlah'] ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
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