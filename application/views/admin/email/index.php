<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemeriksaan Laboratorium</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333333;
            text-align: center;
        }
        .card-body {
            max-width: 100%;
        }
        p {
            color: #666666;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hasil Pemeriksaan Laboratorium</h2>
        <div class="card">
            <div class="card-body">
                <p>Kepada Yth, <?= $data->nama ?></p>
                <p>Kami dengan hormat memberitahukan bahwa hasil pemeriksaan laboratorium Anda telah selesai diproses. Berikut adalah informasi yang perlu Anda ketahui:</p>
                <p>Hasil pemeriksaan telah dilampirkan dalam dokumen PDF. Kami harap Anda dapat membaca dengan cermat untuk memahami kondisi Anda dengan lebih baik.</p>
                <p>Jika Anda memiliki pertanyaan atau memerlukan penjelasan lebih lanjut mengenai hasil pemeriksaan, jangan ragu untuk menghubungi kami.</p>
                <p>Terima kasih atas kerjasama Anda.</p>
            </div>
        </div>
        <p>Harap dicatat: Informasi dalam dokumen ini bersifat rahasia dan hanya ditujukan untuk penggunaan penerima.</p>
    </div>
</body>
</html>
