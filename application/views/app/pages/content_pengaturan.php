<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pengaturan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<?= $notif ?>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Ganti Foto Profil
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?= form_open_multipart('app/gantifoto') ?>
                    <div class="form-group">
                        <label for="foto">Pilih Foto</label>
                        <input type="file" id="foto" name="foto" class="form-control" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" class="btn btn-primary" value="Ganti Foto">
                    </div>
                </form>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-8 -->

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Ganti Password
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?= form_open('app/gantipassword') ?>
                    <div class="form-group">
                        <label for="passlama">Password Lama</label>
                        <input type="password" name="passlama" placeholder="Masukkan Password Lama" class="form-control" id="passlama" required>
                    </div>
                    <div class="form-group">
                        <label for="passbaru">Password Baru</label>
                        <input type="password" name="passbaru" placeholder="Masukkan Password Baru" class="form-control" id="passbaru" required>
                    </div>
                    <div class="form-group">
                        <label for="passbarulagi">Password Baru</label>
                        <input type="password" name="passbarulagi" placeholder="Masukkan Password Baru Lagi" class="form-control" id="passbarulagi" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" class="btn btn-primary" value="Ganti Password">
                    </div>
                </form>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-8 -->
</div>
<!-- /.row -->