import React from "react"
import ProgressBarTurno from "./ProgressBarTurno"

function Step1(props) {
	const {currentStep, clientes, handleChange, clienteSeleccionado} = props
    if (currentStep !== 1) {
    	return null
    }
    return(
    	<div>
			<ProgressBarTurno currentStep={currentStep}></ProgressBarTurno>
			<div className="row">
				<div className="col-md-4"></div>
				<div className="col-md-4 text-center">
					<div className="form-group">
						<select name="id" value={clienteSeleccionado.id} className="custom-select" onChange={handleChange}>
							<option value="" >Seleccione el cliente...</option>
							{clientes.map((cliente) => 
								<option key={cliente.id} value={cliente.id}>{cliente.nombre} {cliente.apellido}</option>
							)}
						</select>
					</div>
        		</div>
        	</div>
		</div>
    )
}

export default Step1