import React, {Component} from 'react';
import Modal from 'react-bootstrap/Modal';
import AgregarTurnoForm from './AgregarTurnoForm';
import EditarTurnoForm from './EditarTurnoForm';

class ModalTurnoCrearEditar extends Component {
    
    constructor(props) {
        super(props);
        this.state = {
			formSubmitting : false,
			turno: {
				...props.turno
			},
			erroresValidacion: {}
		};
		this.handleSeleccionCliente = this.handleSeleccionCliente.bind(this);
		this.handleSubmitCrear = this.handleSubmitCrear.bind(this);
		this.handleSubmitEditar = this.handleSubmitEditar.bind(this);
		this.handleDia = this.handleDia.bind(this);
		this.handleInputChange = this.handleInputChange.bind(this);
		this.onHide = this.onHide.bind(this);
	}

	handleSeleccionCliente(id) {
		this.setState(prevState => ({
			turno: {
				...prevState.turno, idCliente: id
			}
		}))
	}
	
	static getDerivedStateFromProps(props, state) {
		// Para que cuando se muestra el modal al seleccionar un turno para editar
		// en el estado se vea reflejado ese turno seleccionado
		if (props.turno.id !== state.turno.id) {
			return {
				turno: props.turno
			};
		}
		return null;
	}
  
	handleDia(date) {		
		this.setState(prevState => ({
			turno: {
				...prevState.turno, dia: this.props.formatDate(date)
			}
		}))
	}

	handleInputChange(event) {
		const target = event.target;
		const value = target.value;
		const name = target.name;
        
        this.setState(prevState => ({
			turno: {
				...prevState.turno, [name]: value
			}
        }));
	}

	onHide() {
		this.props.onHide();
		this.setState({
			formSubmitting : false,
			turno: {
				dia: this.props.formatDate(new Date()),
				hora: '12:00:00',
				tipoTurno: 'femenino'
			},
			erroresValidacion: {}
		});
	}

	handleSubmitCrear(e) {
		e.preventDefault();
		this.setState({formSubmitting : true});
		console.log('Llamada a API, crear turno. Usuario autenticado: ', this.props.user.name);
		let config = {
			method: 'POST',
			url: '/api/turnos',
			data: this.state.turno,
			headers: {
				'Accept' : 'application/json',
				'Authorization': `Bearer ${this.props.user.access_token}` 
			}
		};
		axios(config)
		.then(res => {
			//console.log('turno',res.data.turno);
			this.props.agregarTurno(res.data.turno);
			this.setState({formSubmitting : false});
			this.props.onHide();
		})
		.catch(error => {
			if (error.response.status = 422) {
				if (error.response.statusText == 'Unprocessable Entity') {
				// Laravel utiliza el código 422 cuando hay errores en la validación de los datos 
				console.log('Error en validación de datos (CREAR TURNO)');
				console.log(error.response);
				let err = error.response.data;
				this.setState({
					erroresValidacion: err.errors,
					formSubmitting: false
				})
			}
				// else ver mismo dni por ejemplo
			}
			else {
				this.setState({formSubmitting: false});
				alert('Ocurrió un error inesperado al registrar el turno');
				//console.log('Error creación turno', error.response);
			}
		});
    }

    handleSubmitEditar(e) {
		e.preventDefault();
		this.setState({formSubmitting : true});
		console.log('Llamada a API, modificar turno. Usuario autenticado: ', this.props.user.name);
		let config = {
			method: 'PUT',
			url: `/api/turnos/${this.props.turno.id}`,
			data: this.state.turno,
			headers: {
				'Accept' : 'application/json',
				'Authorization': `Bearer ${this.props.user.access_token}` 
			}
		};
		axios(config)
		.then(res => {
			//console.log('turno',res.data.turno);
			this.props.modificarTurno(res.data.turno);
			this.setState({formSubmitting : false});
			this.props.onHide();
		})
		.catch(error => {
			if (error.response.status = 422) {
				if (error.response.statusText == 'Unprocessable Entity') {
				// Laravel utiliza el código 422 cuando hay errores en la validación de los datos 
				console.log('Error en validación de datos (EDITAR TURNO)');
				console.log(error.response);
				let err = error.response.data;
				this.setState({
					erroresValidacion: err.errors,
					formSubmitting: false
				})
			}
			}
			else {
				this.setState({formSubmitting: false});
				alert('Ocurrió un error inesperado modificando el turno');
				//console.log('Error editar turno', error.response);
			}
		});
	}

	getClienteByID(id) {
		let cliente = this.props.clientes.filter(function(item) {
			return item.id == id
		})[0];
		return cliente;
	}

	renderModalBodyFooterTurnoCrearEditar(modo) {	
		return(
			<div>
				
			</div>
		);
	}

    render() {
		const {modo} = this.props
		return (
			<Modal show={this.props.show} onHide={this.onHide} id="modal" size="lg" centered>  
				<Modal.Header className="px-4" closeButton>
					{modo == 'agregar' && <h5 className="modal-title">Agregar Turno</h5>}
					{modo == 'editar' && <h5 className="modal-title">Turno de {this.getClienteByID(this.props.turno.cliente_id).nombre}  {this.getClienteByID(this.props.turno.cliente_id).apellido}</h5>}
				</Modal.Header>
				{modo == 'agregar' && <AgregarTurnoForm modo={modo} turno={this.state.turno} clientes={this.props.clientes} formSubmitting={this.state.formSubmitting} handleSeleccionCliente={this.handleSeleccionCliente} handleDia={this.handleDia} handleInputChange={this.handleInputChange} handleSubmit={this.handleSubmitCrear} erroresValidacion={this.state.erroresValidacion}/>}
				{modo == 'editar' && <EditarTurnoForm modo={modo} turno={this.props.turno} formSubmitting={this.state.formSubmitting} handleDia={this.handleDia} handleInputChange={this.handleInputChange} handleSubmit={this.handleSubmitEditar} erroresValidacion={this.state.erroresValidacion}/>}
			</Modal>
		);
    }
}

export default ModalTurnoCrearEditar