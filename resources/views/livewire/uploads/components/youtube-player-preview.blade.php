<div>
    <div class="mt-4" id="player" data-plyr-provider="youtube" ratio="2:1" data-plyr-embed-id="{{ $urls }}"></div>
    <script>
      const player = new Plyr('#player', {
        ratio : "16:9"
      });
    </script>
</div>
