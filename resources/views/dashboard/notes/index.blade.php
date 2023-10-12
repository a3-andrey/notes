<x-app-layout title="Заметки">
    <a href="{{ route('dashboard.notes.create') }}" type="button" class="btn btn-primary">Создать</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Контент</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Опции</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notes as $key=>$note)
            <tr id="item_id_{{ $note->id }}">
                <th scope="row">{{ $key++ }}</th>
                <td>{{ $note->title }}</td>
                <td>{!! nl2br($note->content) !!}</td>
                <td>{{ \Carbon\Carbon::parse($note->created_at)->format('d.m.Y h:i') }}</td>
                <td>
                    <a href="{{ route('dashboard.notes.edit',$note) }}" type="button" class="btn btn-primary">Редактировать</a>
                    <a onclick="delete_item('{{ route('notes.destroy',$note) }}', {{ $note->id }}); return false;"
                       type="button" class="btn btn-danger">
                        Удалить
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
