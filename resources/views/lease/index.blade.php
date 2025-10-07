<table>
    <thead>
        <a href="{{route('lease.create')}}">ADD new</a>
        <tr>
            <th>S\l</th>
            <th>unit</th>
            <th>tenant</th>
            <th>landlord</th>
            <th>start_date</th>
            <th>security_deposite</th>
            <th>rent_amount</th>
            <th>rent due date</th>
            <th>late fee</th>
            <th>status</th>
            <th>Action</th>
        </tr>
    </thead>
    @forelse ($data as $i=> $d)

    <tr>
        <td>{{$i++}}</td>
        <td>{{$d->unit_id}}</td>
        <td>{{$d->tenant_id}}</td>
        <td>{{$d->landlord_id}}</td>
        <td>{{$d->start_date}}</td>
        <td>{{$d->security_deposite}}</td>
        <td>{{$d->rent_amount}}</td>
        <td>{{$d->rent_due_day}}</td>
        <td>{{$d->late_fee}}</td>
        <td>{{$d->status}}</td>
        <td>{{$d->terms}}</td>
        <td><a href="{{route('lease.edit',$d->id)}}">edit</a>

        <form action="'{{route('lease.destroy',$d->id)}}'" method="post" >
            @csrf 
            @method('delete')
             <button type="submit" >delete</button> 
        </form>
    
            </td>



    </tr>
    @empty
    <tr>
        <td>no data found</td>
    </tr>
    @endforelse
</table>