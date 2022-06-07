@extends('/layouts/main')
@section('heading')
<h3>Transaksi : Batal</h3>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pemesan</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Total Harga</th>
                    <th>Pesanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->username_pengguna }}</td>
                    <td>{{ $transaksi->tanggal_dipesan }}</td>
                    <td>{{ $transaksi->total_harga }}</td>
                    <td><a href="/transaksi/batal/{{ $transaksi->id }}/view">Detail</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script>
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endsection