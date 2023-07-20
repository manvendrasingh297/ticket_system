<x-app-layout>
 
  <link href="{{ asset('front_theme/assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" /> 
  <link href="{{ asset('front_theme/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('front_theme/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> 
  <link href="{{ asset('front_theme/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  
  <link href="{{ asset('front_theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" /> 
  <link href="{{ asset('front_theme/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

  <link href="{{ asset('cdns/jquery.dataTables.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <link href="{{ asset('cdns/buttons.dataTables.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">
          <div class="text-right"> 

        <div class="bg-white shadow-md rounded my-6">  
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
  </main>
</div>

<script src="{{ asset('front_theme/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('front_theme/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front_theme/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('front_theme/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('front_theme/assets/libs/node-waves/waves.min.js') }}"></script> 
<script src="{{ asset('front_theme/assets/js/pages/dashboard.init.js') }}"></script> 
<script src="{{ asset('front_theme/assets/libs/dropzone/min/dropzone.min.js') }}"></script> 
<script src="{{ asset('front_theme/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('front_theme/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script> 
<script src="{{ asset('front_theme/assets/js/pages/datatables.init.js') }}"></script>   
<script src="{{ asset('front_theme/assets/js/app.js') }}"></script>


<script src="{{ asset('cdns/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('cdns/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('cdns/jszip.min.js') }}"></script>
<script src="{{ asset('cdns/pdfmake.min.js') }}"></script>
<script src="{{ asset('cdns/vfs_fonts.js') }}"></script>
<script src="{{ asset('cdns/buttons.html5.min.js') }}"></script>

<script type="text/javascript"> 
         
        $(document).ready(function() { 
       
            if($('#example').length > 0){
                var table = $('#example').DataTable({
                    orderCellsTop: true,
                    fixedHeader: true,
                    processing: true,
                    serverSide: true,
                    ajax: '{!! url("admin/admin-ticket-ajax-list" ) !!}', 
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

</x-app-layout>
