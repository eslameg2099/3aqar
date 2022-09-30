@can('restore', $engineering_office)
    <a href="#engineering_office-{{ $engineering_office->id }}-restore-model"
       class="btn btn-outline-primary btn-sm"
       data-toggle="modal">
        <i class="fas fa fa-fw fa-trash-restore"></i>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="engineering_office-{{ $engineering_office->id }}-restore-model" tabindex="-1" role="dialog"
         aria-labelledby="modal-title-{{ $engineering_office->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="modal-title-{{ $engineering_office->id }}">@lang('engineering_offices.dialogs.restore.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('engineering_offices.dialogs.restore.info')
                </div>
                <div class="modal-footer">
                    {{ BsForm::post(route('dashboard.engineering_offices.restore', $engineering_office)) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('engineering_offices.dialogs.restore.cancel')
                    </button>
                    <button type="submit" class="btn btn-primary">
                        @lang('engineering_offices.dialogs.restore.confirm')
                    </button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@endcan
