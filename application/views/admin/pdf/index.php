<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export PDF</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 11pt;
        }
        table {
            width: 650px;
            margin: auto;
            border-collapse: collapse;
        }
        td {
            padding: none;
        }
        .header-table td {
            border: none;
        }
        .header-table img {
            vertical-align: middle;
        }
        .header-table .centered {
            text-align: center;
        }
        .header-table .centered font {
            display: block;
            margin: none;
        }
        hr {
            border: 2px solid black;
        }
        .penanggung-jawab {
            text-align: right;
        }
        .barcode {
            width: 150px;
            height: 30px;
        }
        .patient-doctor-table {
            max-width: 645px; 
            border-collapse: collapse;
        }
        .patient-doctor-table th, .patient-doctor-table td {
            padding: 5px;
            border-right: 1.5px solid black;
        }
        .patient-doctor-table th:last-child,
        .patient-doctor-table td:last-child {
            border-right: 1.5px solid black;
        }
        .patient-doctor-table thead {
            border: 1.5px solid black;
        }
        .patient-doctor-table tbody tr:last-child td {
            border-bottom: 1.5px solid black;
        }
        .patient-doctor-table tbody td {
            border-left: 1.5px solid black;
        }
        .inline-container {
            display: flex;
            align-items: center
        }
        .label,
        .colon,
        .data {
            margin: 0;
        }
        .label {
            width: 92px;
        }
        .colon {
            margin: 0 5px;
        }
        .hasil-laboratorium {
            width: 650px;
            margin: auto;
        }
        h3 {
            text-align: center;
        }
        .hasil-lab-table {
            max-width: 645px; 
            border-collapse: collapse;
        }
        .hasil-lab-table th, .hasil-lab-table td {
            padding: 10px;
            border-right: 1.5px solid black;
        }
        .hasil-lab-table th:last-child,
        .hasil-lab-table td:last-child {
            border-right: 1.5px solid black;
        }
        .hasil-lab-table thead {
            border: 1.5px solid black;
        }
        .hasil-lab-table tbody tr:last-child td {
            border-bottom: 1.5px solid black;
        }
        .hasil-lab-table tbody td {
            border-left: 1.5px solid black;
        }
        .text-center {
            text-align: center;
        }
        .info-surat {
            width: 680px;
            margin: auto;
        }
        .point-info {
            width: 385px;
            font-size: 10pt;
        }
        .tanda-tangan {
            width: 650px;
            margin: 0 auto;
            display: flex;
            justify-content: flex-end;
        }
        .tanda-tangan p {
            text-align: center;
            margin: 0;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <!-- <script>
        function generateBarcode() {
            const kodeRegistrasi = "<?= $data->no_rekam_medis ?>";
            JsBarcode("#barcode", kodeRegistrasi, {
                format: "CODE128",
                displayValue: false,
                width: 7,
                height: 300
            });
        }
    </script> -->
</head>
<body onload="generateBarcode(); window.print()">
    <table class="header-table">
        <tr>
            <td><img src="<?= base_url('public/assets/img-kop/uptd.png') ?>" width="70" height="80" alt="uptd"></td>
            <td class="centered">
                <font size="2"><b>LABORATORIUM PENGUJI DAN MEDIK</b></font>
                <font size="3"><b>BADAN LAYANAN UMUM DAERAH (BLUD)</b></font>
                <font size="3"><b>UPTD LABORATORIUM KESEHATAN PROVINSI KALIMANTAN TIMUR</b></font>
                <font size="1">Jl. KH. Akhmad Dahlan No. 27 Telp. (0541) 741732 Fax. (0541) 205754</font>
                <font size="1">Email: labkesprovinsikaltim@gmail.com, Website: www.labkeskaltim.com</font>
                <font size="1">SAMARINDA, 75117</font>
            </td>
            <td><img src="<?= base_url('public/assets/img-kop/kan.png') ?>" width="80" height="80" alt="kan"></td>
        </tr>
        <tr>
            <td colspan="3"><hr></td>
        </tr>
    </table>
    <!-- <table>
        <thead>
            <tr>
                <td><svg id="barcode" class="barcode"></svg></td>
                <td class="penanggung-jawab">Penanggung jawab: <?= $data->penanggung_jawab ?></td>
            </tr>
        </thead>
    </table> -->
    <table class="patient-doctor-table">
        <thead>
            <tr>
                <th>IDENTITAS PASIEN</th>
                <th>DOKTER PENGIRIM</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="inline-container">
                        <p class="label">No.Med Rec</p>
                        <p class="colon">:</p>
                        <p class="data"><?= $data->no_rekam_medis ?></p>
                    </div>
                </td>
                <td>
                    <div class="inline-container">
                        <p class="label">Nama</p>
                        <p class="colon">:</p>
                        <p class="data"><?= $data->dokter ?></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="inline-container">
                        <p class="label">No.Reg</p> 
                        <p class="colon">:</p>
                        <p class="data"><?= $data->kode_registrasi ?></p>
                    </div>
                </td>
                <td>
                    <div class="inline-container">
                        <p class="label">Tgl.Permintaan</p> 
                        <p class="colon">:</p>
                        <p class="data"><?= date('d-m-Y H:i') ?></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="inline-container">
                        <p class="label">Nama</p> 
                        <p class="colon">:</p>
                        <p class="data"><?= $data->nama ?></p>
                    </div>
                </td>
                <td>
                    <div class="inline-container">
                        <p class="label">Tgl.Periksa</p>
                        <p class="colon">:</p>
                        <p class="data"><?= date('d-m-Y', strtotime($data->tgl_pengujian)) ?></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="inline-container">
                        <p class="label">Tgl.Lahir/Umur</p>
                        <p class="colon">:</p>
                        <p class="data"><?= date('d-m-Y', strtotime($data->tanggal_lahir)) ?> / <?= $umur ?></p>
                    </div>
                </td>
                <td>
                    <div class="inline-container">
                        <p class="label">Tgl.Selesai</p>
                        <p class="colon">:</p>
                        <p class="data"><?= date('d-m-Y', strtotime($data->tgl_selesai)) ?></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="inline-container">
                        <p class="label">Jenis Kelamin</p>
                        <p class="colon">:</p>
                        <p class="data"><?= $data->jenis_kelamin ?></p>
                    </div>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <div class="inline-container">
                        <p class="label">Alamat</p>
                        <p class="colon">:</p>
                        <p class="data"><?= $data->alamat ?></p>
                    </div>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <div class="hasil-laboratorium">
        <h3 class="title">HASIL LABORATORIUM</h1>

        <table class="hasil-lab-table">
            <thead>
                <tr>
                    <th>Pemeriksaan</th>
                    <th>Hasil</th>
                    <th>Satuan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hasil as $key) { ?>
                    <tr>
                        <td><?= $key->parameter ?></td>
                        <td class="text-center"><?= $key->hasil ?></td>
                        <td class="text-center"><?= $key->satuan ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="info-surat">
        <ol class="point-info">
            <li>Hasil pemeriksaan diatas hanya berlaku untuk sample yang diperiksa.</li>
            <li>Laporan hasil pemeriksaan ini terdiri dari 1halaman.</li>
            <li>Laporan hasil pemeriksaan ini tidak boleh digandakan, kecuali secara lengkap dan seijin tertulis dari UPTD Laboratorium Kesehatan Provinsi Kalimantan Timur.</li>
        </ol>
    </div>
    <div class="tanda-tangan">
        <div class="tanda-tangan-content">
            <p>Kalimantan, 5 Juni 2024</p>
            <p>Dokter Umum</p>
            <br>
            <br>
            <br>
            <p><?= $data->dokter ?></p>
        </div>
    </div>
</body>
</html>
