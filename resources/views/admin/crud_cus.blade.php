<a href="{{ route('logout') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Logut</a>
<br />
<a href="{{ route('dashboard.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah informasi</a>

 <br / >

 @if(Session::has('pesan'))
   {{ Session::get('pesan') }}
   @endif
<table>
<tr>
<th>#</th>
<th>Judul informasi</th>
<th>Gambar Upload</th>
<th>Tanggal upload</th>
<th>action</th>
<tr>  
     @php
      $no = 1
     @endphp
    @foreach($data as $rest)
    <tr>
    <td>{{ $no }} </td>
    <td>{{ $rest->judul }}</td>
        <td><img src="{{ Url('image/'.$rest->gambar) }}" style="height:100;width:100px"></td>
        <td>{{ $rest->tanggal }}</td>
        <td><a href="{{ route('dashboard.edit',$rest->id) }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Edit</a>
             <form action="{{ route('dashboard.destroy', $rest->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
             </form> 
    </td>
    </tr>     
    @php
        $no++
    @endphp
@endforeach
 </table>