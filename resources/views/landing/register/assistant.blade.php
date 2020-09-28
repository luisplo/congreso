    <div>
        <div class="form-group">
            <label>Entidad</label>
            <input type="text" class="form-control" id="entity" name="entity" />
            @error('entity')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>