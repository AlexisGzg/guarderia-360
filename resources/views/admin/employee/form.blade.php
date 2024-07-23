<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombre (s)') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $employee?->name) }}" id="name" placeholder="Ingresar nombre">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="middlename" class="form-label">{{ __('Apellido Paterno') }}</label>
            <input type="text" name="middlename" class="form-control @error('middlename') is-invalid @enderror" value="{{ old('middlename', $employee?->middlename) }}" id="middlename" placeholder="Ingresar apellido paterno">
            {!! $errors->first('middlename', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lastname" class="form-label">{{ __('Apellido Materno') }}</label>
            <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname', $employee?->lastname) }}" id="lastname" placeholder="Ingresar apellido materno">
            {!! $errors->first('lastname', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="jobtitle" class="form-label">{{ __('Cargo') }}</label>
            <input type="text" name="jobtitle" class="form-control @error('jobtitle') is-invalid @enderror" value="{{ old('jobtitle', $employee?->jobtitle) }}" id="jobtitle" placeholder="Ingresar cargo">
            {!! $errors->first('jobtitle', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="status" class="form-label">{{ __('En activo') }}</label>
            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status', $employee?->status) }}" id="status" placeholder="Ingresa si está activo">
            {!! $errors->first('status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="photo" class="form-label">{{ __('Fotografía') }}</label>
            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo">
            {!! $errors->first('photo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-success">{{ __('Enviar') }}</button>
    </div>
</div>
