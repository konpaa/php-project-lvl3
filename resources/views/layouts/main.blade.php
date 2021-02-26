<main class="flex-grow-1">
<div class="jumbotron jumbotron-fluid bg-dark">
    <div class="container-lg">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 mx-auto text-white">
                <h1 class="display-3">Анализатор страниц</h1>
                <p class="lead">Бесплатно проверяйте сайты на SEO пригодность</p>
                <form action="{{route('urls.store')}}" method="post" class="d-flex justify-content-center">
                    <input type="hidden" name="_token">
                    <input type="text" placeholder="https://www.google.com" name="url[name]" class="form-control form-control-lg">
                    <button type="submit" class="btn btn-lg btn-primary ml-3 px-5 text-uppercase">Проверить</button>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
