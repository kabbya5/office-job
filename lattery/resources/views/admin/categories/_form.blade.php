<div class="grid grid-cols-12 gap-4">
    <div class="col-span-12">
        <x-input name="name" label="Category Name" value="{{$category->name ?? ''}}"  />
    </div>

    <div class="col-span-12">
        <x-input name="image_path" label="Category Image" type="text" value="{{$category->image_path ?? ''}}"/>
    </div>
</div>