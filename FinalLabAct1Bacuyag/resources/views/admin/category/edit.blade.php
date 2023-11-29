<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Edit Category
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="col-md-12">
        <div class="card">
          <div class="col-md-4">
            <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}">
              </div>
              <div class="form-group">
                <label for="image">Category Image</label>
                <input type="file" class="form-control" name="image">
              </div>


              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>