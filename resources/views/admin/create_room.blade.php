<!DOCTYPE html>
<html>
  <head> 

 
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

                <h1>Add Room</h1>
            <div class="div_deg">
                <form action="{{url('add_room')}}" method="post" enctype="multipart/form-data">

                @csrf
                    <div class="input_deg">
                        <label>Room Title</label>
                        <input type="text" name="title" required>
                    </div>

                    <div class="input_deg">
                        <label>Description</label>
                        <textarea name="description" required ></textarea>
                    </div>

                    <div class="input_deg">
                        <label>Price</label>
                        <input type="number" name="price" required>
                    </div>

                    <div class="input_deg">
                        <label>Room Type</label>
                        <select name="type" >
                            <option selected value="regular">Regular</option>
                            <option value="premium">Premium</option>
                            <option value="deluxe">Deluxe</option>
                        </select>
                    </div>

                    <div class="input_deg">
                        <label>Wifi</label>
                        <select name="wifi" >
                            <option selected value="yes">Yes</option>
                            <option value="no">No</option>
                            
                        </select>
                    </div>
                   

                    

                    <div class="input_deg">
                        <label>Image</label>
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