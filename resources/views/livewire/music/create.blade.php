<div>
    <div wire:ignore.self class="modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h3 class="modal-title mx-auto text-white" id="exampleModalLabel">Add Music Band</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addMusicband()">
                        @csrf
                        <div class="container mx-auto bg-info">
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <div class="form-group me-3">
                                        <label for="" style="color:rgb(27, 8, 191)">Image:</label>
                                        <input type="file" wire:model="image" class="form-control">
                                        @error('image')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        @if ($image)
                                            Photo Preview: <br>
                                            <img src="{{ $image->temporaryUrl() }}" style="width:120px; height:200px"
                                                class="mt-1">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" style="color:rgb(11, 11, 11)">Band Name:</label>
                                        <input type="text" class="form-control" wire:model="bandName">
                                        @error('name')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" style="color:rgb(14, 14, 14)">Location</label>
                                        <input type="text" class="form-control" wire:model="location">
                                        @error('location')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group d-flex justify-content-between">
                                        <div class="col-md-5">
                                            <label for="" style="color:rgb(18, 18, 18)">Rate</label>
                                            <input type="number" class="form-control" wire:model="rate">
                                            @error('rate')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" style="color:rgb(13, 12, 12)">Year/s started:</label>
                                            <input type="number" class="form-control" wire:model="year_started">
                                            @error('year_started')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group d-flex justify-content-between">
                                        <div class="col-md-5">
                                            <label for="genre" style="color:rgb(13, 12, 12)">Genre</label>
                                            <select class="form-select" wire:model="genre" id="genre">
                                                <option selected>Select Genre</option>
                                                <option value="Jazz">Jazz</option>
                                                <option value="Blues">Blues</option>
                                                <option value="Reggae">Reggae</option>
                                                <option value="Acoustic">Acoustic</option>
                                                <option value="Classical">Classical</option>
                                            </select>
                                            @error('genre')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" style="color:rgb(16, 15, 15)">No. of Member/Performers</label>
                                            <input type="number" class="form-control" wire:model="groupNum">
                                            @error('groupNum')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:rgb(18, 17, 17)">Description</label>
                                        <textarea type="text" class="form-control" wire:model="description"></textarea>
                                        @error('description')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
