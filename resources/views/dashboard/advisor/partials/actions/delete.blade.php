    <a href="#city-{{$advisor->id }}-delete-model"
       class="btn btn-outline-danger btn-sm"
       data-toggle="modal">
        <i class="fas fa fa-fw fa-trash"></i>
    </a>


    <!-- Modal -->
    <div class="modal fade" id="city-{{ $advisor->id}}-delete-model" tabindex="-1" role="dialog"
         aria-labelledby="modal-title-{{ $advisor->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-{{ $advisor->id }}">@lang('cities.dialogs.delete.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    هل تريد حذف سعر المتر لهذة المدينة؟
                </div>
                <div class="modal-footer">
                    {{ BsForm::delete(route('dashboard.advisor.destroy', $advisor->id)) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('cities.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn btn-danger">
                        @lang('cities.dialogs.delete.confirm')
                    </button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
