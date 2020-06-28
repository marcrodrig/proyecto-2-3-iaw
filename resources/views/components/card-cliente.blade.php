<div class="card card-default mt-6 mx-auto" style="max-width: 18rem; max-height: 21rem;">
	<div class="card-body text-center p-4">

        <div class="mb-3 mt-n9">
            <img src="{{ asset('storage/' . $cliente->foto) }}" class="img-fluid rounded-circle" width="100" alt="Foto Cliente">
        </div>
        
        <h5 class="card-title text-dark">{{ $cliente->nombre }} {{ $cliente->apellido }}</h5>

        <table class="table table-borderless w-50 m-auto">
            <tbody>
                <tr>
					<td class="text-right"><i class="mdi mdi-account-card-details" aria-hidden="true"></i></td>
					<td class="text-left">{{ $cliente->DNI }}</td>
            	</tr>
            	<tr>
					<td class="text-right"><i class="mdi mdi-phone" aria-hidden="true"></i></td>
					<td class="text-left">{{ $cliente->telefono }}</td>
            	</tr>
            </tbody>
        </table>
       
	</div>
	
	{{ $footer ?? '' }}

</div>