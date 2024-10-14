<!DOCTYPE html>
<html>
  <head> 
    @include ('admin.css')

    <style type="text/css">

        .div_deg{

            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        .table_deg{
            border: 2px solid greenyellow;
        }

        th{
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding:15px;
        }

        td{
            border: 1px solid skyblue;
            text-align: center;
            color:white;
        }

        input[type="search"]{
            
            width: 500px;
            height: 60px;
            margin-right: 10px;
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

          
            <!-- <form action="{{url('room_search')}}" method="get">
                @csrf
                <input type="search" name="search">
                <input type="submit" class="btn btn-success" value="search">
            </form> -->
     
            <!-- <h3>Print room: 
                    <a class="btn btn-secondary" href="{{url('print_room')}}">Print PDF </a>
            </h3> -->
            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Room Title</th>
                        <th>Description</th>
                        <th>Room Type</th>
                        <th>Price</th>
                        <th>Wifi</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                     @foreach ($data as $rooms)
                     
                 
                    <tr>
                        <td>{{$rooms->room_title}}</td>
                        <td>{!!Str::limit($rooms->description, 50)!!}</td>
                        <td>{{$rooms->room_type}}</td>
                        <td>{{$rooms->price}}</td>
                        <td>{{$rooms->wifi}}</td>
                        <td> 
                            <img height="120" width="120" src="room/{{$rooms->image}}">
                        </td>
                        <td><a class="btn btn-success" href="{{url('edit_rooms', $rooms->id)}}">Edit</a></td>
                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_rooms', $rooms->id)}}">Delete</a>
                        </td>
                    </tr>

                    @endforeach
                </table>

                
            </div>
                <div class="div_deg">
                    {{$data->onEachSide(1)->links()}}
                </div>
                
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
     @include ('admin.footer')
 
  </body>
</html>