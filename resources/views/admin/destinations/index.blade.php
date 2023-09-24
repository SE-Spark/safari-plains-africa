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
        @if($updateDestination)
        @include('admin.destinations.edit')
        @endif
        @include('admin.destinations.create')
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Destinations
                            <span class="text-end"></span>
                        </h5>
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-2 col-6">
                                <a href="javascript:;" class="btn btn-success w-75 mr-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</a>
                            </div>
                        </div>
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
                                    <th scope="row">{{$destination->id}}</th>
                                    <td>{{$destination->name}}</td>
                                    <td>{{$destination->description}}</td>
                                    <td>{{$destination->image_url}}</td>
                                    <td>{{$destination->status}}</td>
                                    <td>
                                        <button wire:click="edit({{$destination->id}})">Edit</button>
                                        <button wire:click="delete({{$destination->id}})">Delete</button>
                                    </td>
                                    @endforeach

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    <script type="text/javascript">        
        document.addEventListener('livewire:initialized', () => {
            @this.on('destinationStored', () => {
                $('#exampleModal').modal('hide');
            });
        });
    </script>
</div>