import React from 'react';
import Button from 'react-bootstrap-button-loader';

function NextButton(props) {
	const {currentStep, onClick, seleccionado, formSubmitting} =  props;
	if (currentStep < 3){
		return (
			<button className="btn btn-primary float-right" 
			type="button" onClick={onClick} disabled={seleccionado}>
			Siguiente
			</button>
		);
	}
	if (currentStep == 3) {
		return (
			<Button type="submit" variant="primary" loading={formSubmitting} style={{textTransform : 'none', fontWeight: '700'}}>
				{formSubmitting ? 'Registrando...': 'Agregar'}
			</Button>
		)
	}
	return null;
}


export default NextButton