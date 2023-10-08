<div class="py-3">
    <div class="mb-3">
        <label for="permission_id" class="form-label">Select Permission </label>
        <select wire:model="permission_id" id="" class="form-select form-control">
            <option value="">--Select Permission--</option>
            @foreach ($permissions as $permission)
                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
            @endforeach
        </select>
        @error('permission_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <button type="button" wire:click="store" wire:loading.remove class="btn btn-md btn-primary">SUBMIT</button>
        <span wire:loading>
            <x-spinner ></x-spinner>
        </span>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
