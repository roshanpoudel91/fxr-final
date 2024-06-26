<html>

<head>
    <title>
        FXR - Page Add
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('shopify.css') }}">
</head>

<body>


    <form action="/page/save" method="POST">
        @csrf
        <main class="main-wrapper">
            <div class="container">
                <header class="main-header">
                    <img class="main-logo" src="{{ URL::asset('fxr-site-logo-svg.svg') }}" alt="FXR" />
                </header>
                        @if(session()->has('message'))
                            <div class="alert">
                                {{ session()->get('message') }}
                            </div>
                            </br>
                @endif

                <div class="page-field-wrap">
                    <input type="text" name="title" placeholder="Enter Page Title" required class="page-title-field" />
                    <img src="{{ URL::asset('icon-edit.svg') }}" alt="icon" />
                </div>

                @include('body_html')
                <button class="btn-primary"  type="submit">Save</button>
            </div>
        </main>
    </form>

   
</body>

</html>