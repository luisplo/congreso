<div class="form-group">
    <label>Eje Tem&aacute;tico</label>
    <select class="form-control" id="main_theme" name="main_theme">
        <option value="" selected>-- Seleccione --</option>
        @foreach($mainTheme as $key => $value)
        <option value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
    </select>
    @error('main_theme')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>