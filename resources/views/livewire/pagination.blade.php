@php
    $params = request()->all();
    $page = isset($params['page'])?$params['page']:1;
    $q = $params['q'];
    $sortBy = $params['sortBy'];
@endphp
<nav class="d-md-flex justify-content-between align-items-center pt-0" aria-label="Page navigation">
    <div class="text-center text-md-left mb-3 mb-md-0">
        Showing {{ $from }} – {{ $to }} of {{ $itemsCount }} results
    </div>

    <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
        <li class="page-item">
            <button type="submit" name="page" class="btn page-link" {{ $page == 1 ? 'disabled' : '' }} value="{{ $page - 1 }}">Previous</button>
        </li>

        @for ($i = $pageStr; $i <= $pageEnd; $i++)
            <li class="page-item">
                <input type="submit" class="btn page-link" style=" {{ $i == $page ? 'background-color:gray;color:white' : '' }}" value="{{ $i }}" name="page">
            </li>
        @endfor

        <li class="page-item">
            <button type="submit" name="page" class="btn page-link" {{ $page == ceil($itemsCount/$elementsPerPage) ? 'disabled' : '' }} value="{{ $page+1 }}">Next</button>
        </li>
    </ul>
</nav>

<!-- qwqqwe -->
