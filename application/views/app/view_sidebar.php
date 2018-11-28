<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
				<div class="text-center image">
					<img src="<?= base_url() ?>assets/img/<?= $data['foto'] ?>" class="img-circle" width="100" alt="User Image" />
				</div>
            </li>
            <li>
                <a href="<?= base_url() ?>app" class="<?php if($page=='mobil'){echo 'active';} ?>"><i class="fa fa-car fa-fw"></i> Mobil</a>
            </li>
            <li>
                <a href="<?= base_url() ?>app/penyewaan" class="<?php if($page=='penyewaan'){echo 'active';} ?>"><i class="fa fa-user fa-fw"></i> Penyewaan</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->