<div class="form-group">
    <label for="name">Category Name</label>
    <input class="form-control" 
           name="name" 
           type="text" id="name" 
           value="{{ old('name', optional($category)->name) }}"
           minlength="1" 
           maxlength="255" 
           required="true" 
           placeholder="name" />
        {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
</div>


