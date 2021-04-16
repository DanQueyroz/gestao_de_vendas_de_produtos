<!-- Exibindo success -->
@if (Session::has('success'))
<div id="alert" class="alert alert-success alert-dismissible fade show mt-2 text-center" role="alert">
  <strong>{{ Session::get('success') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Exibindo errors -->
@if (Session::has('error'))
<div id="alert" class="alert alert-danger alert-dismissible fade show mt-2 text-center" role="alert">
  <strong>{{ Session::get('error') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Exibindo messages -->
@if (Session::has('message'))
<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
  <strong>{{ Session::get('message') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif