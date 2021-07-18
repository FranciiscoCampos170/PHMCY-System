<div>
    <div class="modal fade" id="listCategoryModal" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selecionar categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group">
                                {{--<li class="list-group-item">
                                    <input class="form-check-input me-1" type="radio" id="radio" value="0" aria-label="...">
                                    Todas as categorias
                                </li>--}}
                                @foreach($categories as $category)
                                    <li class="list-group-item">
                                        <input wire:model.defer="category" class="form-check-input me-1" type="checkbox" value="{{$category->id}}">
                                        {{$category->name}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="seachByCategory">
                        buscar
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
