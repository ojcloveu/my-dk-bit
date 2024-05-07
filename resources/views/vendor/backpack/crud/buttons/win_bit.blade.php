@if ($crud->hasAccess('winBit'))
	<a href="javascript:void(0)" onclick="winBitGlobalWithConfirmationOperation(this)" class="btn btn-outline-primary" data-style="zoom-in">
	    <span><i class="la la-question"></i> My Bet</span>
    </a>
@endif

@push('after_scripts')
<script>
	if (typeof winBitGlobalWithConfirmationOperation != 'function') {
	    function winBitGlobalWithConfirmationOperation(button) {
            $.ajax({
                url: "{{ url($crud->route) }}/win-bit",
                type: 'POST',
                success: function() {
                    // Show an alert with the result
                    new Noty({
                    type: "success",
                    text: "{{ trans('backpack::base.success') }}!"
                }).show();
                    crud.checkedItems = [];
                    crud.table.draw(false);
                },
                error: function() {
                    // Show an alert with the result
                    new Noty({
                        type: "danger",
                        text: "<strong>{!! trans('backpack::base.error') !!}</strong><br> {!! trans('backpack::base.unknown_error') !!}"
                    }).show();
                }
            });
        }
	}
</script>
@endpush
