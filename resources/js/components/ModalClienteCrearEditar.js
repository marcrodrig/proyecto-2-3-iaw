import React, {Component} from 'react';
import Modal from 'react-bootstrap/Modal';
import Button from 'react-bootstrap-button-loader';
import { MDBInput } from 'mdbreact';
import Error from './Error';
import { Form } from 'react-bootstrap';

class ModalClienteCrearEditar extends Component {
    
    constructor(props) {
        super(props);
        this.state = {
			formSubmitting : false,
			cliente: {},
			erroresValidacion: {},
			fotoSeleccionada: ''
		};
		this.fileInput = React.createRef();
		this.handleSubmitCrear = this.handleSubmitCrear.bind(this);
		this.handleSubmitEditar = this.handleSubmitEditar.bind(this);
		this.handleInputChange = this.handleInputChange.bind(this);
		this.handleFileChange = this.handleFileChange.bind(this);
		this.onHide = this.onHide.bind(this);
	}
	
	static getDerivedStateFromProps(props, state) {
		// Para que cuando se muestra el modal al seleccionar un cliente para editar
		// en el estado se vea reflejado ese cliente seleccionado
		if (props.cliente.id !== state.cliente.id) {
		  return {
			cliente: props.cliente
		  };
		}
		return null;
	  }

	handleInputChange(event) {
		const target = event.target;
		const value = target.value;
		const name = target.name;
        
        this.setState(prevState => ({
			cliente: {
				...prevState.cliente, [name]: value
			}
        }));
	}

	onHide() {
		this.setState({cliente: {}, erroresValidacion: {}, fotoSeleccionada: ''});
		this.props.onHide();
	}

	handleFileChange() {
		let file = this.fileInput.current.files[0];
		this.setState({fotoSeleccionada : file.name});
		this.createImage(file);
	}

	createImage(file) {
		let reader = new FileReader();
		reader.onload = (e) => {
			this.setState(prevState => ({
				cliente: {
					// base64
					...prevState.cliente, foto: e.target.result
				}
			}))
		};
		reader.readAsDataURL(file);
	  }

	handleSubmitCrear(e) {
		e.preventDefault();
		this.setState({formSubmitting : true});
		console.log('Llamada a API, crear cliente. Usuario autenticado: ', this.props.user.name);
		let config = {
			method: 'POST',
			url: '/api/clientes',
			data: this.state.cliente,
			headers: {
				'Accept' : 'application/json',
				'Authorization': `Bearer ${this.props.user.access_token}` 
			}
		};
		axios(config)
		.then(res => {
			//console.log('cliente',res.data.cliente);
			this.setState({
				formSubmitting : false,
				cliente: {},
				erroresValidacion: {},
				fotoSeleccionada: ''
			});
			this.props.agregarCliente(res.data.cliente);
			this.props.onHide();
		})
		.catch(error => {
			if (error.response.status = 422) 
				if (error.response.statusText == 'Unprocessable Entity') {
				// Laravel utiliza el código 422 cuando hay errores en la validación de los datos 
				console.log('Error en validación de datos (CREAR CLIENTE)');
				console.log(error.response);
				let err = error.response.data;
				this.setState({
					erroresValidacion: err.errors,
					formSubmitting: false
				})
				// else ver mismo dni por ejemplo
			}
			else {
				alert('Ocurrió un error inesperado al registrar el cliente');
				//console.log('Error creación cliente', error.response);
			}
		});
    }

    handleSubmitEditar(e) {
		e.preventDefault();
		this.setState({formSubmitting : true});
		console.log('Llamada a API, modificar cliente. Usuario autenticado: ', this.props.user.name);
		let config = {
			method: 'PUT',
			url: `/api/clientes/${this.props.cliente.id}`,
			data: this.state.cliente,
			headers: {
				'Accept' : 'application/json',
				'Authorization': `Bearer ${this.props.user.access_token}` 
			}
		};
		axios(config)
		.then(res => {
			this.props.modificarCliente(res.data.cliente);
			this.setState({formSubmitting : false});
			this.props.onHide();
		})
		.catch(error => {
			if (error.response.status = 422) 
				if (error.response.statusText == 'Unprocessable Entity') {
				// Laravel utiliza el código 422 cuando hay errores en la validación de los datos 
				console.log('Error en validación de datos (EDITAR CLIENTE)');
				console.log(error.response);
				let err = error.response.data;
				this.setState({
					erroresValidacion: err.errors,
					formSubmitting: false
				})
				// else ver mismo dni por ejemplo
			}
			else {
				alert('Ocurrió un error inesperado modificando el cliente');
				//console.log('Error edición cliente', error.response);
			}
		});
	}

	renderCardClienteCrearEditar() {
		return(
			<div className="card">
				<h5 className="card-header">Información de cliente</h5>
				<div className="card-body">
					<div className="row">
						<div className="col">
							<div className="md-form mt-1">
								<MDBInput className={this.state.erroresValidacion.nombre && 'is-invalid'} type="text" label="Nombre" name="nombre" id="nombre" icon="user" valueDefault={this.props.cliente.nombre} value={this.state.cliente.nombre} onChange={this.handleInputChange} required autoComplete="off">
									{this.state.erroresValidacion.nombre && <Error msg={this.state.erroresValidacion.nombre}/> }
								</MDBInput>
							</div>
						</div>
						<div className="col">
							<div className="md-form mt-1">
								<MDBInput className={this.state.erroresValidacion.apellido && 'is-invalid'} type="text" label="Apellido" name="apellido" id="apellido" icon="user" valueDefault={this.props.cliente.apellido} value={this.state.cliente.apellido} onChange={this.handleInputChange} autoComplete="off">
									{this.state.erroresValidacion.apellido && <Error msg={this.state.erroresValidacion.apellido}/> }
								</MDBInput>
							</div>
						</div>
					</div>
					<div className="row">
						<div className="col">
							<div className="md-form mt-1">
								<MDBInput className={this.state.erroresValidacion.DNI && 'is-invalid'} type="text" label="DNI" name="DNI" id="DNI" icon="address-card" valueDefault={this.props.cliente.DNI} value={this.state.cliente.DNI} onChange={this.handleInputChange} autoComplete="off">
									{this.state.erroresValidacion.DNI && <Error msg={this.state.erroresValidacion.DNI}/> }
								</MDBInput>
							</div>
						</div>
						<div className="col">
							<div className="md-form mt-1">
								<MDBInput className={this.state.erroresValidacion.telefono && 'is-invalid'} type="text" label="Teléfono" name="telefono" id="telefono" icon="phone" valueDefault={this.props.cliente.telefono} value={this.state.cliente.telefono} onChange={this.handleInputChange} autoComplete="off">
									{this.state.erroresValidacion.telefono && <Error msg={this.state.erroresValidacion.telefono}/> }
								</MDBInput>
							</div>
						</div>
					</div>
					<div className="row">
						<div className="col col-sm-2">
							<div className="input-group-prepend mt-0">
								<span><i className="fas fa-id-badge fa-2x ml-1 mr-2"></i> Foto </span>
							</div>
						</div>
						<div className="col col-sm-10">
							<div className="form-group row mt-0">
								<div className="col">
									<div className="custom-file mb-1">
										<input type="file" ref={this.fileInput} className={this.state.erroresValidacion.foto ? "custom-file-input is-invalid" : "custom-file-input"} name="foto" id="foto" lang="es" onChange={this.handleFileChange}/>
											<label className="custom-file-label" htmlFor="foto">{this.state.fotoSeleccionada ? this.state.fotoSeleccionada : 'Seleccionar un archivo...'}</label>
												{this.state.erroresValidacion.foto && <Error msg={this.state.erroresValidacion.foto}/> }
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		);
	}

    render() {
		return (
			<Modal show={this.props.show} onHide={this.onHide} id="modal" size="lg" centered>  
				<Modal.Header className="px-4" closeButton>
					{this.props.modo == 'editar' && <h5 className="modal-title">Cliente: {this.props.cliente.nombre}  {this.props.cliente.apellido}</h5>}
					{this.props.modo == 'agregar' && <h5 className="modal-title">Agregar Cliente</h5>}
				</Modal.Header>
				<Form encType="multipart/form-data" onSubmit={this.props.modo == 'editar' ? this.handleSubmitEditar : this.handleSubmitCrear}>
					<Modal.Body className="mx-3">
						{this.renderCardClienteCrearEditar()}
					</Modal.Body>
					<Modal.Footer className="d-flex justify-content-center mt-4">
						{this.props.modo == 'agregar' && <Button type="submit" variant="primary" loading={this.state.formSubmitting} style={{textTransform : 'none', fontWeight: '700'}}>
							{this.state.formSubmitting ? 'Registrando...': 'Agregar'}
						</Button>}
						{this.props.modo == 'editar' && <Button type="submit" variant="primary" loading={this.state.formSubmitting} style={{textTransform : 'none', fontWeight: '700'}}>
							{this.state.formSubmitting ? 'Modificando...': 'Editar'}
						</Button>}
					</Modal.Footer>
				</Form>
			</Modal>
		);
    }
}

export default ModalClienteCrearEditar