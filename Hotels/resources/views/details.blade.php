@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-11">
     {{-- if user id is 1 then he/she is admin --}}

     <div class="card">


      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif

        <div class="row">
          @if ($hotel)

          <div class="col-md-12">
            <div class="card" >
              <img class="card-img-top" src="{{ asset('/storage/images/'.$hotel->image)   }}" alt="Card image cap" width="400" height="300">
              <div class="card-body">
                <h5 class="card-title">{{ $hotel->title }}</h5>
                <p class="card-text">{{ $hotel->description}}..</p>
                <a href="{{ route('hotel.index') }}" class="btn btn-primary btn-sm">back</a>
              </div>
            </div>
          </div>

          @else
          <h3>No hotel Available right now!</h3>
          @endif


        </div>
      </div>
    </div>
{{-- comment section code start here --}}
    <h5 class="text-center">Comment section</h5>
    <div class="card">
      <div class="card-header">
        <form action="{{ route('comments',$hotel->id) }}" method="POST">
          @csrf
          <div class="form-group">
            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="anything you would like to tell us.."></textarea>
          </div>
          <button class="btn btn-success float-right btn-sm" type="submit" >Post Comment</button>
        </form>
      </div>
    </div>
    @foreach ($hotel->comments  as $comment)
    <div class="card">
      <div class="card-header">

      </div>

      <div class="card-body">

        <div class="row">

          <div class="col-md-2">
            <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/ width="50" height="50">
            <p class="text-secondary text-center">{{$comment->created_at->diffForHumans()}}</p>
          </div>
          <div class="col-md-10">
            <p>
              <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>John Doe</strong></a>
            </p>
            <div class="clearfix"></div>

            <p>{{ $comment->comment }}</p>


          </div>
        </div>
      </div>
    </div>
    @endforeach

  </div>

</div>
</div>
@endsection
