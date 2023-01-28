@if (\App\Support\Session\Session::hasFlash('password_incorrect'))
    <div>{{ \App\Support\Session\Session::getFlash('password_incorrect') }}asd</div>
@endif
<form method="POST" action="/admin-login">
    <div class="container">
        <label for="uname"><b>Логин</b></label>
        <input type="text" placeholder="Введите логин" name="uname" required>
        <label for="psw"><b>Пароль</b></label>
        <input type="password" placeholder="Введите пароль" name="psw" required>
        <button type="submit">Вход</button>
    </div>
</form>
