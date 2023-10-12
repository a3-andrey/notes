<x-app-layout title="Заметки редактировать">
    <form onsubmit="updateForm('{{ route('notes.update',$note) }}'); return false" id="form" class="needs-validation" >
        <div class="row g-3">

            <div class="col-12">
                <label for="title" class="form-label">Заголовок </label>
                <input value="{{ $note->title }}" name="title" type="text" class="form-control" id="title" placeholder="Заголовок">
            </div>

            <div class="col-12">
                <label for="content" class="form-label">Содержание</label>
                <textarea name="content" class="form-control" id="content" rows="3">{{ $note->content }}</textarea>
            </div>

        </div>
        <hr class="my-4">
        <button class="w-100 btn btn-primary btn-lg" type="submit">Изменить</button>
    </form>
</x-app-layout>
