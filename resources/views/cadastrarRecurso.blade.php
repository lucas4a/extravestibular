@extends('layouts.app')
@section('titulo','Requerimento de Recurso')
@section('navbar')
    <!-- Home / Detalhes do edital / Requerimento de Recurso -->
    <li class="nav-item active">
      <a class="nav-link" style="color: black" href="{{ route('home') }}"
         onclick="event.preventDefault();
                       document.getElementById('VerEditais').submit();">
         {{ __('Home') }}
      </a>
      <form id="VerEditais" action="{{ route('home') }}" method="GET" style="display: none;">

      </form>
    </li>
    <li class="nav-item active">
      <a class="nav-link">/</a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="detalhes" style="color: black" onclick="event.preventDefault(); document.getElementById('detalhesEdital').submit();" >
        {{ __('Detalhes do Edital')}}
      </a>
      @if(Auth::check())
        <form id="detalhesEdital" action="{{route('detalhesEdital')}}" method="GET" style="display: none;">
      @else
        <form id="detalhesEdital" action="{{route('detalhesEditalServidor')}}" method="GET" style="display: none;">
      @endif
          <input type="hidden" name="editalId" value="{{$editalId}}">
          <input type="hidden" name="mytime" value="{{$mytime}}">

        </form>
    </li>
    <li class="nav-item active">
      <a class="nav-link">/</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link">Requerimento de Recurso</a>
    </li>
@endsection
@section('content')
<style media="screen">
  .textbox{
    margin-left: 10%;
    margin-right: 10%;
    margin-bottom: 20px;
  }
  #label{
    margin-left: 1.5%;
  }
  @media screen and (max-width: 576px){

    #margin{
      margin-bottom:20px;
    }
    .textbox{
      margin-left: 5%;
      margin-right: 5%;
      margin-bottom: 20px;
    }
    #label{
      margin-left: 5%;
    }

  }
</style>
<div class="container">
  <div class="row">
    <div class="card" style="width:100%; ">
      <div class="card-header">
        {{ __('Requerimento de Recurso') }}
      </div>

      <div class="card-body" >
        <form method="POST" action="{{ route('cadastroRecurso') }}" enctype="multipart/form-data" id="formRecurso">
          @csrf
          <div class="row">
            <input type="hidden" name="editalId" value="{{$editalId}}" />
            <input type="hidden" name="tipoRecurso" value="{{$tipoRecurso}}" />
          </div>

          <!-- row nome | cpf -->
          <div class="row justify-content-center">
            <!-- nome -->
            <div id="margin" class="col-sm-7">
              <label for="nome" class="field a-field a-field_a2 page__field" style="width:100%;">
                  <input id="nome" type="text" name="nome" autofocus class="field__input a-field__input" disabled value="{{$dados->nome}}" placeholder="Nome">
                  <span class="a-field__label-wrap">
                    <span class="a-field__label">Nome</span>
                  </span>
              </label>
            </div><!-- end nome -->

            <!-- cpf -->
            <div class="col-sm-3">
              <label for="cpf" class="field a-field a-field_a2 page__field" style="width:100%;">
                  <input id="cpf" type="text" name="cpf" autofocus class="field__input a-field__input" disabled value="{{$dados->cpf}}" placeholder="CPF" >
                  <span class="a-field__label-wrap">
                    <span class="a-field__label">CPF</span>
                  </span>
              </label>
            </div><!-- end cpf -->
          </div><!-- end row nome | cpf -->

          <!-- label | textarea -->
          <div class="textbox" style="">

            <div class="row">
              <label id="label" for="motivo" class=" col-form-label" >{{ __('Motivo:') }}</label>
            </div>

            <div class="row">
              <textarea form ="formRecurso" name="motivo" id="taid" cols="100" ></textarea>
            </div>
          </div><!-- end label | textarea -->

          <div class="row justify-content-center">
            <button type="submit" class="btn btn-primary btn-primary-lmts">
                {{ __('Finalizar') }}
            </button>
          </div>
        </form>

      </div><!-- end card-body -->

    </div><!-- end card -->
  </div><!-- end row-->
</div><!-- end container -->



<script type="text/javascript" >
function tipo(x) {
	if (x == "reintegracao") {
   document.getElementById("tipo").value = "reintegracao";
   document.getElementById("formulario").style.display = "";
   document.getElementById("historicoEscolar").style.display = "";
   document.getElementById("declaracaoDeVinculo").style.display = "none";
   document.getElementById("enem").style.display = "none";
   document.getElementById("curriculo").style.display = "none";
   document.getElementById("programaDasDisciplinas").style.display = "none";
	}
	if (x == "transferenciaInterna") {
    document.getElementById("tipo").value = "transferenciaInterna";
    document.getElementById("formulario").style.display = "";
    document.getElementById("historicoEscolar").style.display = "";
    document.getElementById("declaracaoDeVinculo").style.display = "";
    document.getElementById("enem").style.display = "none";
    document.getElementById("curriculo").style.display = "none";
    document.getElementById("programaDasDisciplinas").style.display = "none";
	}
	if (x == "transferenciaExterna") {
    document.getElementById("tipo").value = "transferenciaExterna";
    document.getElementById("formulario").style.display = "";
    document.getElementById("historicoEscolar").style.display = "";
    document.getElementById("declaracaoDeVinculo").style.display = "";
    document.getElementById("enem").style.display = "none";
    document.getElementById("curriculo").style.display = "";
    document.getElementById("programaDasDisciplinas").style.display = "";
	}
	if (x == "portadorDeDiploma") {
    document.getElementById("tipo").value = "portadorDeDiploma";
    document.getElementById("formulario").style.display = "";
    document.getElementById("historicoEscolar").style.display = "";
    document.getElementById("declaracaoDeVinculo").style.display = "";
    document.getElementById("enem").style.display = "";
    document.getElementById("curriculo").style.display = "none";
    document.getElementById("programaDasDisciplinas").style.display = "";
	}
}


</script>


    @endsection
