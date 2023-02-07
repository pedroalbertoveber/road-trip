@component('mail::message')
    
  # We have great news, {{ $name }}!

  <p>Your roadtrip to {{ $where_to }} have been scheduled successfully!<br />
  Now, you must add a car and a hotel for this trip.</p>

  <p><a href="http://localhost:8000/{{$id}}">Click Here</a> To add a car or a hotel for your trip.</p>

  <p>Regards,<br />
  RoadTrip App</p>

@endcomponent