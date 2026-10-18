<?php

use App\Models\Project;
use App\Support\Zeitrundung;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Zeit erfassen')] class extends Component
{
    public $projectId = '';

    public string $date = '';

    public $minutes = '';

    public string $description = '';

    public bool $billable = true;

    public function mount(): void
    {
        $this->date = today()->toDateString();
    }

    #[Computed]
    public function projects()
    {
        return Project::with('customer')->get()->sortBy(fn (Project $p) => $p->customer->name.' '.$p->name);
    }

    public function save(): void
    {
        $validated = $this->validate([
            'projectId' => ['required', 'integer', 'exists:projects,id'],
            'date' => ['required', 'date', 'before_or_equal:today'],
            'minutes' => ['required', 'integer', 'min:1', 'max:720'],
            'description' => ['required', 'string', 'max:255'],
            'billable' => ['boolean'],
        ]);

        Project::findOrFail($validated['projectId'])->timeEntries()->create([
            'date' => $validated['date'],
            'minutes' => Zeitrundung::aufViertelstunde((int) $validated['minutes']),
            'description' => $validated['description'],
            'billable' => $validated['billable'],
        ]);

        session()->flash('status', 'Zeit wurde erfasst.');

        $this->redirect('/zeiten', navigate: true);
    }
};
?>

<div class="mx-auto max-w-xl">
    <h1 class="text-2xl font-bold">Zeit erfassen</h1>

    <form wire:submit="save" class="mt-6 space-y-4 rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200">
        <div>
            <label for="projectId" class="block text-sm font-medium">Projekt</label>
            <select id="projectId" wire:model="projectId" class="mt-1 w-full rounded-lg border bg-white px-3 py-2 @error('projectId') border-red-500 @else border-gray-300 @enderror">
                <option value="">– bitte wählen –</option>
                @foreach ($this->projects as $project)
                    <option value="{{ $project->id }}">{{ $project->customer->name }} – {{ $project->name }}</option>
                @endforeach
            </select>
            @error('projectId') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="date" class="block text-sm font-medium">Datum</label>
                <input id="date" type="date" wire:model="date" class="mt-1 w-full rounded-lg border px-3 py-2 @error('date') border-red-500 @else border-gray-300 @enderror">
                @error('date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="minutes" class="block text-sm font-medium">Dauer (Minuten)</label>
                <input id="minutes" type="number" wire:model="minutes" class="mt-1 w-full rounded-lg border px-3 py-2 @error('minutes') border-red-500 @else border-gray-300 @enderror">
                <p class="mt-1 text-xs text-gray-500">Wird auf die nächste Viertelstunde aufgerundet.</p>
                @error('minutes') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium">Beschreibung</label>
            <input id="description" type="text" wire:model="description" class="mt-1 w-full rounded-lg border px-3 py-2 @error('description') border-red-500 @else border-gray-300 @enderror">
            @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center gap-2">
            <input id="billable" type="checkbox" wire:model="billable" class="size-4 accent-emerald-600">
            <label for="billable" class="text-sm">Verrechenbar</label>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="rounded-lg bg-emerald-600 px-4 py-2 font-semibold text-white hover:bg-emerald-700">Speichern</button>
            <a href="/zeiten" wire:navigate class="text-sm text-gray-600 hover:underline">Abbrechen</a>
        </div>
    </form>
</div>
