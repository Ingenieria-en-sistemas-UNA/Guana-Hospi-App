<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">GuanaHospi</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="navbar-nav mr-auto d-lg-none">
            @include('includes.sidebar')
        </ul>
        <div class="mr-auto"></div>
        <span class="navbar-text">
            {{ auth()->user()->role->nombre_role }}
        </span>
    </div>
</nav>
