        <!-- Begin Page Content -->
        <?php error_reporting(0); ?>
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Tambah Data Kegiatan</h1>

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
                            <a href="<?php echo site_url('data/kegiatan') ?>"><i class="fas fa-arrow-left"></i>
                                Back</a>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('data/addkegiatan'); ?>" method="post" enctype="multipart/form-data">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama_kegiatan" placeholder="Nama kegiatan yang dilakukan...">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_kegiatan" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="tanggal_kegiatan" id="tanggal_kegiatan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="anggaran" class="col-sm-3 col-form-label">Total Anggaran Kegiatan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="total_anggaran" placeholder="Rp. ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="file_berkas" class="col-sm-3 col-form-label">Dokumen Kegiatan</label>
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_berkas" name="file_berkas">
                                            <label class="custom-file-label" for="image">Pilih file</label>
                                            <?= form_error('file_berkas', '<small class="text-danger pl-3">', '</small>'); ?></small>
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
        <!-- End of Main Content -->