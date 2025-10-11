<a href="{{route('unit.create')}}">add new</a>

<table>
   
   <thead>
    <tr>
    <th>id</th>
    <th>property_id</th>
    <th>unit_number</th>
    <th>floor</th>
    <th>size</th>
    <th>bedrooms</th>
    <th>bathrooms</th>
    <th>rent_amount</th>
    <th>status</th>
    <th>features</th>
    <th>phtos</th>
    <th>Actions</th>
</tr>
    </thead>

    @forelse($data as $i=> $d)
    <tr>
        <td>{{$i + 1}}</td>
        <td>{{$d->id}}</td>
        <td>{{$d->property_id}}</td>
        <td>{{$d->unit_number}}</td>
        <td>{{$d->floor}}</td>
        <td>{{$d->size}}</td>
        <td>{{$d->bedrooms}}</td>
        <td>{{$d->bathrooms}}</td>
        <td>{{$d->rent_amount}}</td>
        <td>{{$d->status}}</td>
        <td>{{$d->features}}</td>
        <td>photos</td>
        <td></td>
        
    </tr>

  @empty
  <tr>
    <td>no data</td>
  </tr>
   @endforelse
</table>
 