   <?php
    $button1 = '<a href="" class="btn btn-primary btn-sm">Ajukan Ulang</a>'
    ?>
   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

       <?php if ($this->session->flashdata('success')) : ?>
           <div class="alert alert-success" role="alert">
               <?php echo $this->session->flashdata('success'); ?>
           </div>
       <?php endif; ?>

       <!-- Notif -->
       <?php if ($notifikasi > 0) : ?>
           <?php foreach ($notifikasi as $row) : ?>
               <div class="alert alert-primary" role="alert">
                   <b>Pengajuan "<?= $row->nama_berkas; ?>" <?= $row->status; ?>. <?= $row->ket; ?></b><a class="close" href="<?= base_url() ?>user/hapusnotif/<?= $row->id_notif; ?>"><span aria-hidden="true">&times;</span></i></a>
               </div>
           <?php endforeach; ?>
       <?php endif; ?>
       <!-- end Notif -->

       <div class="card mb-3">
           <div class="card-body">
               <table width="100%" class="table table-striped table-bordered" id="tabeldata">
                   <thead class="thead-dark">
                       <tr align="center">
                           <th>No.</th>
                           <th>Pengajuan</th>
                           <th>Tanggal Pengajuan</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php $i = 1; ?>
                       <?php foreach ($pengajuan as $b) : ?>
                           <tr>
                               <th scope="row">
                                   <?= $i; ?>
                               </th>
                               <td>
                                   <?= $b['jenis_pengajuan']; ?>
                               </td>
                               <td>
                                   <?= $b['tanggal_pengajuan']; ?>
                               </td>
                               <td>
                                   <?= $b['status']; ?>
                               </td>
                               <td>
                                   <a href="<?php echo base_url();?>user/approve/<?=$b['id_pengajuan'];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                   <a href="<?php echo base_url() ?>user/cetak/<?=$b['nip'];?>/<?=$b['id_jenis_pengajuan'];?>" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
                                   <?php if ($b['status'] == 'Ditolak') { ?>
                                       <a href="<?= base_url(); ?>user/ajukembali/<?= $b['id_pengajuan']; ?>/<?= $b['nip']; ?>/<?= $b['id_jenis_pengajuan']; ?>" class="btn btn-primary btn-sm">Ajukan Lagi</i></a>
                                   <?php } ?>
                               </td>
                           </tr>
                           <?php $i++; ?>
                       <?php endforeach; ?>
                   </tbody>
               </table>
           </div>
       </div>
   </div>
   </div>