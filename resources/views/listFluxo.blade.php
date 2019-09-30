<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">


    <title>Caixa - Cadastro Fluxo</title>

    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->

    <!-- Styles -->
    <!-- <style>
    html, body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    height: 100vh;
    margin: 0;
}

.full-height {
height: 100vh;
}

.flex-center {
align-items: center;
display: flex;
justify-content: center;
}

.position-ref {
position: relative;
}

.top-right {
position: absolute;
right: 10px;
top: 18px;
}

.content {
text-align: center;
}

.title {
font-size: 84px;
}

.links > a {
color: #636b6f;
padding: 0 25px;
font-size: 13px;
font-weight: 600;
letter-spacing: .1rem;
text-decoration: none;
text-transform: uppercase;
}

.m-b-md {
margin-bottom: 30px;
}
</style> -->
</head>
<body>
    <div id="ContasPagar" class="container" style="margin-top: 30px">
        <div class="card">
            <h5 class="card-header">Fluxo Caixa  <a href="/">Home</a></h5>
            <div class="card-body">
                <fieldset align="center" class="form-group position-relative has-icon-left mb-1">
                    @if(session()->get('sucessocontaspagar'))
                    <span   class="alert alert-success">
                        <strong>{{ session()->get('sucessocontaspagar') }}</strong>
                    </span><br />
                    @endif

                    @if(session()->get('errorcontaspagar'))
                    <span   class="alert alert-danger">
                        <strong>{{ session()->get('errorcontaspagar') }}</strong>
                    </span><br />
                    @endif
				</fieldset>
                <br>
                <div class="">
                    <div >
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>Tipo</th>
                                    <th>Data</th>
                                    <th>Opções</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr  v-for="(i,index) in lista">
                                    <td>@{{index+1}}</td>
                                    <td>@{{i.descricao}}</td>
                                    <td>R$ @{{i.valor}}</td>
                                    <td v-if="i.tipo == 0">Saida</td>
                                    <td v-if="i.tipo == 1">Entrada</td>
                                    <td>@{{i.registro}}</td>
                                    <td><a href="#">Editar</a></td>
                                    <td><a href="#">Da Baixa</a></td>

                                </tr>
                            </tbody>
                        </table>
    <!-- @{{lista}} -->
                    </div>
<!-- @{{lista}} -->
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<!-- perguntas:<=json_encode($perguntas) ?> -->
<!-- csrf-token -->

<script type="text/javascript">
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf-token').getAttribute('content');
var app = new Vue({
    el: '#ContasPagar',
    data: {
        lista:<?=json_encode($lista) ?>
    },
    methods: {
        salvarPontos : function (){
            // url = this.urlBase+"/salvarPontos";
            // this.$http.post(url, {pontos: this.score, aproveitamento:this.pct})
            // .then( response => {
            //     this.response = response.body;
            // }).catch((err)=>{
            //     this.response = err;
            // })
        }
    },
    created : function() {
    }
}
)
</script>
</body>



<script language="javascript">
function moeda(a, e, r, t) {
    let n = ""
      , h = j = 0
      , u = tamanho2 = 0
      , l = ajd2 = ""
      , o = window.Event ? t.which : t.keyCode;
    if (13 == o || 8 == o)
        return !0;
    if (n = String.fromCharCode(o),
    -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.length,
    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
    for (l = ""; h < u; h++)
        -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n,
    0 == (u = l.length) && (a.value = ""),
    1 == u && (a.value = "0" + r + "0" + l),
    2 == u && (a.value = "0" + r + l),
    u > 2) {
        for (ajd2 = "",
        j = 0,
        h = u - 3; h >= 0; h--)
            3 == j && (ajd2 += e,
            j = 0),
            ajd2 += l.charAt(h),
            j++;
        for (a.value = "",
        tamanho2 = ajd2.length,
        h = tamanho2 - 1; h >= 0; h--)
            a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
    }
    return !1
}
 </script>
</html>
