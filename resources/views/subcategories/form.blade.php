<div class="form-group">
    <label for="category_id">Category</label>
    <select class="form-control" id="category_id" name="category_id" required="true">
        <option value="" selected>Select</option>
        @foreach ($categories as $category)
			    <option value="{{ $category->id }}" {{optional($subcategory)->category_id == $category->id ? 'selected' : '' }}>
			    	{{ $category->name }}
			    </option>
		@endforeach
    </select>
    {!! $errors->first('category_id', '<p class="text-danger">:message</p>') !!}
</div>
<div class="form-group">
    <label for="name">Sub Category Name</label>
    <input class="form-control" 
           name="name" 
           type="text" id="name" 
           value="{{ old('name', optional($subcategory)->name) }}"
           minlength="1" 
           maxlength="255" 
           required="true" 
           placeholder="name" />
        {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
</div>


