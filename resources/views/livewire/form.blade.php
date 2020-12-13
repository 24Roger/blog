<div class="form-group">
    <label>
        Titulo
    </label>
    <input type="text"
           class="form-control"
           wire:model="tittle"
    >
    @error('tittle')
        <span>
            {{$message}}
        </span>
    @enderror
</div>

<div class="form-group">
    <label>
        Contenido
    </label>
    <textarea class="form-control"
              wire:model="body">

    </textarea>

    @error('body')
    <span>
            {{$message}}
        </span>
    @enderror
</div>
