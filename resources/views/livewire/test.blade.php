<nav
class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center gray"
data-nav="brand-center">
    <div class="navbar-container d-flex content">
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item nav-search">
                <div class="search-input">
                    <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="search">
                    <div class="search-input-close"><i data-feather="x"></i></div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

{{-- Search Start Here --}}
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center">
      <a href="javascript:void(0);">
        <h6 class="section-label mt-75 mb-0">Files</h6>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between w-100" href="#">
        <div class="d-flex">
          <div class="me-75">
            <img src="#" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">Two new item submitted</p>
            <small class="text-muted">Marketing Manager</small>
          </div>
        </div>
        <small class="search-data-size me-50 text-muted">&apos;17kb</small>
      </a>
    </li>
    <li class="d-flex align-items-center">
      <a href="javascript:void(0);">
        <h6 class="section-label mt-75 mb-0">Members</h6>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
        <div class="d-flex align-items-center">
          <div class="avatar me-75">
            <img src="#" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">John Doe</p>
            <small class="text-muted">UI designer</small>
          </div>
        </div>
      </a>
    </li>
  </ul>

  {{-- if main search not found! --}}
  <ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between">
      <a class="d-flex align-items-center justify-content-between w-100 py-50">
        <div class="d-flex justify-content-start">
          <span class="me-75" data-feather="alert-circle"></span>
          <span>No results found.</span>
        </div>
      </a>
    </li>
  </ul>
  {{-- Search Ends --}}
  <!-- END: Header-->
