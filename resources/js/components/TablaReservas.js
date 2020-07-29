import React from 'react';
import ItemClienteTabla from './ItemClienteTabla';
import {MDBBtn, MDBIcon} from 'mdbreact';

const TablaReservas = ({turnos, clientes, handleEditarTurno, handleBorrarTurno}) => (
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
							<MDBBtn size="sm" color="info" value={turno.id} onClick={handleEditarTurno}>
								<MDBIcon icon="pencil-alt"></MDBIcon> Editar
							</MDBBtn>
							<MDBBtn size="sm" color="danger" value={turno.id} onClick={handleBorrarTurno}>
								<MDBIcon icon="trash"></MDBIcon> Borrar
							</MDBBtn>
						</td>
					</tr>
				)
			}
        </tbody>
    </table>
)

export default TablaReservas