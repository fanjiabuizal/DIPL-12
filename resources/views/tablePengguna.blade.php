@extends('layouts/main');
@section('heading')
<h3>Daftar Pemain</h3>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>NO</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                    </tr>
                    @php $no=0; @endphp
                    @foreach($data_pemain as $item)
                    @php $no++; @endphp
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$item['username']}}</td>
                        <td>{{$item['nama']}}</td>
                        <td>{{$item['telepon']}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection