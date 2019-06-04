
<!-- Messages -->
<div class="message-holder" >
    @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <small><i class="fas fa-times"></i></small>
        </button>
        <i class="fas fa-check-circle mr-2"></i>
        {{ $error }}
    </div>
    @endforeach
    @include('flash::message')
</div>
<!-- Messages -->
