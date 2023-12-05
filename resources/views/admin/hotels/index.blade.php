<div>
    <div class="pagetitle">
        <h1>Hotels</h1>
    </div>
    <section class="section dashboard">
        @include('partials.sectionSuccessError')
        <div class="row">
            <div class="col-lg-12">
                @include('admin.hotels.edit')
                @include('admin.hotels.create')
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between">
                        Hotels
                            <span class="text-end"><a href="javascript:;" class="btn btn-primary  mr-4" data-bs-toggle="modal" data-bs-target="#createModal">Add New</a></span>
                        </h5>
                        <livewire:hotel-table />

                        <div class="modal fade" id="deleteModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>