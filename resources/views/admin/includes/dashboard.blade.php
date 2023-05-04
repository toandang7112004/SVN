 @extends('admin.layouts.master')
 @section('content')
 @include('sweetalert::alert')
     <div class="container-fluid pt-4 px-4">
         <div class="bg-secondary text-center rounded p-4">
             <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
             <div class="row">
                 <div style="margin: 5px 0px;" class="col-sm-12">
                     @foreach ($zones as $z)
                         @if ($z->parent_id == 1)
                             <button data-id="{{ $z->id }}" type="button" class="btn btn-primary showzone">
                                 {{ $z->name }} </button>
                         @endif
                     @endforeach
                     <hr>
                 </div>
             </div>
             <div id="myModal" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                             <h4 class="modal-title">Modal Header</h4>
                         </div>
                         <div class="modal-body">
                             <p>Some text in the modal.</p>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>
                     </div>

                 </div>
             </div>
             <div id="zone-display-request" class="row">
                 <div id="zone-display" class="row">

                 </div>
             </div>
         @endsection
         @section('css')
             <style type="text/css">
                 .info {
                     text-align: left
                 }

                 .info i {
                     float: left;
                     font-size: 12px !important;
                     margin-top: 3px;
                     margin-right: 15px
                 }

                 .info {
                     font-size: 12px
                 }

                 .weather-category ul li h5 {
                     font-size: 12px
                 }
             </style>
         @endsection
         @section('js')
             <script>
                 //showzone
                 $(".showzone").on("click", function() {
                     var id = $(this).attr('data-id');
                     showzone(id);

                 })

                 function showzone(id) {
                     $.ajax({
                         url: 'http://127.0.0.1:8000/zone/readzone/' + id,
                         method: 'GET',
                         dataType: 'json',
                         encode: true,
                         success: function(data) {
                             $('#zone-display').html(data);
                         }
                     })
                 }
                 //checkout
                 $(document).on('click', '.checkout', function(e) {
                     var room = $(this).attr('data-id');
                     checkout(room);
                 })

                 function checkout(room) {
                     $.ajax({
                         url: 'http://127.0.0.1:8000/zone/checkout/' + room,
                         method: 'GET',
                         dataType: 'json',
                         encode: true,
                         success: function(data) {
                             showzone(data)
                         }
                     })
                 }
                 //Bill
                 $(document).on('click', '.checkbill', function(e) {
                     var room = $(this).attr('data-id');
                     bill(room);
                 })

                 function bill(room) {
                     $.ajax({
                         url: 'http://127.0.0.1:8000/zone/bill/' + room,
                         method: 'GET',
                         dataType: 'json',
                         encode: true,
                         success: function(data) {
                             $('#myModal .modal-body').html(data);
                         }
                     })
                 }
                 //request
                 $(document).on('click', '.checkrequest', function(e) {
                     var room = $(this).attr('data-id');
                     listrequestroom(room);
                 });
                 function listrequestroom(room){
                    $.ajax({
                         url: 'http://127.0.0.1:8000/zone/request/' + room,
                         method: 'GET',
                         dataType: 'json',
                         encode: true,
                         success: function(data) {
                             $('#myModal').show();
                             $('#myModal .modal-body').html(data);
                         }
                     })
                 }
             </script>
         @endsection
