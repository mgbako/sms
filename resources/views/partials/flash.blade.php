@if (Session::has('flash_message')) 
  <div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert_important' }}">
    @if(Session::has('flash_message_important'))
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
        &times;
      </button>
    @endif
  </div>
  @elseif(Session::has('flash_warning'))
    <div class="alert alert-warning {{ Session::has('flash_warning_important') ? 'alert_important' }}">
    @if(Session::has('flash_warning_important'))
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
        &times;
      </button>
    @endif
  </div>
@endif 