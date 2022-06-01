<?php

namespace App\Http\Livewire\User;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UserProfileEditComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $lastname;
    public $email;

    public $image;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;

    public $newimage;

    public function mount()
    {
        $userProfile = Profile::select('id', 'user_id', 'image', 'mobile', 'line1', 'line2', 'city', 'province', 'country', 'zipcode')
            ->where('user_id', Auth::user()->id)->first();

        if (!$userProfile) {
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
            return redirect()->to(route('user.profileedit'));
        }

        $this->image    = $userProfile->image;
        $this->mobile   = $userProfile->mobile;
        $this->line1    = $userProfile->line1;
        $this->line2    = $userProfile->line2;
        $this->city     = $userProfile->city;
        $this->province = $userProfile->province;
        $this->country  = $userProfile->country;
        $this->zipcode  = $userProfile->zipcode;

        $user = User::select('name', 'lastname', 'email')->where('id', Auth::user()->id)->first();
        $this->name     = $user->name;
        $this->lastname = $user->lastname;
        $this->email    = $user->email;
    }

    public function updated($fields)
    {

        $this->validateOnly($fields, [
            'name'     => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'email'    => ['required', 'max:150', Rule::unique('users')->ignore(Auth::user()->id)],
            'mobile'   => ['nullable', 'numeric', 'min:11'],
            'line1'    => ['nullable'],
            'line2'    => ['nullable'],
            'city'     => ['nullable'],
            'province' => ['nullable'],
            'country'  => ['nullable'],
            'zipcode'  => ['nullable'],

        ]);

        if ($this->newimage) {
            $this->validateOnly($fields, ['newimage' => 'required|mimes:jpeg,jpg,png|max:2000',]);
        }
    }

    public function update()
    {
        $this->validate([
            'name'     => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'email'    => ['required', 'max:150', Rule::unique('users')->ignore(Auth::user()->id)],
            'mobile'   => ['nullable', 'numeric', 'min:11'],
            'line1'    => ['nullable'],
            'line2'    => ['nullable'],
            'city'     => ['nullable'],
            'province' => ['nullable'],
            'country'  => ['nullable'],
            'zipcode'  => ['nullable'],
        ]);

        $profile           = Profile::where('user_id',Auth::user()->id)->first();
        $profile->mobile   = $this->mobile;
        $profile->line1    = $this->line1;
        $profile->line2    = $this->line2;
        $profile->city     = $this->city;
        $profile->province = $this->province;
        $profile->country  = $this->country;
        $profile->zipcode  = $this->zipcode;
        if($this->newimage)
        {
            if (!empty($profile->image) && file_exists('assets/images/profile/cover'.'/'.$profile->image))
            {
                unlink('assets/images/profile/cover'.'/'.$profile->image); // Deleting Image
            }
            if (!empty($profile->image) && file_exists('assets/images/profile/thumbnail'.'/'.$profile->image))
            {
                unlink('assets/images/profile/thumbnail'.'/'.$profile->image); // Deleting Image
            }
            $imagename     = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $originalPath  = public_path().'/assets/images/profile/cover/';
            $thumbnailPath = public_path().'/assets/images/profile/thumbnail/';
            $imageFile     = Image::make($this->newimage);
            $imageFile->fit(400,400);
            $imageFile->save($originalPath.$imagename);
            $imageFile->fit(190,190);
            $imageFile->save($thumbnailPath.$imagename);
            $profile->image = $imagename;
        }
        $profile->save();

        $user           = User::find(Auth::user()->id);
        $user->name     = $this->name;
        $user->lastname = $this->lastname;
        $user->email    = $this->email;
        $user->save();

        session()->flash('message','Profile has been updated successfully!');
        return redirect()->to(route('user.profile'));
    }

    public function render()
    {
        return view('livewire.user.user-profile-edit-component')->layout('layouts.base');
    }
}
