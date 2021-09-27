@extends('layouts.main')

@section('content')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">States</h1>
    </div>

    <div class="row">
        <div class="card mx-auto">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>

                @endif
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form method="GET" action="{{ route('state.index')}}">
                            <div class="form-row align-items-center">
                              <div class="col">
                                <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="VIC">
                              </div>
                              <div class="col">
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                              </div>
                            </div>
                          </form>
                    </div>
                    <div>
                        <a href="{{ route('state.create')}}" class="btn btn-primary mb-2">Create</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Country Name</th>
                        <th scope="col">State Name</th>
                        <th scope="col">Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($state as $onestate )

                        <tr>
                            <th scope="row">{{$onestate->id}}</th>
                            <td>{{$onestate->country->name}}</td>
                            <td>{{$onestate->name}}</td>
                            <td>
                                <a href="{{route('state.edit', $onestate->id)}}" class="btn btn-success">Edit</a>
                            </td>
                        </tr>

                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
