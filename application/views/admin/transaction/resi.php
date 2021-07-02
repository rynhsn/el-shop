<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Shipping Card</title>
    <style type="text/css" media="print">
        body {
            font-size: 12px;
            font-family: Arial;
        }

        .resi {
            width: 19cm;
            height: 27cm;
            padding-top: 30px;
        }

        h1 {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            padding-top: 10px;
            border-top: solid thin #eee;
        }

        table {
            border: solid thin #000;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            padding: 6px 12px;
            border: solid thin #000;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="resi">
        <h1>SHIPPING CARD</h1>
        <table>
            <tr>
                <td>
                    <strong>Sender</strong>
                    <p>
                        <?= $site['site_name']; ?><br>
                        <?= $site['address']; ?><br>
                        <?= $site['phone']; ?>
                    </p>
                </td>
                <td>
                    <strong>Receiver</strong>
                    <p>
                        <?= $trx['nama_penerima']; ?><br>
                        <?= base_url('assets/img/' . $site['logo']); ?><br>
                        <?= $trx['alamat_lengkap']; ?><br>
                        <?= $trx['no_hp_penerima']; ?>
                    </p>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <th>No.</th>
                <th>Product Code</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Sub Total</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($transactions as $transaction) : ?>
                <tr>
                    <td><?= $i++; ?></td>
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