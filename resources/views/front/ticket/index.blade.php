<x-front-layout> 
    <!-- ccss -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ticket') }} 
        </h2>
    </x-slot>
 
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div> 
    @endif 
    <div class="container-fluid">
 
        <div class="row">
            <div class="col-12">
                <div class="text-right" style="margin-top:4px">
                  <a href="{{ route('ticket.create')}}" class="btn btn-info">New Ticket</a>
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-3">Ticket List</h4>
                        <div class="table-responsive"> 
                            <table id="example" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Ticket Id</th>
                                        <th>Title</th> 
                                        <th>Description</th> 
                                        <th>Assigned User Name</th> 
                                        <th>Status</th>   
                                        <th>Create Date</th> 
                                    <th width="380px">Action</th>

                                    </tr>
                                </thead> 
                                <tbody>   
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> 

    </div>   
 
@section('script') 
    <script type="text/javascript"> 
         
        $(document).ready(function() { 
       
            if($('#example').length > 0){
                var table = $('#example').DataTable({
                    orderCellsTop: true,
                    fixedHeader: true,
                    processing: true,
                    serverSide: true,
                    ajax: '{!! url("ticket-ajax-list" ) !!}', 
                    dom: 'Bfrtip',
                    lengthMenu: [
                        [10, 25, 50, -1],
                        ['10 rows', '25 rows', '50 rows', 'Show all']
                    ],
                    buttons: [
                        'pageLength', 
                        'excelHtml5', 
                    ], 
                    columns:[
                        {data:"DT_RowIndex",name:"DT_RowIndex",orderable:false},
                        { data: 'ticket_id', name: 'ticket_id'}, 
                        { data: 'title', name: 'title'},
                        { data: 'description', name: 'description'}, 
                        { data: 'assigned_to_user_name', name: 'assigned_to_user_name'},  
                        { data: 'ticket_status_name', name: 'ticket_status_name'}, 
                        { data: 'created_at', name: 'created_at'},  
                        { data: 'action', name: 'action', orderable: false, searchable: false},

                    ]
                }); 
            }  
        });
    </script>
@stop
@endsection  
</x-front-layout>


 