let btn_subscribe = docu.querySelector('#btn_subscribe');

btn_subscribe.onClick = function(){
    axios.post('/auth/login', []).then((response) => {
        console.log(response.data);
    });
};