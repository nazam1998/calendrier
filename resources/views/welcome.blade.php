@extends('layouts.app')
@if (Auth::check())
@section('content')

<div class="container">
    <div class="response"></div>
    <div id='calendar'></div>
</div>

@endsection
@section('js')
<script src="{{asset('js/calendar.js')}}"></script>
<script type="text/javascript">

$(document).ready(function () {
    var SITEURL = "{{url('/')}}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: SITEURL + "/event",
        displayEventTime: true,
        editable: true,
        timeFormat: 'H(:mm)',
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: false,
        selectHelper: false,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url: SITEURL + "/event/create",
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent', {
                    title: title,
                    start: start,
                    end: end,
                    allDay: allDay
                }, true);
            }
            calendar.fullCalendar('unselect');
        },
        eventDrop: function (event, delta) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            $.ajax({
                url: SITEURL + '/event/'+event.id,
                data: 'title=' + event.title + '&start=' + start + '&end=' + end +
                    '&id=' + event.id,
                type: "PUT",
                success: function (response) {
                    displayMessage("Updated Successfully");
                }
            });
        },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "DELETE",
                    url: SITEURL + '/event/'+event.id,
                    data: "&id=" + event.id,
                    success: function (response) {
                        if (parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event
                                .id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }
    });
});

function displayMessage(message) {
    $(".response").html("" + message + "");
    setInterval(function () {
        $(".success").fadeOut();
    }, 1000);
}

</script>
@endsection

@else
 @section('content')
    <h1 class="text-center">
    Vous devez vous <a href="{{route('login')}}">connecter</a> ou <a href="{{route('login')}}">vous inscrire</a>
    </h1>
    @endsection
@endif
@section('css')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
    integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<link rel="stylesheet" href="{{asset('css/app.css')}}">

@endsection
