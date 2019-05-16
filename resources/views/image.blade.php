@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @if ( Auth::check() )

                    @if ( Auth::user()->id == $image->user_id)

                        <img class="img-fluid" src='{{env('APP_STORAGE') . $image->filename}}'>
                        <br>
                        <br>
                        @if ( $image->mimetype )
                            Mimetype: {{$image->mimetype}}  <br>
                        @endif
                        @if ( $image->make )
                            Make: {{$image->make}}  <br>
                        @endif
                        @if ( $image->model )
                            Model: {{$image->model}} <br>
                        @endif
                        @if ( $image->exposure_time )
                            Shutter speed: {{$image->exposure_time}} <br>
                        @endif
                        @if ( $image->f_number )
                            F-Number (Aperture): {{$image->f_number}} <br>
                        @endif
                        @if ( $image->iso_speed_ratings )
                            ISO: {{$image->iso_speed_ratings}} <br>
                        @endif
                        @if ( $image->film_type )
                            Film type: {{$image->film_type}} <br>
                        @endif
                        @if ( $image->developer )
                            Developer: {{$image->developer}} <br>
                        @endif

                        <a href="/images/{{$image->id}}/edit"
                           role="button"
                           class="btn btn-primary">Edit Image Details</a>
                        <p>
                        <form action="/images/{{$image->id}}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit"
                                    onclick="return confirm('Are you certain?')"
                                    class="btn btn-danger">Delete Image
                            </button>
                        </form>

                    @else

                        <div class='alert'>You didn't create this image!</div>
                    @endif


                @else
                    <div class='alert'>Please sign in!</div>
                @endif
            </div>
        </div>
@endsection
