        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <div class="row">
                <div class="col-lg-12">

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <a href="<?= base_url('data/addkegiatan'); ?>" class="btn btn-facebook mb-3" data-toggle="" data-target=""><i class="fas fa-tasks"></i></i></a>
                    <a href="<?= base_url('data/addalat'); ?>" class="btn btn-facebook mb-3" data-toggle="" data-target=""><i class="fas fa-tools"></i></i></a>
                    <a href="<?= base_url('data/addpanitia'); ?>" class="btn btn-facebook mb-3" data-toggle="" data-target=""><i class="fas fa-user-plus"></i></i></a>
                    <a href="<?= base_url('data/addhasil'); ?>" class="btn btn-facebook mb-3" data-toggle="" data-target=""><i class="fas fa-flag"></i></i></a>

                    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
                        <thead class="thead-dark">
                            <tr align="center">
                                <th>#</th>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Total Anggaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($kegiatan as $k) : ?>
                                <tr>
                                    <td scope="row" align="center">
                                        <?= $i; ?>
                                    </td>
                                    <td>
                                        <?php echo $k['nama_kegiatan'] ?>
                                    </td>
                                    <td>
                                        <?= date('d F Y', strtotime($k['tanggal_kegiatan'])); ?>
                                    <td>
                                        Rp. <?php echo number_format ($k['total_anggaran'], 2); ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('data/detailalat/' . $k['id_kegiatan']) ?>" class="btn btn-small"><i class="fas fa-tools"></i> </a>
                                        <a href="<?php echo site_url('data/detailpanitia/' . $k['id_kegiatan']) ?>" class="btn btn-small"><i class="fas fa-user"></i> </a>
                                        <a href="<?php echo site_url('data/pdfhasil/' . $k['id_kegiatan']) ?>" class="btn btn-primary"><i class="fas fa-print"></i> </a>
                                        <a href="<?php echo site_url('data/pdfhasilk/' . $k['id_kegiatan']) ?>" class="btn btn-success"><i class="fas fa-print"></i> </a>
                                        <a href="<?php echo site_url('data/editkegiatan/' . $k['id_kegiatan']) ?>" class="btn btn-small"><i class="fas fa-edit"></i> </a>
                                        <a onclick="deleteConfirm('<?php echo site_url('data/deletekegiatan/' . $k['id_kegiatan']) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> </a>
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