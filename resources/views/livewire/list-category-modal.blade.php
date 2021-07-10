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
                    @foreach($categories as $category)
                        <div class="col-md-3">
                             <a href="#">
                                <div class="cat" style="height: 100px;
                                                        margin: 5px;
                                                        text-align: center;
                                                        padding: 10px;
                                                        border-radius: 10px;
                                                        box-shadow: 0 0 5px #ddd;">
                                    <img src="" alt="">
                                    <h4>
                                        {{$category->name}}
                                    </h4>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

</div>
