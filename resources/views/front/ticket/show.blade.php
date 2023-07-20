<x-front-layout> 
    <!-- ccss -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ticket Details') }} 
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

                        <h4 class="card-title mb-3">Ticket Detail</h4> 
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <tbody> 
                                    <tr>
                                        <td><strong>Ticket Id :</strong></td>
                                        <td>{{ $get_ticket_detail->ticket_id ?? ""}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Title :</strong></td>
                                        <td>{{ $get_ticket_detail->title ?? ""}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Description:</strong></td>
                                        <td>{{ $get_ticket_detail->description ?? ""}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Support User Comment:</strong></td>
                                        <td>{{ $get_ticket_detail->assigned_user_comment ?? ""}}</td>
                                    </tr> 
                                    <tr>
                                        <td><strong>Ticket Assigned To:</strong></td>
                                        <td>{{ $get_ticket_detail->assigned_to_user_name ?? ""}}</td>
                                    </tr>  
                                    <tr>
                                        <td><strong>Status:</strong></td>
                                        <td>{{ $get_ticket_detail->ticket_status_name ?? ""}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            </div> <!-- end col -->
        </div> 

    </div>   
 
 
@endsection  
</x-front-layout>


 