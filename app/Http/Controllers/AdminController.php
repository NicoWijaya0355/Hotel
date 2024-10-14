<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use Notification;
use App\Notifications\SendEmailNotification;

use Livewire\Exceptions\RootTagMissingFromViewException;    
class AdminController extends Controller
{
    public function index(){
        $room = Room::all();
        $gallery=Gallery::all();
        if(Auth::id()){
            $usertype= Auth()->user()->usertype;
        }

        if($usertype == 'user'){
            return view('home.index',compact('room','gallery'));
        }else if($usertype =='admin'){
            return view('admin.index'); 
        }else{
            return redirect()->back();
        }

    }

    public function home(){
        $room= Room::all();
        $gallery=Gallery::all();
        return view('home.index',compact('room','gallery'));
    }

    public function create_room(){
        return view ('admin.create_room');
    }

    public function add_room(Request $request){

        $data = new Room();

        $data->room_title= $request->title;
        $data->description= $request->description;
        $data->price= $request->price;
        $data->wifi= $request->wifi;
        $data->room_type= $request->type;
        $image=$request->image;

        if($image){

            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        toastr()->timeOut(10000)->closeButton()->success('Room Added Successfully');
        return redirect()->back();
    }

    public function view_rooms(){

        $data=Room::paginate(5);

        return view('admin.view_room',compact('data'));
    }
    public function delete_rooms($id){

        $data=Room::find($id);

        $image_path=public_path('room/'.$data->image);

        if(file_exists($image_path)){

            unlink($image_path);
        }
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->success('Room Deleted Successfully');
        return redirect()->back();
    }

    public function edit_rooms($id){

        $data=Room::find($id);
        return view('admin.edit',compact('data'));
    }

    public function update_rooms(Request $request,$id){
        $data=Room::find($id);
        
        $data->room_title= $request->title;
        $data->description= $request->description;
        $data->price= $request->price;
        $data->room_type= $request->type;
        $data->wifi= $request->wifi;

        $image= $request->image;

        if($image){
            $imagename= time().'.'.$image->getClientOriginalExtension();

             $request->image->move('room',$imagename);

             $data->image=$imagename;
        }

        $data->save();
        toastr()->timeOut(10000)->closeButton()->success('Room Edited Successfully');
        return redirect('view_rooms');
    }

    public function bookings(){
        $data=Booking::paginate(5);
        return view('admin.booking',compact('data'));
    }

    public function delete_booking($id){
        $data=Booking::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->success('Booking Deleted Successfully');
        return redirect()->back();
    }

    public function approve_book($id){

        $booking= Booking::find($id);
        $booking->status='approve';
        $booking->save();
        toastr()->timeOut(10000)->closeButton()->success('Booking Approve Successfully');
        return redirect()->back();
    }

    public function reject_book($id){

        $booking= Booking::find($id);
        $booking->status='rejected';
        $booking->save();
        toastr()->timeOut(10000)->closeButton()->success('Booking Reject Successfully');
        return redirect()->back();
    }

    public function view_gallery(){
        $gallery=Gallery::all();
        return view('admin.gallery',compact('gallery'));
    }

    public function upload_gallery(Request $request){
        
        $data= new Gallery();
        $image=$request->image;

        if($image){

            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('gallery',$imagename);
            $data->image=$imagename;

            $data->save();
            toastr()->timeOut(10000)->closeButton()->success('Gallery Added Successfully');

            return redirect()->back();
        }
    }

    public function delete_gallery($id){
        $data=Gallery::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->success('Gallery Deleted Successfully');
        return redirect()->back();
    }
    public function all_message(){
        
        $data=Contact::paginate(5);
         return view('admin.message',compact('data'));
    }

    public function send_mail($id){

        $data=  Contact::find($id);
        return view('admin.send_mail',compact('data'));
    }

    public function mail(Request $request,$id){

        $data=Contact::find($id);

        $details =[

            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'endline' => $request->endline,

        ];

        Notification::send($data, new SendEmailNotification($details));
        toastr()->timeOut(10000)->closeButton()->success('Email Send Successfully');
        return redirect()->back();
    }

}
