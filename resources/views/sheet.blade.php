@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">

                @if ( Auth::check() )

                    @if ( Auth::user()->id == $sheet->user_id)

                        <h2>{{$sheet->name}}</h2>

                        <form action="/sheets/upload" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            Add Additional Photos: <br>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" id="name" name="name" value="{{$sheet->name}}">
                            <input multiple="multiple" name="images[]" type="file" required>
                            <input type="submit" class="btn btn-primary" value="Upload">
                        </form>

                        @if ($errors->any())
                            <div class="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li> {{$error}} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        @if ($images)
                            @foreach($images as $image)
                                <a href="/images/{{$image->id}}">

                                    <img class="contact" src='{{env('APP_STORAGE') . $image->thumbnail_filename }}'>
                                </a>
                            @endforeach
                        @endif

                        <br>
                        <br>
                        <div class="row justify-content-center">

                            <form action="/sheets/{{$sheet->id}}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit"
                                        onclick="return confirm('Are you sure?')"
                                        class="btn btn-danger">Delete Sheet
                                </button>
                            </form>
                            @else

                                <div class='alert'>You didn't create this sheet!</div>
                            @endif


                            @else
                                <div class='alert'>Please sign in!</div>
                            @endif
                        </div>

            </div>
        </div>
@endsection
