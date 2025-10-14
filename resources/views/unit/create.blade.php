<form action="{{route('unit.store')}}" method=post enctype="multipart/form-data" >
    @csrf 
    <label for="">ugtjgujjgu</label>
    <label for="">features
        <input type="checkbox" name="features[]" value="ttt" >
    </label>
    <label for="">jugj
        <input type="checkbox" name="features[]" value="kk" >
    </label>
    <label for="">fhhf
        <input type="checkbox" name="features[]" value="ll" >
    </label>
    <label for="">jjj
        <input type="file" name="image_url">
    </label>
    <label for="">
        <input type="text">
    </label>
    <br>
    <button type="submit" >save</button>
</form>