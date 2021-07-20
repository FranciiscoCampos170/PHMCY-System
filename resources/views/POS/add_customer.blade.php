<!-- Modal -->
<div class="modal fade" id="add_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selecione o Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    <input type="search" class="list-group-item list-group-item-action" placeholder="NIF ou Nome do Cliente" wire:model.debounce.300ms="customerSearch">

                    @if(strlen($customerSearch) < 3)
                    @else
                        @forelse($searchResults as $result)
                            <a href="#" class="list-group-item list-group-item-action">
                                {{$result['name']}}
                            </a>
                        @empty
                            <li class="list-group-item">
                                Sem resultados para: "{{$customerSearch}}"
                            </li>
                        @endforelse
                    @endif
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
