
<div class="modal fade" id="addQuantityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 border p-3 text-center">
                        <h3> {{$productQtd}} </h3>
                    </div>
                </div>
                <div class="row">
                        <a href="#" wire:click.prevent="changeQuantity(1)" class="col-md-4 text-center border p-3 item" style="color: black;font-size: 14pt; font-weight: bold; !important;">
                            1
                        </a>
                    <a href="#" wire:click.prevent="changeQuantity(2)" class="col-md-4 text-center border p-3" style="color: black;font-size: 14pt; font-weight: bold; !important;">
                        2
                    </a>
                    <a href="#" wire:click.prevent="changeQuantity(3)" class="col-md-4 text-center border p-3" style="color: black;font-size: 14pt; font-weight: bold; !important;">
                        3
                    </a>

                </div>
                <div class="row">
                    <a href="#" wire:click.prevent="changeQuantity(4)" class="col-md-4 text-center border p-3" style="color: black;font-size: 14pt; font-weight: bold; !important;">
                        4
                    </a>
                    <a href="#" wire:click.prevent="changeQuantity(5)" class="col-md-4 text-center border p-3" style="color: black;font-size: 14pt; font-weight: bold; !important;">
                        5
                    </a>
                    <a href="#" wire:click.prevent="changeQuantity(6)" class="col-md-4 text-center border p-3" style="color: black;font-size: 14pt; font-weight: bold; !important;">
                        6
                    </a>
                </div>
                <div class="row">
                    <a href="#" wire:click.prevent="changeQuantity(7)" class="col-md-4 text-center border p-3" style="color: black;font-size: 14pt; font-weight: bold; !important;">
                        7
                    </a>
                    <a href="#" wire:click.prevent="changeQuantity(8)" class="col-md-4 text-center border p-3" style="color: black;font-size: 14pt; font-weight: bold; !important;">
                        8
                    </a>
                    <a href="#" wire:click.prevent="changeQuantity(9)" class="col-md-4 text-center border p-3" style="color: black;font-size: 14pt; font-weight: bold; !important;">
                        9
                    </a>
                </div>
                <div class="row">
                    <a href="#" class="col-md-4 text-center border p-3" style="color: black;font-size: 14pt; font-weight: bold; !important;">
                        del
                    </a>
                    <a href="#" wire:click.prevent="changeQuantity(0)" class="col-md-4 text-center border p-3" style="color: black;font-size: 14pt; font-weight: bold; !important;">
                        0
                    </a>
                    <a href="#" wire:click.prevent="increaseOrDecreaseQuantity({{$productId}})" class="col-md-4 text-center border p-3" style="color: black;font-size: 14pt; font-weight: bold; !important;">
                        enter
                    </a>
                </div>
            </div>
           {{--  <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            --}}
        </div>
    </div>
</div>
