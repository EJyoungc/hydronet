<div>
    {{-- The best athlete wants his opponent at his best. --}}


    <div class="row py-1">
        <div class="col-12 col-lg-12">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="text-success"> <i class="ti ti-plant-2"></i> {{ $hydrophonic_id->name }} </h3>
                    <h4>Session: <span class="text-primary">{{ $session_id->session_date->format('M j, Y') }}</span>
                    </h4>
                </div>
                <div class="form-group">
                    <button wire:click.prevent='open' class="btn btn-sm btn-outline-primary">
                        Add
                        <x-spinner for="open"></x-spinner>
                    </button>
                    <x-modal title="Add Photos" :status="$modal2">
                        <div class="d-flex py-2">
                            <div class="form-group">
                                <button class="btn btn-outline-success" onclick="document.getElementById('photo').click()">upload
                                    <x-spinner for="image" /></button>
                                <input type="file" multiple wire:model.blur="image" id="photo" class="d-none">
                                <x-error for="image"></x-error>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row images">
                                    @forelse ($readingphotos as $index => $item)
                                        <div class="col-12 col-lg-6">

                                            <div class="card border-0">

                                                <img  height="300" id="image_{{ $item->id }}" class="card-img-top"
                                                    src="{{ asset('assets/uploads/' . $item->image) }}" alt="">

                                                <div class="card-body text-center">

                                                    <div class="btn-group">
                                                        <button class="btn btn-outline-primary">View</button>
                                                        <button class="btn btn-outline-primary">make featured</button>
                                                        <button wire:click='delete_photo({{ $item->id }})' class="btn btn-outline-danger">Delete <x-spinner for="delete_photo({{ $item->id }})" /></button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @push('scripts')
                                        <link rel="stylesheet" href="{{ asset('css/viewer.min.css') }}">
                                        <script src="{{ asset('js/viewer.min.js') }}"></script>
                                        <script>
                                            // Initialize viewer for each image with a unique ID
                                            const viewer_{{ $index }} = new Viewer(document.getElementById('image_{{ $index }}'), {
                                                inline: true,
                                                viewed() {
                                                    viewer_{{ $index }}.zoomTo(1);
                                                },
                                            });
                                        </script>
                                    @endpush
                                    @empty
                                    @endforelse
                                   

                                </div>


                            </div>

                        </div>
                    </x-modal>
                    <x-modal title="Add Readings" :status="$modal">

                        <form wire:submit.prevent='store' action="">
                            <div class="form-group">
                                <label for="">Temperature <i class="ti ti-temperature-celsius"></i> </label>
                                <input type="text" wire:model="temp" class="form-control">
                                <x-error for="temp"></x-error>
                            </div>
                            <div class="form-group">
                                <label for="">UsCm <i class="ti ti-clock-x"></i> </label>
                                <input type="number" wire:model="uscm" class="form-control">
                                <x-error for="uscm"></x-error>
                            </div>
                            <div class="form-group">
                                <label for="">Ppm <i class="ti ti-clock-shield"></i></label>
                                <input type="number" wire:model="ppm" class="form-control">
                                <x-error for="ppm"></x-error>
                            </div>
                            <div class="form-group ">
                                <label for="">PH <i class="ti ti-thermometer"></i></label>
                                <input type="text" wire:model="ph" class="form-control">
                                <x-error for="ph"></x-error>
                            </div>

                            <div class="form-group pb-1">
                                <label for="">Notes</label>
                                <textarea wire:model='notes' class="form-control border-success "></textarea>
                                <x-error for="notes"></x-error>
                            </div>

                            <button type="submit" class="btn btn-outline-success">save <x-spinner for="store" /></button>
                        </form>

                    </x-modal>

                </div>
            </div>
            <div class="card bg-white">
                <div class="card-body">
                    <div wire:ignore width="400" height="300">

                        <canvas id="myChart"></canvas>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-12">

            <div class="card">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-inverse ">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>date</th>
                                        <th>Temp</th>
                                        <th>PH</th>
                                        <th>UsCm</th>
                                        <th>PPM</th>
                                        <th>user</th>
                                        <th>Notes</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($readings as $index =>$item)
                                        <tr>
                                            
                                            <td scope="row">{{ $index }}</td>
                                            <td>{{ $item->created_at->format('M d, m:s ') }}</td>
                                            <td>
                                                <div class="badge" style="background:purple">{{ $item->temp }}</div>
                                            </td>
                                            <td>
                                                <div class="badge bg-danger ">{{ $item->ph }}</div>
                                            </td>
                                            <td>
                                                <div class="badge bg-warning">{{ $item->uscm }}</div>
                                            </td>
                                            <td>
                                                <div class="badge bg-info">{{ $item->ppm }}</div>
                                            </td>
                                            <td>
                                                {{ $item->user->name == null ? 'none' : $item->user->name  }}
                                            </td>
                                            <td><small>{{ $item->notes }}</small></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-secondary" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    options
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item text-success"
                                                            wire:click.prevent='open_photos({{ $item->id }})'
                                                            href="#">Photos</a></li>
                                                    <li><a class="dropdown-item text-primary "
                                                            wire:click='open({{ $item->id }})'
                                                            href="#">Edit
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
                                            <td class="h4 text-center text-uppercase text-muted" colspan="7"
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
    {{-- @push('scripts')
        <script src="{{ asset('js/chart.js/Chart.min.js') }}"></script>

        <script>
            // Get the canvas element
            var ctx = document.getElementById('myChart').getContext('2d');

            // var res =@json($readings);


            var data = {
                labels: {!! $readings->pluck('created_at')->map(function ($date) {
                    return $date->format('M d');
                }) !!},
                datasets: [{
                        label: 'Temp',
                        data: {!! $readings->pluck('temp') !!},
                        fill: false, // Fill the area under the line
                        borderColor: 'purple',
                        tension: 0.1 // Smoothing of the line
                    },
                    {
                        label: 'USCM',
                        data: {!! $readings->pluck('uscm') !!},
                        fill: false, // Fill the area under the line
                        borderColor: 'orange',
                        tension: 0.1 // Smoothing of the line
                    },
                    {
                        label: 'PPM',
                        data: {!! $readings->pluck('ppm') !!},
                        fill: false, // Fill the area under the line
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1 // Smoothing of the line
                    },

                    {
                        label: 'PH',
                        data: {!! $readings->pluck('ph') !!},
                        fill: false, // Fill the area under the line
                        borderColor: 'rgb(255, 99, 132)',
                        tension: 0.1 // Smoothing of the line
                    }
                ]
            };

            var options = {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            };

            // Create the chart
            var myChart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: options
            });
        </script>
    @endpush --}}
</div>


@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/viewer.min.css') }}">
    <script src="{{ asset('js/viewer.min.js') }}"></script>
    <script>
        const viewer = new Viewer(document.getElementById('image'), {
            inline: true,
            viewed() {
                viewer.zoomTo(1);
            },
        });
    </script>
    <script src="{{ asset('js/chart.js/Chart.min.js') }}"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            // Runs after Livewire is loaded but before it's initialized
            // on the page...

            console.log("hello2");
            var ctx = document.getElementById('myChart').getContext('2d');

            // var res =@json($readings);


            var data = {
                labels: {!! $readings->pluck('created_at')->map(function ($date) {
                    return $date->format('M d ,m:s');
                }) !!},
                datasets: [{
                        label: 'Temp',
                        data: {!! $readings->pluck('temp') !!},
                        fill: false, // Fill the area under the line
                        borderColor: 'purple',
                        tension: 0.1 // Smoothing of the line
                    },
                    {
                        label: 'USCM',
                        data: {!! $readings->pluck('uscm') !!},
                        fill: false, // Fill the area under the line
                        borderColor: 'orange',
                        tension: 0.1 // Smoothing of the line
                    },
                    {
                        label: 'PPM',
                        data: {!! $readings->pluck('ppm') !!},
                        fill: false, // Fill the area under the line
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1 // Smoothing of the line
                    },

                    {
                        label: 'PH',
                        data: {!! $readings->pluck('ph') !!},
                        fill: false, // Fill the area under the line
                        borderColor: 'rgb(255, 99, 132)',
                        tension: 0.1 // Smoothing of the line
                    }
                ]
            };

            var options = {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            };

            // Create the chart
            var myChart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: options
            });

            Livewire.on('chart', (event) => {
                console.log("hello2");
                var ctx = document.getElementById('myChart').getContext('2d');

                // var res =@json($readings);


                var data = {
                    labels: {!! $readings->pluck('created_at')->map(function ($date) {
                        return $date->format('M d');
                    }) !!},
                    datasets: [{
                            label: 'Temp',
                            data: {!! $readings->pluck('temp') !!},
                            fill: false, // Fill the area under the line
                            borderColor: 'purple',
                            tension: 0.1 // Smoothing of the line
                        },
                        {
                            label: 'USCM',
                            data: {!! $readings->pluck('uscm') !!},
                            fill: false, // Fill the area under the line
                            borderColor: 'orange',
                            tension: 0.1 // Smoothing of the line
                        },
                        {
                            label: 'PPM',
                            data: {!! $readings->pluck('ppm') !!},
                            fill: false, // Fill the area under the line
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1 // Smoothing of the line
                        },

                        {
                            label: 'PH',
                            data: {!! $readings->pluck('ph') !!},
                            fill: false, // Fill the area under the line
                            borderColor: 'rgb(255, 99, 132)',
                            tension: 0.1 // Smoothing of the line
                        }
                    ]
                };

                var options = {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                };

                // Create the chart
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: data,
                    options: options
                });



            });
        });
    </script>
@endpush
{{-- 
@assets
<script src="{{ asset('js/chart.js/Chart.min.js') }}"></script>


@endassets --}}

{{-- @script
    <script>
            document.addEventListener('livewire:init', () => {
        // Runs after Livewire is loaded but before it's initialized
        // on the page...

        Livewire.on('chart',()=>{
            console.log('hello');
        });
        
    })
        


       
    </script>
@endscript --}}
