<div class="col-md-8 form-group">
    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title"
        placeholder="Title" wire:change='updateSlug' wire:model="title" value="{{ old('title')}}" required>
    <p><small class="text-muted" @if (!$slug_exist) hidden @endif><strong>{{ $slug }}</strong> this will be the slug of your product</small></p>
</div>
