import axios from 'axios';
import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import toast, { Toaster } from 'react-hot-toast';
import QrReader from 'react-qr-reader'


function QrReaderComponent({endpoint, getmahasiswa}) {
const [mahasiswas, setMahasiswas] = useState([]);
const [result, setResult] = useState('');
const [togle, setTogle] = useState(false);

const handleScan = async(data) => {
    if (data && data != result) {
        console.log([result, data]);
        setResult(data)
        try {
            let response = await axios.post(endpoint, {
                'nim': data
            });
            if(response.data.success){
                toast.success(response.data.success, {
                        position: 'top-right',
                        style: {
                            borderRadius: '10px',
                            background: '#333',
                            color: '#fff',
                    },
                });
                setTogle(prev => !prev);
            }
            if(response.data.failed){
                toast.error(response.data.failed, {
                    position: 'top-right',
                    style: {
                        borderRadius: '10px',
                        background: '#333',
                        color: '#fff',
                    },
                })
            }
            console.log(response);
        } catch (error) {
            console.log(error.message);
        }
    }
}
const handleError = err => {
    console.error(err)
}
useEffect(()=>{
    (async()=>{
        try {
            let response = await axios.get(getmahasiswa);
            setMahasiswas(response.data.data);
            console.log(response);
        } catch (error) {
            console.log(error.message);
        }
    })()
},[togle]);

return (
<>
    <Toaster/>
    <div className="grid grid-cols-2 gap-10">
        <QrReader
        delay={3000000}
        onError={handleError}
        onScan={handleScan}
        style={{ width: '80%' }}
        />
        <div>
            <table className="w-full table-auto">
                <thead>
                    <tr className="text-left px-2 text-sm">
                        <th>#</th>
                        <th>Name</th>
                        <th>NIM</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        mahasiswas.map((item, index) => {
                            return (
                                <tr key={index}>
                                    <td className="py-2 text-gray-700">{ index + 1 }</td>
                                    <td className="py-2 text-gray-700">{ item.name }</td>
                                    <td className="py-2 text-gray-700">{ item.nim }</td>
                                </tr>
                            )
                        })
                    }
                </tbody>
            </table>
        </div>
    </div>
</>
    );
}

export default QrReaderComponent;

if (document.getElementById('qr-reader')) {
    let el = document.getElementById('qr-reader');
    ReactDOM.render(<QrReaderComponent getmahasiswa={el.getAttribute('getmahasiswa')} endpoint={el.getAttribute('endpoint')} />, document.getElementById('qr-reader'));
}
