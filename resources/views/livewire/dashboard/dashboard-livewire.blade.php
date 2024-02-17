<div>
    {{-- The whole world belongs to you. --}}

    <div class="row">
        <div class="col-12 col-md-4 col-lg-4 mb-2">
            <div class="card bg-primary text-light ">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Types</h4>
                        <h4>{{ $types->count() }}</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4 mb-2">
            <div class="card bg-success text-light ">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Tasks</h4>
                        <h4>{{ $tasks->count() }}</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4 mb-2">
            <div class="card bg-info text-light ">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Projects</h4>
                        <h4>{{ $projects->count() }}</h4>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
