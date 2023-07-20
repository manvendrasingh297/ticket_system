<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Frontuser; 
use Yajra\Datatables\Datatables;
use App\Models\Ticket; 
use DB;
use Hash;
use Auth;

use Illuminate\Support\Arr;
    
class TicketController extends Controller
{
    public function index(Request $request)
    {     
        return view('front.ticket.index'); 
    }
       
    public function TicketAjaxList()
    { 
        $user_id = Auth::guard('front')->user()->id;   

        $user = Ticket::where('assigned_by',$user_id)->orderBy('id','DESC')->get();
        return Datatables::of($user) 
        ->addIndexColumn()
         ->addColumn('ticket_id', function($query){
            try {
                return $query->ticket_id;
            } catch (\Exception $exception){

            }
        })
         ->addColumn('title', function($query){
            try {
                return $query->title;
            } catch (\Exception $exception){

            }
        })
        ->addColumn('description', function($query){
            try {
                return $query->description;
            } catch (\Exception $exception){

            }
        })
        ->addColumn('assigned_to_user_name', function($query){
            try {
                return $query->assigned_to_user_name;
            } catch (\Exception $exception){

            }
        })
        ->addColumn('ticket_status_name', function($query){
            try {
                return $query->ticket_status_name;
            } catch (\Exception $exception){

            }
        })
        ->addColumn('created_at', function($query){  
            return date('Y-m-d h:i a',strtotime($query->created_at));
        })
        ->addColumn('action', function($query){
            
            $cr_form = '<a href="'.route('ticket.show',$query->id).'" class="btn btn-primary btn-sm">View</a><a href="'.route('ticket.edit',$query->id).'" class="btn btn-success btn-sm">Edit</a><form action="'.route('ticket.destroy', $query->id).'" method="POST" class="inline">
                            <input type="hidden" name="_token" value="'.csrf_token().'" />';
            $cr_form .= '<input type="hidden" name="_method" value="DELETE">';
            $cr_form .= '<button type="submit" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400 btn-sm"
                            title="delete" onclick="return confirm(\'Are you sure you want to delete this record ?\')" >Delete</button>
                        </form>'; 

            return $cr_form;
        })->rawColumns(['action'])
        ->make(true);
    }
     

    public function create()
    {  
        return view('front.ticket.create');
        
    }
     
    public function store(Request $request)
    { 
        $user_id = Auth::guard('front')->user()->id;   

        $request->validate([
            'title'=>'required',
            'description' => 'required'
        ]);
        $user = Ticket::create([
            'title'=>$request->title,
            'description'=>$request->description, 
            'assigned_by'=>$user_id,
        ]); 
        return redirect()->back()->withSuccess('Ticket created !');

    }
     
    public function show($id)
    {
        $user_id = Auth::guard('front')->user()->id;    
        $get_ticket_detail = Ticket::where(['id'=>$id,'assigned_by'=>$user_id])->orderBy('id','DESC')->first(); 
        return view('front.ticket.show',compact('get_ticket_detail')); 
        
    }
     
    public function edit($id)
    {
        $user_id = Auth::guard('front')->user()->id;    
        $get_ticket_detail = Ticket::where(['id'=>$id,'assigned_by'=>$user_id])->orderBy('id','DESC')->first(); 
        return view('front.ticket.edit',compact('get_ticket_detail'));
    }
    
    public function update(Request $request, Ticket $ticket)
    { 
        $validated = $request->validate([
            'title'=>'required',
            'description' => 'required'
        ]);

        // $validated['status'] = $request->status;


        $ticket->update($validated);
 
        return redirect()->back()->withSuccess('Ticket updated !');
    } 

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->back()->withSuccess('Ticket deleted !');
    }
}