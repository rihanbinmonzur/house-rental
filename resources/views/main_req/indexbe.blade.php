<a href="{{ route('mainreq.create') }}">addd</a>
<table border=>
    <tr>
        <th>id</th>
        <th>tenant_id</th>
        <th>landlord_id</th>
        <th>unit_id</th>
        <th>title</th>
        <th>descriptition</th>
        <th>priority</th>
        <th>status</th>
        <th>photos</th>
        <th></th>

        <th>actions</th>

    </tr>
    @forelse($data as $sl=> $d)
        <tr>
            <td>{{ $sl + 1 }}</td>
            <td>{{ $d->id }}</td>
            <td>{{ $d->tenant_id }}</td>
            <td>{{ $d->landlord_id }}</td>
            <td>{{ $d->unit_id }}</td>
            <td>{{ $d->title }}</td>
            <td>{{ $d->description }}</td>
            <td>{{ $d->priority }}</td>
            <td>{{ $d->status }}</td>
            <td>{{ $d->image_url }}</td>
            <td><a href="{{ route('mainreq.edit', $d->id) }}">edit</a>
                <form action="{{ route('mainreq.destroy', $d->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="10">No data found</td>
        </tr>
    @endforelse
</table>
