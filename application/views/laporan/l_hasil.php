<!DOCTYPE html>
<html><head>
    <title></title>
    <style type="text/css">
        .disp {
            float:left;
            text-align:right;
            padding: 1.5rem 0;
            margin-bottom: .5rem;
            margin: 15px;
        }        

        .logo {
            float: left;
            position: relative;
            width: 110px;
            height: 110px;
            margin: 0 0 0 1rem;
        }

        .status {
            font-size: 17px !important;
            font-weight: normal;
            margin-bottom: -.1rem;
        }

        .disp {
            float: right;
            text-align: center;
            margin: -.5rem 0;
        }

        .logo {
            float: left;
            position: relative;
            width: 50px;
            height: 50px;
            margin: .5rem 0 0 .5rem;
        }

        .up {
            text-transform: uppercase;
            margin-top: 0;
            margin: 0;
            line-height: 1.5rem;
            font-size: 1.5rem;
        }

        .status {
            margin: 0;
            font-size: 1.3rem;
            margin-bottom: .5rem;
        }

        #alamat {
            margin-top: -15px;
            font-size: 13px;
        }

        i {
            color: blue;
        }

        #alamat {
            font-size: 16px;
        }

        .separator {
            color: black;
            border-bottom: 2px solid;
            margin: -1.3rem 0 1.5rem;
            border-color:black;
        }

        #lead {
            width: auto;
            position: relative;
            margin: 25px 0 0 60%;
        }

        .lead {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: -10px;
        }

        #table2 {
            border-spacing: 10px 10px;
        }

        table.center {
            margin-left: 0;
            margin-right: 500px;
        }
        p.pcus {
            color: black;
            text-indent: 30px;
        }
        p.bot {
            display: block;
            margin-top: 0;
            margin-bottom: 0;
            margin-left: 0;
            margin-right: 0;
        }
        #tdbot {
            display: block;
            margin-top: 0;
            margin-bottom: 0;
            margin-left: 10;
            margin-right: 10;
            padding-right: 18%;
        }
        td{
            text-align: left;
            vertical-align: top;
        }
        

       
    </style>
</head><body>

    <table border="0" align="center">
        <tr>
            <td><img src="./assets/selidah.png" width="70" height="70"></td>
            <td><center>
                <font size="4">PEMERINTAH KABUPATEN BARITO KUALA</font><br>
                <font size="5"><b>DINAS KEPEMUDAAN OLAHRAGA, BUDAYA DAN PARIWISATA</b></font><br>
                <font size="3">JL. Jendral Sudirman Komp. Perkantoran No. 13 Marabahan Kabupaten Barito Kuala</b></font><br>
                <font size="2">Telp :(0511) 6701091</font><br>
            </center>
            <td>
        </tr>
       
    </table>
    <div class="separator"></div>

   <!-- <div class="disp center">
        <img class="logo" src="./assets/kominfo.png" style="">
        <h6 class="up">PEMERINTAH KABUPATEN BARITO KUALA</h6>
        <h5 class="up" id="nama">DINAS KOMUNIKASI DAN INFORMATIKA</h5>
        <span id="alamat">JL. Jendral Sudirman Komp. Perkantoran No. 74 Marabahan Kabupaten Barito Kuala</span>
        <h6 class="status">Telp :(0511)6701895 Fax :(0511)6701255 <i>, e-mail : diskominfo@baritokualakab.go.id</i></h6>
        <div class="separator"></div>
    </div> -->


    <?php
                    if(!empty($hasil)){
                        $no=0; foreach ($hasil as $h): $no++;
                            # code...
                    ?>  
                    <table id="table2" width="100%" border="0" class="center">
                    <tr>
                    <td width ='115 px'>Nama Kegiatan</td>
                    <td>:</td>
                    <td width='600 px'><?= $h['nama_kegiatan']; ?></td>
                    </tr>
                    <tr>
                    <td width ='115 px'>Tanggal Kegiatan</td>
                    <td>:</td>
                    <td width='600 px'><?= date('d F Y', strtotime($h['tanggal_kegiatan'])); ?></td>
                    </tr>    
                    </table>
                    <table id="table2" width="100%" border="0" class="center">
                        <tr>
                            <td><img src="upload/berkas/<?= $h['file_hasil']; ?>" width="700px" height="400"></td>
                        </tr> 
                
                    </table>
                    <table id="table2" width="100%" border="0" class="center">
                        <tr>
                            <td width ='115 px'>Hasil Kegiatan</td>
                            <td>:</td>
                            <td width ='600 px'><?= $h['hasil_kegiatan']; ?></td>    
                        </tr>
                        <tr>
                            <td width ='115 px'>Total Anggaran</td>
                            <td>:</td>
                            <td width='600px'>Rp. <?php echo number_format ($h['total_anggaran'], 2); ?></td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br><br>
                    <br>
                    <br><br>
                    <br>
                    <br><br>
                    <br>
                        <h3 align="center" size="4">BUKTI LEGALITAS </h3><br>
                    <img src="upload/berkas/<?= $h['file_berkas']; ?>" width="700px" height="800px">

                    <br>
                    <br>
                    <br>
    <!--<tr>

                    <td>NIP</td>
                    <td>:</td>
                    <td><?= $p['nip']; ?></td>
                    </tr>
                    <tr>
                    <td>Nama Pegawai</td>
                    <td>:</td>
                    <td><?= $p['nama_pegawai']; ?></td>
                    </tr>
                    <tr>
                    <td>Golongan</td>
                    <td>:</td>
                    <td><?= $p['golongan']; ?></td>
                    </tr>
                    <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td><?= $p['jabatan']; ?></td>
                    </tr>
                    <tr>
                    <td>Perihal</td>
                    <td>:</td>
                    <td><?= $p['perihal']; ?></td>
                    </tr>
                    <tr>
                    <td>Tempat Cuti</td>
                    <td>:</td>
                    <td><?= $p['tempat']; ?></td>
                    </tr>
                    <tr>
                    <td>Lama Cuti</td>
                    <td>:</td>
                    <td><?= $p['lama']; ?></td>
                    </tr>
                    <tr>
                    <td>Lampiran</td>
                    <td>:</td>
                    <td><?= $p['lampiran']; ?></td>
                    </tr>
                    <tr>
                    <td>Tanggal Pengajuan</td>
                    <td>:</td>
                    <td><?= tanggal('d F Y', $p['tanggal_pengajuan']); ?></td>
                    </tr> -->
     
            <?php endforeach;}?>

    </table>

</body></html>