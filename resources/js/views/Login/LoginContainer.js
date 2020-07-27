import React, {Component} from 'react';
import FlashMessage from 'react-flash-message';
import Error from '../../components/Error';
import 'bootstrap/dist/css/bootstrap.min.css';
import Button from 'react-bootstrap-button-loader';

class LoginContainer extends Component {

	constructor(props) {
		super(props);
		this.state = {
			isLoggedIn: false,
			formSubmitting: false,
			user: {
				email: '',
				password: '',
			},
			isChecked: false,
			error: '',
			errorValidacion: {
				email: '',
				password: '',
			},
		};
		this.handleSubmit = this.handleSubmit.bind(this);
		this.handleEmail = this.handleEmail.bind(this);
		this.handlePassword = this.handlePassword.bind(this);
	}

	componentWillMount() {
		let state = localStorage["appState"];
		if (state) {
			let appState = JSON.parse(state);
			this.setState({isLoggedIn: appState.isLoggedIn, user: appState});
		}
	}

	// VER
	componentDidMount() {
		const { prevLocation } = this.state.redirect.state || { prevLocation: { pathname: '/dashboard' } };
		if (prevLocation && this.state.isLoggedIn) {
			return this.props.history.push(prevLocation);
		}
	}

	/** CHEQUEAR **/
	handleSubmit(e) {
		e.preventDefault();
		/*axios.get('/oauth/personal-access-tokens')
		.then(response => {
			console.log('personal-access-tokens',response.data);
		});*/
		this.setState({formSubmitting: true});
		let userData = JSON.stringify(this.state.user);
		axios.post("/api/login", userData, {headers:{"Content-Type" : "application/json"}}).then(response => {
			console.log('1');
			console.log('response',response);
			return response;
		}).then(json => {
			console.log('json',json);
			if (json.data.status_code == 200) {
				console.log('2');
				let userData = {
					id: json.data.user.id,
					name: json.data.user.name,
					username: json.data.user.username,
					email: json.data.user.email,
					avatar: json.data.user.avatar,
					access_token: json.data.access_token,
				};
				let appState = {
					isLoggedIn: true,
					user: userData
				};
				localStorage["appState"] = JSON.stringify(appState);
				this.setState({
					isLoggedIn: appState.isLoggedIn,
					user: appState.user,
					error: '',
					errorValidacion: '',
				});
				location.reload()
			}
			else {
				if (json.data.status_code == 500) {
					console.log('3');
					this.setState({
						errorValidacion: '',
						error: json.data.message,
						formSubmitting: false
					});
					alert('Nuestro sistema falló registrando tu cuenta.');
				}
			}
		}).catch(error => {if (error.response.status = 422) {
			console.log('4');
			// Laravel utiliza el código 422 cuando hay errores en la validación de los datos 
			if (error.response.statusText == 'Unprocessable Entity') {
				console.log('4',error.response);
				// The request was made and the server responded with a status code that falls out of the range of 2xx
				let err = error.response.data;
				this.setState({
					errorValidacion: err.errors,
					formSubmitting: false
				})
			}
			else {
				console.log('ver error', error.response);
			}
		}
		}).finally(this.setState({error: '',}
		));
	}

	handleEmail(e) {
		let value = e.target.value;
		this.setState(prevState => ({
			user: {
				...prevState.user, email: value
			}
		}));
	}

	handlePassword(e) {
		let value = e.target.value;
		this.setState(prevState => ({
			user: {
				...prevState.user, password: value
			}
		}));
	}

	handleChecked() {
		this.setState({ isChecked: !this.state.isChecked });
	}

	handleClick() {
		//simulating an API
	/*	setTimeout(() => {
		  this.setState({sendState: 'finished'})
		}, 3000)*/
	  }

	render() {
		const { state = {} } = this.state.redirect;
		const { error } = state;
		const { isChecked } = this.state;
		return (
			<React.Fragment>
				<div className="login-page">
					<div className="login-box">
						<div className="login-logo">
							<a href="/">
								<img src="http://127.0.0.1:8000/images/mr-icon.png" height="50"/>
								<b>MR</b> Fútbol 5
							</a>
						</div>
						<div className="card card-outline card-primary">
							<div className="card-header ">
								<h3 className="card-title float-none text-center">
									Autenticarse para iniciar sesión                    </h3>
							</div>
							<div className="card-body login-card-body ">
								{this.state.isLoggedIn ? <FlashMessage duration={60000} persistOnHover={true}>
								<h5 className={"alert alert-success"}>Login exitoso, redirigiendo...</h5></FlashMessage> : ''}
								{error && !this.state.isLoggedIn ? <FlashMessage duration={100000} persistOnHover={true}>
								<h5 className={"alert alert-danger"}>Error: {error}</h5></FlashMessage> : ''}
								<form onSubmit={this.handleSubmit}>
									<div className="input-group mb-3">
										<input
											type="text"
											name="name"
											className= {(this.state.errorValidacion.email || this.state.error) ? 'form-control is-invalid' : 'form-control'}
											placeholder="Email"
											onChange={this.handleEmail}
											required
										/>
										<div className="input-group-append">
											<div className="input-group-text">
												<span className="fas fa-envelope"></span>
											</div>
										</div>
										{this.state.errorValidacion.email
										? <Error msg={this.state.errorValidacion.email[0]}/>
										: ''}
										{this.state.error
										? <Error msg={this.state.error}/>
										: ''}
									</div>
									<div className="input-group mb-3">
										<input type="password"
											name="password"
											className={this.state.errorValidacion.password ? 'form-control is-invalid' : 'form-control'}
											placeholder="Contraseña"
											onChange={this.handlePassword}
											required
										/>
										<div className="input-group-append">
											<div className="input-group-text">
												<span className="fas fa-lock"></span>
											</div>
										</div>
										{this.state.errorValidacion.password
										? <Error msg={this.state.errorValidacion.password}/>
										: ''}
									</div>
									<div className="row">
										<div className="col-5">
											<div className="icheck-primary">
												<input type="checkbox" id="remember" onChange={() => this.handleChecked()} checked={isChecked} />
												<label onClick={() => this.handleChecked()} id="remember-label"> Recordarme</label>
											</div>
										</div>
										<div className="col-7">
										<Button type="submit" className="btn btn-primary btn-flat btn-block" loading={this.state.formSubmitting} style={{textTransform : 'none', fontWeight: '700'}}>
											{this.state.formSubmitting ? 'Ingresando': 'Acceder'}
										</Button>
											{/*<button type="submit" className="btn btn-primary btn-flat btn-block">
											<span className="fas fa-sign-in-alt"></span> Acceder</button>*/}
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</React.Fragment>
		)
	}
}

export default LoginContainer