<div>
    <div class="pagetitle">
        <h1>Blog posts</h1>
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
                                        <label for="exampleInputEmail1">{{__(" Category")}}</label>
                                        <select class="form-control @error('blogcategory') is-invalid @enderror" id="blogcategory_id" wire:model="blogcategory_id">
                                            <option value="">{{__("Select Category")}}</option>
                                            @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('blogcategory_id') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Title")}}</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model="title">
                                        @error('title') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__(" Content")}}</label>
                                        <div wire:ignore>
                                            <textarea wire:model="content" class="tinymce-editors min-h-fit h-48 d-none" name="content" id="content"></textarea>
                                        </div>
                                        <!-- <input type="text" class="form-control @error('content') is-invalid @enderror" wire:model="content"> -->
                                        @error('content') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__("Image")}}</label>
                                        <input type="file" class="form-control @error('image_photo') is-invalid @enderror" wire:model="image_photo">
                                        @error('image_photo') <span class="text-danger error">{{ $message }}</span>@enderror
                                        @if ($image_photo || $image_url)
                                        Photo Preview:
                                        <img src="{{ !empty($image_photo)?$image_photo->temporaryUrl():asset('assets/images/'.$image_url) }}" width="220">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__(" Publish")}}</label>
                                        <select class="form-control" id="is_published" wire:model="is_published">
                                            <option value="" class="muted">{{__("Would like to Publish")}}</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <a href="{{route('admin.posts')}}" class="btn btn-secondary btn-round" wire:navigate>Close</a>
                                <!-- <button type="button" class="btn btn-secondary btn-round">Close</button> -->
                                <button type="button" wire:click.prevent="create()" class="btn btn-primary btn-round">{{__('Save')}}</button>
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
    //  tinymce.init({
    //         selector: '#content',
    //         forced_root_block: false,
    // setup: function (editor) {
    //     editor.on('init change', function () {
    //         editor.save();
    //     });
    //     editor.on('change', function (e) {
    //         @this.set('content', editor.getContent());
    //     });
    // }
    //     });



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
        setup: function(editor) {
            editor.on('init change', function() {
                editor.save();
            });
            editor.on('change', function(e) {
                @this.set('content', editor.getContent());
            });
        }
    });
    $('#content').removeClass('d-none');
</script>
@endpush