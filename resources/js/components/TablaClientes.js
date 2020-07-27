import React, { Component } from 'react';
import {MDBBtn, MDBIcon} from 'mdbreact';

class TablaClientes extends Component {
	
	constructor(props) {
		super(props)
	}

	render() {
		return(
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
						<th style={{width: '15%'}} className="text-center">
							DNI
						</th>
						<th style={{width: '15%'}} className="text-center">
							Teléfono
						</th>
						<th style={{width: '20%'}}></th>
					</tr>
				</thead>
				<tbody>
					{
						this.props.clientes.map((cliente) =>
							<tr key={cliente.id} className="h-100">
								<td style={{verticalAlign:'middle'}}>
									#
								</td>
								<td style={{verticalAlign:'middle'}}>
									<ul className="list-inline">
										<li className="list-inline-item">
											<img alt="Avatar" className="table-avatar" src={cliente.foto}/>
										</li>
									</ul>
									{cliente.nombre} {cliente.apellido}
								</td>
								<td style={{verticalAlign:'middle'}}>
									{cliente.DNI}
								</td>
								<td style={{verticalAlign:'middle'}}>
									{cliente.telefono}
								</td>
								<td className="project-actions text-right" style={{verticalAlign:'middle'}}>
									<MDBBtn size="sm" color="info" value={cliente.id} onClick={this.props.handleEditarCliente}>
										<MDBIcon icon="user-edit"></MDBIcon> Editar
									</MDBBtn>
									<MDBBtn size="sm" color="danger" value={cliente.id} onClick={this.props.handleBorrarCliente}>
										<MDBIcon icon="user-minus"></MDBIcon> Borrar
									</MDBBtn>
								</td>
							</tr>
						)
					}
				</tbody>
			</table>
		)
	}
}

export default TablaClientes