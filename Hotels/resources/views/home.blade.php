@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
         {{-- if user id is 1 then he/she is admin --}}
         
         <div class="card">
            <div class="card-header"><b>Create Hotels  </b>  
                @if (auth::user()->id===1)
                <form action="{{ route('hotel.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Hotel Title..">
                </div>
                <div class="form-group">
                    <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Hotel Description.."></textarea>
                </div>
                <input type="file" name="image" class="form-control">
                <button class="btn btn-primary float-right" type="submit" >Add Hotel</button>
            </form>
            {{-- expr --}}
            @endif
        </div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="row">
                @if (count($hotels)>0)
                @foreach ($hotels as $hotel)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="{{ asset('/storage/images/'.$hotel->image)   }}" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">{{ $hotel->title }}</h5>
                        <p class="card-text">{{ substr($hotel->description,0,35)}}..</p>
                        <a href="{{ route('hotel.show',$hotel->id) }}" class="btn btn-primary">Hotel Details</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <h3>No hotel Available right now!</h3>
            @endif
            
            
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
