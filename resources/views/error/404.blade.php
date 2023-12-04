<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            <div class="card shadow-lg border-0 rounded-lg mt-5 mx-auto" style="width: 30rem;">
                <h3 class="card-header display-1 text-muted text-center">
                    404
                </h3>

                <span class="card-subtitle mb-2 text-muted text-center">
                    Page Could Not Be Found
                </span>

                <div class="card-body mx-auto">
                    <a type="button" href="{{ route('dashboard')}}" class="btn btn-sm btn-info text-white"> Back To Home </a>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>