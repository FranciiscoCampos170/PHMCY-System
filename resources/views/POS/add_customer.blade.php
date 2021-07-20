<!-- Modal -->
<div class="modal fade" id="add_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 form-group">
                    <input type="search" id="first-name" class="form-control form-control-lg" name="fname" placeholder="NIF ou Nome do Cliente" wire:model.debounce.300ms="customerSearch">
                    <ul class="list-group">
                        @if(strlen($customerSearch) < 3)
                        @else
                        @forelse($searchResults as $result)
                            <li class="list-group-item">
                                {{$result['name']}}
                            </li>
                        @empty
                                <li class="list-group-item">
                                    Sem resultados para: "{{$customerSeach}}"
                                </li>
                        @endforelse
                        @endif
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
