<div class="form-group">
    <label>Centro de Formaci&oacute;n</label>
    <input type="text" class="form-control" id="sena_center" name="sena_center" />
    @error('sena_center')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
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
<div class="form-group">
    <label>Autor del Proyecto</label>
    <input type="text" class="form-control" id="project_owner" name="project_owner" />
    @error('project_owner')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label>Nombre del Proyecto</label>
    <input type="text" class="form-control" id="name_project" name="name_project" />
    @error('name_project')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label>Resumen</label>
    <input type="text" class="form-control" id="summary" name="summary" />
    @error('summary')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>