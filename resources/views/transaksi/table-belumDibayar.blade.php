@extends('/layouts/main')
@section('heading')
<h3>Transaksi : Belum Dibayar</h3>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if (session()->has('Success'))
            <div class="alert alert-success" role="alert">{{ session('Success') }}</div>
        @endif
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pemesan</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Total Harga</th>
                    <th>Pesanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->username_pengguna }}</td>
                    <td>{{ $transaksi->tanggal_dipesan }}</td>
                    <td>{{ $transaksi->total_harga }}</td>
                    <td><a href="/transaksi/belum_bayar/{{ $transaksi->id }}/view">Detail</a></td>
                    <td>
                        <a class="badge bg-success" data-bs-toggle="modal" data-bs-target="{{ '#konfirmasi'.$transaksi->id }}"><i data-feather="check-circle"></i></a>
                        <div class="modal fade text-left" id="{{ 'konfirmasi'.$transaksi->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ 'konfirmasiLabel'.$transaksi->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="{{ 'konfirmasiLabel'.$transaksi->id }}">Konfirmasi Pengambilan</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form action="/transaksi/belum_bayar/{{ $transaksi->id }}/konfirmasi" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <p>
                                                Konfirmasi pengambilan pemesanan ID: {{$transaksi->id}}?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                            <button class="btn btn-primary ml-1">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Iya</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <a class="badge bg-danger" data-bs-toggle="modal" data-bs-target="{{ '#batal'.$transaksi->id }}"><i data-feather="x-circle"></i></a>
                        <div class="modal fade text-left" id="{{ 'batal'.$transaksi->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ 'batalLabel'.$transaksi->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="{{ 'batalLabel'.$transaksi->id }}">Konfirmasi Pembatalan</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form action="/transaksi/belum_bayar/{{ $transaksi->id }}/batal" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <p>
                                                Konfirmasi pembatalan pemesanan ID: {{$transaksi->id}}?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                            <button class="btn btn-primary ml-1">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Iya</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endsection