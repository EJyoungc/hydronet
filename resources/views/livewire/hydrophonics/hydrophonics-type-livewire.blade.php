<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="d-flex justify-content-between">
                <h3>Hydroponic Types</h3>
                <div class="form-group">
                    <button wire:click.prevent='open' class="btn btn-outline-primary">
                        Add
                        <x-spinner for="open" ></x-spinner>
                    </button>
                    <x-modal title="Add Hydrophonic" :status="$modal">
                    
                        <form wire:submit.prevent='store' action="">
                            <div class="form-group pb-1">
                                <label for="">Name</label>
                                <input type="text" wire:model="name" class="form-control">
                                <x-error for="name" ></x-error>
                            </div>
                            
                            <button type="submit" class="btn btn-outline-light">save <x-spinner for="store" /></button>
                        </form>

                    </x-modal>
                </div>
            </div>
            <div class="card">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-inverse ">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Hydrophonic Type</th>
                                    <th>Hydrophonics No </th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                   @forelse ($types as $index => $item )
                                        
                                    <tr>
                                        <td scope="row">{{ $index }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->hydrophonics->count() }}</td>
                                        <td>
                                            <div class="btn-group" >
                                                <button wire:click='open({{ $item->id }})' class="btn btn-outline-primary btn-sm">Edit <x-spinner for="open({{ $item->id }})" /></button>
                                                <button wire:click='destroy({{ $item->id }})' class="btn btn-outline-danger btn-sm">Delete <x-spinner for="destroy({{ $item->id }})" /></button>
                                            </div>
                                            
                                        </td>
                                    </tr>

                                    @empty

                                    <tr>
                                        <td  class="text-muted text-uppercase text-center h4 fw-bold" colspan="4" >empty</td>
                                    </tr>


                                   @endforelse
                                </tbody>
                        </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

