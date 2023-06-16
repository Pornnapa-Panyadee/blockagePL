@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="LName" class="col-md-4 col-form-label text-md-right">{{ __('นามสกุล') }}</label>

                            <div class="col-md-6">
                                <input id="LName" type="text" class="form-control @error('LName') is-invalid @enderror" name="LName" value="{{ old('LName') }}" required autocomplete="LName" autofocus>

                                @error('LName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- ตำเเหน่ง--}}
                        <div class="form-group row">
                            <label for="Position" class="col-md-4 col-form-label text-md-right">{{ __('ตำเเหน่ง') }}</label>

                            <div class="col-md-6">
                                <input id="Position" type="text" class="form-control @error('Position') is-invalid @enderror" name="Position" value="{{ old('Position') }}"  autocomplete="Position" autofocus>

                                @error('Position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- ############################################# --}}

                        {{-- หน่วยงาน --}}
                        <div class="form-group row">
                            <label for="Department" class="col-md-4 col-form-label text-md-right">{{ __('หน่วยงาน/สังกัด') }}</label>

                            <div class="col-md-6">
                                <input id="Department" type="text" class="form-control @error('Department') is-invalid @enderror" name="Department" value="{{ old('Department') }}"  autocomplete="Department" autofocus>

                                @error('Department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- ############################################# --}}

                        {{-- เบอร์โทร --}}
                        <div class="form-group row">
                            <label for="Tel" class="col-md-4 col-form-label text-md-right">{{ __('เบอร์ติดต่อ') }}</label>

                            <div class="col-md-6">
                                <input id="Tel" type="text" class="form-control @error('Tel') is-invalid @enderror" name="Tel" value="{{ old('Tel') }}" required autocomplete="Tel" autofocus>

                                @error('Tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- ############################################# --}}

                         <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('อีเมล') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                   

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ยืนยัน') }}
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
