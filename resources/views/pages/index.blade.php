@extends('layouts.app')

@section('content')
            <section class="jumbotron text-center">
                <div class="container">
                  <h1 class="jumbotron-heading">{{$title}}</h1>
                  <p class="lead text-muted">FORM PENDATAAN ASET</p>
                  <p>
                    <a href="/login" class="btn btn-primary my-2">Login</a>
                    <a href="/register" class="btn btn-secondary my-2">Register</a>
                  </p>
                </div>
              </section>
           
@endsection