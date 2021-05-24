@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header">
     Dati Utente
    </div>
    <div class="card-body">
    <h5 class="card-title">Utente : {{ Auth::user()->name }}</h5>
    <p class="card-text">Mail : {{ Auth::user()->email }}</p>
    @if (empty(Auth::user()->api_token))
        <form action="{{route('generate-token')}}" method='post'>
             @csrf
            <button class="btn btn-primary">Genera Token</button>
        </form>    
    @else
    <p class="card-text">Token : {{ Auth::user()->api_token }}</p>
  
    @endif
    
    </div>
</div>
@endsection