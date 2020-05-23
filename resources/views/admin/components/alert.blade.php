
<div data-notify="container" class="col-xs-4 mt-3 col-md-4 float-right offset-2 custom-notify-set col-sm-4 alert alert-{{$class}} animated fadeIn" role="alert" data-notify-position="top-right">
    <button type="button" aria-hidden="true" class="close" data-notify="dismiss">
        ×
    </button>
    <span data-notify="icon" class="fa {{$icon_type}}">

    </span> 
    <span data-notify="title"></span>
    <span data-notify="message">
          {{$slot}}

    </span>
    <a href="#" target="_blank" data-notify="url">

    </a>
</div>