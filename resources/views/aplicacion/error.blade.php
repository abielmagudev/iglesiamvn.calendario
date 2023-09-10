@if( $errors->any() )
<div class="notification is-danger is-radiusless has-text-centered">
    <b>{{ $errors->first() }}</b>
</div>
@endif
