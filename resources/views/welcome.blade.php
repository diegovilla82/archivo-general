@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
         <div class="col-12 col-sm-12 col-lg-12 py-3 mx-auto">
                <h1 class="display-4">Lista de Archivos</h1>
                  <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12 py-1 mx-auto">
                <div class="card shadow">
                    <div class="card-body">
                        <table class="table table-striped table-bordered" style="width:100%" id="archivos"></table>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
@section('javascripts')
<script>
    $(document).ready(function(){
        $('#archivos').DataTable({
             "responsive": true,
             "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
             },
            "order": [[ 0, "desc" ]],
            "serverSide" : true,
             "ajax": "{{ url('api/archivos') }}",
             "columns": [
                            {
                            data: 'id',
                            title: 'ID',
                            visible: false
                            },
                            {
                            data: 'nombre_apellido',
                            title: 'Nombre completo'
                            },
                            {
                            data: 'dni',
                            title: 'DNI'
                            },
                            {
                            data: 'exp',
                            title: 'exp',
                            visible: false
                            },
                            {
                                data: null,
                                title: 'Expediente',
                                searchable: false,
                                orderable: false,
                                "render": function ( data, type, full, meta ) {
                                var exp = '';
                                    if(data.tipo_doc == null & data.year_doc == null)
                                    {
                                        exp = data.exp
                                        return exp;
                                    }

                                    exp = data.tipo_doc +'-'+data.exp +'-'+data.year_doc;

                                return exp;
                                }
                            },
                            {
                                data: 'escriturado',
                                title: 'Escriturado',
                                searchable: false,
                                orderable: false,
                            },
                            {
                                data: 'archivado',
                                title: 'Archivado',
                                searchable: false,
                                orderable: false,
                            }
             ]
        });
    });
</script>
@endsection
