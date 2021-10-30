@extends('layout')

@section('conteudo')
    <form method="POST" action="autentica">
        @csrf
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Email</label>
                    <input type="email" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Digite seu email" name="email"/>
                </div>
                <div class="form-outline mb-3">
                    <label class="form-label" for="form3Example4">Password</label>
                    <input type="password" id="form3Example4" class="form-control form-control-lg"
                    placeholder="Digite a senha" name="password" />
                </div>
                <button class='btn btn-primary'>Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </form>
@endsection