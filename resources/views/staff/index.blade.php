@extends('layout.template')
        <!-- START DATA -->
        @section('konten')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('staff/create') }}' class="btn btn-primary">+ Add Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">UID</th>
                            <th class="col-md-4">NAME</th>
                            <th class="col-md-2">DIVISION</th>
                            <th class="col-md-2">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstitem() ?>
                        @foreach ($data as $item)

                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->uid }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->division }}</td>
                            <td>
                                <a href='{{ url('staff/'.$item->uid.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                               <form onsubmit="return confirm('apakah kamu yakin menghapus data ini')" class="d-inline" action="{{ url('staff/'.$item->uid)}}" method="POST">
                                @csrf
                                 @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">DEL </button>
                            </form>                         
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                        
                    </tbody>
                </table>
               {{ $data->links()}}
          </div>
          <!-- AKHIR DATA -->
          @endsection
