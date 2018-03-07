@extends('layouts.app')

@section('content')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<div class="container">
    <h1 class="text-center">LIST ASET (VIEW AS ADMIN)</h1>  
    <a href="asets/create" class="btn btn-primary" role="button">TAMBAH ASET BARU</a>
    <br>
    <br>
    <br>
    <div class="panel panel-default">
    <form action="{{route('asets.index')}}" method="get" class="form-inline">
    <div class="form-group">
    <input type="text" name="s" class="form-control" placeholder="search merk atau laptop" value="{{isset($s) ? $s : '' }}">
    </div>
    <span class="input-group-btn">
    <div class="form-group">
        <button class="btn btn-success" type="submit">Search</button>
    </div>
    </span>
    </form>
    </div>

    {{--@if(count($asets) > 0)--}}
    <br>
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
                        <th>User</th>
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
                        <td>{{$aset->user->name}}</td>
                        <td>{!!Form::open(['action' => ['AsetsController@destroy',$aset->id], 'method' => 'POST', 'class'=>'align-middle'])!!}{{Form::hidden('_method', 'DELETE')}}{{Form::submit('HAPUS', ['class'=>'btn btn-danger'])}}
                            <a href="/asets/{{$aset->id}}/edit" class="btn btn-warning align-middle">GANTI</a>
                            <a class="btn btn-secondary align-middle" href="/asets/{{$aset->id}}">DETAIL</a>
                            {!!Form::close()!!}
                        </td>
                    </tr>
                    @endforeach           
            </table>
            {{$asets->appends(['s'=>$s])->links()}}  
        </div>
        </div>
        <div class="container">
		<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
		<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
        <a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
        </div>        
 
    {{--@else
            <p>DATA ASET BELUM DIMASUKKAN</p>
    @endif--}}
</div>
    
    @endsection