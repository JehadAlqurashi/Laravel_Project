<html>

<head>
    <title>create Offers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li class="nav-item active">
          <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }} <span class="sr-only">(current)</span></a>
        </li>
        @endforeach

      </ul>

    </div>
  </nav>
    <body>
        <p id="message"></p>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">OFFER NAME</th>
                <th scope="col">PRICE</th>
                <th scope="col">DETAILS</th>
              </tr>
            </thead>
            <tbody >
                    @foreach($offers as $offer)
                    <tr name="after{{$offer->id}}">
                    <td>{{$offer->id}}</td>
                    <td>{{$offer->name}}</td>
                    <td>{{$offer->price}}</td>
                    <td>{{$offer->details}}</td>
                    <td><a href="{{route("ajax.edit",$offer->id)}}"><button class="btn-success">{{__("check.edit")}}</button></a></td>
                    <td><button offer-id="{{$offer->id}}" name="delete" class="btn-danger">{{__('check.delete')}}</button></td>
                    </tr>
                    @endforeach


            </tbody>
          </table>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>


$(document).on('click','button[name="delete"]',function(evt){
console.log("hello")
evt.preventDefault();
var offer = $(this).attr("offer-id")
console.log(offer)
$.ajax({
    url: "{{route('ajax.delete')}}",
    type: 'POST',
    data: {
        _token:"{{csrf_token()}}",
        id:offer,

    },
    success: function (response) {
        $("#message").text(response.msg);
        $('tr[name="after'+response.id +'"]').remove();

    },
    error: function (request, status, error) {

    }
    ,
    dataType: "json",
 });

});
</script>

