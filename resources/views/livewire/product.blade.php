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
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Imagem</th>
                                    <th>Ref.</th>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th>Marca</th>
                                    <th>Categoria</th>
                                    <th>Quantidade</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>#</td>
                                            <td>*</td>
                                            <td>{{$product->reference}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->brand->name}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td></td>
                                        <tr>
                                    @endforeach
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </section>
    </div>
