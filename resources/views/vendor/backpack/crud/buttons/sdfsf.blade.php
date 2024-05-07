@if ($crud->hasAccess('sdfsf'))
  <a href="{{ url($crud->route.'/'.$entry->getKey().'/sdfsf') }}" class="btn btn-sm btn-link text-capitalize"><i class="la la-question"></i> sdfsf</a>
@endif