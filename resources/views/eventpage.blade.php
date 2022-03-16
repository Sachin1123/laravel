<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
   </head>
<body>
<h1 style="text-align:center;"> Event Calendar - Full Calendar </h1>
  <div class="container">
    <div class=" jumbotron">
      <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <p> {{ \session::get('success')}} </p>
                </div>
            @endif
          <a href="/addeventurl" class="btn btn-success"> Add Events </a>
          <a href="/editeventurl" class="btn btn-primary"> Edit Events </a>
          <a href="/deleteeventurl" class="btn btn-danger"> Delete Events </a>   
      </div>
<br>

      <div class="row">
            <div class="col-md-8 col-md-offset-2">
                 <div class="panel panel-default">
                      <div class="panel-heading" style="background: #2e6da4; color: white">
                      Event Calendar [Full - Calendar]
                      </div>
                    <div class="panel-body">
                   {!! $calendar->calendar() !!}
                    </div>
                  </div>
            </div>
      </div>
    </div>
  </div>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js">
  </script>
  {!! $calendar->script() !!}
</body>
</html>