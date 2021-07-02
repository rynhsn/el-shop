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
            width: 19cm;
            height: 27cm;
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
            width: 19cm;
            height: 27cm;
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
        <h1>DETAIL TRANSAKSI <?= $site['site_name']; ?></h1>
        <table>
            <tr>
                <th>TRX Code </th>
                <th><?= $trx['id_trx']; ?></th>
            </tr>
            <tr>
                <th>Shipping Code </th>
                <th><?= $trx['kode_resi']; ?></th>
            </tr>
            <tr>
                <td>Date </td>
                <td><?= $trx['tgl_trx']; ?></td>
            </tr>
            <tr>
                <td>Status </td>
                <td><?= $trx['status_trx']; ?></td>
            </tr>
            <tr>
                <td>Total </td>
                <td><?= "Rp " . number_format($trx['total'], 0, ',', '.'); ?></td>
            </tr>
            <?php if ($trx['status_bayar']) : ?>
                <tr>
                    <td>From </td>
                    <td><?= $trx['bank_pelanggan']; ?> (<?= $trx['rekening_pembayaran']; ?> aka <?= $trx['rekening_pelanggan']; ?>)</td>
                </tr>
                <tr>
                    <td>To </td>
                    <td><?= $account['bank_name']; ?> (<?= $account['acc_num']; ?> aka <?= $account['owner_name']; ?>)</td>
                </tr>
                <tr>
                    <td>Date </td>
                    <td><?= $trx['pay_date']; ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td>Customer </td>
                <td><?= $trx['nama_penerima']; ?></td>
            </tr>
            <tr>
                <td>Phone </td>
                <td><?= $trx['no_hp_penerima']; ?></td>
            </tr>
            <tr>
                <td>Address </td>
                <td><?= $trx['alamat_lengkap']; ?></td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <th>Kode Produk</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Sub Total</th>
            </tr>
            <?php foreach ($transactions as $transaction) : ?>
                <tr>
                    <td>
                        <?= $transaction['product_id']; ?>
                    </td>
                    <td><?= $transaction['name']; ?></td>
                    <td><?= "Rp " . number_format($transaction['price'], 0, ',', '.'); ?></td>
                    <td><?= $transaction['qty']; ?></td>
                    <td><?= "Rp " . number_format($transaction['sub_total'], 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>