@extends('main1')

@section('title', 'Ingredients')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if (session('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
            @endif
            @if (session('update'))
            <div class="alert alert-info" role="alert">
                {{ session('update') }}
            </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Create
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/createcategory" method="POST" >
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Category name</label>
                                            <input type="text" class="form-control" placeholder="input category name"
                                                name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Category tr</label>
                                            <input type="number" class="form-control"
                                                placeholder="input category number" name="tr">
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" placeholder="input post text"
                                                name="is_active" value="1">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="ok">create</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <form action="" method="get" class="m-2">
                        @csrf
                        <input type="text" class="form-control" id="searchinput" name="search">
                </div>
                <div class="col-2">
                    <input type="submit" value="search" class="btn btn-outline-success m-2" name="ok">
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>TR</th>
                                <th>Is Active</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->tr}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/isactive/{{$category->id}}"
                                            class="btn {{ $category->is_active ? 'btn-success' : 'btn-secondary' }}">
                                            Active
                                        </a>
                                        <a href="inactive/{{$category->id}}"
                                            class="btn {{ !$category->is_active ? 'btn-danger' : 'btn-secondary' }}">
                                            Inactive
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="row mb-2">
                                        <div class="col-sm-6 mt-2">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{$category->id}}">
                                                Update
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel{{$category->id}}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel{{$category->id}}">Modal
                                                                title</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('updatecategory', $category->id) }}" method="POST"
                                                                >
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label class="form-label">Category name</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="input category name" name="name" value="{{$category->name}}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Category tr</label>
                                                                    <input type="number" class="form-control"
                                                                        placeholder="input category number" name="tr" value="{{$category->tr}}">
                                                                </div>
                                                                
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                name="ok">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td><a href="deletecategory/{{$category->id}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>




        </div>
    </section>
</div>
@endsection