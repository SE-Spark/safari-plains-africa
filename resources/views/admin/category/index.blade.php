<div>    
    <div class="pagetitle">
        <h1>Blog Category</h1>
    </div>
    <section class="section dashboard">
       @include('partials.sectionSuccessError')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title  d-flex justify-content-between">
                            {{$moduleTitle}}
                            @if(!$createUpdateMode)
                            <span class="text-end"><a href="javascript:;" class="btn btn-primary  mr-4" wire:click="createForm">Add New</a></span>
                            @endif
                        </h5>
                        @if($createUpdateMode)
                         @include('admin.category.createUpdate')
                        @else

                        <livewire:blogcategory-table />
                        
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
                        @endif
                    </div>
                </div>
            </div>            
        </div>
    </section>
</div>