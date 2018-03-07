@extends('layouts.app')

@section('content')
<div class="blog-post">
    <div class="container">   
    <h2 class="blog-post-title">DETAIL DATA ASET{{--{{$post->title}}--}}</h2>
    <small>DATA ASET DIBUAT PADA {{$aset->created_at}} {{--by {{$post->user->name}}--}}</small>
    </div>        
    <hr>
    <div class="container">    
        <div class="table-responsive" >
            <table class="table">

                <tbody>
                     <tr>
                        <td>Merk</td>    
                        <td>{{$aset->merk}}</td>
                    </tr>
                    <tr>
                        <td>Tipe Barang</td> 
                        <td>{{$aset->tipe_barang}}</td>
                    </tr>
                    <tr>
                        <td>Kode Barang</td> 
                        <td>{{$aset->kode_barang}}</td>
                    </tr>
                    <tr>
                        <td>Tahun Perolehan</td>     
                        <td>{{$aset->tahun_perolehan}}</td>
                    </tr>
                    <tr>
                        <td>NUP</td>  
                        <td>{{$aset->nup}}</td>
                    </tr>
                    <tr>
                        <td>BAST</td> 
                        <td>{{$aset->bast}}</td>
                    </tr>
                    <tr>
                        <td>Kondisi</td> 
                        <td>{{$aset->kondisi}}</td>
                    </tr>
                    <tr>
                        <td>Nama User</td> 
                        <td>{{$aset->user->name}}</td>
                    </tr>
                        <td>ACTION</td>     
                        <td>
                                @if(!Auth::guest())
                                {{--harus login untuk tampilkan edit--}}
                                 {{--@if(Auth::user()->id == $post->user_id)--}}
                                 <a href="/asets/{{$aset->id}}/edit" class="btn btn-warning">Edit</a>
                                 
                                 {!!Form::open(['action' => ['AsetsController@destroy',$aset->id], 'method' => 'POST','class' => 'float-right'])!!}
                                 {{Form::hidden('_method', 'DELETE')}}
                                 {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                 {!!Form::close()!!}
                                 {{--@endif--}}
                                 @endif
                        </td>
                </tbody>
            </table>            
        </div>
    </div>    
            <br>
    <div class="container"> 
    <p class="lead">
        <a href="/asets" class="btn btn-lg btn-secondary">Kembali ke List Aset</a>
    </p>                                 
@endsection