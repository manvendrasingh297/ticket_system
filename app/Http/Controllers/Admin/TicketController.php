<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use App\Models\Frontuser;

use Yajra\Datatables\Datatables;


class TicketController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('role_or_permission:Ticket access|Ticket edit|Ticket delete', ['only' => ['index','show']]); 
         $this->middleware('role_or_permission:Ticket edit', ['only' => ['edit','update']]);
         $this->middleware('role_or_permission:Ticket delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        /*$get_ticket= Ticket::paginate(4);

        return view('admin.ticket.index',['get_ticket'=>$get_ticket]);*/

        return view('admin.ticket.index');
    }


    public function AdminTicketAjaxList()
    { 
        $user_id = Auth::user()->id; 
        $user_role = Auth::user();  
        $uROle = $user_role->roles[0]->id;
 
        if($uROle=='1'){
            $user = Ticket::orderBy('id','DESC')->get(); 
        }else{
            $user = Ticket::where('assigned_to',$user_id)->orderBy('id','DESC')->get();  
        }
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
            
            $cr_form = '';

            if(Auth::user()->can('Ticket access')){
                $cr_form .= '<a href="'.route('admin.tickets.show',$query->id).'" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-green-dark text-blue-400">View</a>';

            }

            if(Auth::user()->can('Ticket edit')){
                $cr_form .= '<a href="'.route('admin.tickets.edit',$query->id).'" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>';

            }
            if(Auth::user()->can('Ticket delete')){

                $cr_form .= '<form action="'.route('admin.tickets.destroy', $query->id).'" method="POST" class="inline">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />';
                $cr_form .= '<input type="hidden" name="_method" value="DELETE">';
                $cr_form .= '<button type="submit" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400"
                                title="delete" onclick="return confirm(\'Are you sure you want to delete this record ?\')" >Delete</button>
                            </form>'; 
            }

            return $cr_form;
        })->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $get_ticket_detail = Ticket::where(['id'=>$id])->orderBy('id','DESC')->first(); 
        return view('admin.ticket.show',compact('get_ticket_detail'));
    }

    public function edit($id)
    {  
        $get_ticket_detail = Ticket::where(['id'=>$id])->orderBy('id','DESC')->first(); 

        $getUser = Frontuser::orderBy('name','asc')->get();
        return view('admin.ticket.edit',compact('get_ticket_detail','getUser'));
    }

    public function update(Request $request, Ticket $ticket)
    {  
        $validated = $request->validate([
            'title'=>'required',
            'assigned_user_comment' => 'required',
            'assigned_to' => 'required',
            'status' => 'required',
            'priority' => 'required', 
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
