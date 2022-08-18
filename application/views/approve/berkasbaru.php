    <?php error_reporting(0);?>
       <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<h1 class="h3 mb-4 text text-dark"><?= $title; ?></h1>

        	<?php if ($this->session->flashdata('success')) : ?>
        		<div class="alert alert-success" role="alert">
        			<?php echo $this->session->flashdata('success'); ?>
        		</div>
        	<?php endif; ?>

        	<div class="card mb-3">
        		<!-- 	<div class="card-header">
        			<a href="<?= base_url('data/addberkas'); ?>" class="btn btn-primary mb-3" data-toggle="" data-target=""><i class="fas fa-fw fa-plus"></i></a>
        		</div> -->
        		<div class="card-body">
        			<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        				<thead>
        					<tr>
        						<th>#</th>
        						<th>Nama Pegawai</th>
        						<th>Nama Berkas</th>
        						<th>Tanggal Upload</th>
        						<th>Action</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php $i = 1; ?>
        					<?php foreach ($berkas as $b) : ?>
        						<tr>
        							<th scope="row">
        								<?= $i; ?>
        							</th>
        							<td>
        								<?= $b->nama_pegawai; ?>
        							</td>
        							<td>
        								<?= $b->nama_berkas; ?>
        							</td>
        							<td>
        								<?= tanggal('d F Y', $b->tanggal_upload); ?>
        							</td>
        							<td>
        								<a href="<?= base_url('upload/berkas/' . $b->file_berkas ); ?>" target="_blank" class="btn btn-small"><i class="fas fa-regular fa-eye"></i> </a>
        								<a href="<?= base_url(); ?>data/terimaberkas/<?= $b->id_berkas; ?>/<?= $b->nip; ?>/<?= $b->nama_berkas; ?>" class="btn btn-small text-success"><i class="fas fa-solid fa-check"></i> </a>
                                        <a href="" data-toggle="modal" data-target="#tolak-data" class="btn btn-small text-danger" ><i class="fas fa-solid fa-ban"></i> </a>
        							</td>
        						</tr>
        						<?php $i++; ?>
        					<?php endforeach; ?>
        				</tbody>
        			</table>
        		</div>
        	</div>
        </div>
        </div>

<!-- Modal Tolak -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tolak-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Mengapa ditolak?</h4>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            </div>
            <form class="form-horizontal" action="<?= base_url('data/tolakberkas') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-112">
                            <input type="text" id="id_berkas" name="id_berkas" value="<?= $b->id_berkas; ?>">
                            <input type="hidden" id="nip" name="nip" value="<?= $b->nip; ?>">
                            <input type="hidden" id="nama_berkas" name="nama_berkas" value="<?= $b->file_berkas; ?>">
                            <input type="text" class="form-control" id="alasan" name="alasan" placeholder="Tuliskan alasanya">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit"> Tolak&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- END Modal Tolak -->