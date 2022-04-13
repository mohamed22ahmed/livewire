<div class="d-flex ml-2">
    <form action="{{ route('get_results') }}">
        <input type="hidden" name="page" value="1">
        <input type="hidden" name="q" wire:model="q">

        <select class="form-control" onclick="submitting()" wire:model="sortBy" name="sortBy">
            @foreach($groups as $key => $sort)
                <option value="{{ $key }}">{{ $sort }}</option>
            @endforeach
        </select>
        <button hidden type="submit" id="buttonForSubmit">Submit</button>
    </form>
</div>

@livewireScripts
<script>
    function submitting(){
        document.getElementById('buttonForSubmit').click()
    }
</script>
