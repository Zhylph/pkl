<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <?php if ($this->session->flashdata('success')) : ?>
      <div class="alert alert-success" role="alert">
         <?php echo $this->session->flashdata('success'); ?>
      </div>
   <?php endif; ?>

<div class="card text-center">
   <div class="card-header text-white bg-primary">
      <h2 class="text-white">Naik Pangkat</h2>
   </div>
   <div class="card-body">
      <div class="row">
         <div class="col s2 offset-s2">
            <div class="card text-center">
               &nbsp;<div class="card-content" style="height: 60px;"><h5 id="hari" class="center"></h5></div>
            </div>
         </div>
         <div class="col s2">
            <div class="card text-center">
               &nbsp;<div class="card-content"  style="height: 60px;"><h5 id="jam" class="center"></h5></div>
            </div>
         </div>
         <div class="col s2">
            <div class="card text-center">
               &nbsp;<div class="card-content"  style="height: 60px;"><h5 id="menit" class="center"></h5></div>
            </div>
         </div>
         <div class="col s2">
            <div class="card text-center">
               &nbsp;<div class="card-content"  style="height: 60px;"><h5 id="detik" class="center"></h5></div>
            </div>
         </div>
         </div>
         &nbsp;
         <p class="card-text">Para pegawai di wajibkan untuk mempersiapkan data kenaikan pangkat jika mendekati waktu yang di jadwalkan.</p>
      </div>
   <div class="card-footer text-muted">
   <a href="<?php echo base_url('dashboard/twaktu')?>" class="btn btn-primary">Tentukan Waktu</a>
   <a href="<?php echo base_url('dashboard/rewaktu')?>" class="btn btn-secondary">Reset</a>
   </div>
</div>


&nbsp;
   <h1 class="h3 mb-4 text-gray-800 text-center">History</h1>
   <div class="card mb-3">
      <div class="card-body">
         <table width="100%" class="table table-striped table-bordered" id="tabeldata">
            <thead class="thead-dark">
               <tr align="center">
                  <th width="50px">No.</th>
                  <th>Pengajuan</th>
                  <th>Status</th>
                  <th>Tanggal</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($history as $h) : ?>
                  <tr>
                     <th scope="row">
                        <?= $i; ?>
                     </th>
                     <td>
                        <?= $h['jenis_pengajuan']; ?>
                     </td>
                     <td align="center">
                        <?= $h['status_history']; ?>
                     </td>
                     <td align="center">
                        <?= $h['tgl_history']; ?>
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

<script>

CountDownTimer("<?php echo $timer->waktu;?>", 'hari', 'jam', 'menit', 'detik');
function CountDownTimer(dt, id1, id2, id3,id4)
{
var end = new Date(dt);

   var _second = 1000;
   var _minute = _second * 60;
   var _hour = _minute * 60;
   var _day = _hour * 24;
   var timer;

function showRemaining() {
         var now = new Date();
         var distance = end - now;
         var distance1 = now - end;
      if(distance1 > 0){
      clearInterval(timer);
      return;
   }
      var days = Math.floor(distance / _day);
      var hours = Math.floor((distance % _day) / _hour);
      var minutes = Math.floor((distance % _hour) / _minute);
      var seconds = Math.floor((distance % _minute) / _second);

      document.getElementById(id1).innerHTML = days + ' Hari';
      document.getElementById(id2).innerHTML = hours + ' Jam';
      document.getElementById(id3).innerHTML = minutes + ' Menit';
      document.getElementById(id4).innerHTML = seconds + ' Detik';
   }

   timer = setInterval(showRemaining, 1000);
}

</script>