<div>
    <style>
        .header-button{
            padding-top: 10px;
            padding-bottom: 10px;
            margin: 10px;
            background-color: #fff;
            font-size: 11pt;
            color: #444;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col" style="margin-top: 15px; !important;">
                <a href="#" class="btn-lg header-button rounded">
                    <i class="fas fa-tachometer-alt px-2"></i>
                    Dashboard
                </a>
                <a href="#" class="btn-lg header-button rounded">
                    <i class="fas fa-user-circle px-2"></i>
                    Clientes
                </a>
                <a href="#" class="btn-lg header-button rounded">
                    <i class="fas fa-user px-2"></i>
                    xvideos.com
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6  bg-white flex-auto flex overflow-hidden" style="box-shadow: 0 0 3px 1px rgba(0,0,0,0.3);">

                <livewire:cart-product />
            </div>
            <div class="col-md-6  bg-white flex-auto flex overflow-hidden" style="box-shadow: 0 0 3px 1px rgba(0,0,0,0.3);">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-6">
                        <div class="form-group position-relative has-icon-right">
                            <input type="text" class="form-control" placeholder="Escanear código de barras" style="background: #f3f4f6; border: 1px solid #9ca3af; color: #111827; padding: .375rem .75rem; font-size: .813rem; line-height: 1.5; border-radius: .25rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; !important;">
                            <div class="form-control-icon">
                                <i class="fa fa-barcode" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group position-relative has-icon-right">
                            <input type="text" wire:model="search" placeholder="Pesquisar produto pelo código ou nome" class="form-control" style="background: #f3f4f6; border: 1px solid #9ca3af; color: #111827; padding: .375rem .75rem; font-size: .813rem; line-height: 1.5; border-radius: .25rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; !important;">
                            <div class="form-control-icon">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3">
                            <a href="#" wire:click.prevent="addToCart({{$product->id}})">
                                <div class="card card_product" style="box-shadow: 0 0 0.5em #ddd; border-radius: 10px;
                            width: 19%;
                            max-width: 19%;
                            height: 220px;
                            max-height: 225px;
                            min-width: 130px;
                            min-height: 220px;">
                                    <img class="card-img-top" src="{{asset($product->image)}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title" style="margin-top: -20px; font-size: 12pt;" >{{$product->name}}</h5>
                                        <p class="card-text" style="font-size: 10pt;">{{$product->bar_code}}
                                            <br>
                                            <span class="badge bg-success w-15 w-sm-100" style="margin-top: 10px;">
                                            {{number_format($product->price)}} kz
                                    </span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                        <div class="mb-8 text-center" style="margin-top: 10px;">
                            {{ $products->links() }}
                        </div>
            </div>
        </div>
    </div>
</div>
