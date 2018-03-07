@extends('layouts.app')

@section('content')
<div class="container">
<a href="asets/create" class="btn btn-primary" role="button">TAMBAH ASET BARU</a>
</div>
 @if(count($asets)>0)
<br>
<h1 class="text-center">LIST ASET PER USER</h1>
<div class="container text-center">    
    <div class="table-responsive" >
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th><center>No</center></th>
                    <th>Merk</th>
                    <th>Tipe Barang</th>
                    <th>Kode Barang</th>
                    <th>Tahun Prlh</th>
                    <th>NUP</th>
                    <th>BAST</th>
                    <th>Kondisi</th>
                    <th>Action</th>
                </tr>     
            </thead>
            <tbody>
                @foreach ($asets as $key => $aset)
                <tr>    
                    <td>{{($key+1)}}</td>
                    <td>{{$aset->merk}}</td>
                    <td>{{$aset->tipe_barang}}</td>
                    <td>{{$aset->kode_barang}}</td>
                    <td>{{$aset->tahun_perolehan}}</td>
                    <td>{{$aset->nup}}</td>
                    <td>{{$aset->bast}}</td>
                    <td>{{$aset->kondisi}}</td>
                    <td>{!!Form::open(['action' => ['AsetsController@destroy',$aset->id], 'method' => 'POST', 'class'=>'align-middle'])!!}{{Form::hidden('_method', 'DELETE')}}{{Form::submit('HAPUS', ['class'=>'btn btn-danger'])}}
                        <a href="/asets/{{$aset->id}}/edit" class="btn btn-warning align-middle">GANTI</a>
                        <a class="btn btn-secondary align-middle" href="/asets/{{$aset->id}}">DETAIL</a>
                        {!!Form::close()!!}
                    </td>
                </tr>
                @endforeach           
        </table>
    </div>
    </div>

@else
    <div class="container">
        <br>
        <h1 class="text-center">DATA ASET BELUM DIMASUKKAN</h1>
    </div>
@endif
@endsection
