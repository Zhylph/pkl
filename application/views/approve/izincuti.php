        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <div class="card mb-3">
                <div class="card-body">
                    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
                        <thead class="thead-dark">
                            <tr align="center">
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pengajuan as $b) : ?>
                                <tr>
                                    <th scope="row">
                                        <?= $i; ?>
                                    </th>
                                    <td>
                                        <?= $b['nip']; ?>
                                    </td>
                                    <td>
                                        <?= $b['nama_pegawai']; ?>
                                    </td>
                                    <td>
                                        <?= tanggal('d F Y', $b['tanggal_pengajuan']); ?>
                                    </td>
                                    <td align="center">
                                        <?= $b['status2']; ?>
                                    </td>
                                    <td align="center">
                                        <a href="<?php echo base_url('data/cetak_cuti/' . $b['nip']) ?>" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
                                        <a href="<?= base_url(); ?>data/accpengajuan_c/<?= $b['id_pengajuan']; ?>/<?= $b['nip']; ?>/<?= $b['jenis_pengajuan']; ?>" class="btn btn-success btn-sm"><i class="fas fa-solid fa-check"></i> </a>
                                        <a href="" data-toggle="modal" data-target="#tolak-data" class="btn btn-danger btn-sm"><i class="fas fa-solid fa-ban"></i> </a>
                                        <a href="<?php echo base_url('data/approve4/' . $b['id_pengajuan']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
                    <form class="form-horizontal" action="<?= base_url('data/tolakpengajuan_c') ?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-lg-112">
                                    <input type="hidden" id="id" name="id" value="<?= $b['id_pengajuan']; ?>">
                                    <input type="hidden" id="nip" name="nip" value="<?= $b['nip']; ?>">
                                    <input type="hidden" id="nama" name="nama" value="<?= $b['jenis_pengajuan']; ?>">
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