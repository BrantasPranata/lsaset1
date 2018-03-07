@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Aset</h1>
    {!! Form::open(['action' => 'AsetsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('merk','Merk Barang')}}
            {{Form::text('merk','',['class'=>'form-control','placeholder'=>'Ex Asus'])}}
        </div>
        <div class="form-group">
                {{Form::label('tipe_barang','Tipe Barang')}}
                {{Form::text('tipe_barang','',['class'=>'form-control','placeholder'=>'ExLaptop'])}}
        </div>
        <div class="form-group">
            {{Form::label('kode_barang','Kode Barang')}}
            {{Form::text('kode_barang','',['class'=>'form-control','placeholder'=>'ExASD_041'])}}
        </div>
        <div class="form-group">
            {{Form::label('tahun_perolehan','Tahun Perolehan')}}
            {{Form::text('tahun_perolehan','',['class'=>'form-control','placeholder'=>'Ex2008'])}}
        </div>
        <div class="form-group">
            {{Form::label('nup','NUP')}}
            {{Form::text('nup','',['class'=>'form-control','placeholder'=>'ExNUP055'])}}
        </div>
        <div class="form-group">
                {{Form::label('bast','BAST', ['class' => 'control-label'])}}
                <div class="col-lg-3">
                {{Form::select('bast', ['Ada' => 'Ada', 'Tidak' => 'Tidak'], 'Tidak',['class' => 'form-control']) }}
                </div> 
        </div>
        <div class="form-group">      
                {{Form::label('kondisi','Kondisi', ['class' => 'control-label'])}}                        
                <div class="col-lg-3">
                {{Form::select('kondisi',['Baik' => 'Baik', 'Rusak' => 'Rusak'], 'Baik',['class' => 'form-control'] ) }}
                </div>                                    
        </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}      
    {!! Form::close() !!}
    </div>    
@endsection