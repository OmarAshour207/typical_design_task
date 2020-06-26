@if (count($subcategories) > 0)
    <ul class="dropdown-menu">
        <li class="dropdown-submenu">
            @foreach($subcategories as $category)
                <a class="dropdown-item" href="#" href="#" data-parent="{{ $category->parent }}" data-id="{{ $category->id }}"> {{ $category->title }} </a>
            @endforeach
        </li>
    </ul>
@endif
