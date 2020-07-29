import React, {Component} from 'react';
import { Nav, Navbar } from 'react-bootstrap';
import { MDBDropdown, MDBDropdownToggle, MDBDropdownMenu, MDBDropdownItem } from 'mdbreact';
import LogoutButton from './Logout';

class Header extends Component {
  
	constructor(props) {
		super(props);
	}
	
	render() {
		const userHeader = {
			height: '175px',
    		padding: '10px',
    		textAlign: 'center',
		};
		const userHeaderImg = {
			zIndex: '5',
			height: '90px',
			width: '90px',
			border: '3px solid',
			borderColor: 'rgba(255,255,255,.2)'
		};
		return (
			<Navbar variant="light" className="main-header" expand="lg">
				<Nav className="navbar-white">
					<Nav.Item>
						<a className="nav-link" data-widget="pushmenu" href="#" data-enable-remember="true" data-no-transition-after-reload="false">
							<i className="fas fa-bars"></i>
							<span className="sr-only">Alternar barra de navegación</span>
						</a>
					</Nav.Item>
				</Nav>
				<Nav className="ml-auto ">
				{!this.props.logout &&
					<Nav.Item className="user-menu">
						<MDBDropdown>

							<MDBDropdownToggle nav caret>
							<img src={`data:image/png;base64, ${this.props.user.avatar}`} className="user-image img-circle elevation-2" alt="Marcelo Rodríguez" />
							<span className="d-none d-md-inline">
								{this.props.user.name}
							</span>
							</MDBDropdownToggle>
							<MDBDropdownMenu right className="p-0">
								<MDBDropdownItem header className="p-0">
									<li className="bg-info" style={userHeader}>
										<img src={`data:image/png;base64, ${this.props.user.avatar}`} className="img-circle elevation-2" style={userHeaderImg} alt="Marcelo Rodríguez" />
										<p className="mt-3 mb-0"> {this.props.user.username} </p>
										<p className="mb-0"> {this.props.user.email} </p>
									</li>
									<li>
										<LogoutButton onClick={this.props.handleLogoutClick} />
									</li>
								</MDBDropdownItem>
							</MDBDropdownMenu>
						</MDBDropdown>	
					</Nav.Item>
				}
				</Nav>
			</Navbar>
		);
	}
}

export default Header