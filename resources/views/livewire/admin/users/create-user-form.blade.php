<form wire:submit.prevent="submit">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirm">Confirm Password</label>
                    <input type="password" wire:model="password_confirmation" class="form-control" id="confirm" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <label for="role">Select Role</label>
                    <select wire:model="role" id="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="">--Select--</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>

    </div>
    <div class="card-footer text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
