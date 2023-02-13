@if (\App\Support\Session\Session::hasFlash())
    @foreach(\App\Support\Session\Session::getFlash() as $flashMessage)
        @if(!empty($flashMessage["message"]))
            <div class="alert-wrap alert {{ $flashMessage["color"] }}">
                <div class="btn-alert-message">
                    {!! htmlspecialchars_decode($flashMessage["message"]) !!}
                </div>
                <div class="btn-alert-close">
                    <button class="btn btn-close"></button>
                </div>
            </div>

        @endif
    @endforeach
@endif
