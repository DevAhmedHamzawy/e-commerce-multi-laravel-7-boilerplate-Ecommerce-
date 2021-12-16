<div class="form-group row">
    <label for="subcategories" class="col-md-2 col-form-label text-md-right">أقسام المنتجات</label>

    <div class="col-md-10">
        <select  onchange="getSubCategories(this);" class="form-control">

            <option value="">اختر القسم ...</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>
    </div>
</div>


<div class="form-group row">
    <label for="subcategories" class="col-md-2 col-form-label text-md-right">فروع أقسام المنتجات</label>

    <div class="col-md-10">
        

        <select class="category_id form-control" name="category_id" id="category_id"></select>
        

        </select>

       

        @error('category_id')
            <span class="invalid-feedback" country="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{--<div class="form-group row">
    <label for="code" class="col-md-2 col-form-label text-md-right">الكود</label>

    <div class="col-md-10">
        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

        @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>--}}

<div class="form-group row">

    <label for="appears" class="col-md-2 col-form-label text-md-right">تظهر فى</label>

    <div class="col-md-10">
        <input type="checkbox" name="groups">
        <label>المجموعات</label>
       
        &nbsp;&nbsp;&nbsp;&nbsp;

        <input type="checkbox" name="offers">
        <label>العروض</label>

        &nbsp;&nbsp;&nbsp;&nbsp;

        <input type="checkbox" name="distributions">
        <label>التوزيعات</label>
    </div>
 
</div>


<div class="form-group row">
    <label for="discount" class="col-md-2 col-form-label text-md-right">الخصم</label>

    <div class="col-md-10">
        <input id="discount" type="text" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ old('discount') }}">

        @error('discount')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="description" class="col-md-2 col-form-label text-md-right">الوصف</label>

    <div class="col-md-10">
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror textarea" cols="30" rows="10">{{ old('description') }}</textarea>

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="shipping" class="col-md-2 col-form-label text-md-right">امكانية الشحن</label>

    <div class="col-md-10">

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="shipping" id="inlineRadio1" value="1" checked>
            <label class="form-check-label" for="inlineRadio1">نعم</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="shipping" id="inlineRadio2" value="0">
            <label class="form-check-label" for="inlineRadio2">لا</label>
        </div>

        @error('shipping')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="packing" class="col-md-2 col-form-label text-md-right">إمكانية التغليف</label>

    <div class="col-md-10">

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="packing" id="inlineRadio1" value="1" checked>
            <label class="form-check-label" for="inlineRadio1">نعم</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="packing" id="inlineRadio2" value="0">
            <label class="form-check-label" for="inlineRadio2">لا</label>
        </div>

        @error('packing')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<hr>

<div class="locations_section" style="margin-bottom: 170%;">

<h3>الـــمـــنــاطـــق الـــمـــتـــاحـــة</h3>

<div class="tab">
    @foreach ($areas as $area)
            @php $areaName = explode(' ' ,$area->name); $areaName[0] = $areaName[0].rand(0,9999);  @endphp
            <button class="tablinks" onclick="openCity(event, {{ $areaName[0] }});return false;">{{ $area->name }}</button>
            <div id="{{ $areaName[0] }}" class="tabcontent" style="margin-top: 40%;">
                @foreach ($area->children as $child)
                    <input type="checkbox" name="available_areas[]" value="{{ $child->id }}">
                    <label for="{{ $child->name }}">{{ $child->name }}</label>
                    &nbsp; &nbsp; 
                @endforeach
            </div>
    @endforeach
</div>

</div>


<div class="delivery_section" style="display: none;margin-bottom: 170%;">

    <h3>إمــــكــــانـــيـــة الـــشـــحـــن</h3>

    <div class="tabone">
        @foreach ($areas as $area)
                @php $areaName = explode(' ' ,$area->name); $areaName[0] = $areaName[0].rand(0,9999);  @endphp
                <button class="tablinks" onclick="openCityOne(event, {{ $areaName[0] }});return false;">{{ $area->name }}</button>
                <div id="{{ $areaName[0] }}" class="tabcontentone" style="margin-top: 40%;">
                    @foreach ($area->children as $child)
                        <input type="checkbox" name="available_areas[]" value="{{ $child->id }}">
                        <label for="{{ $child->name }}">{{ $child->name }}</label>
                        &nbsp; &nbsp; 
                    @endforeach
                </div>
        @endforeach
    </div>

</div>


<hr>


<div class="services_section">

<h3>الـــــــخــــــدمـــــــات</h3>

@foreach ($services as $service)

    <div style="margin-bottom: 170%;">

    <input type="checkbox" name="services[]" value="{{ $service->id }}">
    <label for="{{ $service->name }}" style="font-size: 25px; font-weight:bold;">{{ $service->name }}</label>

    <div class="tabtwo">
        @foreach ($areas as $area)
                @php $areaName = explode(' ' ,$area->name); $areaName[0] = $areaName[0].rand(0,9999);  @endphp
                <button class="tablinks" onclick="openCityTwo(event, {{ $areaName[0] }});return false;">{{ $area->name }}</button>
                <div id="{{ $areaName[0] }}" class="tabcontenttwo" style="margin-top: 40%;">
                    @foreach ($area->children as $child)
                        <input type="checkbox" name="services[][]" value="{{ $child->id }}">
                        <label for="{{ $child->name }}">{{ $child->name }}</label>
                        &nbsp; &nbsp; 
                    @endforeach
                </div>
        @endforeach
    </div>

    </div>


@endforeach

</div>


<div class="the_options_one">

</div>