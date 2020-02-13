@extends('admin.app')

@section('main-content')
    @include('includes.messages')
    <form role="form" action="{{route('bank_accounts.update' , $bankinfo->id)}}" method="post">
        @csrf
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="bank_name">اسم البنك</label>
            <input class="form-control" id="bank_name" name="bank_name" value="{{ $bankinfo->bank_name }}">
        </div>

        <div class="form-group">
            <label for="acc_owner">اسم مالك الحساب</label>
            <input class="form-control" id="acc_owner" name="acc_owner" value="{{ $bankinfo->acc_owner }}">
        </div>

        <div class="form-group">
            <label for="epay_number">رقم ال(epay)</label>
            <input class="form-control" id="epay_number" name="epay_number" value="{{ $bankinfo->epay_number }}">
        </div>

        <div class="form-group">
            <label for="acc_number">رقم الحساب</label>
            <input class="form-control" id="acc_number" name="acc_number" value="{{ $bankinfo->acc_number }}">
        </div>


        <button type="submit" class="btn btn-primary" style="font-size: 17px;">نشر </button>
        <a type="button" href="{{ route('bank_accounts.index') }}" class="btn btn-warning" style="font-size: 17px;">الرجوع</a>
    </form>
@endsection