<div class="grid grid-cols-12 gap-4">
    <div class="col-span-6 lg:col-span-4 xl:col-sapn-3">
        <x-input name="name" label="Country Name" value="{{$country->name ?? ''}}"  />
    </div>

    <div class="col-span-6 lg:col-span-4 xl:col-sapn-3">
        <x-input name="code" label="Country Code" value="{{$country->code ?? ''}}"/>
    </div>

    <div class="col-span-6 lg:col-span-4 xl:col-sapn-3">
        <x-input name="currency" label="Country Currency" value="{{$country->currency ?? ''}}"/>
    </div>

    <div class="col-span-6 lg:col-span-4 xl:col-sapn-3">
        <x-input name="currency_code" label="Currency Code" value="{{$country->currency_code ?? ''}}"/>
    </div>

    <div class="col-span-6 lg:col-span-4 xl:col-sapn-3">
        <x-input name="currency_symbol" label="Currency Symbol" value="{{$country->currency_symbol ?? ''}}"/>
    </div>

    <div class="col-span-6 lg:col-span-4 xl:col-sapn-3">
        <x-input name="flag" label="Flag" type="file" value="{{$country->flag ?? ''}}"/>
    </div>
</div>