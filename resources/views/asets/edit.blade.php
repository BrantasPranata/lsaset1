@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit ASET</h1>
    {!! Form::open(['action' => ['AsetsController@update', $aset->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('merk','Merk Barang')}}
            {{Form::text('merk',$aset->merk,['class'=>'form-control','placeholder'=>'Ex Asus'])}}
        </div>
        <div class="form-group">
                {{Form::label('tipe_barang','Tipe Barang')}}
                {{Form::text('tipe_barang',$aset->tipe_barang,['class'=>'form-control','placeholder'=>'ExLaptop'])}}
        </div>
        <div class="form-group">
            {{Form::label('kode_barang','Kode Barang')}}
            {{Form::text('kode_barang',$aset->kode_barang,['class'=>'form-control','placeholder'=>'ExASD_041'])}}
        </div>
        <div class="form-group">
            {{Form::label('tahun_perolehan','Tahun Perolehan')}}
            {{Form::text('tahun_perolehan',$aset->tahun_perolehan,['class'=>'form-control','placeholder'=>'Ex2008'])}}
        </div>
        <div class="form-group">
            {{Form::label('nup','NUP')}}
            {{Form::text('nup',$aset->nup,['class'=>'form-control','placeholder'=>'ExNUP055'])}}
        </div>
        <div class="form-group">
                {{Form::label('bast','BAST', ['class' => 'control-label'])}}
                <div class="col-lg-3">
                {{Form::select('bast', ['Ada' => 'Ada', 'Tidak' => 'Tidak'], $aset->bast,['class' => 'form-control']) }}
                </div> 
        </div>
        <div class="form-group">      
                {{Form::label('kondisi','Kondisi', ['class' => 'control-label'])}}                        
                <div class="col-lg-3">
                {{Form::select('kondisi',['Baik' => 'Baik', 'Rusak' => 'Rusak'], $aset->kondisi,['class' => 'form-control'] ) }}
                </div>                                    
        </div>
        
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}  <a class='btn btn-secondary' href='/asets'>CANCEL</a>    
        {!! Form::close() !!}
        
</div>   
@endsection