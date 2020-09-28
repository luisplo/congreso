<div>
    <div class="form-group">
        <label>Correo Institucional</label>
        <input type="email" class="form-control" id="email_center" name="email_center" />
        @error('email_center')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>