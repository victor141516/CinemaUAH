<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="name" class="control-label">Título</label>
            <input class="form-control" type="text" id="name" name="name" value="{{ $film->name }}">
        </div>
        <div class="form-group">
            <label for="synopsis" class="control-label">Sinopsis</label>
            <textarea class="form-control" rows="4" id="synopsis" name="synopsis">{{ $film->synopsis }}</textarea>
        </div>
        <div class="form-group">
            <label for="website" class="control-label">Página Oficial</label>
            <input class="form-control" type="text" id="website" name="website" value="{{ $film->website }}">
        </div>
        <div class="form-group">
            <label for="original_title" class="control-label">Título original</label>
            <input class="form-control" type="text" id="original_title" name="original_title" value="{{ $film->original_title }}">
        </div>
        <div class="form-group">
            <label for="genre" class="control-label">Género</label>
            <select class="form-control" id="genre" name="genre">
                <option @if($film->genre == '') selected @endif>Selecciona el género</option>
                @foreach($genres as $each)
                    <option value="{{ $each }}" @if($film->genre == $each) selected="selected" @endif>{{ $each }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="country" class="control-label">Nacionalidad</label>
            <input class="form-control" type="text" id="country" name="country" value="{{ $film->country }}">
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="minutes_duration" class="control-label">Duración</label>
            <input class="form-control" type="number" id="minutes_duration" name="minutes_duration" value="{{ $film->minutes_duration }}">
        </div>
        <div class="form-group">
            <label for="year" class="control-label">Año</label>
            <input class="form-control" type="number" id="year" name="year" value="{{ $film->year }}">
        </div>
        <div class="form-group">
            <label for="producer" class="control-label">Distribuidora</label>
            <input class="form-control" type="text" id="producer" name="producer" value="{{ $film->producer }}">
        </div>
        <div class="form-group">
            <label for="Director" class="control-label">Director</label>
            <input class="form-control" type="text" id="Director" name="director" value="{{ $film->director }}">
        </div>
        <div class="form-group">
            <label for="actors" class="control-label">Actores</label>
            <input class="form-control" type="text" id="actors" name="actors" value="{{ $actors }}">
        </div>
        <div class="form-group">
            <label for="age_rating" class="control-label">Clasificación</label>
            <select class="form-control" id="age_rating" name="age_rating">
                <option @if($film->age_rating == '') selected @endif>Selecciona la edad</option>
                @foreach($age_ratings as $age_rating)
                    <option value="{{ $age_rating }}" @if($film->age_rating == $age_rating) selected @endif>{{ $age_rating }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="others" class="control-label">Datos</label>
            <input class="form-control" type="text" id="others" name="others" value="{{ $film->others }}">
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div id="holder">
            @if($film->has_image)
                <img src="/img/{{ $film->id }}.jpg" alt="{{ $film->name }}">
            @else
                <p>Suelta la carátula aquí</p>
            @endif
        </div>
        <p id="upload" class="hidden">
            <label>Drag &amp; drop not supported, but you can still upload via this input field:<br>
                <input type="file">
            </label>
        </p>
        <p id="filereader">File API &amp; FileReader API not supported</p>
        <p id="formdata">XHR2's FormData is not supported</p>
    </div>
</div>
