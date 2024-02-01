<!DOCTYPE html>
<html>

<head>
    <title>PDF Evaluasi Kuesioner <?= $kuesioner->judul_kuesioner ?></title>
</head>

<style>
    .table-header {
        border-collapse: collapse;
        /* Menggabungkan border-cells untuk hasil yang lebih konsisten */
        width: 100%;
        padding: 10px;
    }

    .table-content {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 150px;
    }

    .table-content th,
    .table-content td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
        vertical-align: top;
    }

    .titikdua {
        padding: 0 20px;
        /* Tambahkan jarak 10 piksel ke kiri dan kanan dalam setiap td */
    }
</style>

<body>
    <?php if (!empty($evaluasi) and !empty($detail_evaluasi) and !empty($pernyataan) and !empty($kuesioner)) { ?>
        <div class="container mt-5">
            <table class="table-header" style="background-color: #2f519e; color: white; border: 0px !important">
                <tr>
                    <td rowspan="4">
                        <img src="<?= $foto ?>" style="width: 80px;">
                    </td>
                    <td rowspan="4" style=" text-align:center">
                        <h2 style="text-transform: uppercase;">HASIL EVALUASI KUESIONER <?= $kuesioner->judul_kuesioner ?></h2>
                    </td>
                </tr>
            </table>
            <br>

            <table>
                <tr>
                    <td style="text-align: left;">Judul Kuesioner</td>
                    <td class="titikdua">: <?= $kuesioner->judul_kuesioner ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Tanggal Mulai</td>
                    <td class="titikdua">: <?= date('d/m/Y', strtotime($kuesioner->mulai)) ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Tanggal Selesai</td>
                    <td class="titikdua">: <?= date('d/m/Y', strtotime($kuesioner->selesai)) ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Hasil Evaluasi Kepuasan Pelanggan</td>
                    <td class="titikdua">: <?= $evaluasi->kriteria_nilai_csi ?></td>
                </tr>
            </table>
            <br>
            <table class=" table-content">
                <tbody>
                    <tr>
                        <th>No.</th>
                        <th>Pernyataan</th>
                        <th>Rekomendasi Perbaikan</th>
                    </tr>
                    <?php $nomor = 1; ?>
                    <?php foreach ($detail_evaluasi as $e) : ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <?php foreach ($pernyataan as $p) : ?>
                                <?php if ($e['id_pernyataan'] == $p['id_pernyataan']) : ?>
                                    <td>
                                        <?= $p['pernyataan'] ?>
                                    </td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td><?= $e['rekomendasi_perbaikan'] ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <h2 style="text-align: center;">Gagal Memuat PDF</h2>
    <?php } ?>
</body>

</html>