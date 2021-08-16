<div class="input-group mb-3">
    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
        aria-expanded="false">{{ $symbol }}</button>
    <ul class="dropdown-menu" style="margin: 0px;">
        @foreach (config('currency.currencies') as $currency)
            <li>
                <button type="button" class="dropdown-item" wire:click.prevent="change('{{ $currency }}')">
                    {{ config('currency.symbols.' . $currency) . ' ' . $currency }}
                </button>
            </li>
        @endforeach
    </ul>
    <input type="hidden" type="number" name="cid" wire:model="cid">
    <input type="number" id="value" class="form-control @error('value') is-invalid @enderror" name="value"
        placeholder="Price" value="{{ $price }}" min="0" required>
    <span class="input-group-text">.</span>
    <input type="number" id="decimal" class="form-control @error('decimal') is-invalid @enderror" name="decimal"
        placeholder="00" value="{{ $decimal }}" max="99" min="0" required>
</div>
