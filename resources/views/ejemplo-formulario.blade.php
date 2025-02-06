<form name="f_prof" id="f_prof" action="{{route('ejemplo-store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="sector">Elija un sector</label>
        <select name="sector" id="sector" class="form-control">
            <option value="0">Electricista</option>
            <option value="1">Albañil</option>
            <option value="2">Fontanero</option>
            <option value="3">Carpintero</option>
            <option value="4">Transportista</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>