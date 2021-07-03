<div>
<style>
    .card_product:hover{
        border:1px solid #000;
    }
</style>
    <div class="container-fluid">
        <div class="row">

            <div class="header col-md-12" style="background-color: white; box-shadow: 0 5px 5px #ddd; width: 100%; !important;">
                <span>Logo aqui!</span>
                <div class="float-end">
                    <button class="btn btn-lg d-none d-sm-inline-block" id="fullscreen-btn" onclick="openFullscreen()">
                        <i class="fas fa-arrows-alt"></i>
                    </button>
                    <div class="btn-group mb-1">
                        <div class="dropdown">
                            <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle dropdown-toggle me-1" type="button" id="dropdownMenuButtonSec" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSec" style="margin: 0px;">
                                <a class="dropdown-item disabled" href="#">Fucking User Name</a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-door-open"></i>
                                    Terminar sessão
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <br>
       <div class="row">
          <div class="col-md-6" style="background-color: white; box-shadow: 0 10px 5px #ccc;">
            <div class="customer" style="padding: 15px; !important;">
                <div class="col-md-12">
                    <div class="form-group">
                        <select class="form-control js-example-basic-single" name="state">
                            <option value=""></option>
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="form-group mb-12">
                        <a href="#" class="btn btn-success">
                            Adicionar novo cliente
                        </a>
                    </div>
                </div>
            </div>
              <livewire:cart-product />
          </div>
           <div class="col-md-6" style="box-shadow: 10px 0 5px #ccc;">
               <div class="col-md-12" style="background-color: white; padding: 15px; !important;">
                   <div class="row">
                       <div class="col-md-6">
                           <button class="btn btn-outline-primary mt-1 btn-block collapsed" aria-expanded="false" aria-controls="sidebar-category" style="overflow-anchor: none; border-color: #435ebe; padding: .5rem 1.25rem;"><i class="i-Two-Windows"></i>
                               Lista de Categorias
                           </button>
                       </div>
                       <div class="col-md-6">
                           <button class="btn btn-outline-primary mt-1 btn-block collapsed" aria-expanded="false" aria-controls="sidebar-category" style="overflow-anchor: none; border-color: #435ebe; padding: .5rem 1.25rem;"><i class="i-Two-Windows"></i>
                               Lista de Marcas
                           </button>
                       </div>
                   </div>
               </div>
               <div class="col-md-12" style="background-color: white; padding: 15px; !important;">
               <div class="row">
                   <div class="col-md-6">
                       <div class="form-group position-relative has-icon-right">
                           <input type="text" class="form-control" placeholder="Escanear código de barras" style="background: #f3f4f6; border: 1px solid #9ca3af; color: #111827; padding: .375rem .75rem; font-size: .813rem; line-height: 1.5; border-radius: .25rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; !important;">
                           <div class="form-control-icon">
                               <i class="bi bi-bookmarks"></i>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="input-group">
                           <input type="text" wire:model="search" placeholder="Pesquisar produto pelo código ou nome" class="form-control" style="background: #f3f4f6; border: 1px solid #9ca3af; color: #111827; padding: .375rem .75rem; font-size: .813rem; line-height: 1.5; border-radius: .25rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; !important;">
                       </div>
                   </div>
               </div>
               </div>
            <div class="col-md-12" id="products" style="background-color: white; padding: 15px; !important;">
                <div class="row">

                    @foreach($products as $product)
                        <div class="col-md-4">
                            <a href="#" wire:click.prevent="addToCart({{$product->id}})">
                            <div class="card card_product o-hidden bd-highlight m-1"  style="box-shadow: 0 0 0.5em #ddd; border-radius: 10px; min-height: 190px;">
                                <div class="list-thumb d-flex">
                                    <img alt="" src="{{asset($product->image)}}" class="w-100 h-100 card-img-top" style="max-height: 100px;">
                                </div>
                                <div class="flex-grow-1 d-bock">
                                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center">
                                        <div class="w-40 w-sm-100 item-title">
                                            <b>{{$product->name}}</b>
                                        </div>
                                        <p class="text-muted text-small w-15 w-sm-100 mb-2" style="padding-top: 10px; !important;">
                                            {{$product->bar_code}}
                                        </p>
                                        <span class="badge bg-success w-15 w-sm-100 mb-2">
                                            {{$product->price}} kz
                                        </span>

                                    </div>
                                   {{--  <div class="card-footer text-muted">
                                        <input type="checkbox" class="btn-check " id="{{$product->id}}" value="{{$product->id}}" autocomplete="off" wire:model="productsSelected">
                                        <label class="btn btn-primary" for="{{$product->id}}">xvideos.com</label>
                                    </div>
                                    --}}
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

    </div>

</div>
<script type="text/javascript">
    /* Get the documentElement (<html>) to display the page in fullscreen */
    var elem = document.documentElement;

    /* View in fullscreen */
    function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) { /* Safari */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { /* IE11 */
            elem.msRequestFullscreen();
        }
    }
</script>

