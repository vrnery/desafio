let btn_subscribe = document.querySelector('#btn_subscribe');

btn_subscribe.onclick = function(){
    axios.post('/auth/login').then((response) => {
        console.log(response.data);
    });
    //axios.get('/auth/login');
};