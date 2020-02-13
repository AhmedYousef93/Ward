
@extends('user.app')
@section('page')



<div class="col-lg-12 col-md-12 mx-auto" style="text-align: center">
    <hr>
          
          <h3>@lang("frontend.log")</h3><br>
          <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right"> @lang("frontend.log_email") </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">  @lang("frontend.log_pass")  </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 pull-left" >
                                <button type="submit" class="btn btn-primary">
                                    @lang("frontend.log")
                                </button>

                                <a href="{{ route('register') }}" class="btn btn-warning">
                                    @lang("frontend.newlog")
                                </a>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    @lang("frontend.forgetpass")
                                </a>
                            </div>
                        </div>
                    </form>
        </div>
    <div class="clearfix"></div>
    <hr>



@endsection



