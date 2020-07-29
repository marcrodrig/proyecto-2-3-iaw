import React from 'react'
import '../../../public/css/progressBar.css'

const ProgressBarTurno = ({currentStep}) => (
    <ul id="progressbar">
		<li className={currentStep>=1 ? 'active' : ''}>Seleccionar cliente</li>  
		<li className={currentStep>=2 ? 'active' : ''}>Verificar cliente</li> 
		<li className={currentStep==3 ? 'active' : ''}>Detalles turno</li>
	</ul>
)

export default ProgressBarTurno