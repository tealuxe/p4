<form action="/images/{{$image->id}}" method="POST">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <p>Notes:</p>
    <p></p>
        <textarea type="text" name="comment" rows="5" cols="50">{{$image->comment}}</textarea>

        <div class="row">
            <div class="col-2">
    <p>Camera make:</div>
    <div class="col">
        <input type="text" name="make" value="{{old("make", $image->make)}}">
    </p>
    </div>
    </div>

    <div class="row">
        <div class="col-2">
            <p>Camera model:</div>
        <div class="col">
            <input type="text" name="model" value="{{old("model", $image->model)}}"></p>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <p>Shutter speed:</div>
        <div class="col">
            <input type="text" name="exposure_time" value="{{old("exposure_time", $image->exposure_time)}}"></p>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <p>F-Number (Aperture):</div>
        <div class="col">
            <input type="text" name="f_number" value="{{old("f_number", $image->f_number)}}"></p>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <p>ISO:</div>
        <div class="col"><input type="text"
                                name="iso_speed_ratings"
                                value="{{old("iso_speed_ratings", $image->iso_speed_ratings)}}">
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <p>Film type:</div>
        <div class="col"><input type="text" name="film_type" value="{{old("film_type", $image->film_type)}}">
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <p>Developer:</div>
        <div class="col"><input type="text" name="developer" value="{{old("developer", $image->developer)}}">
        </div>
    </div>

    * 80 Characters Max for Each Item. 1500 for Notes.
    <br>

    <input type="submit" class="btn btn-primary" value='Update'>
</form>
<br>

@if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/images/{{$image->id}}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit" onclick="return confirm('Are you certain?')" class="btn btn-danger">Delete Image</button>
</form>
