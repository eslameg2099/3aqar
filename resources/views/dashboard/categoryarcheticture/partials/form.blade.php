@include('dashboard.errors')

@bsMultilangualFormTabs
{{ BsForm::text('name')->label(trans('CategoryArcheticture.attributes.name')) }}

@endBsMultilangualFormTabs



@isset($CategoryArcheticture)
    {{ BsForm::image('image')->files($CategoryArcheticture->getMediaResource()) }}
@else
    {{ BsForm::image('image') }}
@endisset


      

