<!doctype html>
<html lang="en">

<head>
    <title>iWeather</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/styles.css">
</head>

<body style="background-image: url('/images/backg-min.jpg');" loading="lazy">
    <section>
        @if (isset($noCityFound))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('noCityFound') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container maindiv p-5 mt-5">
            <form action="/" method="POST">
                @csrf
                <h5 class="mb-3 text-dark" style="font-weight:900;">Find a Forecast</h5>
                <div class="row">
                    <div class="col-sm-10">
                        <input type="text" name="city" id="city" class="form-control"
                            placeholder="Search for Location">
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-danger">Search</button>
                    </div>
                </div>
            </form>
            <hr style="background:black">

            @if (isset($weather) && !isset($noCityFound))
                <div class="row mt-5 d-flex align-items-center">
                    <div class="col-md-8 locdetails">
                        <h6 class="text-dark mb-3" style="font-weight:900;">Location Details :</h6>
                        <p class="specialfont">City - {{ isset($weather['name']) ? $weather['name'] : 'No City Found'  }}</p>
                        <p class="specialfont">Country - {{ isset($weather['sys']['country']) ? $weather['sys']['country'] : 'No Country Found' }}</p>
                        <p class="specialfont">Weather Description - {{ isset($weather['weather'][0]['description']) ? $weather['weather'][0]['description'] : 'Enter Valid City' }}</p>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="weather-icon ">
                            <img src="https://openweathermap.org/img/wn/{{ isset($weather['weather'][0]['icon']) ? $weather['weather'][0]['icon'] : 'no city' }}@2x.png"
                                alt="" class="" loading="lazy">
                            <p class="specialfont specialfont2">{{ isset($weather['weather'][0]['main']) ? $weather['weather'][0]['main'] : 'Enter Valid City' }}</p>
                        </div>
                    </div>
                </div>
                <hr style="background:black">
                <div class="row">
                    <h6 class="text-dark mb-3" style="font-weight:900;">Weather Details</h6>
                    <div class="col-md-6">
                        <p class="specialfont">Current Temperature - {{ isset($weather['main']['temp']) ? $weather['main']['temp'] - 273.15 : '0' }}°C</p>
                        <p class="specialfont">Min Temperature - {{ isset($weather['main']['temp_min']) ? $weather['main']['temp_min'] - 273.15 : '0' }}°C</p>
                        <p class="specialfont">Max Temperature - {{ isset($weather['main']['temp_max']) ? $weather['main']['temp_max'] - 273.15 : '0' }}°C</p>
                    </div>
                    <div class="col-md-6">
                        <p class="specialfont">Humidity - {{ isset($weather['main']['humidity']) ? $weather['main']['humidity'] : '0' }} %</p>
                        <p class="specialfont">Pressure - {{ isset($weather['main']['pressure']) ? $weather['main']['pressure'] : '0' }} mmHg </p>
                        <p class="specialfont">Wind Speed - {{ isset($weather['main']['speed']) ? $weather['main']['speed'] : '0' }} m/s</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
