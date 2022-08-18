        <!-- Begin Page Content -->
        <?php error_reporting(0); ?>
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Disposisi</h1>

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
                            <a href="<?= base_url();?>data/suratmasuk"><i class="fas fa-arrow-left"></i>
                                Back</a>
                        </div>
                        <div class="card-body">
                            <form action="#" method="post" enctype="multipart/form-data">
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
                                    <a href="<?= base_url() ?>/upload/berkas/<?= $surat['file_disposisi'];?>" target="_blank" class="btn btn-small"><i class="fas fa-download"></i> </a>
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
                                        <input type="date" class="form-control" name="tgldisposisi" id="tgldisposisi" value="<?= $surat['tgl_disposisi'];?>" readonly>
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
                                        <textarea rows = "8" cols = "55" readonly><?= $surat['perintah'];?></textarea>
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