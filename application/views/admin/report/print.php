<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi <?= $trx['id_trx']; ?></title>
    <style type="text/css" media="print">
        body {
            font: Arial;
            font-size: 12px;
        }

        .cetak {
            width: 27cm;
            height: auto;
            padding: 1cm;
        }

        table {
            border: solid #000;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            padding: 3mm 6mm;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
        }
    </style>

    <style type="text/css" media="screen">
        body {
            font: Arial;
            font-size: 12px;
        }

        .cetak {
            width: 27cm;
            height: 19cm;
            padding: 1cm;
        }

        table {
            border: solid #000;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            padding: 3mm 6mm;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
        }
    </style>
</head>

<body onload="print()">
    <div class="cetak">
        <h1>Laporan Transaksi <?= $site['site_name']; ?> Periode <?= $from; ?> - <?= $to; ?></h1>
        <table>
            <tr>
                <th>ID TRX</th>
                <th>KODE BARANG</th>
                <th>KODE RESI</th>
                <th>KIRIM KE</th>
                <th>TANGGAL</th>
                <th>TOTAL</th>
            </tr>
            <?php foreach ($trx as $item) : ?>
                <tr>
                    <td><?= $item['id_trx']; ?></td>
                    <td><?= $item['product_id']; ?></td>
                    <td><?= $item['kode_resi']; ?></td>
                    <td><?= $item['alamat_lengkap']; ?></td>
                    <td><?= $item['tgl_trx']; ?></td>
                    <td><?= "Rp " . number_format($item['total'], 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>