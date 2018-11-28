<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Laporan</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?= base_url() ?>assets2/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= base_url() ?>assets2/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row page-header">
          <div class="col-xs-12">
            <div style="float: left; width: 120px">
              <img src="<?= base_url() ?>assets/img/<?= $data['foto'] ?>" width="100" alt="logo">
            </div>
            <div>
              <h2 style="margin: 0">Aplikasi Rental Mobil</h2>
              <h4>Telp. 082313123</h4>
              <h4>Website <i>http://www.rentalmobil.com/</i></h4>
            </div>
          </div><!-- /.col -->
        </div>

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <h3 class="text-center" style="margin-top: 0">Laporan Data Penyewaan</h3>
            <h4>Dicetak pada: <?= $total['hariIni'] ?></h4>
            <h4>Laporan penyewaan:</h4>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama Mobil</th>
                  <th>Lama</th>
                  <th>harga</th>
                  <th>Total Harga</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                <?php foreach ($print as $key): ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $key['waktu_pinjam'] ?></td>
                    <td><?= $key['namaMobil'] ?></td>
                    <td><?= $key['lama_pinjam'] ?></td>
                    <td><?= $key['harga'] ?></td>
                    <td><?= $key['harga']*$key['lama_pinjam'] ?></td>
                  </tr>
                  <?php $no++; ?>
                <?php endforeach ?>

                <tr>
                  <td colspan="5" class="text-center">Total Pendapatan</td>
                  <td><?= $total['hargaTotal'] ?></td>
                </tr>
              </tbody>
            </table>
          </div><!-- /.col -->
        </div><!-- /.row -->

      </section><!-- /.content -->
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets2/dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>