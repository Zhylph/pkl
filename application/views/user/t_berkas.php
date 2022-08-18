        <!-- Begin Page Content -->
        <?php error_reporting(0); ?>
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Tambah Data Berkas</h1>

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
                            <a href="<?php echo site_url('user/upberkas') ?>"><i class="fas fa-arrow-left"></i>
                                Back</a>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('user/addberkas'); ?>" method="post" enctype="multipart/form-data" id="form1" name="form1" >
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->

                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nip" placeholder="ID" value="<?= ($_SESSION['nip']) ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">Nama Berkas</label>
                                    <div class="col-sm-4">
                                        <select name="id_jenis_berkas" id="id_jenis_berkas" class="form-control">
                                            <option value="">Nama Berkas</option>
                                            <?php foreach ($jberkas as $b) : ?>
                                                <option value="<?= $b['id_jenis_berkas']; ?>"><?= $b['nama_berkas']; ?></option>
                                            <?php endforeach; ?>
                                            <?= form_error('nama_berkas', '<small class="text-danger pl-3">', '</small>'); ?></small>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">Jenis Pengajuan Berkas</label>
                                    <div class="col-sm-4">
                                        <select name="id_jenis_pengajuan" id="id_jenis_pengajuan" class="form-control" onchange="tampilkan()">
                                            <option value="">Jenis Pengajuan</option>
                                            <?php foreach ($jpengajuan as $b) : ?>
                                                <option value="<?= $b['id_jenis_pengajuan']; ?>"><?= $b['jenis_pengajuan']; ?></option>
                                            <?php endforeach; ?>
                                            <?= form_error('jenis_pengajuan', '<small class="text-danger pl-3">', '</small>'); ?></small>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="hidden" class="form-control" name="tgl" value="<?php echo date("Y-m-d"); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="file_berkas" class="col-sm-3 col-form-label">Berkas</label>
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
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    Catatan : Maksimal ukuran file adalah 5 MB </br>
                    <a id="tampil" name="tampil"></a>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        </div>
        <!-- End of Main Content -->

        <script>
            function tampilkan() {
                var nama_syarat = document.getElementById("form1").id_jenis_pengajuan.value;
                if (nama_syarat == "JP1") {
                    document.getElementById("tampil").innerHTML = "Syarat Berkas <b>Kenaikan Pangkat</b> : </br> - #1	Surat pengantar dari pimpinan instansi/unit kerja; </br> - #2 Foto copy Karpeg yang telah dilegalisir; </br> - #3 Foto copy SK Calon Pegawai Negeri Sipil (CPNS) yang telah dilegalisir;  </br> - #4 Foto copy SK pangkat terakhir yang telah dilegalisir;  </br> - #5 Foto copy SK Pengangkatan Jabatan Struktural yang telah dilegalisir;</br> - #6 Foto copy Surat Pernyataan Pelantikan yang telah dilegalisir;  </br> - #7 Foto copy Konversi NIP Baru yang telah dilegalisir; </br> - #8 Foto copy SKP Tahun 2018 dan SKP Tahun 2019 Asli; </br> - #9 Foto copy STLUD bagi yang pindah ruang/golongan yang telah dilegalisir; </br> - #10 Foto copy Sertifikat Latpim II, III, IV yang telah dilegalisir; </br> - #11 Foto copy Ijazah dan Transkrip Nilai yang telah dilegalisir oleh pejabat berwenang; </br> - #12 Foto copy SK Kenaikan Pangkat atasan langsung; </br> - #13 Foto copy sah SK pembebasan sementara bagi PNS yang sebelumnya memangku jabatan fungsional;";
                } else if (nama_syarat == "JP2") {
                    document.getElementById("tampil").innerHTML = "Syarat Berkas <b>Kenaikan Gaji</b> : </br>";
                } else if (nama_syarat == "JP3") {
                    document.getElementById("tampil").innerHTML = "Syarat Berkas <b>Pensiun</b> : </br>";
                }

            }
        </script>