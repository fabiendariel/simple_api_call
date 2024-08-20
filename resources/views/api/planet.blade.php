@extends('base')

@section('title','Game List')

@section('content')

  <div class="container">
    
      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <h3>Planet : {{ $planet->Name }}</h3>
                
        <div class="d-flex flex-row bd-highlight mb-1">
          <div class="p-2 bd-highlight">Rotation period : {{ $planet->Rotation_period }} hours</div>
        </div>
        <div class="d-flex flex-row bd-highlight mb-1">
          <div class="p-2 bd-highlight">Orbital Period : {{ $planet->Orbital_period }} days</div>
        </div>
        <div class="d-flex flex-row bd-highlight mb-1">
          <div class="p-2 bd-highlight">Diameter : {{ $planet->Diameter }} km</div>
        </div>
        <div class="d-flex flex-row bd-highlight mb-1">
          <div class="p-2 bd-highlight">Climate : {{ $planet->Climate }}</div>
        </div>
        <div class="d-flex flex-row bd-highlight mb-1">
          <div class="p-2 bd-highlight">Gravity : {{ $planet->Gravity }} G</div>
        </div>
        <div class="d-flex flex-row bd-highlight mb-1">
          <div class="p-2 bd-highlight">Terrain : {{ $planet->Terrain }}</div>
        </div>
        <div class="d-flex flex-row bd-highlight mb-1">
          <div class="p-2 bd-highlight">Surface water : {{ $planet->Surface_water }}%</div>
        </div>
        <div class="d-flex flex-row bd-highlight mb-1">
          <div class="p-2 bd-highlight">Population : {{ number_format($planet->Population) }} hab.</div>
        </div>
        <div class="d-flex flex-row bd-highlight mb-6">
          <div class="p-2 bd-highlight"><a class="btn btn-success" href="/planets">Back</a></div>
        </div>
      </div>
    
  </div>   
  
@endsection