<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Boolpress</title>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div id="page-wrapper">
      <main>
        <section id="home">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <h1 class="text-center">Boolpress</h1>
              </div>
            </div>
          </div>  {{-- Closing Section-Home page-wrapper --}}
        </section>
      </main>
    </div>  {{-- Closing page-wrapper --}}
  </body>
</html>
