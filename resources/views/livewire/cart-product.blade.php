<div>
    <div style="background-color: white; padding: 15px; !important;">
        @if($countProducts > 0)
            <div class="alert alert-secondary">
                <span><b> {{$countProducts}} </b> Produto(s) adicionados </span>
            </div>
        @endif

        <div class="alert alert-danger alert-dismissible" role="alert" id="stockAlert" hidden>
             Produto com estoque baixo.
        </div>

    </div>
    <div class="product" style="background-color: white; padding: 15px;">
        <div class="table-responsive" style="height: 40vh !important; max-height: 40vh !important;">
            <table class="table mb-0 table-bordered">
                <thead style="background-color: rgba(243,244,246) !important;">
                <tr>
                    <th scope="col">Produto</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Quantidade</th>
                    <th class="text-center">Subtotal</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                @forelse($cartItems as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{number_format($item->price)}}</td>

                        <td>

                            {{--<div class="quantity text-center">
                                <div role="group" class="input-group"><!---->
                                      <div class="input-group-prepend">
                                        <button class="btn btn-primary btn-sm" wire:click="decreaseQuantity({{$item->id}})">-</button>
                                    </div>
                                    <input class="form-control text-center form-control-sm" value="{{$item->qtd}}" style="width: 5px; !important;">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-sm" wire:click="increaseQuantity({{$item->id}})"> + </button>
                                    </div><!----></div>
                            </div>--}}
                            <a href="#" wire:click.prevent="addQuantityModal({{$item->id}})">
                                <div style="height:100%;width:100%;" class="text-center">
                                    {{$item->qtd}}
                                </div>
                            </a>

                        </td>
                        <td class="text-center">
                            {{ number_format($item->total) }}
                        </td>
                        <td>
                            {{-- <a href="#" class="btn btn-outline-danger rounded-pill btn-sm" wire:click.prevent="removeProduct({{$item->id}})">
                                <b>x</b>
                            </a>
                            --}}
                            <a href="#" class="text-sm" style="color:red; cursor: hand;" wire:click.prevent="removeProduct({{$item->id}}, '{{$item->qtd}}')">
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
        <div class="customer-info" style="margin-top: 10px;">
            <table class="table table-bordered">
                <tr>
                    <td style="font-size: 13pt;">
                        <b>Total:</b>
                    </td>
                    <td style="font-size: 13pt;">
                        {{number_format($total)}} kz
                    </td>
                </tr>
            </table>
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
            </div>
        </div>

    </div>
@include('POS.add_quantity')
</div>
