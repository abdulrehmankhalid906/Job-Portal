<style>
.footer {
    margin-top: auto;
}
</style>
<footer class="footer" >
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="mb-0">
                    <a class="text-muted" href="{{ $site->base_url .'/home' ?? '' }}"><strong>{{ $site->title ?? 'TLinker' }} </strong></a> &copy;
                </p>
            </div>
        </div>
    </div>
</footer>
