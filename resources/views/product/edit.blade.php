<div class="modal fade bd-example-modal-lg" id="exampleModal" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent='updateProduct'  class="form" action="{{route('product.update')}}" method="POST" type="multipart" enctype="multipart/form-data">
                @method('update')
                @csrf
                <div class="modal-body">
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
                <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" id="description"
                                      rows="3" wire:model="description"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{asset($image)}}" width="100" height="100" class="img-thumbnail img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="image">Imagem</label>
                                <input class="form-control" type="file" id="image" wire:model="image">
                            </div>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="category">Categoria</label>
                            <select class="form-select @error('category_id') form-control is-invalid @enderror" id="basicSelect" wire:model="category_id" name="category_id">
                                <option></option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                @error('category_id')
                                <p class="text-gray-600 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </fieldset>

                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="brand">Marca</label>
                            <select class="form-select @error('brand_id') form-control is-invalid @enderror" id="basicSelect" wire:model="brand_id" name="brand_id">
                                <option></option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">
                                        {{$brand->name}}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                @error('brand_id')
                                <p class="text-gray-600 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="category">Tipo</label>
                            <select class="form-select @error('type_id') form-control is-invalid @enderror" id="basicSelect" wire:model="type_id" name="type_id">
                                <option></option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">
                                        {{$type->name}}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                @error('type_id')
                                <p class="text-gray-600 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="brand">Unidade</label>
                            <select class="form-select" id="basicSelect" wire:model="unity" name="unity">
                                <option></option>
                                <option value="uni">Uni</option>
                                <option value="kg">Kg</option>
                            </select>
                        </fieldset>
                    </div>
                    </div>
            </div>
                <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-1 mb-1">
                        <span>Gravar alterações</span>
                        <svg wire:loading class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1" wire:click="closeEditProductModal">Cancelar</button>
                </div>
                <br>
            </div>
            <div class="modal-footer">

            </div>
                </form>
        </div>
    </div>
</div>
</div>
