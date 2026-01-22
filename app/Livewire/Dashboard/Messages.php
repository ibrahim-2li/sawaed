<?php

namespace App\Livewire\Dashboard;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Messages extends Component
{
    use WithPagination;

    public $selected = [];

    public function toggleRead($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->update(['is_read' => ! $contact->is_read]);
            session()->flash('success', 'تم تحديث حالة الرسالة.');
        }
    }

    public function delete($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            session()->flash('success', 'تم حذف الرسالة بنجاح.');
        }
    }

    public function bulkRead()
    {
        if (empty($this->selected)) {
            return;
        }
        Contact::whereIn('id', $this->selected)->update(['is_read' => true]);
        $this->selected = [];
        session()->flash('success', 'تم تحديد الرسائل كمقروءة.');
    }

    public function bulkDelete()
    {
        if (empty($this->selected)) {
            return;
        }
        Contact::whereIn('id', $this->selected)->delete();
        $this->selected = [];
        session()->flash('success', 'تم حذف الرسائل المحددة.');
    }

    public function updatedSelected()
    {
        // Debugging or additional logic if needed
    }

    public function toggleSelectAll()
    {
        // Get IDs of contacts on the current page
        $currentPageIds = Contact::orderBy('created_at', 'desc')
            ->paginate(20)
            ->pluck('id')
            ->map(fn ($id) => (string) $id)
            ->toArray();

        // Check if all current page items are already selected
        $allSelected = ! array_diff($currentPageIds, $this->selected);

        if ($allSelected) {
            // Deselect logic: Remove current page IDs from selected array
            $this->selected = array_values(array_diff($this->selected, $currentPageIds));
        } else {
            // Select logic: Merge current page IDs into selected array, ensuring uniqueness
            $this->selected = array_unique(array_merge($this->selected, $currentPageIds));
        }
    }

    public function render()
    {
        return view('livewire.dashboard.messages', [
            'contacts' => Contact::orderBy('created_at', 'desc')->paginate(20),
        ]);
    }
}
