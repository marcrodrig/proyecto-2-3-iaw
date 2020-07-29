import React, {Component} from 'react'
import Dashboard from '../views/user/Dashboard/Dashboard';
import LoginContainer from '../views/Login/LoginContainer';

class Home extends Component {

	constructor() {
		super();
		this.state = {
			isLoggedIn: false,
			user: {}
		}
	}

	// check if user is authenticated and storing authentication data as states if true
	componentWillMount() {
		let state = localStorage["appState"];
		if (state) {
			let appState = JSON.parse(state);
			this.setState({ isLoggedIn: appState.isLoggedIn, user: appState.user });
		}
	}

	render() {
		const isLoggedIn = this.state.isLoggedIn;
		return (
			<div>
				{isLoggedIn ? <Dashboard/> : <LoginContainer /> }
			</div>
		);
	}
}
  
export default Home