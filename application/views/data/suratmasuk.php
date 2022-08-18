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
                <div class="card-header">
                    <a href="<?= base_url('data/addsuratmasuk')?>" class="btn btn-warning mb-3 text text-dark" data-toggle="" data-target=""><b>Tambah Surat Masuk</b></a>
                </div>
                <div class="card-body">
                    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
                        <thead class="thead-dark">
                            <tr align="center">
                                <th>No.</th>
                                <th>Nomor Surat </th>
                                <th>Tanggal Surat </th>
                                <th>Perihal </th>
                                <th>Disposisi </th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($surat as $s) : ?>
                                <tr>
                                    <th scope="row">
                                        <?= $i; ?>
                                    </th>
                                    <td>
                                        <?= $s['no_surat'];?>
                                    </td>
                                    <td>
                                        <?= $s['tgl_surat'];?>
                                    </td>
                                    <td>
                                        <?= $s['perihal'];?>
                                    </td>
                                    <td align="center">
                                        <?php if ($s['status'] == '1') { ?>
                                            <a href="<?= base_url();?>data/liatdisposisi/<?= $s['id_surat'];?>" class="btn btn-primary btn-sm">Lihat Disposisi</i></a>
                                        <?php } else { ?>
                                            <a href="<?= base_url();?>data/disposisi/<?= $s['id_surat'];?>" class="btn btn-primary btn-sm">Disposisikan</i></a>
                                        <?php } ?>
                                    </td>
                                    <td align="center">
                                        <?php if ($s['status'] == '1') { ?>
                                            <a class="btn btn-small"><i class="fas fa-check-square"></i></a>
                                        <?php } else { ?>
                                            <a class="btn btn-small"><i class="fas fa-square"></i></i></a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                    <a href="<?= base_url() ?>/upload/berkas/<?= $s['file_surat'];?>" target="_blank" class="btn btn-small"><i class="fas fa-download"></i> </a>
                                        <a href="<?= base_url()?>data/edsuratmasuk/<?= $s['id_surat'];?>" class="btn btn-small"><i class="fas fa-edit"></i> </a>
                                        <a href="<?= base_url()?>data/delsuratmasuk/<?= $s['id_surat'];?>" class="btn btn-small text-danger" onclick="return confirm('Yakin anda ingin menghapusnya?');"><i class="fas fa-trash"></i></a>
                                        <!-- <a onclick="deleteConfirm('<?php echo site_url('data/deletejberkas/' . $jb->id_jenis_berkas) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> </a> -->
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