@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>

            </div>
        </div>
    </div>
</div>


     {{-- todo content --}}
     <div class="container d-flex justify-content-center">
        <div class="row mt-5 col-6">
            <div class="card">
                <div class="card-header bg-dark text-white">
                   <h1>Taday Bazar List,</h1>
                </div>

                <div class="card-body">
                    @if (session('submit_success'))
                    <div class="alert alert-success">
                        {{ session('submit_success')}}
                    </div>
                @endif
                    <form action="{{ url('store_todo') }}" method="POST">
                        @csrf

                         <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">Product Name</label>
                           <input type="text" class="form-control @if ($errors->first('todo_content')) is-invalid @endif" name="todo_content">
                          @if ($errors->first('todo_content'))
                              <p class="text-danger"> {{$errors->first('todo_content')}} </p>
                          @endif
                         </div>
                           <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                             <input type="text" class="form-control @if ($errors->first('quantity')) is-invalid @endif" name="quantity">
                             @if ($errors->first('quantity'))
                             <p class="text-danger"> {{$errors->first('quantity')}} </p>
                             @endif
                           </div>
                           <br>
                           <select class="form-select form-select-sm @if ($errors->first('market')) is-invalid @endif" aria-label=".form-select-sm example" name="market">
                             <option value="">which market you have to go,</option>
                             <option value="Mouchak">Mouchak</option>
                             <option value="Gulistan">Gulistan</option>
                             <option value="Basundhara">Basundhara</option>
                             <option value="Istran Plaza">Istran Plaza</option>
                             <option value="New Market">New Market</option>

                           </select>
                           @if ($errors->first('market'))
                             <p class="text-danger"> {{$errors->first('market')}} </p>
                             @endif
                           <br>
                           <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label">Date</label>
                             <input type="date" class="form-control @if ($errors->first('date')) is-invalid @endif" name="date">
                             @if ($errors->first('date'))
                             <p class="text-danger"> {{$errors->first('date')}} </p>
                            @endif
                           </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

                </div>
            </div>
        </div>
    </div>

    {{-- Todocontent --}}

    <div class="container">
        <div class="row mt-5">
            <div class="card">
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
                                <th>Data Submit From</th>
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
                                  <td>{{ $todo->created_at->diffForHumans() }}</td>
                                  <td> <small class="badge bg-primary">@if ( $todo->status == 0)
                                      Undone
                                      @else Done
                                  @endif</small> </td>
                                  <td> <a href="{{ url('delete/data') }}/{{ $todo->id }}" class="btn btn-danger btn-sm">Delete</a>
                                       <a href="{{ url('done/data') }}/{{ $todo->id }}" class="btn btn-info btn-sm">Wrok Done</a>
                                </td>
                              </tr>
                          @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
      </div>


@endsection
