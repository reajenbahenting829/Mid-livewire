<div>
    <div wire:ignore.self class="modal fade" id="viewBand{{ $music->id }}" tabindex="-1" aria-labelledby="viewBandLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border border-success rounded-3 border-3" style="color:rgb(33, 230, 108)">
                <div class="modal-body">
                    <div class="d-flex justify-content-between ms-5">
                        <img src="{{ asset('storage') }}/{{ $music->image }}" class="rounded-circle"
                            style="width:200px; height:200px" alt="...">
                        <div class="mx-auto mt-5">
                            <h3 class="text-center fw-bold font-Ks">{{ $music->bandName }}</h3>

                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <label class="text-center fw-light">Since {{$music->year_started}}    ||</label>
                        <label class="text-center fw-light">&nbsp;{{$music->groupNum}} Performers and growing</label>
                    </div>

                    <hr>
                    <p class="text-center">{{ $music->description }}</p>

                    <div class="d-flex justify-content-center">

                        <a class="btn btn-success ms-1" type="button" data-bs-toggle="modal"
                            wire:click="editMusicband({{ $music->id }})" data-bs-target="#updateMusicband">
                            Edit
                        </a>
                        <a type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $music->id }}"
                            wire:click="deleteMusicband({{ $music->id }})" class="btn btn-danger ms-1">
                            Delete
                        </a>

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-center mb-2">
                        <button class="btn btn-info rounded-pill">Book Now</button>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>
