<div class="card card-cliente">
	<div class="card-body">
		<img class="card-img-top img-circle rounded-circle" src="{{ asset('storage/' . $cliente->foto) }}" alt="Foto cliente">
		<h5 class="card-title text-center w-100 text-dark">{{ $cliente->nombre }} {{ $cliente->apellido }}</h5>

		<table class="table table-borderless w-50 m-auto">
			<tbody>
				<tr>
					<td class="text-right"><i class="fas fa-2x fa-id-card"></i></td>
					<td class="text-left">{{ $cliente->DNI }}</td>
				</tr>
				<tr>
					<td class="text-right"><i class="fas fa-2x fa-phone"></i></td>
					<td class="text-left">{{ $cliente->telefono }}</td>
				</tr>
			</tbody>
		</table>
	</div>
  
	{{ $footer ?? '' }}
</div>