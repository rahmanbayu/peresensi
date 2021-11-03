import React, {useEffect} from 'react';
import ReactDOM from 'react-dom';
import toast, { Toaster } from 'react-hot-toast';

// const notify = (message) => toast.success('Here is your toast.',{
//     position: 'top-right',
// });
const notify = (message, status) =>{
    if(status == 'failed'){
        toast.error(message, {
            position: 'top-right',
            style: {
                borderRadius: '10px',
                background: '#333',
                color: '#fff',
    },
        })
    }else if(status == 'success'){
        toast.success(message, {
            position: 'top-right',
            style: {
                borderRadius: '10px',
                background: '#333',
                color: '#fff',
    },
        })
    }else{
        toast(message, {
            position: 'top-right',
            style: {
                borderRadius: '10px',
                background: '#333',
                color: '#fff',
                },
        })
    }
}

function Toast(props) {
    let {message, status} = props;

    useEffect(()=>{
        notify(message, status);
    },[])

    return (
        <Toaster />
    );
}

export default Toast;

if (document.getElementById('toast')) {
    let item = document.getElementById('toast');
    ReactDOM.render(<Toast message={item.getAttribute('toast-message')} status={item.getAttribute('toast-status')} />, document.getElementById('toast'));
}
