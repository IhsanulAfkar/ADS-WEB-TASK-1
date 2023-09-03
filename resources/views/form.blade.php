@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Report Form') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('report') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- name --}}
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Email --}}
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- No HP --}}
                            <div class="row mb-3">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Identity Type --}}
                            <div class="row mb-3">
                                <label for="identity_type"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Identity Type') }}</label>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="identity_type" id="ktp"
                                            value="ktp" checked>
                                        <label class="form-check-label" for="identity_type">
                                            KTP
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="identity_type" id="sim"
                                            value="sim">
                                        <label class="form-check-label" for="identity_type">
                                            SIM
                                        </label>
                                    </div>
                                    @error('identity_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Identity No --}}
                            <div class="row mb-3">
                                <label for="identity_no"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Identity Number') }}</label>

                                <div class="col-md-6">
                                    <input id="identity_no" type="text"
                                        class="form-control @error('identity_no') is-invalid @enderror" name="identity_no"
                                        value="{{ old('identity_no') }}" required autocomplete="identity_no">

                                    @error('identity_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Birth Place --}}
                            <div class="row mb-3">
                                <label for="birth_place"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Birth Place') }}</label>

                                <div class="col-md-6">
                                    <input id="birth_place" type="text"
                                        class="form-control @error('birth_place') is-invalid @enderror" name="birth_place"
                                        value="{{ old('birth_place') }}" required autocomplete="birth_place">

                                    @error('birth_place')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Birth Date --}}
                            <div class="row mb-3">
                                <label for="birth_date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Birth Date') }}</label>

                                <div class="col-md-6">
                                    <input id="birth_date" type="date"
                                        class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                                        value="{{ old('birth_date') }}" required autocomplete="birth_date">

                                    @error('birth_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Address --}}
                            <div class="row mb-3">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Title Report --}}
                            <div class="row mb-3">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Title Report') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title') }}" required autocomplete="title">

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Description --}}
                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Description Report') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="textarea"
                                        class="form-control @error('description') is-invalid @enderror" name="description"
                                        value="{{ old('description') }}" required autocomplete="description">

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Evidence --}}
                            <div class="row mb-3">
                                <label for="evidence"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Evidence Report') }}</label>

                                <div class="col-md-6">
                                    <input id="evidence" type="file"
                                        class="form-control @error('evidence') is-invalid @enderror" name="evidence"
                                        value="{{ old('evidence') }}" required autocomplete="evidence">

                                    @error('evidence')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
