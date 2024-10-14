<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    <style>
        .h1_deg{
            font-size: 30px;
            font-weight: bold;
        }
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
            font-size: 14px;
        }

        textarea{
            width: 350px;
            height: 80px;
        }

        .input_deg{
            padding:15px;

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
                <div class="h1_deg">
                    <h1>Mail send to {{$data->email}}</h1>

                    <form action="{{url('mail',$data->id)}}" method="post" >

                @csrf
                    <div class="input_deg">
                        <label>Greeting</label>
                        <input type="text" name="greeting" required>
                    </div>

                    <div class="input_deg">
                        <label>Mail Body</label>
                        <textarea name="body" required ></textarea>
                    </div>
                    
                    <div class="input_deg">
                        <label>Action text</label>
                        <input type="text" name="action_text" required>
                    </div>
                    <div class="input_deg">
                        <label>Action Url</label>
                        <input type="text" name="action_url" required>
                    </div>

                    <div class="input_deg">
                        <label>End Line</label>
                        <input type="text" name="endline" required>
                    </div>
                   

                   

                    <div class="input_deg">
                        
                        <input class="btn btn-primary" type="submit" value="Send Mail" >
                    </div>
                </form>
                </div>
            </center>
            </div>
        </div>
     </div>
      
        @include('admin.footer')
  </body>
</html>