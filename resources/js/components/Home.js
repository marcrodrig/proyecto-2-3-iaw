import React, {Component} from 'react'
import Login from '../views/Login/Login';
import Dashboard from '../views/user/Dashboard/Dashboard';

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
				{isLoggedIn ? <Dashboard/> : <Login /> }
			</div>
		);
	}
}
  
export default Home