
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
                    <h2 class="text-center"><span class="font-weight-light">Dados clinícos</span> {{ $internacao[0]->nome_paciente }}</h2>
                    <form class="needs-validation novalidate" method="POST" action="{{ route('dados-clinicos.store')}}" novalidate>
                        <div class="card mt-3">
                            <x-alert />
                            <div class="card-body">
                                <h2 class="text-muted h5">Dados</h2>
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label >Plano terapêutico : </label>
                                        <input type="text" class="form-control" name="plano_terapeutico"  placeholder="Plano terapêutico" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="nome_paciente">Leucócitos* : </label>
                                        <input type="text" class="form-control mask-float"  name="leucocitos"  placeholder="Leucócitos" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>PCR* : </label>
                                        <input type="text" class="form-control mask-float"  name="pcr"  placeholder="PCR" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label >Temperatura* : </label>
                                        <input type="text" class="form-control mask-temp" name="temperatura"  placeholder="Temperatura" required>
                                    </div>
                                    <div class="form-group  col-2">
                                        <label >Balanço hidríco : </label>
                                        <input type="text" class="form-control mask-float" name="balanco_hidrico"  placeholder="Hidríco" required>
                                    </div>
                                    <div class="form-group  col-2">
                                        <label >Diurese : </label>
                                        <input type="text" class="form-control mask-float" name="diurese"  placeholder="Diurese" required>
                                    </div>
                                    <div class="form-group  col-2">
                                        <label >Dieta : </label>
                                        <input type="text" class="form-control" name="dieta"  placeholder="Dieta" required>
                                    </div>
                                    <div class="form-group  col">
                                        <label >Medicamentos em uso : </label>
                                        <input type="text" class="form-control" name="medicamentos_em_uso"  placeholder="Medicamento em uso" required>
                                    </div>
                                    <div class="form-group  col-12">
                                        <label >Observação: </label>
                                        <textarea rows="5" class="form-control" name="observacao"  placeholder="Observação do paciente"></textarea>
                                    </div>
                                    <input hidden name="id_internacao" value="{{ $internacao[0]->id_internacao }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-3">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


