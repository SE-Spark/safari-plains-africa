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
                            <span class="text-end"><a href="{{route('admin.destination.create')}}" class="btn btn-primary  mr-4">Add New</a></span>
                            {{--<span class="text-end"><a href="javascript:;" class="btn btn-primary  mr-4" data-bs-toggle="modal" data-bs-target="#destinationModal">Add New</a></span>--}}
                        </h5>
                        <livewire:destination-table/>

                    </div>
                </div>

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