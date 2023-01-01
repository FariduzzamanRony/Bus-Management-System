
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<section>
  <div class="col-lg-8 m-auto">
  <div class="main" style="background-color: rgb(255, 79, 26);">

      <h3 style="background-color: #e0006c!important;text-align:center;color:#fff; padding;font width:700;padding:30px">Bangladesh Bus Transport Ticket</h3>

    <div class="lol" style="background-color: rgb(255, 79, 26);">
      <p style="text-align:center;">Bus Deraction : {{ $history->relationship_with_Sub_counter_name->sub_counter}} TO {{ $history->to_station }}</p>

      <p style="text-align:center;">Ticket Date : {{ $history->ticket_date }}</p>
        <p style="text-align:center;">Bus Name:  {{ $history->bus_name}}</p>
        <p style="text-align:center;">Bus Time:  {{ $history->bus_time}}</p>
        <p style="text-align:right; padding-right: 30px; color:#111">After : {{ $history->created_at->diffForHumans() }}</p>
        <p style="text-align:right; color:#111;padding-right: 30px;">INVOICE ID: {{ $cookies_generated }}</p>
        <div class="box" style="text-align:center; background-color: rgb(255, 79, 26);float:left;font-weight:500;color:#fff;width:50%;height:250;">

               <p>Name : {{ App\User::find($history->user_id)->name }}</p>
                <p>Quentity :  {{ $history->ticket_quentity }} Tecket</p>
                <p>Ticket Price : {{ $history->class_price }} Taka</p>
                <p>Line Route : {{ $history->bus_route }} </p>
                    <p>Brack Time : {{ $history->breck_time }} Minutes</p>







        </div>
        <div class="box" style="text-align:center; background-color: rgb(255, 79, 26);float:left;font-weight:500;color:#fff;width:50%;height:250;">
         <p>Ticket By Date : {{ $history->created_at->format('d/m/Y') }}</p>
          <p>Ticket Class : {{ $history->bus_class }} </p>
            <p>Totle : {{ $history->class_price*$history->ticket_quentity}} Taka</p>
            <p>Journey Time : {{ $history->journey_time }} Hours</p>
            <p>Ticket By Time : {{ $history->created_at->format('h:i:s:A') }}</p>
        </div>

    </div>

  </div>
  </div>
</section>

</body>
</html>
