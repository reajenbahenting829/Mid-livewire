<div>
    <div class="container">
        @if ($message = Session::get('message'))
            <div class="alert alert-success alert-block mt-2 ms-auto col-md-4 d-flex">
                <div class="mt-1">
                    <strong>{{ $message }}</strong>
                </div>
                <div class="btn close ms-auto" data-dismiss="alert">x</div>
            </div>
        @endif
        <div class="row mx-auto mt-5 mb-2 d-flex justify-content-between">
            <div class="col-md-4 text-white mb-5">
                <div class="card" style="height: 550px; background-color:rgb(203, 66, 130)">
                    <div class="mt-2 mx-4">
                        <input type="search" wire:model="search" class="form-control input" placeholder="Search">
                    </div>
                    <div class="mx-4">
                        <label>Genre</label>
                        <div class="form-check">
                            <input wire:model='byAcoustic' class="form-check-input" type="checkbox" value="Acoustic"
                                id="Acoustic">
                            <label class="form-check-label" for="Acoustic">Acoustic</label>
                        </div>
                        <div class="form-check">
                            <input wire:model='byJazz' name="Jazz" class="form-check-input" type="checkbox"
                                value="Jazz" id="Jazz">
                            <label class="form-check-label" for="Jazz">Jazz</label>
                        </div>
                        <div class="form-check">
                            <input wire:model='byBlues' name="Blues" class="form-check-input" type="checkbox"
                                value="Blues" id="Blues">
                            <label class="form-check-label" for="Blues">Blues</label>
                        </div>
                        <div class="form-check">
                            <input wire:model='byReggae' class="form-check-input" type="checkbox" value="Reggae"
                                id="Reggae">
                            <label class="form-check-label" for="Reggae">Reggae</label>
                        </div>
                        <div class="form-check">
                            <input wire:model='byClassical' class="form-check-input" type="checkbox" value="Classical"
                                id="Classical">
                            <label class="form-check-label" for="Classical"> Classical</label>
                        </div>
                    </div>
                    <br>
                    <div class="ms-3" style="width: 250px;">
                        <label>Location</label>
                        <select class="form-select" wire:model="byLocation">
                            <option value="all">Select Location</option>
                            @foreach ($musicbands as $music)
                                <option value="{{ $music->location }}">{{ $music->location }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <div class="ms-3">
                        <label for="customRange2">Rate</label><br>
                        <input type="range" class="form-range" min="1000" max="20000" id="customRange2"
                            style="width: 250px;" wire:model='byRate'>
                        <p>P{{ $this->byRate }}</p>
                    </div>
                    <div class="ms-3" style="width: 250px;">
                        <label for="">Sort by</label>
                        <select name="" id="" class="form-control" wire:model='srtBy'>
                            <option value="asc">Lowest to Highest</option>
                            <option value="desc">Highest to Lowest</option>
                        </select>
                    </div>
                    <button class="btn btn-primary col-md-6 mt-2 ms-auto me-3" wire:click='resetFilters' type='button'>
                        Reset Filter
                    </button>

                </div>
            </div>
            <div class="col-md-8">
                <div class="d-flex justify-content-between ms-auto me-3">
                    <h3 class="fst-italic text-white">Play your Favorite Band</h3>
                    <a type="button" class="ms-auto mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white"
                            class="bi bi-person-fill-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path
                                d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                        </svg>
                    </a>
                    @include('livewire.music.create')

                </div>
                <div class="row">
                    @foreach ($musicbands as $music)
                        <div data-bs-toggle="modal" data-bs-target="#viewBand{{ $music->id }}"
                            class="card mb-3 buttonpage me-3" style="max-width: 390px;">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage') }}/{{ $music->image }}" class="img-fluid mt-2 mb-2"
                                        alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $music->bandName }}</h6>
                                        <label class="card-text"><span class="fst-italic">Location: </span> <span
                                                class="fw-semibold"> {{ $music->location }} </span></label>
                                        <label class="card-text"><span class="fst-italic">Rate: </span> <span
                                                class="fw-semibold">P{{ $music->rate }} </span></label><br>
                                        <label class="card-text"><span class="fst-italic">Genre: </span> <span
                                                class="fw-semibold"> {{ $music->genre }} </span></label>
                                    </div>
                                </div>
                            </div>
                            @include('livewire.music.delete')
                            @include('livewire.music.viewPage')
                        </div>
                        @include('livewire.music.edit')
                    @endforeach

                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            {{ $musicbands->links() }}
        </div>
    </div>
</div>
