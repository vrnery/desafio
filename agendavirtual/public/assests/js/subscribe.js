let btn_subscribe_newuser = document.querySelector('#btn_subscribe_newuser');

$(document).ready(function(){
    $(".close").click(function(){
      $("#myCloseAlert").alert("close");
    });
  });

// btn_subscribe_newuser.onclick = function(){
//     axios.get('/cadastro').then((response) => {
//         return response.data;
//     });
// }

// window.location.href = "/cadastro";
    // axios.post('/axios/newuser').then((response) => {
    // axios.get('/cadastro');
    //     console.log(response.data);
    // });
    // axios.get('/auth/login');