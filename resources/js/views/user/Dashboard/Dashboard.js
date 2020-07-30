import React, {Component} from 'react'
import Header from '../../../components/Header';
import LeftSidebar from '../../../components/LeftSidebar';
import CardBodyClientes from '../../../components/CardBodyClientes';
import CardBodyTurnos from '../../../components/CardBodyTurnos';
import { Spinner } from 'react-bootstrap';
import { MDBCard as Card, MDBCardHeader as CardHeader, MDBCardTitle as CardTitle, MDBContainer as Container, MDBRow as Row, MDBCol as Col, MDBCardBody as CardBody, MDBBtn, MDBIcon} from 'mdbreact';

class Dashboard extends Component {

	constructor() {
		super();
		this.state = {
			isLoggedIn: false,
			cargandoClientes: true,
			cargandoTurnos: true,
			logout: false,
			user: {},
			clientes: [],
			turnos: {}
		}
		this.handleLogoutClick = this.handleLogoutClick.bind(this);
		this.agregarCliente = this.agregarCliente.bind(this);
		this.agregarTurno = this.agregarTurno.bind(this);
		this.modificarCliente = this.modificarCliente.bind(this);
		this.modificarTurno = this.modificarTurno.bind(this);
		this.eliminarCliente = this.eliminarCliente.bind(this);
		this.eliminarTurno = this.eliminarTurno.bind(this);
	  }

	componentDidMount() {
		axios.get('/api/clientes',
		{ headers: {
			'Accept' : 'application/json',
			'Authorization': `Bearer ${this.state.user.access_token}` 
		}})
		.then(res => {
			this.setState(prevState => ({
				cargandoClientes: !prevState.cargandoClientes,
				clientes: res.data
			}));
			axios.get('/api/turnos',
			{headers: {
				'Accept' : 'application/json',
				'Authorization': `Bearer ${this.state.user.access_token}` 
			}})
			.then(res => {
				this.setState(prevState => ({
					cargandoTurnos: !prevState.cargandoTurnos,
					turnos: res.data
				}));
			});
		});		
	}

	// check if user is authenticated and storing authentication data as states if true
	componentWillMount() {
		let state = localStorage["appState"];
		if (state) {
			let appState = JSON.parse(state);
			this.setState({ isLoggedIn: appState.isLoggedIn, user: appState.user });
		}
	}

	agregarCliente(cliente) {
		this.setState({
			clientes:
				// no recomendado el this.state acá  
				this.state.clientes.concat(cliente)
		})
	}

	agregarTurno(turno) {
		this.setState({
			turnos:
				// no recomendado el this.state acá  
				this.state.turnos.concat(turno)
		})
	}

	modificarCliente(cliente) {
		const index = this.state.clientes.findIndex(item => item.id === cliente.id);
		var clientesModificados = [...this.state.clientes]
		clientesModificados[index] = cliente;
		this.setState({clientes: clientesModificados})
	}

	modificarTurno(turno) {
		const index = this.state.turnos.findIndex(item => item.id === turno.id);
		var turnosModificados = [...this.state.turnos]
		turnosModificados[index] = turno;
		this.setState({turnos: turnosModificados})
	}

	eliminarCliente(cliente) {
		let clientesBorrado = this.state.clientes.filter(item => item.id !== cliente.id);
		let turnosBorrado = this.state.turnos.filter(item => item.cliente_id !== cliente.id);
		this.setState({clientes: clientesBorrado, turnos: turnosBorrado});
	}

	eliminarTurno(turno) {
		let turnosBorrado = this.state.turnos.filter(item => item.id !== turno.id);
		this.setState({turnos: turnosBorrado});
	}

	handleLogoutClick() {
		this.setState({logout : true});
		axios.get('/api/logoutAPI',
		{headers: {
			'Content-Type' : 'application/json',
			'Accept' : 'application/json',
			'Authorization': `Bearer ${this.state.user.access_token}` 
		}})
		.then(res => {
			let appState = {
				isLoggedIn: false,
				user: {}
			};
			localStorage["appState"] = JSON.stringify(appState);
			location.reload();
			this.setState(appState);
		});
	}

	render() {
		return (
			<div className="wrapper">
				<Header user={this.state.user} logout={this.state.logout} handleLogoutClick={this.handleLogoutClick} />
				<LeftSidebar />
				<div className="content-wrapper">
					<div className="content text-center">
						<section className="content-header">
							<Container fluid>
								<Row className="mb-3">
									<Col>
										<ol className="breadcrumb float-sm-left">
											<li className="breadcrumb-item"><a href="/"><span><i className="fas fa-home mr-1"></i></span>Inicio</a></li>
											<li className="breadcrumb-item">Administración</li>
											<li className="breadcrumb-item active">Reservas</li>
										</ol>
									</Col>
								</Row>
							</Container>
						</section>
						{this.state.logout
						? <><Spinner animation="border" className="my-auto"/>
						<br/>Saliendo del sistema...
						</>
						:
						<div>
							<Card className='mb-2 p-0' style={{minHeight: '25vw'}}>
								<CardHeader>
									<CardTitle>Clientes</CardTitle>
									<div className="card-tools">
										<MDBBtn size="sm" color="elegant" className="btn-tool m-0" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
											<MDBIcon icon="minus"/>
										</MDBBtn>
									</div>
								</CardHeader>
								<CardBody className="text-center">
									{this.state.cargandoClientes ? <Spinner animation="border"/> : <CardBodyClientes user={this.state.user} clientes={this.state.clientes} agregarCliente={this.agregarCliente} modificarCliente={this.modificarCliente} eliminarCliente={this.eliminarCliente}/>}
								</CardBody>
							</Card>
							<Card className="p-0" style={{minHeight: '25vw'}}>
								<CardHeader>
									<CardTitle>Reservas</CardTitle>
									<div className="card-tools">
										<MDBBtn size="sm" color="elegant" className="btn-tool m-0" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
											<MDBIcon icon="minus"/>
										</MDBBtn>
									</div>
								</CardHeader>
								<CardBody className="text-center">
									{this.state.cargandoTurnos
										? <Spinner animation="border" />
										: <CardBodyTurnos user={this.state.user} turnos={this.state.turnos} clientes={this.state.clientes} agregarTurno={this.agregarTurno} modificarTurno={this.modificarTurno} eliminarTurno={this.eliminarTurno}/>
									}
								</CardBody>
							</Card>
						</div>}
					</div>
				</div>
			</div>
		);
	}
}

export default Dashboard