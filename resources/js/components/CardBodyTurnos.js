import React, {Component} from 'react';
import { MDBContainer as Container, MDBBtn, MDBIcon } from 'mdbreact';
import TablaReservas from './TablaReservas';
import ModalTurnoCrearEditar from './ModalTurnoCrearEditar';
import ModalTurnoBorrar from './ModalTurnoBorrar'

class CardBodyTurnos extends Component {

	constructor(props) {
		super(props);
		this.state = {
			showModalCrearEditar : false,
			showModalBorrar: false,
			modoModal : null,
			turno: {
				dia: this.formatDate(new Date()),
				hora: '12:00:00',
				tipoTurno: 'femenino'
			},
		};
		this.handleAgregarTurno = this.handleAgregarTurno.bind(this);
		this.handleEditarTurno = this.handleEditarTurno.bind(this);
		this.handleBorrarTurno = this.handleBorrarTurno.bind(this);
		this.hideModalCrearEditar = this.hideModalCrearEditar.bind(this);
		this.hideModalBorrar = this.hideModalBorrar.bind(this);
		this.formatDate = this.formatDate.bind(this);
	}

	formatDate(date) {
		var d = new Date(date),
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(),
			year = d.getFullYear();
	
		if (month.length < 2) 
			month = '0' + month;
		if (day.length < 2) 
			day = '0' + day;
	
		return [year, month, day].join('-');
	}

	getClienteByID(id) {
		let cliente = this.props.clientes.filter(function(item) {
			return item.id == id
		})[0];
		return cliente;
	}

	getTurnoByID(id) {
		let turno = this.props.turnos.filter(function(item) {
			return item.id == id
		})[0];
		return turno;
	}

	handleAgregarTurno(e) {
		e.preventDefault();
		this.setState({showModalCrearEditar : true, modoModal:'agregar'});
	}

	handleEditarTurno(e) {
		e.preventDefault();
		let turn = this.getTurnoByID(e.currentTarget.value);
		this.setState({turno : turn, modoModal:'editar', showModalCrearEditar : true});
	}

	handleBorrarTurno(e) {
		e.preventDefault();
		let turno = this.getTurnoByID(e.currentTarget.value);
		this.setState({turno: turno, showModalBorrar: true});
	}

	hideModalCrearEditar() {
		this.setState({showModalCrearEditar : false, modoModal:null, turno: {}});
	}

	hideModalBorrar() {
		this.setState({showModalBorrar:false, turno: {}});
	}

	render() {
		return (
			<Container className="text-center">
				<MDBBtn size="md" color="primary" onClick={this.handleAgregarTurno}>
					<MDBIcon icon="user-plus"/> Agregar
				</MDBBtn>
				<TablaReservas clientes={this.props.clientes} turnos={this.props.turnos} handleEditarTurno={this.handleEditarTurno} handleBorrarTurno={this.handleBorrarTurno}/>
				<ModalTurnoCrearEditar user={this.props.user} turno={this.state.turno} clientes={this.props.clientes} show={this.state.showModalCrearEditar} onHide={this.hideModalCrearEditar} modo={this.state.modoModal} handleSeleccionCliente={this.handleSeleccionCliente} formatDate={this.formatDate} agregarTurno={this.props.agregarTurno} modificarTurno={this.props.modificarTurno} erroresValidacion = {this.state.erroresValidacion}/>
				<ModalTurnoBorrar user={this.props.user} turno={this.state.turno} cliente={this.state.showModalBorrar && this.getClienteByID(this.state.turno.cliente_id)} show={this.state.showModalBorrar} onHide={this.hideModalBorrar} eliminarTurno={this.props.eliminarTurno}/>
			</Container>
		);
	}
}

export default CardBodyTurnos