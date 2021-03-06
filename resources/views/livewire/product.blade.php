<div>
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Todos os Produtos</h3>
                </div>

                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Todos os produtos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <input class="dataTable-input"
                                   placeholder="Pesquisar..."
                                   wire:model='search'
                                   id="search" type="search">
                        </div>
                        <div class="col-md-8">
                            {{-- <button class="btn btn-outline-danger m-1 btn-sm" type="button">
                                PDF
                            </button>
                            <button class="btn btn-outline-danger m-1 btn-sm" type="button">
                                EXCEL
                            </button>
                            --}}
                            <div class="float-end">
                            <button class="btn btn-primary m-1" type="button">
                                Importar produtos
                            </button>
                            <a  href="{{route('product.create')}}" class="btn btn-success m-1" type="button">
                                Adicionar
                            </a>
                            </div>
                        </div>

                        <div class="col-md-12 mt-5">
                            @if($deleteDisabled)
                                <div class="alert alert-warning pb-10">
                                    <b>({{count($selectedProducts)}}) Produtos selecionados</b>
                                    <button class="float-end btn btn-danger" wire:click="deleteSelected">
                                        Apagar
                                    </button>
                                </div>
                            @endif

                        </div>
                        <div class="table-responsive mb-2">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Imagem</th>
                                    <th>Ref.</th>
                                    <th>Nome</th>
                                    <th>Pre??o</th>
                                    <th>Marca</th>
                                    <th>Categoria</th>
                                    <th>Quantidade</th>
                                    <th>A????es</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="" value="{{$product->id}}" wire:model="selectedProducts">
                                            </td>
                                            <td><img src="{{asset($product->image)}}" width="70" height="70" class="img-thumbnail img-fluid"></td>
                                            <td>{{$product->reference}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->brand->name}}</td>
                                            <td>{{$product->category->name}}</td>
                                                @if($product->quantity === $product->alert_quantity || $product->quantity < $product->alert_quantity)
                                                    <td>
                                                        <span class="badge bg-danger">
                                                            {{ $product->quantity }}
                                                        </span>
                                                    </td>
                                                @else
                                                   <td>
                                                       <span class="badge bg-success">
                                                            {{ $product->quantity }}
                                                       </span>
                                                   </td>
                                                @endif
                                            <td>
                                                <button type="button" wire:click="edit({{$product->id}})" class="btn btn-warning btn-sm">
                                                    Editar
                                                </button>
                                            </td>
                                        <tr>
                                    @endforeach
                                </tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"> {{$products->links()}} </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
            </div>
        </section>
        @include('product.edit')
    </div>

