        <!-- Begin Page Content -->
        <?php error_reporting(0); ?>
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Disposisikan</h1>

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
                            <form action="<?= base_url('data/disposisi'); ?>" method="post" enctype="multipart/form-data">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="hidden" class="form-control" name="idsurat" id="idsurat" value="<?= $surat['id_surat'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">Nomor Surat</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nosurat" id="nosurat" value="<?= $surat['no_surat'];?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="tglsurat" id="tglsurat" value="<?= $surat['tgl_surat'];?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">Tanggal Disposisi</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="tgldisposisi" id="tgldisposisi" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">Perihal</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="perihal" id="perihal" value="<?= $surat['perihal'];?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">Perintah</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="perintah" id="perintah">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="file_disposisi" class="col-sm-3 col-form-label">Berkas Disposisi</label>
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_disposisi" name="file_disposisi">
                                            <label class="custom-file-label" for="file_disposisi">Pilih file</label>
                                            <?= form_error('file_disposisi', '<small class="text-danger pl-3">', '</small>'); ?></small>
                                        </div>
                                    </div>
                                </div>
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