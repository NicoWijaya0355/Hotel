<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
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
    </style>
  <body>
    @include('admin.header')
    
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <table class="table_deg">
                    <tr>
                        <th>Room_id</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Arrival Date</th>
                        <th>Leaving Date</th>
                        <th>Status</th>
                        <th>Room Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Status Update</th>
                        

                    </tr>
                     @foreach ($data as $datas)
                     
                 
                    <tr>
                        <td>{{$datas->room_id}}</td>
                        <td>{{$datas->name}}</td>
                        <td>{{$datas->email}}</td>
                        <td>{{$datas->phone}}</td>
                        <td>{{$datas->start_date}}</td>
                        <td>{{$datas->end_date}}</td>

                        

                        <td>
                          @if($datas->status == 'approve')
                          <span style="color:skyblue">Approved</span>
                          @endif
                          
                          @if($datas->status == 'rejected')
                          <span style="color:red">Rejected</span>
                          @endif

                          @if($datas->status == 'waiting')
                          <span style="color:yellow">Waiting</span>
                          @endif
                       </td>
                       
                        <td>{{$datas->room->room_title}}</td>
                        <td>{{$datas->room->price}}</td>
                        <td>
                            <img style="height:80px; width:120px" src="/room/{{$datas->room->image}}">
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_booking',$datas->id)}}">Delete</a>
                        </td>

                        <td>
                          <span style="padding-bottom:10px">
                            <a class="btn btn-success" href="{{url('approve_book',$datas->id)}}">Approve</a>
                          </span>
                        
                          <a class="btn btn-warning" href="{{url('reject_book',$datas->id)}}">Rejected</a>
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
      </div>
      
        @include('admin.footer')
  </body>
</html>