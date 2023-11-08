<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      All Category
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="col-md-12">
        <div class="card">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">User ID</th>
                <th scope="col">Created At</th>
              </tr>
            </thead>
            <tbody>
              @php
              $i=1;
              @endphp

              @foreach ($categories as $category)
              <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$category->category_name}}</td>
                <td>{{$category->user_id}}</td>
                <td>{{$category->created_at}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="col-md-4">
          <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="category_name">Add Category</label>
              <input type="text" class="form-control" name="category_name">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
          </form>


        </div>
      </div>

    </div>
</x-app-layout>