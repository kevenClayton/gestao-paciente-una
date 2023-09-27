
@extends('master.master')
@push('scripts-top')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@push('scripts-bottom')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src = "https://npmcdn.com/flatpickr/dist/l10n/pt.js"> </script>
<script>
$('#date-choose').flatpickr({
    locale: "pt",
    dateFormat: "d-m-Y"
});
    $('#time-choose').flatpickr({
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true
});
</script>
@section('title', env('APP_NAME'))
@section('description', '')
<script src="/assets/cep/busca-cep.js"></script>
@endpush
@section('content')

<div class="container-fluid bg-overlay-content pb-4 mb-md-3" style="margin-top: -350px;">
    <div class="row">
        <!-- Sidebar-->
        @include('includes.sidebar')
        <!-- Content-->
        <div class="col-lg-9">
            <div class="card mt-3">
                <div class="card-body">
                    <h2 class="text-center">Cadastro de paciente</h2>
                    <form class="needs-validation novalidate" method="POST" action="{{ route('paciente.store')}}" novalidate>
                        <div class="card mt-3">
                            <div class="card-body">
                                <x-alert />
                                    <h2 class="text-muted h5">Dados cadastrais</h2>
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="nome_paciente">Nome Paciente* : </label>
                                            <input type="text" class="form-control"  name="nome_paciente"  placeholder="Digite o nome do paciente" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Naturalidade* : </label>
                                            <input type="text" class="form-control"  name="naturalidade_paciente"  placeholder="Digite a naturalidade do paciente" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Nacionalidade* : </label>
                                            <input type="text" class="form-control"  name="nacionalidade_paciente"  placeholder="Digite a nacionalidade do paciente" value="Brasileira" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label >Celular paciente* : </label>
                                            <input type="text" class="form-control mask-cell" name="celular_paciente"  placeholder="Digite o celular do paciente" required>
                                        </div>
                                        <div class="form-group  col-md-3">
                                            <label >Telefone paciente : </label>
                                            <input type="text" class="form-control mask-cell" name="telefone_paciente"  placeholder="Digite o telefone do paciente" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label >E-mail paciente : </label>
                                            <input type="email" class="form-control" name="email_paciente"  placeholder="Digite o celular do paciente" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label >CPF* : </label>
                                            <input type="text" class="form-control mask-doc" name="cpf_paciente"  placeholder="Digite o cpf do paciente" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="data_nascimento">Data Nascimento paciente* : </label>
                                            <input  id="date-choose" type="date" class="form-control date cs-date-picker"  name="data_nascimento"  placeholder="Digite a data de nascimento " data-datepicker-options='{"enableTime": false, "altInput": true, "locale": pt "altFormat": "d-m-Y H:i", "dateFormat": "Y-m-d H:i"}' required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="data_nascimento">Plano de saúde* : </label>
                                            <input  id="date-choose" type="text" class="form-control"  name="plano_saude"  placeholder="Plano de saúde "  required>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <h2 class="text-muted h5">Dados complementares</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label >Nome do pai do paciente : </label>
                                        <input type="text" class="form-control" name="nome_pai"  placeholder="Digite o nome do pai do paciente" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label >Nome da mãe do paciente : </label>
                                        <input type="text" class="form-control" name="nome_mae"  placeholder="Digite o nome da mãe do paciente" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-6">
                                        <label >Nome do contato do paciente* : </label>
                                        <input type="text" class="form-control" name="contato_paciente_nome"  placeholder="Digite o nome do contato do paciente" required>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label >Telefone do contato do paciente* : </label>
                                        <input type="text" class="form-control" name="contato_paciente_telefone"  placeholder="Digite o telefone do contato paciente" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <h2 class="text-muted h5">Endereço paciente</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label >Cep* : </label>
                                        <input type="text" class="form-control mask-zipcode zip_code_search" name="cep"  placeholder="Cep do paciente" required>
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label >Endereço* : </label>
                                        <input type="text" class="form-control street" name="endereco"  placeholder="Endereço paciente" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label >Número* : </label>
                                        <input type="text" class="form-control" name="numero"  placeholder="Número paciente" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Cidade* : </label>
                                        <input type="text" class="form-control city" name="cidade"  placeholder="Cidade paciente" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Bairro* : </label>
                                        <input type="text" class="form-control district" name="bairro"  placeholder="Bairro paciente" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label >Estado* : </label>
                                        <select class="form-control state" name="estado">
                                            <option value="">Selecione</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label >País* : </label>
                                        <input type="text" class="form-control pais" name="pais"  placeholder="País paciente" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label >Tipo de endereço : </label>
                                        <input type="text" class="form-control" name="tipo_endereco"  placeholder="Complemento paciente">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label >Complemento : </label>
                                        <input type="text" class="form-control" name="complemento"  placeholder="Complemento paciente">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success btn-block mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


