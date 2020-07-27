import React from 'react';
import ItemClienteTabla from './ItemClienteTabla';

const TablaReservas = ({turnos, clientes}) => (
	// projects de adminlte
    <table className="table table-striped projects">
        <thead>
			<tr>
				<th style={{width: '1%'}}>
					#
				</th>
				<th style={{width: '20%'}}>
					Cliente
				</th>
				<th style={{width: '10%'}}>
					Día
				</th>
				<th style={{width: '10%'}}>
					Hora
				</th>
				<th style={{width: '10%'}} className="text-center">
					Tipo
				</th>
				<th style={{width: '20%'}}></th>
			</tr>
        </thead>
        <tbody>
			{
				turnos.map((turno) =>
					<tr key={turno.id}>
						<td style={{verticalAlign:'middle'}}>
							#
						</td>
						<td style={{verticalAlign:'middle'}}>
							<ItemClienteTabla clientes={clientes} id={turno.cliente_id} />
						</td>
						<td style={{verticalAlign:'middle'}}>
							{turno.dia}
						</td>
						<td style={{verticalAlign:'middle'}}>
							{turno.hora}
						</td>
						<td style={{verticalAlign:'middle'}}>
							<span className="badge badge-success">{turno.tipoTurno}</span>
						</td>
						<td className="project-actions text-right" style={{verticalAlign:'middle'}}>
							<a className="btn btn-info btn-sm mr-2" href="#">
								<i className="fas fa-pencil-alt"></i>
								Edit
							</a>
							<a className="btn btn-danger btn-sm" href="#">
								<i className="fas fa-trash"></i>
								Delete
							</a>
						</td>
					</tr>
				)
			}
        </tbody>
    </table>
)

export default TablaReservas