 @extends('admin.layouts.master')
 @section('content')
     @include('sweetalert::alert')
     <div class="container-fluid pt-4 px-4">
         <div class="row g-4">
             @foreach ($zones as $zone)
                 @if ($zone->parent_id == 1)
                     <div class="col-sm-1 col-xl-2">
                         <button data-id="{{ $zone->id }}" type="button" class="btn btn-primary showzone"><i class="bi bi-cloud"></i> {{ $zone->name }} </button>
                     </div>
                 @endif
             @endforeach
         </div>
     </div>
     <div class="container-fluid pt-4 px-4">
         <div class="row g-4">
         </div>
     </div>
 @endsection
