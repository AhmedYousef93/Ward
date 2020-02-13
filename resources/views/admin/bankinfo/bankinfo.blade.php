@extends('admin.app')

@section('main-content')
@include('includes.messages')
    <form role="form" action="{{route('bank_accounts.store')}}" method="post">
    	@csrf
      <div class="form-group">
            <label for="bank_name">اسم البنك</label>
            <input class="form-control" id="bank_name" name="bank_name" placeholder="">
        </div>

        <div class="form-group">
            <label for="acc_owner">اسم مالك الحساب</label>
            <input class="form-control" id="acc_owner" name="acc_owner" placeholder="">
        </div>

        <div class="form-group">
            <label for="epay_number">رقم ال(epay)</label>
            <input class="form-control" id="epay_number" name="epay_number" placeholder="">
        </div>

        <div class="form-group">
            <label for="acc_number">رقم الحساب </label>
            <input class="form-control" id="acc_number" name="acc_number" placeholder="">
        </div>


        <button type="submit" class="btn btn-primary" style="font-size: 17px;">نشر </button>
        <a type="button" href="{{ route('bank_accounts.index') }}" class="btn btn-warning" style="font-size: 17px;">الرجوع</a>
    </form>    
@endsection