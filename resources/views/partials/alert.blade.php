 <!-- end page title -->
 @if(session('message'))
     <div class="row mb-2">
         <div class="col-lg-12">
             <div class="alert alert-success alert-dismissible" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="X">
                     <span aria-hidden="true">&times;</span>
                 </button>
                 {{ session('message') }}
             </div>
         </div>
     </div>
 @endif
 @if(session('error'))
     <div class="row mb-2">
         <div class="col-lg-12">
             <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="X">
                     <span aria-hidden="true">&times;</span>
                </button>
                {{ session('error') }}
             </div>
         </div>
     </div>
 @endif
 <!-- @if($errors->count() > 0)
 <div class="alert alert-danger">
     <ul class="list-unstyled">
@foreach($errors->all() as $error)
         <li>{{ $error }}</li>
@endforeach
     </ul>
 </div>
@endif-->
