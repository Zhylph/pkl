<!DOCTYPE html>
<html><head>
    <title></title>
    <style type="text/css">
        .disp {
            float: right;
            text-align: center;
            padding: 1.5rem 0;
            margin-bottom: .5rem;
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
            border-bottom: 2px solid #616161;
            margin: -1.3rem 0 1.5rem;
            border-color: rgb(0, 0, 0);
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

        table.center {
            margin-left:auto; 
            margin-right:auto;
        }
    </style>
</head><body>

    <div class="disp center">
        <img class="logo" src="./assets/selidah.png">
        <h6 class="up">PEMERINTAH KABUPATEN BARITO KUALA</h6>
        <h5 class="up" id="nama">DINAS KEPEMUDAAN OLAHRAGA, BUDAYA DAN PARIWISATA</h5>
        <span id="alamat">Jl. Jend. Sudirman, Marabahan, Ulu Benteng, Marabahan, Kabupaten Barito Kuala, Kalimantan Selatan 70513</span>
        <h6 class="status">Telp :(0511) 6701091</i></h6>
        <div class="separator"></div>
    </div>

    <h6 class="status">Laporan Surat Disposisi</i></h6>
    <table width="100%" border="1" class="center">
        <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Tanggal Disposisi</th>
            <th>Perintah</th>
        </tr>

        <?php
        $no = 1;
        foreach ($disposisi as $d) : ?>

            <tr>
                <td align="center"><?= $no++ ?></td>
                <td align="center"><?= $d['no_surat']; ?></td>
                <td align="center"><?= date('d F Y', strtotime($d['tgl_disposisi'])); ?></td>
                <td align="center"><?= $d['perintah']; ?></td>
            </tr>

        <?php endforeach; ?>

    </table>

    <div id="lead">
        <p align="center">Kepala Dinas</p>
        <div style="height: 50px;"></div>

        <p class="lead" align="center">GT. RUSPANDI, S.Pd, M.Ap</p>
        <p align="center">NIP. 19650530 198509 1 001</p>

    </div>
    </div>

</body></html>