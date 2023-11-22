<div>
    <div class="pagetitle">
        <h1>Destinations</h1>
    </div>
    <section class="section dashboard">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('error') }}
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between">
                            Destinations
                            <span class="text-end"><a href="javascript:;" class="btn btn-success mr-4" data-bs-toggle="modal" data-bs-target="#destinationModal">Add New</a></span>
                        </h5>
                        <livewire:destination-table/>
                        <div class="modal fade" id="deleteModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                        <button wire:click.prevent="delete()" type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($destinations as $destination)
                                <tr>
                                    <th  wire:key="{{ $destination->id }}" scope="row">{{$destination->id}}</th>
                                    <td>{{$destination->name}}</td>
                                    <td>{{$destination->description}}</td>
                                    <td>{{$destination->image_url}}</td>
                                    <td>{{$destination->status==1?'Active':'Inactive'}}</td>
                                    <td>
                                        <button class="btn btn-transparent" wire:click="editDestination({{$destination->id}})">
                                            <i class="bi bi-pencil-fill text-success"></i>
                                        </button>
                                        <button class="btn btn-transparent" wire:click="delete({{$destination->id}})">
                                            <i class="bi bi-trash-fill text-danger"></i>
                                        </button>
                                    </td>
                                    @endforeach

                            </tbody>
                        </table>--}}
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
            <div class="col-lg-12">
                @include('admin.destinations.create')
            </div>
            <div class="col-lg-12">
                @include('admin.destinations.edit')
            </div>
        </div>
    </section>
    <script type="text/javascript">
        document.addEventListener('livewire:initialized', () => {
            @this.on('destinationStored', () => {
                $('#destinationModal').modal('hide');
                $('#destUpdateModal').modal('hide');
            });
            @this.on('editDestinations', () => {
                $('#destUpdateModal').modal('show');
                console.log('editDestinations');
            });
        });
    </script>
</div>