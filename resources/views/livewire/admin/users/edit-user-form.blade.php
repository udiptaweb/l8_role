<div class="p-3 row">
    <div class="mb-3 col-md-4 col-lg-4">
        <label for="name" class="form-label">Name</label>
        <input type="text"  wire:model.lazy="name" class="form-control form-control-sm" id="name"
            placeholder="Name">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3 col-md-4 col-lg-4">
        <label for="email" class="form-label">Email</label>
        <input type="text"  wire:model.lazy="email" class="form-control form-control-sm" id="email"
            placeholder="Email">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3 col-md-4 col-lg-4">
        <label for="password" class="form-label">Password</label>
        <input type="password"  wire:model.lazy="password" class="form-control form-control-sm" id="password"
            placeholder="Password">
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3 col-md-4 col-lg-4">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password"  wire:model.lazy="password_confirmation" class="form-control form-control-sm" id="password_confirmation"
            placeholder="Password Confirmation">
        @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-12">
        <button wire:click="store" wire:loading.remove class="btn btn-md btn-primary" type="button">SUBMIT</button>
        <span wire:loading>
            <x-spinner></x-spinner>
        </span>
    </div>
</div>
