 @foreach ($errors as $er)
     {{ $er }}
 @endforeach

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
  @csrf
  @if ($edit == 1)
        {{ method_field('put') }}
  @endif 
  <table>
 <tr>
 <td>Judul</td><td><input type="text" name="judul" value="{{ $judul }}"></td> 
          @if($gambar != '')
           <img src="{{ $gambar }}" style="width:100px;heigth:100px">       
          @else
          @endif 
          <td>Gambar</td><td><input type="file" name="gambar"></td>
 <td>Isi</td><td><input type="text" name="isi" value="{{ $isi }}"></td>
     <td></td><td><input type="submit" name="kirim" value="kirim data"></td>  
</table>
</form>    
