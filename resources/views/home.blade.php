@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">


                <h1>Welcome to Contact.Sheet Online</h1>
                <p> On this site, you can upload photographs and review them in a manner similar to traditional
                    35mm contact sheets. Just create a user account in the menu, give a title to a new contact sheet, and upload
                    multiple photos together. When you click on a particular photo in a contact sheet, you can then
                    review its EXIF details and leave helpful notes.</p>

                @if ( Auth::check() )


                    <form action="/sheets/upload" enctype="multipart/form-data" method="post">

                        <div class="row">

                            <div class="col-5">

                                <div class="right">

                                    {{ csrf_field() }}
                                    <label for="name">Sheet name *</label>
                                </div>
                            </div>

                            <div class="col">
                                <input name="name" type="text" value='{{ old('name') }}' required>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-5">
                                <div class="right">
                                    <label for="upload">Upload photos *<br></label>
                                </div>
                            </div>

                            <div class="col">
                                <input multiple="multiple" name="images[]" type="file" required>
                            </div>
                        </div>


                        <div class="row justify-content-center">

                            <input type="submit" class="btn btn-primary" value="Upload and Create">
                    </form>

            </div>


            <div class="row justify-content-center">
                * All fields are required.
            </div>
            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <br>

            @if(empty($sheets))
            @else
                <h2>Existing contact sheets</h2>

                <div class="center">
                    @foreach($sheets as $sheet)

                        <p><a href="/sheets/{{$sheet->id}}">{{$sheet->name }}</a></p>
                    @endforeach
                </div>
            @endif


            @else
                <div class='center'>
                <a href="/register"
                   role="button"
                   class="btn btn-primary">Register for Account</a>
                </div>
            @endif
        </div>
    </div>
    </div>
@endsection
