        <!-- Begin Page Content -->
        <?php error_reporting(0); ?>
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Ubah Data Surat</h1>

            <div class="row">
                <div class="col-lg-8">

                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?php echo site_url('data/suratmasuk') ?>"><i class="fas fa-arrow-left"></i>
                                Back</a>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('data/edsuratkeluar'); ?>" method="post" enctype="multipart/form-data">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="hidden" class="form-control" name="idsurat" id="idsurat" value="<?= $surat['id_surat'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">Nomor Surat</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nosurat" id="nosurat" value="<?= $surat['no_surat'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="tglsurat" id="tglsurat" value="<?= $surat['tgl_surat'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">Perihal</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="perihal" id="perihal" value="<?= $surat['perihal'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pengirim</label>
                                    <div class="col-sm-4">
                                        <select name="pengirim" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <?php foreach ($pegawai as $p) : ?>
                                                <?php if ($p['nip'] == $surat['nip']) : ?>
                                                    <option value="<?= $p['nip']; ?>" selected><?= $p['nama_pegawai']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $p['nip']; ?>"><?= $p['nama_pegawai']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="file_surat" class="col-sm-3 col-form-label">File Surat</label>
                                    <div class="col-sm-4">
                                        <div class="custom-file">
                                            <input class="file-input" <?php echo form_error('file_surat') ? 'is-invalid' : '' ?> type="file" name="file_surat" />
                                            <input type="hidden" name="old_file" value="<?php echo $surat['file_surat']; ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('file_surat') ?>
                                                <label class="custom-file-label" for="file_surat">Pilih file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="class row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
        </div>
        </div>
        <!-- End of Main Content -->