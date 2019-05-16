@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">


                @if ( Auth::check() )

                    @if ( Auth::user()->id == $image->user_id)

                        <img src='{{env('APP_STORAGE') . $image->thumbnail_filename}} '>

                        @include('forms.form')

                    @else

                        <div class='alert'>You didn't create this image!</div>
                    @endif


                @else
                    <div class='alert'>Please sign in!</div>
                @endif

            </div>
        </div>
@endsection
