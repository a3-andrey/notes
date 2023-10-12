<x-app-layout title="Заметки создать">
    <form onsubmit="storeForm('{{ route('notes.store') }}'); return false" id="form" class="needs-validation" novalidate="">
        <div class="row g-3">

            <div class="col-12">
                <label for="title" class="form-label">Заголовок </label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Заголовок">
            </div>

            <div class="col-12">
                <label for="content" class="form-label">Содержание</label>
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            </div>

        </div>
        <hr class="my-4">
        <button class="w-100 btn btn-primary btn-lg" type="submit">Создать</button>
    </form>
</x-app-layout>
