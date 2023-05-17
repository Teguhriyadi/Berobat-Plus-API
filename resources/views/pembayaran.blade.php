<!DOCTYPE html>
<html>
    <head>
        <title>Pembayaran</title>
    </head>
    <body>
        <form action="{{ url('/pembayaran') }}" method="POST">
            @csrf
            <button type="submit">
                Simpan
            </button>
        </form>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $nomer = 0;
                @endphp
                @foreach ($pembayaran as $item)
                    <tr>
                        <td>{{ ++$nomer }}.</td>
                        <td>{{ $item->payment_channel }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a target="_blank" href="https://checkout-staging.xendit.co/web/{{ $item->external_id }}">
                                Klik
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>