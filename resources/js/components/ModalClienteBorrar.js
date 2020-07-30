import React, { Component } from 'react';
import { Modal } from 'react-bootstrap';
import Button from 'react-bootstrap-button-loader';

class ModalClienteBorrar extends Component {

    constructor(props) {
        super(props);
        this.state = {eliminando: false,}
        this.handleClickBorrar = this.handleClickBorrar.bind(this);
    }

    handleClickBorrar() {
        this.setState({eliminando : true});
        let cliente = this.props.cliente;
		console.log('Llamada a API, eliminar cliente. Usuario autenticado: ', this.props.user.name);
		let config = {
			method: 'DELETE',
			url: `/api/clientes/${cliente.id}`,
			data: cliente,
			headers: {
				'Accept' : 'application/json',
				'Authorization': `Bearer ${this.props.user.access_token}` 
			}
		};
		axios(config)
		.then(res => {
			this.props.eliminarCliente(cliente)
			this.props.hideModal();
			this.setState({eliminando : false});
		})
		.catch(error => {
                this.props.hideModal();
                this.setState({eliminando : false});
				alert('Ocurrió un error inesperado eliminando el cliente');
				//console.log('Error eliminar cliente', error.response);
		});
    }

    render() {
        return(
            <Modal show={this.props.show} onHide={this.props.hideModal} centered>
				<Modal.Header className="px-4" closeButton><h5>Eliminar cliente</h5></Modal.Header>
				<Modal.Body>					
					<h1>¿Estás seguro?</h1>
					<p>¿Querés borrar el cliente: {this.props.cliente.nombre} {this.props.cliente.apellido}?</p>
				</Modal.Body>
				<Modal.Footer>
					<Button type="submit" variant="primary" loading={this.state.eliminando} style={{textTransform : 'none', fontWeight: '700'}} onClick={this.handleClickBorrar}>
						{this.state.eliminando ? 'Eliminando...': 'Eliminar'}
					</Button>
				</Modal.Footer>
			</Modal>
		);
    }
}

export default ModalClienteBorrar