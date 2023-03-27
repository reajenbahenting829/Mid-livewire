<?php

namespace App\Http\Livewire\Music;

use App\Models\Band;
use Livewire\Component;
use App\Models\Musicband;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $search;
    public $byLocation = 'all';
    public $srtBy = "asc";
    public $byRate;
    public $byJazz = '';
    public $byBlues = '';
    public $byReggae = '';
    public $byAcoustic = '';
    public $byClassical = '';
    public $bandName, $location, $rate, $groupNum, $year_started, $description, $image, $genre = [''];

    public function show(){

        $query = Musicband::orderBy('rate', $this->srtBy)
            ->search($this->search);


        if($this->byJazz == 'Jazz' ){
            $query->where('genre',$this->byJazz);
        }

        if($this->byBlues == 'Blues' || $this->byReggae == 'Reggae'
            || $this->byJazz == 'Jazz' || $this->byAcoustic == 'Acoustic'
            ||$this->byClassical == 'Classical' ){
            $query->where('genre', $this->byBlues)
                    ->orWhere('genre', $this->byReggae)
                    ->orWhere('genre', $this->byJazz)
                    ->orWhere('genre', $this->byAcoustic)
                    ->orWhere('genre', $this->byClassical);
        }
        if($this->byReggae == 'Reggae' ){
            $query->where('genre', $this->byReggae);
        }
        if($this->byAcoustic == 'Acoustic' ){
            $query->where('genre', $this->byAcoustic);
        }
        if($this->byClassical == 'Classical' ){
            $query->where('genre', $this->byClassical);
        }

        if($this->byRate){
            $query->where('rate', '>=', $this->byRate);
        }

        if($this->byLocation != 'all'){
            $query->where('location', $this->byLocation);
        }
        $musicbands = $query->paginate(5);
        return compact('musicbands');
    }

    public function resetFilters(){
        $this->reset('search', 'byJazz', 'byBlues', 'byAcoustic', 'byReggae', 'byClassical', 'byRate', 'srtBy', 'byLocation');
    }
    public function addMusicband(){

        $this->validate([
            'bandName' => ['string', 'required'],
            'description' => ['string', 'required'],
            'year_started' => ['required'],
            'groupNum' => ['required'],
            'location' => ['string', 'required'],
            'genre' => ['required'],
            'rate' => ['string', 'required'],
            'image' => ['image', 'required'], // 1MB Max
        ]);

        Musicband::create([
            'bandName' => $this->bandName,
            'description' => $this->description,
            'year_started' => $this->year_started,
            'groupNum' => $this->groupNum,
            'location' => $this->location,
            'genre' => $this->genre,
            'rate' => $this->rate,
            'image' => $this->image->store('musicband', 'public')]);

            return redirect('/')->with('message', 'Created Successfully');

    }

    public function editMusicband(int $music_id){
        $music = Musicband::find($music_id);
        if($music){
            $this->music_id = $music->id;
            $this->bandName = $music->bandName;
            $this->description = $music->description;
            $this->year_started = $music->year_started;
            $this->groupNum = $music->groupNum;
            $this->location = $music->location;
            $this->genre = $music->genre;
            $this->rate = $music->rate;


        }else{
            return redirect()->to('/');
        }

    }

    public function updateMusicband(){
        $this->validate([
            'bandName' => ['string', 'required'],
            'description' => ['string', 'required'],
            'year_started' => ['required'],
            'groupNum' => ['required'],
            'location' => ['string', 'required'],
            'genre' => ['required'],
            'rate' => ['string', 'required'],
            'image' => ['nullable'],

        ]);
        try{
        $music = Musicband::find($this->id);

        Musicband::where('id',$this->music_id)->update([
            'bandName' => $this->bandName,
            'description' => $this->description,
            'groupNum' => $this->groupNum,
            'location' => $this->location,
            'location' => $this->location,
            'genre' => $this->genre,
            'rate' => $this->rate,
        ]);

        if($this->image != null){
            Musicband::where('id',$this->music_id)->update(['image' => $this->image->store('musicband', 'public')]);
        }
        }catch(\Exception $e){
            return redirect('/')->with('message', 'Updated Successfully');
        }
        return redirect('/')->with('message', 'Updated Successfully');
    }

    public function deleteMusicband(int $music_id)
    {
        $this->music_id = $music_id;
    }

    public function destroyMusicband()
    {
        Musicband::find($this->music_id)->delete();
        return redirect('/')->with('message', 'Deleted Successfully');

    }

    public function render(){
        $musicbands = Musicband::where('bandName', 'like', '%'.$this->search.'%')
                    ->orWhere('location', 'like', '%'.$this->search.'%')
                    ->orWhere('rate', 'like', '%'.$this->search.'%')
                    ->orWhere('genre', 'like', '%'.$this->search.'%')
                    ->get();
        return view('livewire.music.index', $this->show(), ['musicbands' => $musicbands] );
    }
}
