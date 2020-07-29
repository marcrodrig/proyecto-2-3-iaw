import React, { Component } from "react"
import DatePicker, {registerLocale, setDefaultLocale} from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";
import es from 'date-fns/locale/es';
import ProgressBarTurno from "./ProgressBarTurno";
registerLocale('es',es)
setDefaultLocale('es')

class Step3 extends Component {

	constructor(props) {
        super(props);
        this.state = {dia: null}
    }

    handleDia(date) {
        this.setState({dia: date});
        this.props.handleDia(date);
    }

    fecha(dia) {
        return new Date(dia.replace(/-/g, '\/'));
    }
    
    render() {
    	if (this.props.currentStep !== 3) {
        	return null
      	}
      	return(
        	<div>
            	{this.props.modo=='agregar' && <ProgressBarTurno currentStep={this.props.currentStep}/>}
    			<div className="row">
					<div className="col"></div>
					<div className="col-lg-8">
						<div className="card">
							<h5 className="card-header">Detalles de turno</h5>
							<div className="card-body">
								{this.props.erroresValidacion.hora && <h6 className="d-flex justify-content-center mb-3" style={{color: 'red'}}>{this.props.erroresValidacion.hora}</h6>}
            					<div className="row">
									<div className="col-2 ml-auto text-center">
										<div className="input-group-prepend mt-0">
											<span><i className="fas fa-calendar-alt ml-2 mr-2"></i> Día </span>
										</div>
									</div>
                    				<div className="col-7 mr-auto">
                    					<div className="md-form mt-0">
											<DatePicker
												name = 'dia'
												dateFormat="yyyy-MM-dd"
												selected = {this.state.dia ? this.state.dia : this.fecha(this.props.turno.dia)}
												onChange={date => this.handleDia(date)}
												locale='es'
											/>
										</div>
									</div>
                				</div>
								<div className="row">
									<div className="col-2 ml-auto text-center">
										<div className="input-group-prepend mt-0">
											<span><i className="fas fa-clock ml-2 mr-2"></i> Hora </span>
										</div>
									</div>
									<div className="col-7 mr-auto">
										<div className="form-group row mt-0">
											<div className="col">
												<div className="form-group">
													<select className={ this.props.erroresValidacion.hora ? 'custom-select is-invalid w-100 ml-0' : 'custom-select w-100 ml-0'} name="hora" id="hora" defaultValue={this.props.turno.hora} value={this.state.hora} onChange={this.props.handleChange}>
														<option value="12:00:00">12:00</option>
														<option value="13:00:00">13:00</option>
														<option value="14:00:00">14:00</option>
														<option value="15:00:00">15:00</option>
														<option value="16:00:00">16:00</option>
														<option value="17:00:00">17:00</option>
														<option value="18:00:00">18:00</option>
														<option value="19:00:00">19:00</option>
														<option value="20:00:00">20:00</option>
														<option value="21:00:00">21:00</option>
														<option value="22:00:00">22:00</option>
														<option value="23:00:00">23:00</option>
													</select>
												</div>
											</div>			
										</div>
									</div>
								</div>
								<div className="row">
									<div className="col-2 ml-auto text-center">
										<div className="input-group-prepend mt-0">
											<span><i className="fas fa-futbol ml-2 mr-2"></i> Tipo </span>
										</div>
									</div>
									<div className="col-7 mr-auto">
										<div className="form-group row mt-0">
											<div className="col">
												<div className="form-group">
													<select className="form-control" name="tipoTurno" id="tipoTurno" defaultValue={this.props.turno.tipoTurno} value={this.state.tipoTurno} required onChange={this.props.handleChange}>
														<option value="femenino">Femenino</option>
														<option value="masculino">Masculino</option>
														<option value="mixto">Mixto</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>							
    						</div>
						</div>
					</div>
					<div className="col-lg-2"></div>
				</div>
        	</div>
      	)
    }
}

export default Step3