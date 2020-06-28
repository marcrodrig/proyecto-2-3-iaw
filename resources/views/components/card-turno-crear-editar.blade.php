<div class="card">
    <h5 class="card-header">Detalles de turno</h5>
    <div class="card-body">
        @if ($errors->has('hora'))
            <h6 class="d-flex justify-content-center mb-3" style="color: red;">{{ $errors->first('hora') }}</h6>
        @endif
        <div class="row">
            <div class="col-5">	
                <div class="md-form mt-1">
                    <i class="fas fa-calendar-alt prefix grey-text"></i>
                    <label for="dia">Día</label>
                    <input type="text" class="form-control @error('dia') is-invalid @enderror" id="dia" name="dia" value="{{ old('dia' , $turno->dia ?? '') }}" autocomplete="off" readonly/>
                    @error('dia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-3">
                        <div class="input-group-prepend mt-0">
                            <span><i class="fas fa-clock ml-2"></i> Hora </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row mt-0">
                            <div class="col">
                                <div class="form-group">
                                    <select class="custom-select @error('hora') is-invalid @enderror w-100 ml-0" name="hora" id="hora">
                                        <option value="12:00:00" {{ old('hora', $turno->hora ?? '') == '12:00:00' ? 'selected' : '' }}>12:00</option>
                                        <option value="13:00:00" {{ old('hora', $turno->hora ?? '') == '13:00:00' ? 'selected' : '' }}>13:00</option>
                                        <option value="14:00:00" {{ old('hora', $turno->hora ?? '') == '14:00:00' ? 'selected' : '' }}>14:00</option>
                                        <option value="15:00:00" {{ old('hora', $turno->hora ?? '') == '15:00:00' ? 'selected' : '' }}>15:00</option>
                                        <option value="16:00:00" {{ old('hora', $turno->hora ?? '') == '16:00:00' ? 'selected' : '' }}>16:00</option>
                                        <option value="17:00:00" {{ old('hora', $turno->hora ?? '') == '17:00:00' ? 'selected' : '' }}>17:00</option>
                                        <option value="18:00:00" {{ old('hora', $turno->hora ?? '') == '18:00:00' ? 'selected' : '' }}>18:00</option>
                                        <option value="19:00:00" {{ old('hora', $turno->hora ?? '') == '19:00:00' ? 'selected' : '' }}>19:00</option>
                                        <option value="20:00:00" {{ old('hora', $turno->hora ?? '') == '20:00:00' ? 'selected' : '' }}>20:00</option>
                                        <option value="21:00:00" {{ old('hora', $turno->hora ?? '') == '21:00:00' ? 'selected' : '' }}>21:00</option>
                                        <option value="22:00:00" {{ old('hora', $turno->hora ?? '') == '22:00:00' ? 'selected' : '' }}>22:00</option>
                                        <option value="23:00:00" {{ old('hora', $turno->hora ?? '') == '23:00:00' ? 'selected' : '' }}>23:00</option>
                                    </select>
                                </div>
                            </div>			
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2 ml-auto">
                <div class="input-group-prepend mt-0">
                    <span><i class="fas fa-futbol ml-2 mr-2"></i> Tipo </span>
                </div>
            </div>
            <div class="col-7 mr-auto">
                <div class="form-group row mt-0">
                    <div class="col">
                        <div class="form-group">
                            <select class="form-control" name="tipoTurno" id="tipoTurno" required>
                                <option value="femenino" {{ old('tipoTurno', $turno->tipoTurno ?? '') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                <option value="masculino" {{ old('tipoTurno', $turno->tipoTurno ?? '') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="mixto" {{ old('tipoTurno', $turno->tipoTurno ?? '') == 'mixto' ? 'selected' : '' }}>Mixto</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>							
    </div>
</div>