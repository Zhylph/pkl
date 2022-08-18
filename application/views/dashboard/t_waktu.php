        <!-- Begin Page Content -->
        <?php error_reporting(0); ?>
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Tentukan Waktu Naik Pangkat</h1>

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
                            <a href="<?php echo site_url('dashboard') ?>"><i class="fas fa-arrow-left"></i>
                                Back</a>
                        </div>
                        <div class="card-body">
                            <?php echo form_open('dashboard/time');?>
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->

                                <div class="form-group row">
                                    <label for="tgl" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="datepicker" name="start" id="start">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jam" class="col-sm-2 col-form-label">Jam</label>
                                    <div class="col-sm-4">
                                        <input id="timepicker_ampm_dark" class="timepicker" type="time" name="waktu_start">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-4">
                                        <input type="hidden" name="nip" value="<?= ($_SESSION['nip']) ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="class row">
                                <label for="" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
        </div>
    </div>
        <!-- End of Main Content -->

<script type="text/javascript">
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15,// Creates a dropdown of 15 years to control year
});
</script>

<script type="text/javascript">
    $('.timepicker').pickatime({
        default: 'now',
        timeFormat: 'HH:mm:ss',
        twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
        donetext: 'OK',
        autoclose: false,
        vibrate: true // vibrate the device when dragging clock hand
});
</script>