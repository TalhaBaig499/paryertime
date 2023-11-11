@extends('layout.master')
@section('content')
    @php
        // if (isset($_POST['submit']) || !isset($_POST['submit'])) {
        //     $city = $_POST['city'];
        //     // $country = $_POST['country'];
        // }
    @endphp

    @if (!isset($form))
        <div class="background">
            @include('layout.header')
            <h1 class="text-center position-absolute top-50 start-0 end-0 text-uppercase">and allah invites to the home of
                peace</h1>

        </div>
        <div class="container my-4">
            <form action="{{ route('namaz.time') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <select name="country" id="countrySelect" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->shortname == $country ? 'selected' : '' }}>
                                    {{ $user->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-6">
                        <select name="city" id="citySelect" class="form-control">
                            <option selected="{{ $city }}">{{ $city }}</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary my-2">Submit</button>
            </form>
            <div class="row">
            <div class="col-md-4 col-sm-12 result">
                <p class="text-white fw-bold h5">اللہ</p>

                <h1>Namaz Timings for {{ $city }}, {{ $country }} </h1>
                <p>Date: {{ $date['readable'] }}</p>

                <ul>
                    <li>Fajr: {{ $timings['Fajr'] }}</li>
                    <li>Sunrise: {{ $timings['Sunrise'] }}</li>
                    <li>Dhuhr: {{ $timings['Dhuhr'] }}</li>
                    <li>Asr: {{ $timings['Asr'] }}</li>
                    <li>Maghrib: {{ $timings['Maghrib'] }}</li>
                    <li>Isha: {{ $timings['Isha'] }}</li>

                    <li>Hijri: {{ $date['hijri']['date'] }}</li>
                </ul>
                <p value="">{{ $methodArray['name'] }}</p>
            </div>
            <div class="col-md-8 col-sm-12">
                <img src="{{asset('pictures/leftside.jpg')}}" alt="" width="auto" height="10%">
            </div>
            </div>
        </div>
    @else
        <h1>Namaz Timings for {{ $city }}, {{ $country }} </h1>
        <p>Date: {{ $date['readable'] }}</p>
        <ul>
            <li>Fajr: {{ $timings['Fajr'] }}</li>
            <li>Sunrise: {{ $timings['Sunrise'] }}</li>
            <li>Dhuhr: {{ $timings['Dhuhr'] }}</li>
            <li>Asr: {{ $timings['Asr'] }}</li>
            <li>Maghrib: {{ $timings['Maghrib'] }}</li>
            <li>Isha: {{ $timings['Isha'] }}</li>

            <li>Hijri: {{ $date['hijri']['date'] }}</li>
        </ul>
        <p value="">{{ $methodArray['name'] }}</p>
    @endif
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#countrySelect').on('change', function() {
                var countryId = $(this).val();
                if (countryId) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('city') }}", // Use route function to get the URL
                        data: {
                            id: countryId
                        },
                        success: function(data) {
                            // Populate the city dropdown with received data
                            var citySelect = $('#citySelect');
                            citySelect.empty();
                            citySelect.append($('<option value="">Select a city</option>'));
                            $.each(data, function(key, value) {
                                citySelect.append($('<option value="' + value + '">' +
                                    value + '</option>'));
                            });
                        }
                    });
                } else {
                    $('#citySelect').html('<option value="">Select a city</option>');
                }
            });
        });
    </script>

@endsection
