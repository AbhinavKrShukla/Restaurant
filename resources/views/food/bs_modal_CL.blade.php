
<select name="category" class="form-control @error('category') is-invalid @enderror">
    <option value="" class="text-muted">Select Category</option>
    @foreach(\App\Models\Category::all() as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
</select>
