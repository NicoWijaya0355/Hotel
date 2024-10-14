
<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        img{
            height: 200px;
            width: 250px;
        }
        .row {
            display: flex;
            flex-wrap: wrap; /* Agar gambar berpindah ke baris berikutnya jika ruang tidak cukup */
            gap: 15px; /* Menambahkan jarak antar gambar */
        }

        .col-md-4 {
            flex: 1 1 30%; /* Mengatur lebar setiap kolom */
        }

    </style>
  <body>
    @include('admin.header')
    
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

        <center>
          <h1>Gallery</h1>
        
          <div class="row d-flex">
            @foreach ($gallery as $data)
                <div class="col-md-4">
                    <img src="/gallery/{{$data->image}}">
                    <a class="btn btn-danger" href="{{url('delete_gallery',$data->id)}}">Delete Image</a>
                </div>
            @endforeach
        </div>

            <form action="{{url('upload_gallery')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <table>
                    <div style="padding:30px">
                        <label style="color:white; font-weight:bold" for="">Upload Image</label>
                        <input type="file" name="image" required>
                    </div>

                    <div>
                        <input class="btn btn-primary" type="submit" value="Add Gallery">
                    </div>
                </table>
            </form>
            </center>
          </div>
        </div>
    </div>
      
        @include('admin.footer')
  </body>
</html>