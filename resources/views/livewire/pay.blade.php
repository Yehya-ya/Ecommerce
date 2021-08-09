<div>
    <div class="d-flex justify-content-center m-2">
        <div class="btn-group" role="group">
            <button type="button" class="btn" wire:click="decrement">-</button>
            <button type="button" class="btn btn-primary">{{ $count }}</button>
            <button type="button" class="btn" wire:click="increment">+</button>
        </div>
    </div>
    <div class="d-flex justify-content-center m-2">
        <h4>${{$price}}</h4>
    </div>
    <input type="hidden" name="quantity" value="{{$count}}">
</div>
