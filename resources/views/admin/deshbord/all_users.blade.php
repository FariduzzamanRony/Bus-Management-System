@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header"> <a class="btn btn-info" href="{{ url('home') }}">{{ __('Back') }}</a> </div>

                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif


                  </div>
              </div>
              @if (session('block'))
                  <div class="alert alert-danger" role="alert">
                      {{ session('block') }}
                  </div>
              @endif
              @if (session('delete'))
                  <div class="alert alert-danger" role="alert">
                      {{ session('delete') }}
                  </div>
              @endif
              @if (session('unblock'))
                  <div class="alert alert-primary" role="alert">
                      {{ session('unblock') }}
                  </div>
              @endif
              @if (session('success'))
                  <div class="alert alert-success" role="alert">
                      {{ session('success') }}
                  </div>
              @endif
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                         <th>NO</th>
                         <th>ID</th>
                         <th>Role</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Phone</th>
                         <th>Age</th>
                         <th>Birth Date</th>
                         <th>Gander </th>
                         <th>Action </th>


                      </tr>
                  </thead>

                  <tbody>
                    @forelse ($uesrs as  $uesrsall)
                           <tr>
                             <td>{{ $uesrs->firstItem()+$loop->index}}</td>
                             <td>{{ $uesrsall->id}}</td>
                             <td>
                               @if ($uesrsall->role==1)
                                 <p type="text" class="badge  bg-primary">{{ 'Admin' }}</p>

                               @elseif ($uesrsall->role==2)
                                   <p type="text" class="badge  bg-success">{{ 'Customer' }}</p>
                                 @elseif ($uesrsall->role==3)
                                            <p type="text" class="badge  bg-danger">{{ 'Block' }}</p>
                               @endif
                             </td>
                             <td>{{ $uesrsall->name}}</td>
                             <td>{{ $uesrsall->email}}</td>
                             <td>{{ $uesrsall->phone}}</td>
                             <td>{{ $uesrsall->age}}</td>
                             <td>{{ $uesrsall->birth}}</td>
                             <td>{{ $uesrsall->gender}}</td>

                             <td>

                                   @if ($uesrsall->role==2)
                                       <a class="badge btn btn-danger" href="{{ url('delete') }}/{{ $uesrsall->id }}">delete</a>
                                    <a class="badge btn btn-warning" href="{{ url('user/block') }}/{{ $uesrsall->id }}">Block</a>
                                  @elseif ($uesrsall->role==3)
                                    
                                      <a class="badge btn btn-warning" href="{{ url('user/Unblock') }}/{{ $uesrsall->id }}">Unblock</a>
                                    @endif



                             </td>
                          </tr>
                    @empty
                       <tr>
                          <td colspan="50" class="text-center text-danger"><h4>No Data Availavel</h4></td>
                        </tr>
                    @endforelse



                <tbody>
                </table>
        {{ $uesrs->links() }}
          </div>
      </div>
  </div>



@endsection

@section('javascript_content')
  <script type="text/javascript" class="init">
    $(document).ready(function() {
      $('#example').DataTable();
    } );
      </script>
@endsection
