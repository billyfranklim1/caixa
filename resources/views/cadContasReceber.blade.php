<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <title>Caixa - Cadastro Fluxo</title>

</head>
<body>
    <div  id="ContasReceber" class="container" style="margin-top: 30px">
        <div class="card">
            <h5 class="card-header">Cadastro Contas a Receber <a href="/">Home</a> </h5>
            <div class="card-body">
                <fieldset align="center" class="form-group position-relative has-icon-left mb-1">
                    @if(session()->get('sucessocadReceber'))
                    <span   class="alert alert-success">
                        <strong>{{ session()->get('sucessocadReceber') }}</strong>
                    </span><br />
                    @endif

                    @if(session()->get('errorcadReceber'))
                    <span   class="alert alert-danger">
                        <strong>{{ session()->get('errorcadReceber') }}</strong>
                    </span><br />
                    @endif
				</fieldset>
                <br>
                <form method="post" action="/receber">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Cliente</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="cliente" placeholder="Cliente">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Produto/Serviço</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="descricao" placeholder="Descrição Produto/Serviço">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Valor</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                              </div>
                              <input type="text" class="form-control" name="valor" placeholder="Valor"  onKeyPress="return(moeda(this,'.',',',event))">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Vencimento</label>
                        <div class="col-sm-10">
                            <input type="date"  class="form-control" name="prazo" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Situação</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-model="situacao" name="situacao" id="opcao1" value="1">
                                <label class="form-check-label" for="opcao1">
                                    Pago
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-model="situacao" name="situacao" id="opcao2" value="0">
                                <label class="form-check-label" for="opcao2">
                                    Aberto
                                </label>
                            </div>
                        </div>

                    </div>

                    <div  v-if="situacao == 1" class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Data de Pagamento</label>
                        <div class="col-sm-10">
                            <input type="date"  class="form-control" name="data_pagamento">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </form>
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
            el: '#ContasReceber',
            data: {
                situacao:'0',
            },
            methods: {

            },
            filters : {
                formataData: function (value) {
                    if (value) {
                        return moment(String(value)).format('L');
                    }
                    return "";
                }
            },
            created : function() {
            }
        }
        )
        </script>
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
