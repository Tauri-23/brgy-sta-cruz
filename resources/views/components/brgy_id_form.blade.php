<div class="w-50 d-flex flex-direction-y gap3">
    <div>
        <label for="name-in" class="text-l3">Name</label>
        <input type="text" class="edit-text-1 w-100" id="name-in" value="{{$resident->firstname}} {{$resident->lastname}}" disabled>
    </div>
    <div>
        <label for="address-in" class="text-l3">Address</label>
        <input type="text" class="edit-text-1 w-100" id="address-in" value="{{$resident->address}}" disabled>
    </div>
    <div>
        <label for="phone-in" class="text-l3">Phone</label>
        <input type="text" maxlength="10" class="edit-text-1 w-100" id="phone-in" value="{{$resident->phone}}" disabled>
    </div>
    <div>
        <label for="tin-in" class="text-l3">TIN <span class="text-m3">optional</span></label>
        <input type="text" maxlength="12" class="edit-text-1 w-100" id="tin-in">
    </div>
    <div>
        <label for="sss-in" class="text-l3">SSS <span class="text-m3">optional</span></label>
        <input type="text" maxlength="10" class="edit-text-1 w-100" id="sss-in">
    </div>
    <div>
        <label for="bdate-in" class="text-l3">Birth Date</label>
        <input type="date" class="edit-text-1 w-100" id="bdate-in" value="{{$resident->bdate}}" disabled>
    </div>
    <div>
        <label for="bdate-place-in" class="text-l3">Birth Place</label>
        <input type="text" class="edit-text-1 w-100" id="bdate-place-in">
    </div>
    <div>
        <label for="blood-type-in" class="text-l3">Blood Type <span class="text-m3">optional</span></label>
        <input type="text" class="edit-text-1 w-100" id="blood-type-in">
    </div>
</div>