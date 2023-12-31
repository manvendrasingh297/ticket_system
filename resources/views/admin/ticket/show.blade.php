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
          <div> 

        <div class="bg-white shadow-md rounded my-6"   style="padding: 15px;"  > 
            <table class="table table-striped mb-0">
                                <tbody> 
                                    <tr>
                                        <td style="background: #e5e7eb33; padding: 1px;"><strong>Ticket Id </strong></td>
                                        <td>{{ $get_ticket_detail->ticket_id ?? ""}}</td>
                                    </tr>
                                    <tr>
                                        <td style="background: #e5e7eb33; padding: 1px;"><strong>Title </strong></td>
                                        <td>{{ $get_ticket_detail->title ?? ""}}</td>
                                    </tr>
                                    <tr>
                                        <td style="background: #e5e7eb33; padding: 1px;"><strong>Description </strong></td>
                                        <td>{{ $get_ticket_detail->description ?? ""}}</td>
                                    </tr>
                                    <tr>
                                        <td style="background: #e5e7eb33; padding: 1px;"><strong>Support User Comment </strong></td>
                                        <td>{{ $get_ticket_detail->assigned_user_comment ?? ""}}</td>
                                    </tr> 
                                    <tr>
                                        <td style="background: #e5e7eb33; padding: 1px;"><strong>Ticket Generated By </strong></td>
                                        <td>{{ $get_ticket_detail->assigned_by_user_name ?? ""}}</td>
                                    </tr>
                                    <tr>
                                        <td style="background: #e5e7eb33; padding: 1px;"><strong>Ticket Assigned To </strong></td>
                                        <td>{{ $get_ticket_detail->assigned_to_user_name ?? ""}}</td>
                                    </tr>  
                                    <tr>
                                        <td style="background: #e5e7eb33; padding: 1px;"><strong>Status </strong></td>
                                        <td>{{ $get_ticket_detail->ticket_status_name ?? ""}}</td>
                                    </tr>

                                    <tr>
                                        <td style="background: #e5e7eb33; padding: 1px;"><strong>Priority </strong></td>
                                        <td>{{ $get_ticket_detail->ticket_priority_name ?? ""}}</td>
                                    </tr>
                                    <tr>
                                        <td style="background: #e5e7eb33; padding: 1px;"><strong>Create Date </strong></td>
                                        <td>{{ date('Y-m-d h:i a',strtotime($get_ticket_detail->created_at))}}</td>
                                    </tr>
                                </tbody>
                            </table>
        </div>

      </div>
  </main>
</div>
 

</x-app-layout>
