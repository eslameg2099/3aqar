@include('dashboard.errors')

{{ BsForm::text('name') }}

{{ BsForm::number('space')->min(1) }}

{{ BsForm::number('price')->min(1) }}

{{ BsForm::text('address') }}

{{ BsForm::text('latitude') }}

{{ BsForm::text('longitude') }}

{{ BsForm::text('video') }}



<div class="form-group">
    {!! Form::Label('item', 'طريقة العرض') !!}
    <select class="form-control" name="type">
        <option value="1">ملك</option>
        <option value="0">ايجار</option>

    </select>
</div>

<div class="form-group">
    <label>العملاء</label>
    <select name="user_id" class="form-control">
        @foreach($Users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
</div>



<div class="form-group">
    {!! Form::Label('item', 'نوع العميل') !!}
    <select class="form-control" name="user_type">
        <option value="1">مالك</option>
        <option value="2">مسوق</option>
        <option value="3">عميل</option>


    </select>
</div>

<city-select value="{{ $estate->city_id ?? old('city_id') }}"></city-select>
{{ BsForm::textarea('description') }}
<div class="form-group">
    <label>نوع العقار</label>
    <select name="type_id" class="form-control" id="estateTypeSelect" onchange="selectEstateType()">
        <option value="0">اختر</option>
        @foreach($types as $type)
        <option value="{{$type->id}}">{{$type->name}} @if($type->type == "1")ملك @endif @if($type->type == "0")ايجار @endif </option>
        @endforeach
    </select>
</div>


<!-- START HANDLE CUSTOM FIELDS -->
<div class="card card-secondary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#btns-tab" role="tab">
                    زرار
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#text-tab" role="tab">
                    نص
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#switch-tab" role="tab">
                    تبديل
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#number-tab" role="tab">
                    رقم
                </a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="tabs-container">
             <!-- here goes all  -->
        </div>
    </div>
</div>
<!-- END HANDLE CUSTOM FIELDS -->






@isset($estate)
{{ BsForm::image('image')->files($estate->getMediaResource()) }}
@else
{{ BsForm::image('image')->unlimited() }}
@endisset
<script type="text/javascript">

   function removeElement(toBeRemovedDivId) {
        var olddiv = document.getElementById(toBeRemovedDivId);
        if(olddiv){
            document.getElementById("tabs-container").removeChild(olddiv);
        }
    }

    function selectEstateType() {
        // containers
        const tabContentContainer = document.getElementById("tabs-container");
        removeElement("btns-tab")
        removeElement("text-tab")
        removeElement("switch-tab")
        removeElement("number-tab")
        // select estate type element
        const selectedType = document.getElementById("estateTypeSelect")
        fetch(`https://khabir.d.deli.work/api/types/${selectedType.value}/fields`, {
            headers: {
                'Content-Type': 'application/json',
                'Accept-Language':'ar',
            },
        })
        
            .then(res => res.json())
            .then(res => {
                //! tab header must have the same id as the conte</a>nt
                renderElement('btns', res.data.fields.buttons)
                renderElement('text', res.data.fields.text)
                renderElement('switch', res.data.fields.switch)
                renderElement('number', res.data.fields.number)
            })
            
        /**
         * @param tabName = one of the tabs want to display data in
         * @param fetchedObject = data returned according to selected state type
         * @return HTMLNODES
         */
        function renderOptions(arr){
            arr.map(eachOption => `<option> ${eachOption.name} </option>` )
        }

        function renderElement(tabName, fetchedObject) {
           
            if(tabName == 'btns'){
                return tabContentContainer.innerHTML += `
                    <div class="tab-pane" id="${tabName}-tab" role="tabpanel" aria-labelledby="${tabName}-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tw-bg-gray-300 p-4 rounded-lg">
                                    <ul class="list-unstyled mb-0">
                                        ${fetchedObject.map(each => 
                                            `
                                            <li>
                                                <select name="fields[${each.id}]">
                                                    <option value="0"> اختر </option>
                                                    ${each.options.map(eachOption => `<option value="${eachOption.id}"> ${eachOption.name} </option>` )}
                                                </select>
                                                 <label for="${each.id}">
                                                    :${each.label} 
                                                </label>
                                            </li>
                                            `
                                        )}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                `
            } else if (tabName == 'number'){
                
                return tabContentContainer.innerHTML += `
                    <div class="tab-pane" id="${tabName}-tab" role="tabpanel" aria-labelledby="${tabName}-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tw-bg-gray-300 p-4 rounded-lg">
                                    <ul class="list-unstyled mb-0">
                                        ${fetchedObject.map(each => 
                                            `
                                            <li>
                                                <label for="${each.id}">
                                                    :${each.label} 
                                                </label>
                                                <input name="fields[${each.id}]" type="number" id="${each.id}" />
                                            </li>
                                            `
                                        )}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                `
            } else if (tabName == 'text'){
                return tabContentContainer.innerHTML += `
                    <div class="tab-pane" id="${tabName}-tab" role="tabpanel" aria-labelledby="${tabName}-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tw-bg-gray-300 p-4 rounded-lg">
                                    <ul class="list-unstyled mb-0">
                                        ${fetchedObject.map(each => 
                                            `
                                            <li>
                                                <label for="${each.id}">
                                                    :${each.label} 
                                                </label>
                                                <input name="fields[${each.id}]" type="text" id="${each.id}" />
                                            </li>
                                            `
                                        )}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                `
            }else if (tabName == 'switch'){
                return tabContentContainer.innerHTML += `
                    <div class="tab-pane" id="${tabName}-tab" role="tabpanel" aria-labelledby="${tabName}-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tw-bg-gray-300 p-4 rounded-lg">
                                    <ul class="list-unstyled mb-0">
                                        ${fetchedObject.map(each => 
                                            `
                                            <li>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="${each.id}" value="${1}" name="fields[${each.id}]" >
                                                    <label class="custom-control-label" for="${each.id}">:${each.label} </label>
                                                </div>
                                            </li>
                                            `
                                        )}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                `
            }
                
        }
    }
    // end select state type function
</script>