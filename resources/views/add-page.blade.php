<html>
    <head>
        <title>
             Page Add
        </title>
        <link rel="stylesheet" href="{{ URL::asset('shopify.css') }}">
       
    </head>

    <body>
        <form action="/page/save" method="POST">
        @csrf
        <h1>Add Page</h1></br>
        <input type="text" name="title" placeholder="Title"/></br></br>
        <!-- <input type="text" name="body_html" placeholder="HTML Body"/></br></br></br> -->
        @include('html_body')
        <button class="save-button" type="submit">Save</button>
        </form>
    </body>
</html>