<!DOCTYPE html>
<html>
  <head> 

 <base href="/public">
  @include ('admin.css')

    <style type="text/css">

        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin:60px; 
        }

        h1{
            color:white;
        }

        label{
            display: inline-block;
            width: 250px;
            font-size: 18px!important;
            color:white!important;
        }

        input[type='text']{
            width: 350px;
            height: 50px;
        }

        textarea{
            width: 450px;
            height: 80px;
        }

        .input_deg{
            padding:15px;

        }
    </style>
    
  </head>
  <body>
  @include ('admin.header')
    
    @include ('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

                <h1>Edit Room</h1>
            <div class="div_deg">
                <form action="{{url('update_rooms',$data->id)}}" method="post" enctype="multipart/form-data">

                @csrf
                    <div class="input_deg">
                        <label>Room Title</label>
                        <input type="text" name="title" value="{{$data->room_title}}" required>
                    </div>

                    <div class="input_deg">
                        <label>Description</label>
                        <textarea name="description" required >{{$data->description}}</textarea>
                    </div>

                    <div class="input_deg">
                        <label>Price</label>
                        <input type="number" name="price" value="{{$data->price}}" required>
                    </div>

                    <div class="input_deg">
                        <label>Room Type</label>
                        <select name="type">
                            <option value="regular" {{ $data->room_type == 'regular' ? 'selected' : '' }}>Regular</option>
                            <option value="premium" {{ $data->room_type == 'premium' ? 'selected' : '' }}>Premium</option>
                            <option value="deluxe" {{ $data->room_type == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                        </select>
                    </div>

                    <div class="input_deg">
                        <label>Wifi</label>
                        <select name="wifi" required>
                            <option value="yes" {{ $data->wifi == 'yes' ? 'selected' : '' }}>Yes</option>
                            <option value="no" {{ $data->wifi == 'no' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                   

                    
                    <div class="input_deg">
                        <label>Current Image</label>
                        <img height="150" src="room/{{$data->image}}" >
                    </div>
                    <div class="input_deg">
                        <label>Update Image</label>
                        <input type="file" name="image" >
                    </div>

                    <div class="input_deg">
                        
                        <input class="btn btn-primary" type="submit" value="Add Room" >
                    </div>
                </form>
            </div>

          </div>
      </div>
    </div>
  @include('admin.footer')
  </body>
</html>