@extends('layouts.admin')
@section('header')
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{route('admin.resource.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Добавить ресурс</a>
        </div>
    </div>
@endsection
@section('content')
<div class="table-responsive">
    @include('inc.message')
    <table class="table table bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resourceList as $resource)
                <tr>
                    <td>{{ $resource->id }}</td>
                    <td>{{ $resource->name }}</td>
                    <td>{{ $resource->created_at }}</td>
                    <td>{{ $resource->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.resource.edit', ['resource' => $resource]) }}">Edit</a>
                        <a href="javascript:;" class="delete" rel="{{ $resource->id }}">Dell</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $resourceList->links() }}
</div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            const elems = document.querySelectorAll('.delete');
            console.log(elems)
            elems.forEach(element => {
                element.addEventListener('click', (e) => {
                    const id = e.target.getAttribute('rel')
                    if(confirm(`Подтвердите удаление записи с #ID: ${id}?`)) {
                        send(`/admin/resource/${id}`).then(() => {
                            location.reload();
                        })
                    }
                })
            });
        })

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            let result = await response.json()
            return result.ok
        }
    </script>
@endpush