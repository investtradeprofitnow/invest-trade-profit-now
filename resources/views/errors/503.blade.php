<!doctype html>
    <head>
        <title>Site Maintenance</title>
        <style>
            body
            { 
                text-align: center;
                padding: 150px;
                font-size: 20px; 
                font-family: 'Open Sans';
                color: #333; 
            }
            h1{ 
                font-size: 50px;
            }
            article{ 
                display: block; 
                text-align: left; 
                width: 650px; 
                margin: 0 auto; 
            }
            a{ 
                color: #34bbe3; 
                text-decoration: none; 
                font-weight: bold;
            }
            a:hover{ 
                color: #34bbe3; 
                text-decoration: none; 
            }
        </style>
    </head>
    <body>
        <article>
            <h1>We'll be back soon!</h1>
            <div>
                <p>Sorry for the inconvenience but we';re performing some maintenance at the moment. If you need to you can always <a href="mailto:{{config('app.contact')}}?subject=Query">Contact Us</a>, otherwise we'll be back online shortly!</p>
                <p>&mdash; The Team</p>
            </div>
        </article>
    </body>
</html>