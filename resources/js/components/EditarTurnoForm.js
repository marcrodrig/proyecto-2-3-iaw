import React, { Component } from "react";
import Modal from 'react-bootstrap/Modal';
import Form from 'react-bootstrap/Form';
import Button from 'react-bootstrap-button-loader';
import Step3 from "./Step3";

class EditarTurnoForm extends Component {

    constructor(props) {
      super(props)
      this.state = {
		  currentStep: 3,
		turno: {}
      }
    }
    
    render() {
		const {formSubmitting} = this.props;
        return (
            <Form onSubmit={this.props.handleSubmit}>
          		<Modal.Body className="mx-3">
					<Step3
						currentStep={this.state.currentStep}
						turno = {this.props.turno}
						handleChange = {this.props.handleInputChange}
						dia = {this.state.dia}
						handleDia = {this.props.handleDia}
						erroresValidacion = {this.props.erroresValidacion}
					/>
            	</Modal.Body>
				<Modal.Footer className="d-flex justify-content-center mt-4">
					<Button type="submit" variant="primary" loading={formSubmitting} style={{textTransform : 'none', fontWeight: '700'}}>
						{formSubmitting ? 'Modificando...': 'Editar'}
					</Button>
				</Modal.Footer>
        	</Form>
        )
    }
}

export default EditarTurnoForm