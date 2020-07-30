import React, {Component} from 'react';
import { MDBContainer as Container, MDBBtn, MDBIcon } from 'mdbreact';
import TablaClientes from './TablaClientes';
import ModalClienteCrearEditar from './ModalClienteCrearEditar';
import ModalClienteBorrar from './ModalClienteBorrar'

class CardBodyClientes extends Component {

	constructor(props) {
		super(props);
		this.state = {
			showModalCrearEditar : false,
			showModalBorrar: false,
			modoModal : null,
			cliente : {}
		};
		this.handleAgregarCliente = this.handleAgregarCliente.bind(this);
		this.handleEditarCliente = this.handleEditarCliente.bind(this);
		this.handleBorrarCliente = this.handleBorrarCliente.bind(this);
		this.hideModal = this.hideModal.bind(this);
		this.hideModalBorrar = this.hideModalBorrar.bind(this);
	}

	getClienteByID(id) {
		let cliente = this.props.clientes.filter(function(item) {
			return item.id == id
		})[0];
		return cliente;
	}

	handleAgregarCliente(e) {
		e.preventDefault();
		this.setState({showModalCrearEditar : true, modoModal:'agregar'});
	}

	handleEditarCliente(e) {
		e.preventDefault();
		let client = this.getClienteByID(e.currentTarget.value);
		this.setState({cliente : client, modoModal:'editar', showModalCrearEditar : true});
	}

	handleBorrarCliente(e) {
		e.preventDefault();
		let cliente = this.getClienteByID(e.currentTarget.value);
		this.setState({cliente: cliente, showModalBorrar: true});
	}

	hideModalBorrar() {
		this.setState({cliente: {}, showModalBorrar:false});
	}

	hideModal() {
		this.setState({showModalCrearEditar : false, modo:null, cliente: {}});
	}

	render() {
		return (
			<Container className="text-center">
				<MDBBtn size="md" color="primary" onClick={this.handleAgregarCliente}>
					<MDBIcon icon="user-plus"/> Agregar
				</MDBBtn>
				<TablaClientes clientes={this.props.clientes} handleEditarCliente={this.handleEditarCliente} handleBorrarCliente={this.handleBorrarCliente}/>
				<ModalClienteCrearEditar user={this.props.user} show={this.state.showModalCrearEditar} onHide={this.hideModal} cliente={this.state.cliente} modo={this.state.modoModal} agregarCliente={this.props.agregarCliente} modificarCliente={this.props.modificarCliente} clientes={this.props.clientes}/>
				<ModalClienteBorrar user={this.props.user} cliente={this.state.cliente} show={this.state.showModalBorrar} hideModal={this.hideModalBorrar} eliminarCliente={this.props.eliminarCliente}/>
			</Container>
		);
	}
}

export default CardBodyClientes