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
                    <h3>Adicionar Produto</h3>
                </div>

                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Adicionar Produto</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                @if(session()->has('success_message'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{Session::get('success_message')}}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="card-body">
                <div class="row">
                <form wire:submit.prevent='submitProduct' class="form" action="{{route('product.store')}}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="basicInput">Nome do Produto</label>
                            <input type="text" class="form-control @error('product_name') form-control is-invalid @enderror" id="basicInput"
                                   placeholder="Nome do Produto" wire:model='product_name' name='product_name'>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        @error('product_name')
                                        <p class="text-gray-600 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reference">Referência</label>
                            <input type="text" class="form-control @error('reference') form-control is-invalid @enderror" id="reference"
                                   placeholder="Referência" wire:model='reference'>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        @error('reference')
                                        <p class="text-gray-600 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="barCode">Código de Barras</label>
                            <input type="text" class="form-control @error('barCode') form-control is-invalid @enderror" id="barCode"
                                   placeholder="Código de Barras" wire:model='barCode'>
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                @error('barCode')
                                <p class="text-gray-600 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="qtd">Quantidade</label>
                            <input type="number" class="form-control @error('quantity') form-control is-invalid @enderror" id="qtd"
                                     min="1" value="1" wire:model='quantity'>
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                @error('quantity')
                                <p class="text-gray-600 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="qtd_alert">Quantidade de Alerta</label>
                            <input type="number" class="form-control @error('alertQuantity') form-control is-invalid @enderror" id="qtd_alert"
                                   min="1" wire:model='alertQuantity'>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    @error('alertQuantity')
                                    <p class="text-gray-600 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" id="description"
                                      rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image">Imagem</label>
                            <input class="form-control" type="file" id="image">
                        </div>
                    </div>
                </div>



            </div>
        </div>


        <div class="card">
            <div class="card-header">
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                            <fieldset class="form-group">
                                <label for="category">Categoria</label>
                                <select class="form-select" id="basicSelect">
                                    <option>IT</option>
                                    <option>Blade Runner</option>
                                    <option>Thor Ragnarok</option>
                                </select>
                            </fieldset>

                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="brand">Marca</label>
                            <select class="form-select" id="basicSelect">
                                <option>IT</option>
                                <option>Blade Runner</option>
                                <option>Thor Ragnarok</option>
                            </select>
                        </fieldset>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="category">Tipo</label>
                            <select class="form-select" id="basicSelect">
                                <option>IT</option>
                                <option>Blade Runner</option>
                                <option>Thor Ragnarok</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="brand">Unidade</label>
                            <select class="form-select" id="basicSelect">
                                <option>IT</option>
                                <option>Blade Runner</option>
                                <option>Thor Ragnarok</option>
                            </select>
                        </fieldset>
                    </div>
                </div>
                <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-1 mb-1">
                        <span>Gravar</span>
                        <svg wire:loading class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Limpar</button>
                </div>
            </form>





            </div>
        </div>
    </section>
</div>
