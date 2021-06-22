<div>
    @livewire('components.table-products')
                    @if($openModal)
                    @livewire('uploads.dashboard')
                @endif
                    <script>
      window.addEventListener('event:modal', e => {
          if(e.detail.status) {
            document.body.classList.add("overflow-hidden");
        } else {
            document.body.classList.remove("overflow-hidden");
          }
      })
    </script>
</div>
