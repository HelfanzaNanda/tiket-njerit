<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiket</title>
    <style>
        td {
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <td>Nama</td>
                <td> : {{ $order->passanger->name }}</td>
            </tr>
            <tr>
                <td>SIM / KTP</td>
                <td> : {{ $order->passanger->no_unique }}</td>
            </tr>
            <tr>
                <td>Pesan Tanggal</td>
                <td> : {{ $order->date->translatedFormat('l, d F Y') }}</td>
            </tr>
            <tr>
                <td>Bus </td>
                <td> : {{ $order->departure->car->name. ' - ' .$order->departure->car->user->name }}</td>
            </tr>
            <tr>
                <td>total</td>
                <td> : {{ 'Rp. '. number_format($order->total) }}</td>
            </tr>
            <tr>
                <td colspan="2">terima kasih sudah pesan, silahkan bayar ditempat dg menunjukan tiket ini</td>
            </tr>
        </tbody>
    </table>
</body>
</html>