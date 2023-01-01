@extends('layouts.app')

@section('content')





<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto" style="padding:25px; border:5px solid #eee">
        <div class="bg-primary text-center" style="padding:25px; border:5px solid #eee">
              <h3>Bangladesh Bus Transport Purchase Ticket History</h3>
        </div>

        @if (session('priya_success'))
          <div class="bg-warning text-center">
               <h1 >{{ session('priya_success') }}</h1>
          </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                   <th>Id</th>
                   <th>Name</th>
                   <th>From station</th>
                   <th>To station</th>
                   <th>Date</th>
                   <th>Class</th>
                   <th>price</th>
                   <th>quentity</th>
                   <th>Totle Price</th>
                   <th>Ticket date</th>
                   {{-- <th>Status</th>
                   <th>prament</th> --}}
                   <th>Download Ticket</th>
                </tr>
            </thead>

            <tbody>
              @forelse ($ticket_history as $key => $history)
                @if ($history->payment_status==2)


                <tr>
                      <td>{{ $history->id }}</td>
                      <td>{{ App\User::find($history->user_id)->name }}</td>
                      <td>{{ $history->relationship_with_Sub_counter_name->sub_counter}}</td>
                      <td>{{ $history->to_station }}</td>
                      <td>{{ $history->ticket_date }}</td>
                       <td>{{ $history->bus_class }}</td>
                       <td>{{ $history->class_price }} Taka</td>
                       <td>{{ $history->ticket_quentity }} Ticket</td>
                       <td>{{ $history->class_price*$history->ticket_quentity}} Taka</td>

                       <td>
                         <li> {{ $history->created_at->format('h:i:s:A') }}</li>
                          <li> {{ $history->created_at->format('d/m/Y') }}</li>
                          <li> {{ $history->created_at->diffForHumans() }}</li>
                       </td>


                       {{-- <td><p type="text" class="badge  bg-primary">
                         @if ($history->payment_opction==1)
                          {{ 'Card' }}
                           @else

                              {{ 'Mobile Banking' }}
                         @endif
                       </p>

                       </td>
                       <td><p type="text" class="badge  @if ($history->payment_status==2){{ 'bg-success' }}@else{{ 'bg-warning' }}@endif">
                         @if ($history->payment_status==1)
                          {{ 'Unpaid' }}
                           @else

                              {{ 'Paid' }}
                         @endif
                       </p>

                       </td> --}}

                       @if ($history->payment_status==1)
                      <th>  {{ 'Null' }}</th>
                         @else

                           <th> <a href="{{ url('customer/invoice/download') }}/{{ $history->id }}">
              Download Ticket <i class="fa fa-download"></i></a></th>
                       @endif


                    </tr>
                        @endif
                      @empty
                         <tr>
                            <td colspan="50" class="text-center text-danger"><h4>No Data Availavel</h4></td>
                          </tr>
                      @endforelse



          <tbody>
          </table>
      </div>

  </div>
</section>











@endsection
@section('javascript_content')
  <script type="text/javascript" class="init">
    $(document).ready(function() {
      $('#example').DataTable();
    } );
      </script>
@endsection
