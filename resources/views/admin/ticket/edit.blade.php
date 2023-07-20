<x-app-layout>
 
  <link href="{{ asset('front_theme/assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" /> 
  <link href="{{ asset('front_theme/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('front_theme/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> 
  <link href="{{ asset('front_theme/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  
  <link href="{{ asset('front_theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" /> 
  <link href="{{ asset('front_theme/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

  <link href="{{ asset('cdns/jquery.dataTables.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <link href="{{ asset('cdns/buttons.dataTables.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />

  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">
          <div> 
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
        <div class="bg-white shadow-md rounded my-6 p-5">
                <p class="text-2xl mb-4 font-bold text-gray-800">Edit Ticket ({{$get_ticket_detail->ticket_id }})</p>
                <form method="POST" action="{{ route('admin.tickets.update', $get_ticket_detail->id) }}" >
                  @csrf
                  @method('put')

                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                      <label class="block tracking-widetext-gray-700 select-none font-medium mb-2" for="grid-first-name">
                        Title*
                      </label> 
                      <input type="text" name="title" placeholder="Title" class="appearance-none block w-full text-gray-700 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white border-gray-300" value="{{ $get_ticket_detail->title }}" />

                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                      <label class="block tracking-widetext-gray-700 select-none font-medium mb-2" for="grid-first-name">
                        Priority
                      </label>
                      <select class="form-control" name="priority"  style="width:100%" >
                          <option value="">Select Priority</option>
                          <option {{ ($get_ticket_detail->priority==1) ? 'selected' : '' }} value="1">High</option>
                          <option {{ ($get_ticket_detail->priority==2) ? 'selected' : '' }} value="2">Medium</option>
                          <option {{ ($get_ticket_detail->priority==3) ? 'selected' : '' }} value="3">Low</option>  
                      </select>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">  
                    
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                      <label class="block tracking-widetext-gray-700 select-none font-medium mb-2" for="grid-first-name">
                        Status
                      </label>
                      <select class="form-control" name="status"  style="width:100%" >
                          <option {{ ($get_ticket_detail->status==1) ? 'selected' : '' }} value="1">To do</option>
                          <option {{ ($get_ticket_detail->status==2) ? 'selected' : '' }} value="2">In Progress</option>
                          <option {{ ($get_ticket_detail->status==3) ? 'selected' : '' }} value="3">Complete</option>
                          <option {{ ($get_ticket_detail->status==4) ? 'selected' : '' }} value="4">Close</option> 
                      </select>
                    </div>

                    <div class="w-full md:w-1/2 px-3">
                      <label class="block tracking-widetext-gray-700 select-none font-medium mb-2" for="grid-first-name">
                        Assigned To
                      </label>
                      <select class="form-control select2" name="assigned_to" style="width:100%" >
                        <option value="">Select User</option>
                        @foreach($getUser as $uVal)
                            <option {{ ($get_ticket_detail->assigned_to==$uVal->id) ? 'selected' : '' }} value="{{ $uVal->id }}">{{ $uVal->name }}</option>
                        @endforeach 
                      </select>
                    </div> 
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/2 px-3">
                      <label class="block tracking-widetext-gray-700 select-none font-medium mb-2" for="grid-last-name">
                        Description*
                      </label>
                      <textarea readonly name="description" class="appearance-none block w-full text-gray-700 border border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ $get_ticket_detail->description }}</textarea>

                    </div>
                    <div class="w-full md:w-1/2 px-3">
                      <label class="block tracking-widetext-gray-700 select-none font-medium mb-2" for="grid-last-name">
                        Support User Comment*
                      </label>
                      <textarea name="assigned_user_comment" class="appearance-none block w-full text-gray-700 border border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ $get_ticket_detail->assigned_user_comment }}</textarea>

                    </div>
                </div> 

                <div class="text-center mt-16">
                  <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Update</button>
                </div>
              </div>



      </div>
  </main>
</div>
<script src="{{ asset('front_theme/assets/libs/jquery/jquery.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

 <script>
    $(document).ready(function() {  
        $('.select2').select2();
    });
</script>

</x-app-layout>
