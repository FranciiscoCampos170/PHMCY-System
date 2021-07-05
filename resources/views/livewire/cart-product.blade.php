<div>
    <div style="background-color: white; padding: 15px; !important;">
        @if($countProducts > 0)
            <div class="alert alert-secondary">
                <span><b> {{$countProducts}} </b> Produto(s) adicionados </span>
            </div>
        @endif
    </div>
<div class="product" style="background-color: white; padding: 15px;">
    <div class="table-responsive" style="height: 40vh !important; max-height: 40vh !important;">
    <table class="table table-striped mb-0">
        <thead>
        <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th class="text-center">Subtotal</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @forelse($cartItems as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>
                    <div class="quantity">
                        <div role="group" class="input-group"><!---->
                            <div class="input-group-prepend">
                                <button class="btn btn-primary btn-sm" wire:click="decreaseQuantity({{$item->id}})">-</button>
                            </div>
                            <input class="form-control text-center" value="{{$item->qtd}}" style="width: 5px; !important;">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-sm" wire:click="increaseQuantity({{$item->id}})"> + </button>
                            </div><!----></div>
                    </div>
                </td>
                <td class="text-center">
                    {{ $item->total }}
                </td>
                <td>
                    {{-- <a href="#" class="btn btn-outline-danger rounded-pill btn-sm" wire:click.prevent="removeProduct({{$item->id}})">
                        <b>x</b>
                    </a>
                    --}}
                    <a href="#" class="text-sm" style="color:red; cursor: hand;" wire:click.prevent="removeProduct({{$item->id}})">
                        <i class="fa fa-trash text-xl"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Sem produto adicionado</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    </div>
    <div class="total" style="background-color: white; padding: 15px; !important; position: relative;">
        <div style="background-color: #F2F7FF; padding: 10px;!important;" class="text-center">
            <h6 style="font-size: 17pt;">
                <b>Total:</b> {{$total}} kz
            </h6>
        </div>
    </div>
    <div style="position:relative; !important;">
        <div class="controls text-center" style="background-color: white; padding: 15px; !important; bottom: 0">
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-success" style="width: 100%;">
                        <i class="fas fa-money-check-alt"></i>
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-info" style="width: 100%;">
                        <i class="fas fa-calculator"></i>
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-danger" style="width: 100%;">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            {{-- <button class="btn btn-danger">
                Cancelar
            </button>
            <button class="btn btn-success">
                Efetuar pagamento
            </button>
            --}}
        </div>
    </div>

</div>
</div>


