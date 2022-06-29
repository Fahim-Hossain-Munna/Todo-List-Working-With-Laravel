@extends('layouts.app')

@section('content')
    {{-- Todocontent --}}

    <div class="container">
        <div class="row mt-5">
            <div class="card">
                <div class="card-header">
                    <h2> Results You Get, </h2>
                    <form action="{{ url('search/here') }}" method="GET">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="search anything!" name="khuzo">
                            <button type="submit" class="btn btn-success">Search</button>
                          </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        @if (session('submit_success'))
                        <div class="alert alert-success">
                            {{ session('submit_success')}}
                        </div>
                    @endif
                    @if (session('deleted'))
                        <div class="alert alert-warning">
                            {{ session('deleted')}}
                        </div>
                    @endif
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Product Name</th>
                                <th>Product Quantity</th>
                                <th>Selected Market Name</th>
                                <th>Date</th>
                                {{-- <th>Data Submit From</th> --}}
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($get_todo as $todo)
                              <tr>
                                  <td scope="row"> {{ $loop->index + 1 }} </td>
                                  <td> {{ $todo->todo_content }} </td>
                                  <td>{{ $todo->quantity }}</td>
                                  <td>{{ $todo->market }}</td>
                                  <td>{{ $todo->date }}</td>
                                  {{-- <td>{{ $todo->created_at->diffForHumans() }}</td> --}}
                                  <td> <small class="badge bg-primary">@if ( $todo->status == 0)
                                      Undone
                                  @endif</small>
                                  <small class="badge bg-success">@if ( $todo->status == 1)
                                    Done
                                @endif</small>
                                </td>
                                  <td> <a href="{{ url('delete/data') }}/{{ $todo->id }}" class="btn btn-danger btn-sm">Delete</a>
                                       <a href="{{ url('done/data') }}/{{ $todo->id }}" class="btn btn-info btn-sm">Wrok Done</a>
                                </td>
                              </tr>

                          @endforeach
                          @if ( $get_todo->count() == 0 )
                          <tr class="text-center">
                            <td colspan="50"><p class="text-danger">No Data Show</p></td>
                          </tr>
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
      </div>


@endsection
