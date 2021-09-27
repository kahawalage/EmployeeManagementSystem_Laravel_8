@extends('layouts.main')

@section('content')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update State') }}
                    <a href="{{route('state.index')}}" class="float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('state.update',$State->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <select name="country_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Country</option>
                                        @foreach ($counties as $country)
                                            <option value="{{$country->id}}" {{$country->id == $State->country_id ? 'selected':''}}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('State Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$State->name) }}" required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update User') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="m-2 p-2">
                    <form method="POST" action="{{route('state.destroy',$State->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"> Delete {{$State->name}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection