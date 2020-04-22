let btn_subscribe_newuser = document.querySelector('#btn_subscribe_newuser');
let btn_subscribe_cep = document.querySelector('#btn_subscribe_cep');

$(document).ready(function(){
  $(".close").click(function(){
    $("#myCloseAlert").alert("close");
  });
});

btn_subscribe_cep.onclick = function(){
  var getcep = document.getElementById('zipcode').value;
  getcep = getcep.replace(/\D/g, "");

  if (getcep != "") {
    var validacep = /^[0-9]{8}$/;
    if (validacep.test(getcep)) {
      //
      var viacep = document.createElement('script');
      viacep.src = 'https://viacep.com.br/ws/'+ getcep + '/json/?callback=preenche_form_user';
      document.body.appendChild(viacep);
    } else {
      // cep é invalido
      limpa_form_user();
      alert("Formato de CEP inválido.");
    }
  } else {
    // cep sem valor
    limpa_form_user();
  }
}

function preenche_form_user(conteudo) {
  if(!("erro" in conteudo)) {
    // Atualiza campos
    document.getElementById('street').value=(conteudo.logradouro);
    document.getElementById('neighborhood').value=(conteudo.bairro);
    document.getElementById('city').value=(conteudo.localidade);
    document.getElementById('abbreviation').value=(conteudo.uf);
  } else {
    // cep não encontrado
    limpa_form_user();
    alert("CEP não encontrado.");
  }
}

function limpa_form_user() {
  // Limpar campos
  document.getElementById('street').value="";
  document.getElementById('neighborhood').value="";
  document.getElementById('city').value="";
  document.getElementById('abbreviation').value="";
}

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