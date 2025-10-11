<form action="{{route('unit.store')}}" method="post" enctype="multipart/form-data" >
    
            @csrf
            <label for="">id
                 <p>id	property_id							features</p>
                <input type="text" name="id">
            </label> 
          
            <label for="">property_id
                <input type="text" name="property_id" >
            </label>
            <label for="">unit_number
                <input type="text" name="unit_number" >
            </label>
            <label for="">floor
                <input type="text" name="floor" >
            </label>
            <label for="">size
                <input type="text" name="size" >
            </label>
            <label for="">bedrooms
                <input type="text" name="bedrooms" >
            </label>
            <label for="">bathrooms
                <input type="text" name="bathrooms" >
            </label>
            <label for="">status
                <input type="text" name="status" >
            </label>
            <label for="">features
                <input type="text" name="features" >
            </label>
            <label for="">photo
                <input type="file" name="image_url" >
            </label>
    <button type="submit" >save</button>

</form>