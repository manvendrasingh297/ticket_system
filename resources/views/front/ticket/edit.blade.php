<x-front-layout> 
    <!-- ccss -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Ticket') }} ({{$get_ticket_detail->ticket_id }})
        </h2>
    </x-slot>
 
@section('content')

    <div class="container">
 
        <div class="row">
            <div class="col-12">
                <div class="text-right" style="margin-top:4px">
                  <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-12">
                <div class="card">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                          <p>{{ $message }}</p>
                        </div> 
                    @endif 
                    @if (count($errors) > 0)
                      <div class="alert alert-danger">
                        <strong>Whoops!</strong>Something went wrong.<br><br>
                        <ul>
                           @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                      </div>
                    @endif

                    <div class="card-body">

                        <h4 class="card-title mb-3">Edit Ticket ({{$get_ticket_detail->ticket_id }})</h4>
                        
                        <form action="{{ route('ticket.update', $get_ticket_detail->id) }}" method="POST" class="inline">
                        @csrf 
                            <input type="hidden" name="_method" value="put"> 
                            <div class="row"> 
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="companyname" class="form-label">Title*</label> 
                                        <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $get_ticket_detail->title }}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description*</label>  
                                        <textarea name="description" class="form-control">{{ $get_ticket_detail->description }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Support User Comment</label>  
                                        <textarea name="description" class="form-control" disabled>{{ $get_ticket_detail->assigned_user_comment }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status*</label>   

                                        <select disabled class="form-select" name="status">
                                            <option {{ ($get_ticket_detail->status==1) ? 'selected' : '' }} value="1">To do</option>
                                            <option {{ ($get_ticket_detail->status==2) ? 'selected' : '' }} value="2">In Progress</option>
                                            <option {{ ($get_ticket_detail->status==3) ? 'selected' : '' }} value="3">Complete</option>
                                            <option {{ ($get_ticket_detail->status==4) ? 'selected' : '' }} value="4">Closed</option> 
                                        </select>
                                    </div>
                                </div>  
                            </div>
                            <div class="btnbox text-right">
                                <button type="submit" class="btn btn-info w-md">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> 

    </div>   
 
 
@endsection  
</x-front-layout>


 