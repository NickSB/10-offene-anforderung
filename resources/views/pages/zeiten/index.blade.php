<?php

use App\Models\TimeEntry;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Zeiten')] class extends Component
{
    use WithPagination;

    #[Computed]
    public function entries()
    {
        return TimeEntry::with('project.customer')
            ->orderByDesc('date')
            ->orderByDesc('id')
            ->paginate(15);
    }
};
?>

<div>
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Zeiten</h1>
        <a href="/zeiten/erfassen" wire:navigate class="rounded-lg bg-emerald-600 px-4 py-2 font-semibold text-white hover:bg-emerald-700">Zeit erfassen</a>
    </div>

    @if (session('status'))
        <p class="mt-4 rounded-lg bg-emerald-50 px-4 py-3 text-emerald-800 ring-1 ring-emerald-200">{{ session('status') }}</p>
    @endif

    <table class="mt-6 w-full overflow-hidden rounded-lg bg-white text-left ring-1 ring-gray-200">
        <thead class="bg-gray-100 text-sm text-gray-600">
            <tr>
                <th class="px-4 py-2">Datum</th>
                <th class="px-4 py-2">Kunde / Projekt</th>
                <th class="px-4 py-2">Beschreibung</th>
                <th class="px-4 py-2 text-right">Dauer</th>
                <th class="px-4 py-2 text-center">Verrechenbar</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse ($this->entries as $entry)
                <tr wire:key="entry-{{ $entry->id }}">
                    <td class="whitespace-nowrap px-4 py-2">{{ $entry->date->format('d.m.Y') }}</td>
                    <td class="px-4 py-2">
                        <span class="font-medium">{{ $entry->project->customer->name }}</span>
                        <span class="block text-sm text-gray-500">{{ $entry->project->name }}</span>
                    </td>
                    <td class="px-4 py-2">{{ $entry->description }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-right tabular-nums">{{ intdiv($entry->minutes, 60) }}:{{ str_pad($entry->minutes % 60, 2, '0', STR_PAD_LEFT) }} h</td>
                    <td class="px-4 py-2 text-center">{{ $entry->billable ? '✓' : '–' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">Noch keine Zeiten erfasst.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $this->entries->links() }}
    </div>
</div>
