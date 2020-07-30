import React from "react"
import '../../../public/css/cardCliente.css'
import ProgressBarTurno from "./ProgressBarTurno"

function Step2(props) {
	const {currentStep, clienteSeleccionado} = props
    if (currentStep !== 2) {
    	return null
    }
    return(
        <div>
			<ProgressBarTurno currentStep={currentStep}></ProgressBarTurno>
			<div className="row text-center no-gutters">
				<div className="col-lg-3"></div>
				<div className="col-lg-6 d-flex justify-content-center">
					<div className="card card-cliente">
						<div className="card-body">
							<img className="card-img-top img-circle rounded-circle" src={clienteSeleccionado.foto} alt="Foto cliente"/>
							<h5 className="card-title text-center w-100 text-dark">{clienteSeleccionado.nombre} {clienteSeleccionado.apellido}</h5>
							<table className="table table-borderless w-50 m-auto">
								<tbody>
									<tr>
										<td className="text-right"><i className="fas fa-2x fa-id-card"></i></td>
										<td className="text-left">{clienteSeleccionado.DNI}</td>
									</tr>
									<tr>
										<td className="text-right"><i className="fas fa-2x fa-phone"></i></td>
										<td className="text-left">{clienteSeleccionado.telefono}</td>
									</tr>
								</tbody>
								</table>
						</div>
					</div>
				</div>
				<div className="col-lg-3"></div>
			</div>
        </div>
    )
}

export default Step2