<label>Category</label>

<select name="category_id" class="form-select">
    @foreach($categories as $category)
        <option value="{{ $category->id }}"
            {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
            {{ $category->title }}
        </option>
    @endforeach
</select>

<br>


<label>Title</label>
<input type="text" class="form-control" name="title"
       value="{{ old('title', $product->title ?? '') }}">
<br>

<label>Keywords</label>
<input type="text" class="form-control" name="keywords"
       value="{{ old('keywords', $product->keywords ?? '') }}">
<br>

<label>Description</label>
<input type="text" class="form-control" name="description"
       value="{{ old('description', $product->description ?? '') }}">
<br>

<label>Detail</label>
<textarea class="form-control" id="detail" rows="5" name="detail">{{ old('detail', $product->detail ?? '') }}</textarea>
<br>


<div class="mb-3">
    <label class="form-label">Image</label>

    <input type="file" name="image" class="form-control">

    @if(!empty($product?->image))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $product->image) }}" width="80">
        </div>
    @endif

    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="row">

    <div class="col-md-3">
        <label>Price</label>
        <input type="number" step="0.01" class="form-control" name="price"
               value="{{ old('price', $product->price ?? '') }}">
    </div>

    <div class="col-md-3">
        <label>Stock</label>
        <input type="number" class="form-control" name="stock"
               value="{{ old('stock', $product->stock ?? 0) }}">
    </div>

    <div class="col-md-3">
        <label>Minimum Stock</label>
        <input type="number" class="form-control" name="minstock"
               value="{{ old('minstock', $product->minstock ?? 0) }}">
    </div>

    <div class="col-md-3">
        <label>Discount</label>
        <input type="number" class="form-control" name="discount"
               value="{{ old('discount', $product->discount ?? 0) }}">
    </div>

</div>

<br>

<label>Status</label>
<select class="form-select" name="status">
    <option value="0" {{ old('status', $product->status ?? 0) == 0 ? 'selected' : '' }}>
        Passive
    </option>

    <option value="1" {{ old('status', $product->status ?? 0) == 1 ? 'selected' : '' }}>
        Active
    </option>
</select>

<br><br>