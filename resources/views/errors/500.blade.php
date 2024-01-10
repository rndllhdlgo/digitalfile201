
<head>
    @include('cdn.head')
</head>

<body>
    @include('cdn.body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-center" style="min-height: 100vh;">
                <div>
                    <h2>500 - Internal Server Error</h2>
                    <p>Sorry, something went wrong on our end. Please <span class="fw-bold">REFRESH THE PAGE</span>, or if it keeps happening, contact the <b>ADMINISTRATOR</b>.</p>
                    <input type="hidden" value="{{ $errorMessage }}">
                </div>
            </div>
        </div>
    </div>
</body>
