<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Contact;
use Illuminate\Support\Facades\Schema;


class PortfolioController extends Controller
{
    public function home()
    {
        $profile     = Profile::query()->orderBy('id')->first();
        $skills      = Skill::orderBy('name')->get();
        $projects    = Project::orderByDesc('id')->get();
        $experiences = Experience::orderByDesc(
            Schema::hasColumn('experiences','start_date') ? 'start_date' : 'id'
        )->get();
        $contacts    = Contact::orderBy('id')->get();

        $skillCount   = $skills->count();
        $projectCount = $projects->count();
        $expCount     = $experiences->count();

        return view('home', compact(
            'profile','skills','projects','experiences','contacts',
            'skillCount','projectCount','expCount'
        ));
    }

    public function skills()
    {
        $query = Skill::query();

        if (Schema::hasColumn('skills', 'category')) {
            $query->orderBy('category');
        }

        $skills = $query->orderBy('name')->get();

        return view('skills', compact('skills'));
    }

    public function projects()
    {
        $query = Project::query();

        if (Schema::hasColumn('projects', 'featured')) {
            $query->orderByDesc('featured');
        }

        if (Schema::hasColumn('projects', 'year')) {
            $query->orderByDesc('year');
        } else {
            $query->orderByDesc('id');
        }

        $projects = $query->get();

        return view('projects', compact('projects'));
    }

    public function experiences()
    {
        $query = Experience::query();

        if (Schema::hasColumn('experiences', 'start_date')) {
            $query->orderByDesc('start_date');
        } else {
            $query->orderByDesc('id');
        }

        $experiences = $query->get();

        return view('experiences', compact('experiences'));
    }

    public function contacts()
    {
        $contacts = Contact::query()->orderBy('id')->get();

        return view('contacts', compact('contacts'));
    }
}
