import React, { Component } from 'react';

class ItemClienteTabla extends Component {
  
	constructor(props) {
		super(props);
	}

	getClienteByID(id) {
		let cliente = this.props.clientes.filter(function(item) {
			return item.id === id
		})[0];
		return cliente;
	}

	render() {
		let cliente = this.getClienteByID(this.props.id);
		return(
			<div>
				<ul className="list-inline">
					<li className="list-inline-item">
						<img alt="Avatar" className="table-avatar" src={cliente.foto}/>
					</li>
				</ul>
					{cliente.nombre} {cliente.apellido}
			</div>
		);
	}
}

export default ItemClienteTabla