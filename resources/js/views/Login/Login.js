import React, {Component} from 'react';
import LoginContainer from './LoginContainer';

class Login extends Component {

	constructor(props) {
		super(props);
	}

	render() {
		return (
			<div className="content">
				<LoginContainer />
			</div>
		);
	} 
}

export default Login