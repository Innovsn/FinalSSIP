@extends('layout.template')   
      <!-- START FORM -->
      @section('konten')


     <form action='{{url('staff')}}' method='post'>
       @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{  url('staff') }}' class=" btn btn-secondary"><< back </a>
            <div class="mb-3 row">
                <label for="uid" class="col-sm-2 col-form-label">UID</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='uid' value="{{Session::get('uid')}}" id="uid">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">NAME</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='name' value="{{Session::get('name')}}" id="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="division" class="col-sm-2 col-form-label">DIVISION</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='division'value="{{Session::get('division')}}" id="division">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="division" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SAVE</button></div>
            </div>
        </div>
    </form>
        <!-- AKHIR FORM -->
        @endsection