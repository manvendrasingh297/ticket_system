<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Frontuser;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_id','title','description','assigned_user_comment','assigned_to','assigned_by','status','priority'];

    protected $appends = ['assigned_to_user_name','assigned_by_user_name','ticket_status_name','ticket_priority_name'];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            $ticket->ticket_id = 'TCK' . mt_rand(100000, 999999); // Generate a random ticket ID
        });
    }

    public function getAssignedToUserNameAttribute()
    {  
        $getAssign = User::whereId($this->assigned_to)->first('name');
        return $getAssign->name ?? "";
    }

    public function getAssignedByUserNameAttribute()
    {  
        $getAssign = Frontuser::whereId($this->assigned_by)->first('name');
        return $getAssign->name ?? "";
    }

    public function getTicketStatusNameAttribute()
    {  
        if($this->status==1){
            return "To do";
        }else if($this->status==2){
            return "In Process";
        }else if($this->status==3){
            return "Complete";
        }else if($this->status==4){
           return "Closed"; 
        } 
        return "";
    }

    public function getTicketPriorityNameAttribute()
    {  
        if($this->priority==1){
            return "High";
        }else if($this->priority==2){
            return "Medium";
        }else if($this->priority==3){
            return "Low";
        } 
        return "";
    }
}
