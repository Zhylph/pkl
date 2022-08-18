        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Surat Keluar</h1>

            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <div class="card mb-3">
                <div class="card-header">
                    <a href="<?= base_url('data/addsuratkeluar')?>" class="btn btn-warning mb-3 text text-dark" data-toggle="" data-target=""><b>Tambah Surat Keluar</b></a>
                </div>
                <div class="card-body">
                    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
                        <thead class="thead-dark">
                            <tr align="center">
                                <th>No.</th>
                                <th>Nomor Surat </th>
                                <th>Tanggal Surat </th>
                                <th>Perihal </th>
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
                                    <td>
                                    <a href="<?= base_url() ?>/upload/berkas/<?= $s['file_surat'];?>" target="_blank" class="btn btn-small"><i class="fas fa-download"></i> </a>
                                        <a href="<?= base_url()?>data/edsuratkeluar/<?= $s['id_surat'];?>" class="btn btn-small"><i class="fas fa-edit"></i> </a>
                                        <a href="<?= base_url()?>data/delsuratkeluar/<?= $s['id_surat'];?>" class="btn btn-small text-danger" onclick="return confirm('Yakin anda ingin menghapusnya?');"><i class="fas fa-trash"></i></a>
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