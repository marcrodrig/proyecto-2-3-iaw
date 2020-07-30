<div class="card">
    <h5 class="card-header">Información de cliente</h5>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="md-form mt-1">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $cliente->nombre ?? '') }}" required autocomplete="off">
                    <label for="nombre">Nombre</label>
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="md-form mt-1">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" name="apellido" id="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido', $cliente->apellido ?? '') }}" autocomplete="off">
                    <label for="apellido">Apellido</label>
                    @error('apellido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="md-form mt-1">
                    <i class="fas fa-address-card prefix grey-text"></i>
                    <input type="text" name="DNI" id="DNI" class="form-control @error('DNI') is-invalid @enderror" value="{{ old('DNI', $cliente->DNI ?? '') }}" required autocomplete="off">
                    <label for="DNI">DNI</label>
                    @error('DNI')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="md-form mt-1">
                    <i class="fas fa-phone prefix grey-text"></i>
                    <input type="text" id="telefono" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $cliente->telefono ?? '') }}" autocomplete="off">
                    <label for="telefono">Teléfono</label>
                    @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-sm-2">
                <div class="input-group-prepend mt-0">
                    <span><i class="fas fa-id-badge fa-2x ml-1 mr-2"></i> Foto </span>
                </div>
            </div>
            <div class="col col-sm-10">
                <div class="form-group row mt-0">
                    <div class="col">
                        <div class="custom-file mb-1">
                            <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" name="foto" id="foto" lang="es">
                            <label class="custom-file-label" for="foto" style="text-transform: none;">Seleccionar archivo...</label>
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>