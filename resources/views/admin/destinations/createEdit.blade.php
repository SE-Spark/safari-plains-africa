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
                                        <label for="exampleInputEmail1">{{__(" Country")}}</label>
                                        <select class="form-control @error('country_id') is-invalid @enderror"
                                            name="country_id" id="country_id" wire:model="country_id">
                                            <option value="" class="muted">{{__("Select Country")}}</option>
                                            @foreach($countries as $k => $v)
                                                <option value="{{$v->id}}">{{$v->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id') <span
                                        class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Destination Name")}}</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            wire:model="name">
                                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Address")}}</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            wire:model="address">
                                        @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{--<label>{{__(" Description")}}</label>
                                        <input type="text"
                                            class="form-control @error('description') is-invalid @enderror"
                                            id="description" wire:model="description">
                                        @error('description') <span class="text-danger error">{{ $message
                                            }}</span>@enderror
                                        --}}
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
                                        <label>{{__("Image")}}</label>
                                        <input type="file"
                                            class="form-control @error('image_photo') is-invalid @enderror"
                                            wire:model="image_photo">
                                        @error('image_photo') <span
                                        class="text-danger error">{{ $message }}</span>@enderror
                                        @if ($image_photo || $image_url)
                                            Photo Preview:
                                            <img src="{{ !empty($image_photo) ? $image_photo->temporaryUrl() : '/assets/images/' . $image_url }}"
                                                width="220">
                                        @endif
                                    </div>
                                </div>
                            </div>
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
@push('scripts')


    <script data-navigate-track>
        document.addEventListener('wire:navigated', () => {

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
                    @this.set('description', editor.getContent());
                });
            }
        });
        $('#description').removeClass('d-none');
    </script>
@endpush