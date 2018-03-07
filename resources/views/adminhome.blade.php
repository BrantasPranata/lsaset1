@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    DASHBOARD ADMIN: LIST USER!
                    <br>
                    <br>
                    <div class="container">   
                    <a href="asets" class="btn btn-primary">CEK DAFTAR ASET OLEH USER</a>
                    </div>

                </div>
                <div class="container">
                        <div class="container text-center"> 
                                <div class="table-responsive" >
                                    
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th><center>No</center></th>
                                                <th>Nama User</th>
                                                <th>Email</th>
                                                <th>Jumlah Data Aset</th>
                                                
                                            </tr>     
                                        </thead>
                                        <tbody>   
                        @foreach ($users as $key => $user)
                        <tr>    
                            <td>{{($key+1)}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->asets->count()}}</td>
                    </tr>
                    @endforeach           
            </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
