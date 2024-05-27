@if($isEditUser())
    <div class="card" style="width: 18rem;">
        <img src="{{ $imageUrl }}" class="card-img-top" alt="{{ $title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $title }}</h5>
            <p class="card-text">{{ $text }}</p>
            <a href="{{ $link }}" class="btn btn-primary">{{ $linkText }}</a>
        </div>
    </div>
@endif
