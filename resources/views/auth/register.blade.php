<x-guest-layout>
    <!-- Session Status -->
    <form id="form_register">
        <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

        <div class="form-floating">
            <input name="name" type="text" class="form-control" id="floatingInput" placeholder="Имя">
            <label for="floatingInput">Имя </label>
        </div>

        <div class="form-floating">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email">
            <label for="floatingInput">Email </label>
        </div>

        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Пароль">
            <label for="floatingPassword">Пароль</label>
        </div>
        <button  class="btn btn-primary w-100 py-2 mt-5" type="submit">Регистрация</button>
        <div class="mt-3">
            <div id="errors"></div>
            <div id="success" ></div>
        </div>
    </form>
</x-guest-layout>

