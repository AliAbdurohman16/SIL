<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <svg id="barcode" class="barcode"></svg>
                        <b>Kode Invoice:</b> <?= $data->invoice ?> <br>
                        <b>Kode Registrasi:</b> <?= $data->kode_registrasi ?>  <br>
                        <b>Nama Pasien:</b> <?= $data->nama ?> <br>
                        <b>Status:</strong> <?= $data->status?><br>
                    </div>
                    <table class="table">
                    <thead>
                        <tr>
                        <th>Jenis Pemeriksaan</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $data->jenis_pemeriksaan ?></td>
                            <td><?= date('d-m-Y H:i:s', strtotime($data->tanggal)) ?></td>
                            <td>Rp <?= number_format($data->total, 0, ',', '.') ?></td>
                        </tr>
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                        <td colspan="3" class="text-right"><strong>Total:</strong></td>
                        <td>Rp </td>
                        </tr>
                    </tfoot> -->
                    </table>
                </div>
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
        const kodeRegistrasi = "<?= $data->invoice ?>";
        JsBarcode("#barcode", kodeRegistrasi, {
            displayValue: false,
            width: 1,
            height: 28
        });
    }
</script>