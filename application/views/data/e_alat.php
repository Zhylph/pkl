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
                            <form action="<?= site_url('data/editalat/'); ?>" method="post" enctype="multipart/form-data">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->
                                <input type="hidden" name="id_alat" value="<?php echo $alat->id_alat ?>" readonly />
                                <input type="hidden" name="id_kegiatan" value="<?php echo $alat->id_kegiatan ?>" readonly />

                                <div class="form-group">
                                    <label for="nama_berkas">Nama Alat</label>
                                    <input class="form-control <?php echo form_error('nama_alat') ? 'is-invalid' : '' ?>" type="text" name="nama_alat" value="<?php echo $alat->nama_alat ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_alat') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Biaya</label>
                                    <input class="form-control <?php echo form_error('biaya') ? 'is-invalid' : '' ?>" type="text" name="biaya" value="<?php echo $alat->biaya ?>"/>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('biaya') ?>
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