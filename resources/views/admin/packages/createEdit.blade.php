<div>
    <div class="pagetitle">
        <h1>Packages</h1>
    </div>
    <section class="section dashboard">
        @include('partials.sectionSuccessError')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$modalTitle}}
                            <span class="text-end"></span>
                        </h5>
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Name")}}</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            wire:model="name">
                                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ __("Package Images") }}</label>
                                        <input type="file"
                                            class="form-control @error('image_photos.*') is-invalid @enderror"
                                            wire:model="image_photos" multiple>

                                        @error('image_photos.*')
                                            <span class="text-danger error">{{ $message }}</span>
                                        @enderror

                                        @if ($image_photos)
                                            <div class="mt-2">
                                                <strong>Photo Preview:</strong>
                                                <div class="d-flex flex-wrap">
                                                    @foreach ($image_photos as $photo)
                                                        <div class="p-2">
                                                            <img src="{{ $photo->temporaryUrl() }}" width="220"
                                                                class="img-thumbnail">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @elseif ($image_urls)
                                            <div class="mt-2">
                                                <strong>Photo Preview:</strong>
                                                <div class="d-flex flex-wrap">
                                                    @foreach ($image_urls as $image_url)
                                                        <div class="p-2">
                                                            <img src="{{ '/assets/images/' . $image_url }}" width="220"
                                                                class="img-thumbnail">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Summary")}}</label>
                                        {{--
                                        <input type="text" class="form-control @error('summary') is-invalid @enderror"
                                            wire:model="summary">
                                        --}}
                                        <div wire:ignore>
                                            <textarea wire:model="summary" class="tinymce-editors min-h-fit h-48 d-none"
                                                name="summary" id="summary"></textarea>
                                        </div>
                                        @error('summary') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Description")}}<small> (use heading 4, 5 and 6)</small></label>
                                        <div wire:ignore>
                                            <textarea wire:model="description"
                                                class="tinymce-editors min-h-fit h-48 d-none" name="description"
                                                id="description"></textarea>
                                        </div>
                                        @error('description') <span
                                        class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__(" Destination")}}</label>
                                        <div wire:ignore>
                                            <select class="form-control @error('destinationId') is-invalid @enderror"
                                                id="destinationId" wire:model="destinationId" multiple>
                                                <option value="">{{__("Select Destination")}}</option>
                                                @foreach($destinations as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('destinationId') <span
                                            class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__(" Group")}}</label>
                                        <select class="form-control @error('group_id') is-invalid @enderror"
                                            id="group_id" wire:model="group_id">
                                            <option value="">{{__("Select Group")}}</option>
                                            @foreach($groups as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('group_id') <span
                                        class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            {{--
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Number Of People")}}</label>
                                        <input type="number"
                                            class="form-control @error('number_of_people') is-invalid @enderror"
                                            wire:model="number_of_people">
                                        @error('number_of_people') <span class="text-danger error">{{ $message
                                            }}</span>@enderror
                                    </div>
                                </div>
                            </div>--}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Number Of Days")}}</label>
                                        <input type="number"
                                            class="form-control @error('number_of_days') is-invalid @enderror"
                                            wire:model="number_of_days">
                                        @error('number_of_days') <span
                                        class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            {{--
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Price")}}</label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror"
                                            wire:model="price">
                                        @error('price') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Date From")}}</label>
                                        <input type="date"
                                            class="form-control @error('start_date') is-invalid @enderror"
                                            wire:model="start_date" name="start_date">
                                        @error('start_date') <span class="text-danger error">{{ $message
                                            }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Date To")}}</label>
                                        <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                            wire:model="end_date">
                                        @error('end_date') <span class="text-danger error">{{ $message
                                            }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__(" Status")}}</label>
                                        <select class="form-control @error('status') is-invalid @enderror" name="status"
                                            id="status" wire:model="status">
                                            <option value="" class="muted">{{__("Select Status")}}</option>
                                            <option value="1" selected>Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                        @error('status') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary btn-round"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" wire:click.prevent="createUpdate()"
                                    class="btn btn-primary btn-round">{{__('Save')}}</button>
                            </div>
                            <hr class="half-rule" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
</script>
@push('scripts')


    <script data-navigate-track>
        document.addEventListener('wire:navigated', () => {
        });
        document.addEventListener('livewire:initialized', () => {

            $('#destinationId').select2();
            $('#destinationId').on('change', function () {
                @this.set('destinationId', $(this).val());
            })
        });

        tinymce.init({
            selector: 'textarea.tinymce-editors',
            plugins: 'preview importcss autolink autosave save directionality visualblocks visualchars fullscreen link table charmap anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            menubar: 'insert format',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview | link anchor | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            importcss_append: true,
            height: 300,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link table',
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('change', function (e) {
                    // @this.set('description', editor.getContent());
                    if (this.id === 'description') {
                        @this.set('description', editor.getContent());
                    } else if (this.id === 'summary') {
                        @this.set('summary', editor.getContent());
                    }
                });
            }
        });
        $('#description').removeClass('d-none');
    </script>
@endpush