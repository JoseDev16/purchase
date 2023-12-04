@extends('base')
@section('content')
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card col-md-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <label>Orden de Compra Cliente:{{$client->name.'-'.$client->last_name}} </label>
                        </div>
                        <div class="col-md-4">
                            <form action="{{route('purchase-order.close')}}">
                                <input type="hidden"  name="purchase_order_id" value="{{$purchaseOrder->id}}">
                                <button type="submit" class="btn btn-danger">Cerrar Orden</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <form action="{{route('purchase-orders.add-product')}}" method="post">
        @csrf
        <div class="row mt-4">
            <div class="card col-md-11">
                <div class="card-header">
                    Seleccione los campos:
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="input-group">
                                <label for="qty">Cantidad</label>
                                <input class="form-control ms-4" name="qty" id="qty" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <label for="product_id">Producto</label>
                                <select class="form-control ms-4" name="product_id" id="product_id">
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->code.'-'.$product->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <label for="um_id">Unidad de Medida</label>
                                <select class="form-control ms-4" name="um_id" id="um_id">
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->code.'-'.$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <label for="price">Precio</label>
                                <input class="form-control ms-4" name="price" id="price" readonly>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="hidden" name="client_id" value="{{$client->id}}">
                            <input type="hidden"  name="purchase_order_id" value="{{$purchaseOrder->id}}">

                            <button class="btn btn-primary" >Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <div class="row mt-4">
        <div class="col-md-10">
            @component('Components.table')
                @slot('thead')
                <tr>
                    <th>Producto</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
                @endslot
                @slot('tbody')

                @endslot
            @endcomponent
        </div>
    </div>
@endsection
