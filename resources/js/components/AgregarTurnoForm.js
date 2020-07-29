import React, { Component } from "react";
import Modal from 'react-bootstrap/Modal';
import Form from 'react-bootstrap/Form';
import NextButton from "./NextButton";
import Step1 from "./Step1";
import Step2 from "./Step2";
import Step3 from "./Step3";

class AgregarTurnoForm extends Component {
    constructor(props) {
		super(props)
		// Set the initial input values
		this.state = {
			currentStep: 1, // Default is Step 1
			clienteSeleccionado: '',
			turno: {}
		}

      // Bind new functions for next and previous
		this._next = this._next.bind(this)
        this._prev = this._prev.bind(this)

        this.handleSeleccionCliente = this.handleSeleccionCliente.bind(this);
    }

    handleSeleccionCliente(event) {
		let idSeleccionado = event.target.value;
		let cliente = this.getClienteByID(idSeleccionado);
		this.setState({clienteSeleccionado: cliente});
      	this.props.handleSeleccionCliente(idSeleccionado);
	}
	
	getClienteByID(id) {
		let cliente = this.props.clientes.filter(function(item) {
			return item.id == id
		})[0];
		return cliente;
	}

    // Test current step with ternary
	// _next and _previous functions will be called on button click
	_next() {
		let currentStep = this.state.currentStep
		// If the current step is 1 or 2, then add one on "next" button click
		currentStep = currentStep >= 2? 3: currentStep + 1
		this.setState({currentStep: currentStep})
	}
    
	_prev() {
		let currentStep = this.state.currentStep
		// If the current step is 2 or 3, then subtract one on "previous" button click
		currentStep = currentStep <= 1? 1: currentStep - 1
		this.setState({currentStep: currentStep})
	}

	get previousButton() {
		let currentStep = this.state.currentStep;
		// If the current step is not 1, then render the "previous" button
		if(currentStep !==1) {
			return (
				<button className="btn btn-secondary" 
					type="button" onClick={this._prev}>
					Atrás
				</button>
			)
		}
		// ...else return nothing
		return null;
	}
    
    render() {    
        return (
            <Form onSubmit={this.props.handleSubmit}>
	        	<Modal.Body className="mx-3">
					<Step1 
						currentStep={this.state.currentStep}
						clientes = {this.props.clientes}
						handleChange={this.handleSeleccionCliente}
						clienteSeleccionado = {this.state.clienteSeleccionado}
					/>
					<Step2
						currentStep={this.state.currentStep}
						clienteSeleccionado = {this.state.clienteSeleccionado}
					/>
					<Step3
						modo={this.props.modo}
						currentStep={this.state.currentStep}
						turno = {this.props.turno}
						handleChange = {this.props.handleInputChange}
						handleDia = {this.props.handleDia}
						erroresValidacion = {this.props.erroresValidacion}
					/>
            	</Modal.Body>
				<Modal.Footer className="d-flex justify-content-center mt-4">
					{this.previousButton}
					<NextButton onClick={this._next} currentStep={this.state.currentStep} seleccionado={this.state.clienteSeleccionado === ""} formSubmitting={this.props.formSubmitting}></NextButton>
				</Modal.Footer>
        	</Form>
        )
    }
}

export default AgregarTurnoForm