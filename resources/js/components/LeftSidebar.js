import React from 'react'

function LeftSidebar() {
	return (
		<aside className="main-sidebar sidebar-dark-primary elevation-4">
			<a href="/" className="brand-link">
				<img src="/images/mr-icon.png" alt="Logo" className="brand-image img-circle elevation-3" style={{opacity:'.8'}}/>
				<span className="brand-text font-weight-light">
					<b>MR</b> Fútbol 5
				</span>
			</a>
			<div className="sidebar">
				<nav className="mt-2">
					<ul className="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
						<li className="nav-header">Turnos</li>
						<li className="nav-item has-treeview menu-open">
							<a className="nav-link active" href="">
								<i className="fas fa-fw fa-edit "></i>
								<p>Administración<i className="fas fa-angle-left right"></i></p>
							</a>
							<ul className="nav nav-treeview">
								<li className="nav-item">
									<a className="nav-link active" href="/spa">
										<i className="fas fa-fw fa-calendar "></i>
										<p>Reservas</p>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</aside>
	);
}

export default LeftSidebar