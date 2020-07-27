import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Home from './components/Home';
import 'mdbreact/dist/css/mdb.css';

class Index extends Component {
	render() {
		return (
			<Home/>
		);
	}
}

ReactDOM.render(<Index/>, document.getElementById('index'));