<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="d-flex justify-content-between">
                <h3>Hydrophonics</h3>
                <div class="form-group">
                    <button wire:click.prevent='open' class="btn btn-sm btn-outline-primary">
                        Add
                        <x-spinner for="open"></x-spinner>
                    </button>
                    <x-modal title="Add Hydrophonic" :status="$modal">

                        <form wire:submit.prevent='store' action="">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" wire:model="name" class="form-control">
                                <x-error for="name"></x-error>
                            </div>
                            <div class="form-group pb-1">
                                <label for="">Hydrophonic Type</label>
                                <select wire:model="type" class="form-control">
                                    <option value="">Select Hydroponic Type</option>
                                    @foreach ($types as $index => $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-dark">save <x-spinner for="store" /></button>
                        </form>

                    </x-modal>
                    <x-modal title="Growth Sessions" :status="$modal2">

                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <h4 class="text-capitalize">{{ $title }}</h4>
                                <form wire:submit.prevent='store_session' action="">
                                    <div class="form-group pb-1">
                                        <label for="">Session Date</label>
                                        <input type="date" wire:model="date" class="form-control">
                                        <x-error for="date"></x-error>
                                    </div>

                                    <button type="submit" class="btn btn-outline-success">save <x-spinner
                                            for="store_session" /></button>
                                </form>

                            </div>
                            <div class="col-12 col-lg-6">

                                <h4 class="text-center ">Session List</h4>


                                @forelse ($growth_sessions as $item)
                                    <div class="list-group py-1">
                                        <a href="#"
                                            class="list-group-item d-flex justify-content-between align-items-center list-group-item-action ">
                                            <div>
                                                {{ $item->session_date }}
                                            </div>
                                            <div class="btn-group">
                                                <button
                                                    wire:click.prevent='view_readings({{ $item->hydrophonic_id }},{{ $item->id }})'
                                                    class="btn btn-outline-secondary btn-sm">View</button>
                                                <button wire:click.prevent='edit_session({{ $item->id }})'
                                                    class="btn btn-outline-primary btn-sm">Edit <x-spinner
                                                        for="edit_session({{ $item->id }})" /></button>
                                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                                            </div>
                                        </a>

                                    </div>
                                @empty
                                    <div class="list-group py-1">
                                        <a href="#"
                                            class="list-group-item d-flex justify-content-center list-group-item-action ">
                                            <div>
                                                <h4 class="text-center text-muted text-uppercase">Empty</h4>
                                            </div>

                                        </a>

                                    </div>
                                @endforelse

                            </div>
                        </div>
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
                                        <th>Hydrophonics</th>
                                        <th>Type</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($hydrophonics as $index =>$item)
                                        <tr>
                                            <td scope="row">{{ $index }}</td>
                                            <td>

                                                {{ $item->name }}
                                            </td>
                                            <td>{{ $item->type->name }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-secondary" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    options
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item text-success"
                                                            wire:click.prevent='view_session({{ $item->id }})'
                                                            href="#">View Session</a></li>
                                                    <li><a class="dropdown-item text-primary "
                                                            wire:click='open({{ $item->id }})' href="#">Edit
                                                            <x-spinner for="open({{ $item->id }})" /></a></li>
                                                    <li><a class="dropdown-item text-danger "
                                                            wire:click='destroy({{ $item->id }})'
                                                            href="#">Delete <x-spinner
                                                                for="destroy({{ $item->id }})" </a></li>
                                                </ul>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="h4 text-center text-uppercase text-muted" colspan="4"
                                                scope="row"> empty </td>

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
