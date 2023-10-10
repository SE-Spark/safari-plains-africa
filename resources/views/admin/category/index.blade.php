<div>
    <div class="pagetitle">
        <h1>Blog Category</h1>
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
            <div class="col-12">
                @include('admin.category.create')
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Category
                            <span class="text-end"></span>
                        </h5>
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-3 col-6">
                                <a href="javascript:;" class="btn btn-success w-75 mr-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</a>
                            </div>
                        </div>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $post)
                                <tr>
                                    <th scope="row">{{$post->id}}</th>
                                    <td>{{$post->name}}</td>
                                    <td>{{$post->description}}</td>
                                    <td>{{$post->status==1?'Active':'IN Active'}}</td>
                                    <td>
                                        <button class="btn btn-transparent" wire:click="editDestination({{$post->id}})">
                                            <i class="bi bi-pencil-fill text-success"></i>
                                        </button>
                                        <button class="btn btn-transparent" wire:click="delete({{$post->id}})">
                                            <i class="bi bi-trash-fill text-danger"></i>
                                        </button>
                                    </td>
                                    @endforeach

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
            <div class="col-12">
                @include('admin.category.edit')
            </div>
        </div>
    </section>
    <script type="text/javascript">
        document.addEventListener('livewire:initialized', () => {
            @this.on('categoryStored', () => {
                $('#exampleModal').modal('hide');
                $('#updateModal').modal('hide');
            });
            @this.on('editCategory', () => {
                $('#updateModal').modal('show');
            });
        });
    </script>
</div>