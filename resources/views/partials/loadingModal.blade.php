<!-- <div wire:loading.delay class="{{ !empty($isSubmitting) && $isSubmitting ? '' : 'd-none' }}">
    <div style="display:flex; justify-content: center; align-items: center; background-color: black; position: fixed; top: 0px; left: 0px; z-index: 9999; width: 100%; height: 100%; opacity: .75;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden d-none">Loading...</span>
        </div>
    </div>
</div> -->

<div 
    wire:poll.visible.500ms
    class="spinner-container d-none"
>
    <div style="display:flex; justify-content: center; align-items: center; background-color: black; position: fixed; top: 0px; left: 0px; z-index: 9999; width: 100%; height: 100%; opacity: .75;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:initialized', function () {
        $('body').on('click','form .btn-primary.btn-round',function(){
            $('.spinner-container').removeClass('d-none');
        })
        @this.on('showSpinner', () => {
            $('.spinner-container').removeClass('d-none');
        });

        @this.on('hideSpinner', () => {
            $('.spinner-container').addClass('d-none');
        });
    });
</script>

