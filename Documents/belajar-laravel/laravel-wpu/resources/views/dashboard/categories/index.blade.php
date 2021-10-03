@extends('dashboard.layouts.main')



@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories</h1>
    </div>

    @if(session()->has('success'))
      <div class="alert alert-success col-lg-10" role="alert">
        {{ session('success') }}
      </div>
    @endif
    
    <a href="/dashboard/categories/create" class="btn btn-primary text-white fs-6 mb-3"><span data-feather="plus"></span> Add New Category</a>
    <div class="table-responsive col-lg-10">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Category Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td class="d-flex ml-2">
                    <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info d-flex align-items-center"><span data-feather="eye"></span> </a>
                    <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning d-flex align-items-center "><span data-feather="edit"></span> </a>
                    <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger d-flex align-items-center border-0" onclick="return confirm('are you sure?')"><span data-feather="x-circle"></span> </button>
                    </form>
                </td>
                @empty
                <td colspan="4" class="mt-2 text-center">
                    <span class="text-info">
                        <h6 class="text-danger mt-2">Belum ada post</h6>    
                    </span>
                </td>
            </tr>
            @endforelse
          </tbody>
        </table>
    </div>
    
@endsection