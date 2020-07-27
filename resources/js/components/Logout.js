import React from 'react';

function LogoutButton(props) {
	return (
		<button onClick={props.onClick} className="btn btn-default btn-flat float-right btn-block">
			<i className="fa fa-fw fa-power-off"></i>
			Salir
		</button>
	);
}

  export default LogoutButton;