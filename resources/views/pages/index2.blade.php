@extends('layouts.app')

@section('content')
            <section class="jumbotron text-center">
                <div class="container">
                  <h1 class="jumbotron-heading">{{$title}}</h1>
                  <p class="lead text-muted">FORM PENDATAAN ASET</p>
                  <br>
                  <p class="mb-0">
                    SELAMAT DATANG {{ Auth::user()->name }}
                  </p>
                </div>
              </section>
           
@endsection