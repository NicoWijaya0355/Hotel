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

          <h1>Message</h1>
          <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Send Email</th>
                        

                    </tr>
                     @foreach ($data as $datas)
                     
                 
                    <tr>
                        <td>{{$datas->name}}</td>
                        <td>{{$datas->email}}</td>
                        <td>{{$datas->phone}}</td>
                        <td>{{$datas->message}}</td>
                        <td>
                            <a class="btn btn-success" href="{{url('send_mail',$datas->id)}}">Send Email</a>
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