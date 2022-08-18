        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Edit Data Kegiatan</h1>

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
                            <form action="<?= site_url('data/editkegiatan/'); ?>" method="post" enctype="multipart/form-data">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->
                                <input type="hidden" name="id_kegiatan" value="<?php echo $kegiatan->id_kegiatan ?>" readonly />

                                <div class="form-group">
                                    <label for="nama_berkas">Nama Kegiatan</label>
                                    <input class="form-control <?php echo form_error('nama_kegiatan') ? 'is-invalid' : '' ?>" type="text" name="nama_kegiatan" value="<?php echo $kegiatan->nama_kegiatan ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_kegiatan') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="golongan">Tanggal Kegiatan</label>
                                    <input class="form-control <?php echo form_error('golongan') ? 'is-invalid' : '' ?>" type="date" name="tanggal_kegiatan" value="<?php echo $kegiatan->tanggal_kegiatan ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tanggal_kegiatan') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Total Anggaran</label>
                                    <input class="form-control <?php echo form_error('total_anggaran') ? 'is-invalid' : '' ?>" type="text" name="total_anggaran" value="<?php echo $kegiatan->total_anggaran ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('total_anggaran') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="file_berkas" class="col-sm-2 col-form-label">Berkas</label>
                                    <div class="col-sm-6">
                                        <div class="custom-file">
                                            <input class="file-input" <?php echo form_error('file_berkas') ? 'is-invalid' : '' ?> type="file" name="file_berkas" />
                                            <input type="hidden" name="old_file" value="<?php echo $kegiatan->file_berkas ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('file_berkas') ?>
                                                <label class="custom-file-label" for="file_berkas">Pilih file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input class="btn btn-facebook" type="submit" name="btn" value="Save" />
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->