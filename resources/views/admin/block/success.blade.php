<div class="col-lg-12">
    @if(Session::has('flash_message'))
        <div class="alert alert-{!! Session::get('flash_level') !!}">
            
        </div>
    @endif
</div>