<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header text-white bg-primary">
            <h6 class="m-0 font-weight-bold text-black">Cetak Laporan Terdisposisi</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url() ?>data/cetakdisposisi" method="post" target="_blank">
                <div class="row">
                    <div class="col">
                        <input type="date" class="form-control" name="tanggal1" required>
                    </div>
                    <label class="mt-2">s/d</label>
                    <div class="col">
                        <input type="date" class="form-control" name="tanggal2" required>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-print"></i> Cetak</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->