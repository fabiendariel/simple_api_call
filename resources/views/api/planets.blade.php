@extends('base')

@section('title','Game List')

@section('content')

  <div class="container">
    
      @foreach ($planetsDatas as $planet)
      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <h3>Planet : {{ $planet->Name }}</h3>
        <div class="d-flex flex-row bd-highlight mb-3">
          <div class="p-2 bd-highlight">Diameter : {{ $planet->Diameter }} km</div>        
          <div class="p-2 bd-highlight">Population : {{ number_format($planet->Population) }} hab.</div>
        </div>
        
        <div class="d-flex flex-row bd-highlight mb-6">
          <div class="p-2 bd-highlight"><a class="btn btn-info" href="{{ $planet->Url }}">Want to see more?</a></div>
        </div>
      </div>
      @endforeach
    
  </div>   
  
@endsection