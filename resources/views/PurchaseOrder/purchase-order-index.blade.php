@extends('base')
@section('content')
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card col-md-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Listado Orden de Compra</label>
                        </div>
                        <div class="col-md-6">
                            <button  class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#addClientModal">Crear</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row mt-4 col-md-10 me-4">
        @component('Components.table')
            @slot('thead')
                <tr>
                    <th>Codigo</th>
                    <th>Cliente</th>
                    <th>Fecha Compra</th>
                    <th>Fecha de envio</th>
                    <th>Acciones</th>
                </tr>
            @endslot
            @slot('tbody')
                <tr>
                    <td>0101</td>
                    <td>0101</td>
                    <td>0101</td>
                    <td>0101</td>
                    <td>0101</td>
                </tr>
            @endslot
        @endcomponent
    </div>

    @component('Components.modal')
        @slot('modalTitle') Agregar Orden de Compra @endslot
        @slot('idModal') addClientModal @endslot
        @slot('idModal') addClientModal @endslot
        @slot('route'){{route('purchase-orders.assign-client')}}@endslot

       @slot('content')
           <div class="row">
               <div class="col-md-12">
                   <label> Selecciona un Cliente</label>
                   <select class="form-select" name="client_id" id="client_id">
                    @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->name.' '.$client->last_name}}</option>
                    @endforeach
                   </select>
               </div>
           </div>
       @endslot
    @endcomponent

@endsection
