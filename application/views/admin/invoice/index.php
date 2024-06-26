<style>
    .row.full-body {
        padding: 10px;
    }
</style>

<div class="row full-body">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <svg id="barcode" class="barcode"></svg> <br>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <span><strong>Kode Invoice:</strong> <?= $data['invoice'] ?> <br></span>
                        <span><strong>Kode Registrasi:</strong> <?= $data['kode_registrasi'] ?>  <br></span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <span><strong>Nama Pasien:</strong> <?= $data['nama'] ?> <br></span>
                        <span><strong>Status:</strong> <?= $data['status']?><br></span>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Jenis Pemeriksaan</th>
                            <th>Parameter</th>
                            <th>Tanggal</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['detail_pembayaran'] as $detail) { ?>
                        <tr>
                            <td><?= $data['jenis_pemeriksaan'] ?></td>
                            <td><?= $detail['parameter']?></td>
                            <td><?= date('d-m-Y', strtotime($data['tanggal'])) ?></td>
                            <td>Rp <?= number_format($detail['tarif'], 0, ',', '.') ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" style="text-align: right;"><strong>Total</strong></td>
                            <td>Rp <?= $data['total']?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
<script>
    window.onload = function() {
        generateBarcode();
        window.print();
    };

    function generateBarcode() {
        const kodeRegistrasi = "<?= $data['invoice'] ?>";
        JsBarcode("#barcode", kodeRegistrasi, {
            displayValue: false,
            width: 1,
            height: 28
        });
    }
</script>