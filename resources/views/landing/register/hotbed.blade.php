<div>
    <div class="form-group">
        <label>Instituci&oacute;n Superior</label>
        <input type="text" class="form-control" placeholder="Aplica Universitarios" id="university_center" name="university_center" />
        @error('university_center')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label>Modalidad del Proyecto</label>
        <select class="form-control" id="modality_project" name="modality_project">
            <option value="" selected>-- Seleccione --</option>
            @foreach($modalityPro as $key => $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
        </select>
        @error('modality_project')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label>URL del Poster</label>
        <input type="text" class="form-control" id="url_poster" name="url_poster" />
        @error('url_poster')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>