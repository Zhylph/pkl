        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<h1 class="h3 mb-4 text-gray-800">Detail Alat Kegiatan</h1>

        	<?php if ($this->session->flashdata('success')) : ?>
        		<div class="alert alert-success" role="alert">
        			<?php echo $this->session->flashdata('success'); ?>
        		</div>
        	<?php endif; ?>

        	<div class="card mb-3">
			<div class="card-header">
                            <a href="<?php echo site_url('data/kegiatan') ?>"><i class="fas fa-arrow-left"></i>
                                Back</a>
                        </div>
        		<div class="card-body">
        			<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        				<thead class="thead-dark">
        					<tr>
        						<th>No.</th>
        						<th>Nama Alat</th>
        						<th>Biaya</th>
        						<th>Action</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php $i = 1; ?>
        					<?php foreach ($detail as $da) : ?>
        						<tr>
        							<th scope="row">
        								<?= $i; ?>
        							</th>
        							<td>
        								<?= $da['nama_alat']; ?>
        							</td>
									<td>Rp. <?php echo number_format ($da['biaya'], 2); ?></td>
        							<td>
									<a href="<?php echo site_url('data/editalat/' . $da['id_alat']) ?>" class="btn btn-small"><i class="fas fa-edit"></i> </a>
        								<a onclick="deleteConfirm('<?php echo site_url('data/deletealat/' . $da['id_alat']) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> </a>
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