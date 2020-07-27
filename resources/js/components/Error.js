import React from 'react';

function Error(props) {
    return (
        <div className="invalid-feedback">
            <strong>{props.msg}</strong>
        </div>
    );
}

export default Error