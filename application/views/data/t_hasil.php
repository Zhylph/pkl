        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Hasil Kegiatan</h1>

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
                            <form action="<?= base_url('data/addhasil'); ?>" method="post" enctype="multipart/form-data">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                                    <div class="col-sm-8">
                                        <select name="id_kegiatan" id="id_kegiatan" class="form-control">
                                            <option value="">Pilih Kegiatan</option>
                                            <?php foreach ($kegiatan as $k) : ?>
                                                <option value="<?= $k['id_kegiatan']; ?>"><?= $k['nama_kegiatan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Hasil Kegiatan</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" class="form-control" name="hasil_kegiatan"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="file_hasil" class="col-sm-3 col-form-label">Berkas</label>
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_hasil" name="file_hasil">
                                            <label class="custom-file-label" for="image">Pilih file</label>
                                            <?= form_error('file_hasil', '<small class="text-danger pl-3">', '</small>'); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="class row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-warning text text-dark"><b>Input</b></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->