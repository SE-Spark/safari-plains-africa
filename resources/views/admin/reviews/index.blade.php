<div>
    <div class="pagetitle">
        <h1>Reviews</h1>
    </div>
    <section class="section dashboard">
        @include('partials.sectionSuccessError')
        <div class="row">
            <div class="col-lg-12">
               {{-- @include('admin.posts.edit')
                @include('admin.posts.create') --}}
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                        Reviews
                            <span class="text-end"></span>
                        </h5>
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-3 col-6">
                                {{--<a href="javascript:;" class="btn btn-primary  w-75 mr-4" data-bs-toggle="modal" data-bs-target="#postCreateModal">Add New</a>--}}
                            </div>
                        </div>
                        <livewire:review-table />

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
    <script type="text/javascript">
        document.addEventListener('livewire:initialized', () => {
            @this.on('recordStored', (event) => {
                $('#postCreateModal').modal('hide');
                $('#updateModal').modal('hide');
                @this.dispatch('pg:eventRefresh-default');
            });
            @this.on('editRecord', () => {
                $('#updateModal').modal('show');
            });
            @this.on('confirmdelete', () => {
                $('#deleteModal').modal('show');
            });
        });
    </script>
</div>