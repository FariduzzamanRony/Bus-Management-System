
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<section>
  <div class="col-lg-8 m-auto">
  <div class="main">

      <h3 style="background-color: #e0006c!important;text-align:center;color:#fff; padding;font width:700;padding:30px">Bangladesh Bus Transport Ticket</h3>

    <div class="lol">
      <p style="text-align:center;">Bus Deraction : {{ $customer_invoices_sent_gmails->relationship_with_Sub_counter_name->sub_counter}} TO {{ $customer_invoices_sent_gmails->to_station }}</p>

      <p style="text-align:center;">Ticket Date : {{ $customer_invoices_sent_gmails->ticket_date }}</p>
        <p style="text-align:center;">Bus Name:  {{ $customer_invoices_sent_gmails->bus_name}}</p>
        <p style="text-align:center;">Bus Time:  {{ $customer_invoices_sent_gmails->bus_time}}</p>
        <p style="text-align:right; padding-right: 30px; color:#111">After : {{ $customer_invoices_sent_gmails->created_at->diffForHumans() }}</p>
        <div class="box" style="text-align:center;float:left;font-weight:500;color:#e0006c;width:50%;height:350;">

               <p>Name : {{ App\User::find($customer_invoices_sent_gmails->user_id)->name }}</p>
                <p>Quentity :  {{ $customer_invoices_sent_gmails->ticket_quentity }} Tecket</p>
                <p>Ticket Price : {{ $customer_invoices_sent_gmails->class_price }} Taka</p>
                <p>Line Route : {{ $customer_invoices_sent_gmails->bus_route }} </p>
                <p>Brack Time : {{ $customer_invoices_sent_gmails->breck_time }} Minutes</p>






        </div>
       <div class="box" style="text-align:center;float:left;font-weight:500;color:#e0006c;width:50%;height:350;">
         <p>Ticket By Date : {{ $customer_invoices_sent_gmails->created_at->format('d/m/Y') }}</p>
          <p>Ticket Class: {{ $customer_invoices_sent_gmails->bus_class }}</p>
            <p>Totle : {{ $customer_invoices_sent_gmails->class_price*$customer_invoices_sent_gmails->ticket_quentity}} Taka</p>
            <p>Journey Time : {{ $customer_invoices_sent_gmails->journey_time }} Hours</p>
                  <p>Ticket By Time : {{ $customer_invoices_sent_gmails->created_at->format('h:i:s:A') }}</p>
        </div>

    </div>

  </div>
  </div>
</section>

</body>
</html>
