@if (\App\Support\Session\Session::hasFlash('flash_message'))
    <div class="alert {{ \App\Support\Session\Session::getFlash('flash_message')['color'] }}">
        {{ \App\Support\Session\Session::getFlash('flash_message')['name'] }}
    </div>
@endif