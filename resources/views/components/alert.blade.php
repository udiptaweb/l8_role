<div>
    <script>
        Livewire.on('success', msg => {
            toastr.success(msg)
        })
        Livewire.on('info', msg => {
            toastr.info(msg)
        })
        Livewire.on('warning', msg => {
            toastr.warning(msg)
        })
        Livewire.on('danger', msg => {
            toastr.error(msg)
        })
    </script>
</div>
