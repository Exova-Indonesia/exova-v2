<div
    wire:ignore
    x-data
    x-init="() => {
        const post = FilePond.create($refs.submitFiles);
        post.setOptions({
            server: {
                process:(fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes->whereStartsWith('wire:model')->first() }}', file, load, error, progress)
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes->whereStartsWith('wire:model')->first() }}', filename, load)
                },
            },
            credits: false,
            acceptedFileTypes: {!! $attributes->get('acceptedFileTypes') ?? 'null' !!},
            allowFileSizeValidation: {!! $attributes->has('allowFileSizeValidation') ? 'true' : 'false' !!},
            allowMultiple: {!! $attributes->has('allowMultiple') ? 'true' : 'false' !!},
            maxFileSize: {!! $attributes->has('maxFileSize') ? "'".$attributes->get('maxFileSize')."'" : 'null' !!},
            maxFiles: {!! $attributes->has('maxFiles') ? "'".$attributes->get('maxFiles')."'" : 'null' !!}
        });
        this.addEventListener('pondReset', e => {
            post.removeFiles();
        });
    }"
>
    <input type="file" x-ref="submitFiles" />
</div>
@push('styles')
    @once
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    @endonce
@endpush
@push('scripts')
    @once
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
        <script>
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginImagePreview);
        </script>
    @endonce
@endpush