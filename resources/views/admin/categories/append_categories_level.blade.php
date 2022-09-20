<div class="form-group">
    <label for="parent_id">Select Category Level</label>
    <select name="parent_id" id="parent_id"  class="form-control">
        <option value="0" @if ((isset($category['parent_id'])) && ($category['parent_id']==0)) {{ 'selected' }} @endif>Main Category</option>
        @if (!empty($getCategories))
            @foreach ($getCategories as $item)
                <option value="{{ $item['id'] }}" 
                @if ((isset($category['parent_id'])) && ($category['parent_id']==$item['id']))
                    {{ 'selected' }}
                @endif
                >{{ $item['category_name'] }}</option> 
                @if (!empty($item['subcategories']))
                    @foreach ($item['subcategories'] as $subcategory)
                        <option value="{{ $subcategory['id'] }}" 
                        @if ((isset($category['parent_id'])) && ($category['parent_id']==$subcategory['id']))
                            {{ 'selected' }}
                        @endif
                        >&nbsp;&raquo;&nbsp;{{ $subcategory['category_name'] }}</option>
                    @endforeach 
                @endif                           
            @endforeach
        @else
        {{ 'Create Category First' }}
            
        @endif
        
    </select>
</div>